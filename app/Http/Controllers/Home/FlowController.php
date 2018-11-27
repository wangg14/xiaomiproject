<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$amount = '';
        //获取session
		$data = session('cart');
		$arr = array();
		if(empty($data)){
			return view('Home.Cart.noshops');
		}else{
			$id = DB::table('users')->select('id')->where('username','=',session('username'))->first();
			$address = DB::table('address')->where('user_id','=',$id->id)->first();
			// dd($address);
			
			foreach($data as $v){
				if(is_array($v)){
					$info = DB::table('shops')->where('id','=',$v['id'])->first();
					$info->snum = $info->num;
					$info->num = $v['number'];
					$amount += $v['number']*$info->price;
					$arr[] = $info;
				}
			}
			// dd($data);
			if($address){
				$data['address'] = $address->id;
			}
			$data['user_id'] = $id->id;
			session(['cart'=>$data]);
			// dd(session('cart'));
			return view('Home.Cart.flow',['arr'=>$arr,'amount'=>$amount,'address'=>$address]);
		}

    }
	public function address(){
		return view('Home.Cart.address');
	}
	public function addresses(Request $request){
		$upid = $request->input('upid');
		$info = DB::table('district')->where('upid','=',$upid)->get();
		// $data = array();
		// foreach($info as $v){
			// $data[] = $v->name;
		// }
		// dd($data);
		return $info;
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$input = $request->except('_token','x','y');
		
		$data['order_num'] =time()+rand(1,10000);
		$data['user_id'] = session('cart')['user_id'];
		$data['address_id'] = session('cart')['address'];
		$data['total'] = $input['amount'];
		// dd($data);
		$id = DB::table('orders')->insertGetId($data);
		
		$goods = session('cart');
		// dd($goods);
		foreach($goods as $k=>$v){
			if(is_array($v)){
				$arr['order_id'] = $id;
				$arr['goods_id'] = $v['id'];
				$arr['num'] = $v['number'];
				DB::table('order_goods')->insert($arr);
				unset($goods[$k]);
				
			}
		}
		unset($goods['address']);
		unset($goods['user_id']);
		session(['cart'=>$goods]);
		return view('Home.Cart.flow1',['data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 //修改地址
    public function edit($id)
    {
		$info = DB::table('address')->where('id','=',$id)->first();
        //加载模板
		return view('Home.Cart.address',['info'=>$info]);
		
    }
	public function updates(Request $request){
		$id = $request -> only(['province','city','district','street','name','address','phone','address_id']);
		// dd($id);
		$info = DB::table('district')->where('id','=',$id['province'])->first();
		if($info){
			$data['adds'] = $info->name;
		}
		$data['name'] = $id['name'];
		$data['phone'] = $id['phone'];
		$data['huo'] = $id['address'];
		DB::table('address')->where('id','=',$id['address_id'])->update($data);
		return redirect('/flow');
	}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	//支付宝接口
    public function pays(){
        pays(time(),'goods',"0.01",'goods');
    }
    public function returnurl(){
        echo "支付成功";
    }

}
