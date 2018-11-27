<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;

class CarousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载模板
		$data = DB::table('view_page') -> get();
		return view('Admin.Carouses.index',['data'=>$data]);
    }
	
	//上传图片
	public static function uploads($request){
		//初始化名字
		$name = time() + rand(1,10000);
		$ext = $request -> file('pic') -> getClientOriginalExtension();
		//上传到指定目录
		$request -> file('pic') -> move(Config::get('app.carouses'),$name.'.'.$ext);
		//初始化
		$pic = trim(Config::get('app.carouses').'/'.$name.'.'.$ext,'.');
		$info = ['name'=>$name,'ext'=>$ext,'pic'=>$pic];
		return $info;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
		return view('Admin.carouses.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = self::uploads($request);
		// dd($data);
		$data['pic'] = $info['pic'];
		$data['status'] = 1;
		$sql = DB::table('view_page') -> insert($data);
		if($sql){
			return redirect('/carouse') -> with('success','添加成功');
		}else{
			return redirect('/carouse') -> with('error','添加失败');
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
		$info = DB::table('view_page') -> where('id','=',$id) -> first();
		return view('Admin.Carouses.edit',['info'=>$info]);
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
		$info['status'] = $request -> input('status');
		// dd($info);
        //修改数据
		if($request->hasFile('pic')){
			$data = self::uploads($request);
			$info['pic'] = $data['pic'];
			
			$sql = DB::table('view_page') -> where('id','=',$id) -> update($info);
			if($sql){
				unlink('.'.$request->input('old'));
				return redirect('/carouse') -> with('success','修改成功');
			}else{
				return redirect('/carouse') -> with('error','修改失败');
			}
		}else{
			if(DB::table('view_page')->where('id','=',$id)->update($info)){
				return redirect('/carouse') -> with('success','修改成功');
			}else{
				return redirect('/carouse') -> with('error','修改失败');
			}
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
		$info = DB::table('view_page') -> where('id','=',$id) -> first();
		$sql = DB::table('view_page') -> where('id','=',$id) -> delete();
		if($sql){
			unlink('.'.$info->url);
			return redirect('/carouse') -> with('success','添加成功');
		}else{
			return redirect('/carouse') -> with('error','添加失败');
		}
    }
}
