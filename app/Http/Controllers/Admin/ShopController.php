<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//总条数
		$total = DB::table('shops') -> count();
		//每页条数
		$rev = 5;
		//最大页数
		$maxpage = ceil($total/$rev);
		//获取传递参数
		$page = $request -> input('page');
		if(empty($page)){
			$page = 1;
		}
		//偏移量
		$offset = ($page-1)*$rev;
		$data = DB::table('shops') -> join('cates','shops.cate_id','=','cates.id') -> select('cates.id as cid','cates.name as cname','shops.id as sid','shops.name as sname','shops.pic','shops.descr','shops.num','shops.price') -> offset($offset) -> limit($rev) -> get();
		
		// dd($data);
		//判断是否为Ajax
		if($request->ajax()){
			// echo 'ajax';
			return view('Admin.Shop.page',['data'=>$data]);
		}else{
			for($i=1;$i<=$maxpage;$i++){
			$num[$i] = $i;
			}
			//加载模板
			
			// dd($data);
			return view('Admin.Shop.index',['data'=>$data,'num'=>$num]);
		}
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	//上传图片
	public static function uploads($request){
		//初始化名字
		$name = time() + rand(1,10000);
		$ext = $request -> file('pic') -> getClientOriginalExtension();
		//上传到指定目录
		$request -> file('pic') -> move(Config::get('app.uploads'),$name.'.'.$ext);
		//初始化
		$pic = trim(Config::get('app.uploads').'/'.$name.'.'.$ext,'.');
		$info = ['name'=>$name,'ext'=>$ext,'pic'=>$pic];
		return $info;
	}
	
    public function create()
    {
		
        //加载模板
		$cate = CatesController::getcates();
		// dd($cate);
		return view('Admin.Shop.add',['cate'=>$cate]);
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
		$info = $request -> except('_token','pic');
		
		if($request->hasFile('pic')){
			//调用方法
			$row = self::uploads($request);
			$info['pic'] = $row['pic'];
			// dd($info)
			$data = DB::table('shops') -> insert($info);
			if($data){
				return redirect("/shop")->with('success','添加成功');
			}else{
				return redirect("/shop")->with('error','添加失败');
			}
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
		$info = DB::table('shops') -> where('id','=',$id) -> first();
		return view('Admin.Shop.edit',['info'=>$info]);
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
		$info = $request -> only(['name','descr','num','price']);
		// dd($request->input('old'));
		//如果有新图上传
		if($request->hasFile('pic')){
			
			//调用方法
			$data = self::uploads($request);
			// dd($data);
			$info['pic'] = $data['pic'];
			$sql = DB::table('shops') -> where('id','=',$id) -> update($info);
			if($sql){
				unlink('.'.$request->input('old'));
				return redirect("/shop")->with('success','修改成功');
			}else{
				return redirect("/shop")->with('error','修改失败');
			}
		}else{
			$sql = DB::table('shops') -> where('id','=',$id) -> update($info);
			if($sql){
				return redirect("/shop")->with('success','修改成功');
			}else{
				return redirect("/shop")->with('error','修改失败');
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
		$info = DB::table('shops') -> where('id','=',$id) ->first();
		$sql = DB::table('shops') -> where('id','=',$id) -> delete();
		if($info){
			unlink('.'.$info->pic);
			return redirect("/shop")->with('success','修改成功');
		}else{
			return redirect("/shop")->with('error','修改失败');
		}
		
    }
}
