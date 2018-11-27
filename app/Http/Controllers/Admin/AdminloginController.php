<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出 销毁session
		$request -> session() -> pull('name');
		return redirect('/adminlogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载登录模板
		return view('Admin.Adminlogin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取用户名和密码
		$name = $request -> input('name');
		$password = $request -> input('password');
		//检测用户名
		$info = DB::table('admin_users') -> where('name','=',$name) -> first();
		if($info){
			//哈希数据值检测
			if(Hash::check($password,$info->password)){
				//将用户名存储在session里
				session(['name'=>$name]);
				//获取登录后台用户所有权限
				$sql = "select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}";
				$list = DB::select($sql);
				//所有管理员都能访问后台权限
				$nodelist['AdminController'][]='index';
				// dd($list);
				
				foreach($list as $k=>$v){
					//访问指定的权限
					$nodelist[$v->mname][] = $v->aname;
					//访问权限create 添加store
					if($v->aname == 'create'){
						$nodelist[$v->mname][] = 'store';
					}
					//访问权限edit 添加update
					if($v->aname == 'edit'){
						$nodelist[$v->mname][] = 'update';
					}
					//访问权限rolelist 添加saverole
					if($v->aname == 'rolelist'){
						$nodelist[$v->mname][] = 'saverole';
					}
					//访问权限auth 添加saveauth
					if($v->aname == 'auth'){
						$nodelist[$v->mname][] = 'saveauth';
					}
					
				}
				
				//把权限信息存入session
				session(['nodelist'=>$nodelist]);
				// dd(session('nodelist'));
				return redirect('/admin')->with('success','登录成功');
			}else{
				return back()->with('error','密码有误');
			}
		}else{
			return back()->with('error','用户名有误');
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
