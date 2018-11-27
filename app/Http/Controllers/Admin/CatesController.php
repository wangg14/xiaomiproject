<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//获取搜索关键字
		$k = $request -> input("keywords");
        //提取cates数据
		$cate = DB::table("cates") -> select(DB::raw('*,concat(path,",",id) as paths')) -> where("name","like","%".$k."%") -> orderBy('paths') -> paginate(3);
		// dd($cate);
		
		//遍历数据
		foreach($cate as $key => $value){
			//转换数组
			// dd($value);
			$arr = explode(",",$value -> path);
			//逗号个数
			$len = count($arr) - 1;
			//重复字符串函数
			$cate[$key] -> name = str_repeat("--|",$len).$value -> name;
			
		}
		
		return view('Admin.Cates.index',['cate' => $cate,'request' => $request -> all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getcates(){
		$cate = DB::table('cates') -> select(DB::raw('*,concat(path,",",id) as paths')) -> orderBy('paths') -> get();
		foreach($cate as $key=>$value){
			$arr = explode(',',$value -> path);
			//逗号个数
			$len = count($arr) - 1;
			$cate[$key] -> name = str_repeat('--|',$len).$value -> name;
		}
		return $cate;
	}
	
	public function create()
    {
		//提取数据
		$cate = self::getcates();
        //加载添加页面
		return view("Admin.Cates.add",['cate' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//顶级分类
		$data = $request -> except('_token');
		$pid = $request -> input("pid");
		// dd($data);
		if($pid == 0){
			$data['path'] = '0';
		}else{
			$info = DB::table('cates') -> where("id",'=',$pid) ->first();
			$data['path'] = $info -> path.','.$info -> id;
		}
		//执行插入
        if(DB::table("cates")->insert($data)){
            // return redirect()
            // echo 1;
            return redirect("/admincates")->with('success','添加成功');
        }else{
            // echo 0;
            return redirect("/admincates/create")->with('error','添加失败');
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
		$cate = DB::table('cates') -> where('id','=',$id) -> first();
        //加载修改模板
		return view('Admin.Cates.edit',['cate'=>$cate]);
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
        //修改分类
		// dd($request);
		$data = $request -> except(['_token','_method']);
		$edit = DB::table('cates') -> where('id','=',$id) -> update($data);
		if($edit){
			return redirect('/admincates') -> with('success','修改成功');
		}else{
			return redirect('/admincates') -> with('error','修改失败');
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
		// echo $id;
        //删除分类
		$res = DB::table('cates') -> where('pid','=',$id) -> count();
		if($res > 0){
			return redirect('/admincates') -> with('error','请先删除子类');
		}
		$del = DB::table('cates') -> where('id','=',$id) -> delete();
		if($del){
			return redirect('/admincates') -> with('success','删除成功');
		}else{
			return redirect('/admincates') -> with('error','删除失败');
		}
    }
}
