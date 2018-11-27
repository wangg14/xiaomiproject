<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载注册模板
		return view('Home.Register.register');
    }

	//检查手机号码是否重复
	public function checkphone(Request $request){
		//获取手机
		$phone = $request -> input('phone');
		// echo $phone;
		//获取所有手机号码
		$phones = DB::table("users") -> pluck('phone');
		foreach($phones as $k=>$v){
			$arrs[$k] = $v;
		}
		if(in_array($phone,$arrs)){
			echo 1;
		}else{
			echo 0;
		}
	}
	
	//获取校验码
	public function getcode(Request $request){
		$phone = $request -> input('phone');
		// echo $phone;
		//调用短信接口
		sendphone($phone);
		
	}
	
	//对比校验码
	public function checkcode(Request $request){
		//获取校验码
		$code = $request -> input('code');
		if(isset($_COOKIE['scode']) && !empty($code)){
			//系统校验码
			$scode = $request -> cookie('scode');
			if($code == $scode){
				echo 1;  //ok
			}else{
				echo 2;  //校验码有误
			}
		}elseif(empty($code)){
			echo 3;  //校验码为空
		}else{
			echo 4;  //校验码过期
		}
	}
	
	//获取密码
	public function getpassword(Request $request){
		$password = $request -> input('password');
		// echo $password;
		if(preg_match("/^[a-zA-Z]\w{5,17}$/i",$password)){
			echo 1;  //符合规格
		}elseif(empty($password)){
			echo 2; //密码不能为空
		}else{
			echo 3; //请输入6-18位由字母数字下划线组成的密码
		}
	}
	//匹配是否与密码一样
	public function checkpassword(Request $request){
		$password = $request -> input ('password');
		$repassword = $request -> input('repassword');
		if(empty($repassword)){
			echo 1;
		}elseif($password == $repassword){
			echo 2;
		}else{
			echo 3;
		}
	}
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	//提交表单
    public function store(Request $request)
    {
        //
		$info = $request -> only(['phone','password']);
		$info['password'] = Hash::make($info['password']);
		$info['username'] = $info['phone'];
		$info['status'] = 1;
		$info['token'] = rand(1,10000);
		$time = time();
        $info['addtime'] = date("Y-m-d H:i:s",$time);
		// dd($info);
		$data = DB::table('users') -> insert($info);
		if($data){
			//跳转到登录
			return redirect('/homelogin/create');
		}else{
			return back();
		}
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
