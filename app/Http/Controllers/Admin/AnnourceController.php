<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AnnourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载模板
		$annource = DB::table('articles')->get();
		return view('Admin.Annource.index',['annource'=>$annource]);
    }

	public function annourcedel(Request $request){
		
		//获取参数
		$arr = $request -> input('arr');
		//var_dump($arr);
		// echo 1;
		if($arr == ""){
			echo '请至少选择一条数据';
			// echo false;
		}else{
			foreach($arr as $k => $v){
				DB::table('articles') -> where('id','=',$v) -> delete();
				
			}
			echo '删除成功';
			// echo true;
		}
		
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
		
		return view('Admin.annource.add');
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
		$input = $request -> except('_token');
		// dd($input);
		$data = DB::table('articles') -> insert($input);
		if($data){
			return redirect('/adminannource') -> with('success','添加成功');
		}else{
			return redirect('/adminannource') -> with('error','添加失败');
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
		$data = DB::table('articles') -> where('id','=',$id) -> first();
		return view('Admin.annource.edit',['data'=>$data]);
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
		$old = $request -> input('old');
		
		$input = $request -> except('_token','_method','old');
		// dd($input);
		$data = DB::table('articles') -> where('id','=',$id) -> update($input);
		preg_match_all('/<img.*?src="(.*?)".*?>/is',$old,$arr);
		// dd($arr);
		if($data){
			if(isset($arr[1])){
               foreach($arr[1] as $key=>$value){
                    unlink(".".$value);
                } 
            }
			return redirect('/adminannource') -> with('success','修改成功');
		}else{
			return redirect('/adminannource') -> with('error','修改失败');
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
        //获取需要删除数据
        $info=DB::table("articles")->where("id",'=',$id)->first();
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->content,$arr);
        if(DB::table("articles")->where("id",'=',$id)->delete()){
            // unlink 删除图片路径
            if(isset($arr[1])){
               foreach($arr[1] as $value){
                    unlink(".".$value);
                } 
            }
            
            return redirect("/adminannource")->with('success','删除成功');
        }
    }
}
