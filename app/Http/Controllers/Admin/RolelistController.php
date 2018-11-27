<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RolelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所以角色
		$role = DB::table('role') -> get();
		//加载模板
		return view('Admin.Rolelist.index',['role'=>$role]);
    }

	//分配权限
	public function auth($id){
		// dd($id);
		//获取当前角色信息
		$role = DB::table('role') -> where('id','=',$id) -> first();
		//获取所以权限信息
		$node = DB::table('node') -> get();
		//获取角色已有权限信息
		$data = DB::table('role_node') -> where('rid','=',$id) -> get();
		if(count($data)){
			foreach($data as $v){
				$nid[] = $v -> nid;
			}
			return view('Admin.Rolelist.auth',['role'=>$role,'node'=>$node,'nid'=>$nid]);
		}else{
			//没有权限信息
			return view('Admin.Rolelist.auth',['role'=>$role,'node'=>$node,'nid'=>array()]);
		}
	}
	public function saveauth(Request $request){
		//获取角色id
		$rid = $request -> input('rid');
		//获取权限
		$nid = $_POST['nid'];
		DB::table('role_node') -> where('rid','=',$rid) -> delete();
		foreach($nid as $k => $v){
			$data['rid'] = $rid;
			$data['nid'] =$v;
			DB::table('role_node') -> insert($data);
		}
		return redirect("/role")->with('success','权限分配成功');
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
		return view('Admin.Rolelist.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取角色名
		$name['name'] = $request -> name;
		$name['status'] = 1;
		// dd($name);
		$data = DB::table('role') -> insert($name);
		if($data){
			return redirect('/role') -> with('success','添加成功');
		}else{
			return redirect('/role/create') -> with('error','添加失败');
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
        //获取角色名
		$name = DB::table('role') -> where('id','=',$id) -> first();
		return view('Admin.Rolelist.edit',['name'=>$name]);
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
        //获取角色名
		$name['name'] = $request -> input('name');
		//修改角色名
		$data = DB::table('role') -> where('id','=',$id) -> update($name);
		if($data){
			return redirect('/role') -> with('success','修改成功');
		}else{
			return redirect('/role') -> with('error','修改失败');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		// dd($id);
        //删除角色名
		$role = DB::table('role') -> where('id','=',$id) -> delete();
		$user_role = DB::table('user_role') -> where('rid','=',$id) -> delete();
		if($user && $user_role){
			return redirect('/role') -> with('success','删除成功');
		}else{
			return redirect('/role') -> with('error','删除失败');
		}
    }
}
