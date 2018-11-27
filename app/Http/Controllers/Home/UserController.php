<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$as = array();
		$at = array();
		if(!empty(session('cart'))){
			
			$s = session('cart');
			foreach($s as $k=>$v){
				$a = DB::table('shops')->where('id','=',$v['id'])->first();
				// dd($s);
				$a->num = $v['number'];
				$at[] += $v['number']*$a->price;
				$at[] += $v['number'];
				$as[] = $a;
			}
		}
		$cate = IndexController::getcatesbypid(0);
		$data = IndexController::find();
		$k = false;
		// dd($cate);
		$info = DB::table('view_page') -> get();
		$email = DB::table('users')->where('username','=',session('username'))->first();
        //加载模板
		return view('Home.User.user',['cate'=>$cate,'k'=>$k,'data'=>$data,'info'=>$info,'at'=>$at,'as'=>$as,'email'=>$email]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
		return view('Home.User.users');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //加载模板
		return redirect('/homeuser');
		
		
    }
	//修改密码
	public function edits(Request $request){
		// echo 1;
		$input = $request->except('_token','submit');
		// dd($input);
		if(empty($input['old_password']) && empty($input['new_password'])){
			return back() -> with('error','密码不能为空');
		}elseif($input['new_password'] != $input['comfirm_password']){
			return back() -> with('error','两次密码不一致');
		}else{
			$info = DB::table('users')->where('username','=',session('username'))->first();
			// dd($info->password);
			if(Hash::check($input['old_password'],$info->password)){
				$new['password'] = Hash::make($input['new_password']);
				DB::table('users')->where('id','=',$info->id)->update($new);
				return redirect('/homelogin');
			}else{
				return back() -> with('error','旧密码输入错误');
			}
		}
	}
	//订单详情
	public function orderlist(){
		$as = array();
		$at = array();
		if(!empty(session('cart'))){
			
			$s = session('cart');
			foreach($s as $k=>$v){
				$a = DB::table('shops')->where('id','=',$v['id'])->first();
				// dd($s);
				$a->num = $v['number'];
				$at[] += $v['number']*$a->price;
				$at[] += $v['number'];
				$as[] = $a;
			}
		}
		$cate = IndexController::getcatesbypid(0);
		$data = IndexController::find();
		$k = false;
		$info = DB::table('users')->where('username','=',session('username'))->first();
		$order = DB::table('orders')->where('user_id','=',$info->id)->get();
		if($order){
			$arr = $order;
		}else{
			$arr = "";
		}
		return view('Home.User.orderlist',['cate'=>$cate,'k'=>$k,'data'=>$data,'at'=>$at,'as'=>$as,'arr'=>$arr]);
	}
	//取消订单
	public function off(Request $request){
		$id = $request->input('id');
		// echo $input;
		$info = DB::table('orders')->where('id','=',$id)->delete();
		$data = DB::table('order_goods')->where('order_id','=',$id)->delete();
		if($info && $data){
			echo 1;
		}else{
			echo 2;
		}
	}
	//订单详情
	public function order(Request $request){
		$id = $request->input('id');
		$amount = "";
		$info = DB::table('orders')->where('id','=',$id)->first();
		$data = DB::table('order_goods')->where('order_id','=',$id)->get();
		foreach($data as $k=>$v){
			$shops[$k] = DB::table('shops')->where('id','=',$v->goods_id)->first();
			$shops[$k]->num = $v->num;
			$amount += $shops[$k]->price*$v->num;
		}
		return view('Home.User.order',['info'=>$info,'shops'=>$shops,'amount'=>$amount]);
	}
	//地址
	public function orderaddress(){
		$as = array();
		$at = array();
		if(!empty(session('cart'))){
			
			$s = session('cart');
			foreach($s as $k=>$v){
				$a = DB::table('shops')->where('id','=',$v['id'])->first();
				// dd($s);
				$a->num = $v['number'];
				$at[] += $v['number']*$a->price;
				$at[] += $v['number'];
				$as[] = $a;
			}
		}
		$cate = IndexController::getcatesbypid(0);
		$data = IndexController::find();
		$k = false;
		$info = DB::table('users')->where('username','=',session('username'))->first();
		$address = DB::table('address')->where('user_id','=',$info->id)->first();
		if($address){
			$address->user_id = $info->id;
		}else{
			$address = "";
		}
		
		return view('Home.User.address',['cate'=>$cate,'k'=>$k,'data'=>$data,'at'=>$at,'as'=>$as,'info'=>$info,'address'=>$address]);
	}
	
	//地址添加
	public function addressadd(Request $request){
		$id = $request -> only(['country','province','city','district','name','address','phone','user_id']);
		// dd($id);
		$info = DB::table('district')->where('id','=',$id['country'])->first();
		$data['name'] = $id['name'];
		$data['phone'] = $id['phone'];
		$data['user_id'] = $id['user_id'];
		$data['huo'] = $id['address'];
		$data['adds'] = $info->name;
		DB::table('address')->insert($data);
		return redirect('/orderaddress');
		
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 //地址删除
    public function show($id)
    {
        //
		$info = DB::table('address')->where('id','=',$id)->delete();
		return redirect('/orderaddress');
    }
	//修改地址
	public function addressedit(Request $request){
		$id = $request -> only(['country','province','city','district','name','address','phone','user_id']);
		// dd($id);
		$info = DB::table('district')->where('id','=',$id['country'])->first();
		if($info){
			$data['adds'] = $info->name;
		}
		$data['name'] = $id['name'];
		$data['phone'] = $id['phone'];
		$data['huo'] = $id['address'];
		DB::table('address')->where('user_id','=',$id['user_id'])->update($data);
		return redirect('/orderaddress');
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		
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
}
