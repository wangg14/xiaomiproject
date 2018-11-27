<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$amount = '';
        //获取session
		$data = session('cart');
		// dd($data);
		if(empty($data)){
			return view('Home.Cart.noshops');
		}else{
			
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
			return view('Home.Cart.index',['arr'=>$arr,'amount'=>$amount]);
		}
		
    }
	//公共
	public function pub(Request $request){
		$goods = session('cart');
		$amount = '';
		if(empty($goods)){
			return view('Home.Cart.ajax');
		}else{
			
			foreach($goods as $v){
				$info = DB::table('shops')->where('id','=',$v['id'])->first();
				$info->snum = $info->num;
				$info->num = $v['number'];
				$amount += $v['number']*$info->price;
				$arr[] = $info;
			}
			// dd($data);
			if($request->ajax()){
				// return 1;
				return view('Home.Cart.del',['arr'=>$arr,'amount'=>$amount]);
			}
		}
	}
	//减商品
	public function jian(Request $request){
		$goods = session('cart');
		$id = $request -> input('id');
		foreach($goods as $k=>$v){
			if($v['id'] == $id){
				if($v['number'] == 1){
					echo 1;
				}else{
					$s = $v['number']-1;
					$goods[$k]['number'] = $s;	
					session(['cart'=>$goods]);
					echo $this->pub($request);
				}					
			}
		}
	}
	//加商品
	public function add(Request $request){
		$goods = session('cart');
		$id = $request -> input('id');
		foreach($goods as $k=>$v){
			if($v['id'] == $id){
				$info = DB::table('shops')->where('id','=',$id)->first();
				if($info->num == $v['number']){
					echo 1;
				}else{
					$s = $v['number']+1;
					$goods[$k]['number'] = $s;	
					session(['cart'=>$goods]);
					echo $this->pub($request);
				}					
			}
		}
	}
	//删除商品
	public function del(Request $request){
		$id = $request -> input('id');
		$goods = session('cart');
		foreach($goods as $k=>$v){
			if($v['id'] == $id){
				unset($goods[$k]);
			}
		}
		session(['cart'=>$goods]);
		echo $this->pub($request);
	}
	
	//清空购物车
	public function empty(){
		$goods = session('cart');
		foreach($goods as $k=>$v){
			unset($goods[$k]);
		}
		session(['cart'=>$goods]);
		return redirect('/homecart');
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
	//购物车去重$id 商品id
	public function checkExists($id){
		$goods = session('cart');
		if(empty($goods)){
			return true;
		}else{
			foreach($goods as $v){
				if($v['id'] == $id){
					return false;
				}else{
					return true;
				}
			}
		}
	}
	 
    public function store(Request $request)
    {
        //加载模板
		$data = $request->except(['_token','number2']);
		$goods = session('cart');
		if($this->checkExists($data['id'])){
			$request->session()->push('cart',$data);
			// dd($goods);
		}else{
			
			foreach($goods as $k=>$v){
				if($v['id'] == $data['id']){
					$goods[$k]['number'] += $data['number'];
					
				}
			}
			session(['cart'=>$goods]);
			
		}
		
		return redirect("/homecart");
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
