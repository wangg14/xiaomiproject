<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getcatesbypid($pid){
		
		$res = DB::table('cates') -> where('pid','=',$pid) -> get();
		// dd($res);
		$data = [];
		//遍历子类信息添加到suv下标里
		foreach($res as $key=>$value){
			// dd($value);
			$value -> suv = self::getcatesbypid($value -> id);
			$data[] = $value;
		}
		return $data;
	}
	public static function find(){
		$ress = DB::table('cates') -> join('shops','shops.cate_id','=','cates.id') -> select('cates.name as cname','cates.pid as cpid','shops.id as sid','shops.num as snum','shops.cate_id as scid','shops.descr as sdescr','shops.name as sname','shops.pic as spic','shops.price as sprice') -> get();
		// dd($ress);
		foreach($ress as $v){
			$data[] = $v;
		}
		return $data;
	}
	
	public function index()
    {
		$as = array();
		$at = array();
		if(!empty(session('cart'))){
			
			$s = session('cart');
			foreach($s as $k=>$v){
				$a = DB::table('shops')->where('id','=',$v['id'])->first();
				// dd($s);
				$a->num = $v['number'];
				$at[] += $v['number']*$a->price;
				$at[] += $v['number'];
				$as[] = $a;
			}
		}
		$cate = self::getcatesbypid(0);
		$data = self::find();
		$k = true;
		// dd($cate);
		$info = DB::table('view_page') -> get();
        //加载前台模板
		return view("Home.Index.index",['cate'=>$cate,'k'=>$k,'data'=>$data,'info'=>$info,'at'=>$at,'as'=>$as]);
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
