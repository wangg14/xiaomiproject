<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载模板
		$info = DB::table('links') -> get();
		return view('Admin.Links.index',['info'=>$info]);
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
		$info = DB::table('links') -> where('id','=',$id) -> first();
		return view('Admin.Links.edit',['info'=>$info]);
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
        //获取input值
		$info = $request -> except('_token','_method');
		// dd($info);
		$data = DB::table('links') -> where('id','=',$id) -> update($info);
		if($data){
			return redirect('/links') -> with('success','修改成功');
		}else{
			return redirect('/links') -> with('error','修改失败');
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
        //删除数据
		$data = DB::table('links') -> where('id','=',$id) -> delete();
		if($data){
			return redirect('/links') -> with('success','修改成功');
		}else{
			return redirect('/links') -> with('error','修改失败');
		}
    }
}
