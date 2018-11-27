<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
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
		$as = array();
		$at = array();
		if(!empty(session('cart'))){
			
			$s = session('cart');
			foreach($s as $k=>$v){
				$a = DB::table('shops')->where('id','=',$v['id'])->first();
				dd($s);
				$a->num = $v['number'];
				$at[] += $v['number']*$a->price;
				$at[] += $v['number'];
				$as[] = $a;
			}
		}
        $cate = IndexController::getcatesbypid(0);
		$data = IndexController::find();
		// dd($data);
		$k = false;
		$arr = array();
		$info = DB::table('cates') -> where('pid','=',$id) -> get();
		foreach($info as $v){
			$arr[] = DB::table('shops') -> where('cate_id','=',$v->id) -> get();
		}
		$first = DB::table('cates') -> select('name')->where('id','=',$id)->first();
		// dd($arr);
        //加载模板
		return view('Home.Category.category',['k'=>$k,'cate'=>$cate,'data'=>$data,'arr'=>$arr,'first'=>$first,'at'=>$at,'as'=>$as]);
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
