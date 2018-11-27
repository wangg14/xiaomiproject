<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AuthlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载模板
		$auth = DB::table('node') -> paginate(3);
		return view("Admin.Authlist.index",['auth'=>$auth]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Admin.Authlist.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取input值
		$data = $request -> except('_token');
		$data['status'] = 1;
		$node = DB::table('node') -> insert($data);
		if($node){
			return redirect('/authlist') -> with('success','添加成功');
		}else{
			return redirect('/authlist') -> with('error','添加失败');
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
        //加载模板
		$node = DB::table('node') -> where('id','=',$id) -> first();
		// dd($node);
		return view('Admin.Authlist.edit',['node'=>$node]);
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
        //修改权限名
		$node = $request -> except('_token','_method');
		$data = DB::table('node') -> where('id','=',$id) -> update($node);
		if($data){
			return redirect('/authlist') -> with('success','修改成功');
		}else{
			return redirect('/authlist') -> with('error','修改失败');
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
        //删除权限
		$del = DB::table('node') -> where('id','=',$id) -> delete();
		if($del){
			return redirect('/authlist') -> with('success','修改成功');
		}else{
			return redirect('/authlist') -> with('error','修改失败');
		}
    }
}
