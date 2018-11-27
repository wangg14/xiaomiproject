<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入Hash
use Hash;
use DB;
//导入请求校验类
use App\Http\Requests\AdminUserinsert;
//导入模型类Userss
use App\Models\Userss;
class UserssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索的关键词
        $k=$request->input('keywords');
        $kk=$request->input('keywordss');

        //获取列表数据
        $data=Userss::where("order_num",'like','%'.$k.'%')->where('user_id','like','%'.$kk.'%')->paginate(3);
        // dd($data);
        return view("Admin.Userss.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Admin.Userss.add");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserinsert $request)
    {
        //执行添加
        // dd($request->all());
        $data=$request->except(['repassword','_token']);
        //处理密码
        $data['password']=Hash::make($data['password']);
        // dd($data);
        $data['status']=1;
        $data['token']=str_random(50);
        if(Userss::create($data)){
            return redirect("/adminuserss")->with('success','添加成功');
        }else{
            return redirect("/adminuserss/create")->with('error','添加失败');
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
        // echo $id;单条结果
        $data=Userss::find($id)->info;
		// dd($data);
		$info = array();
		foreach($data as $k=>$v){
			$info[] = DB::table('shops')->where('id','=',$v['goods_id'])->first();
			$info[$k]->num = $v->num;
			$info[$k]->id = $v->id;
		}
        //加载模板 分配数据
        return view("Admin.Userss.info",['info'=>$info]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取需要修改数据
        $user=Userss::where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.Userss.edit",['user'=>$user]);
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
        $data=$request->except(['_token','_method']);
        //执行修改
        if(Userss::where("id",'=',$id)->update($data)){
            return redirect("/adminuserss")->with('success','修改成功');
        }else{
            return redirect("/adminuserss/{id}/edit")->with('error','修改失败');

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
        Userss::where("id",'=',$id)->delete();
    }
}
