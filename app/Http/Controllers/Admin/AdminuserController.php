<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// dd(session('name'));
		$sql = "select ur.uid,r.name from admin_users as u,user_role as ur,role as r where u.id=ur.uid and ur.rid=r.id";
		$list = DB::select($sql);
		// dd($list);
		$user = DB::table('admin_users') -> paginate(3);
		foreach($list as $value){
			foreach($user as $v){
				if($v->id == $value->uid){
					$v->rname = $value -> name;
				}
			}
		}
		// dd($user);
        //加载模板
		return view('Admin.Adminuser.index',['user'=>$user]);
    }
	//分配角色
	public function rolelist($id){
		// echo "this is rolelist";
		//获取用户信息
		$info = DB::table('admin_users') -> where('id','=',$id) -> first();
		//获取角色信息
		$role = DB::table('role') -> get();
		//获取当前用户的角色信息
		$data = DB::table('user_role') -> where('uid','=',$id) -> get();
		if(count($data)){
			foreach($data as $v){
				//rid存入数组里
				$rids[] = $v -> rid;
			}
			return view('Admin.Adminuser.rolelist',['info'=>$info,'role'=>$role,'rids'=>$rids]);
		}else{
			//加载模板
            return view("Admin.Adminuser.rolelist",['info'=>$info,'role'=>$role,'rids'=>array()]);
		}
	}
	
	//提交分配角色
	public function saverole(Request $request){
			//获取uid
			$uid = $request -> input('uid');
			//获取rid
			$rid['rid'] = $_POST['rid'][0];
			$rid['uid'] = $uid;
			// dd($rid);
			//删除当前已有的角色信息
			DB::table('user_role') -> where('uid','=',$uid) -> delete();
			DB::table('user_role') -> insert($rid);
			
			return redirect('/admin_user')->with('success','角色分配成功');
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
		return view('Admin.Adminuser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //提取名字和密码
		$data = $request->except('_token');
		//加密
		$data['password'] = Hash::make($data['password']);
		$info = DB::table('admin_users')->insert($data);
		if($info){
			return redirect('/admin_user')->with('success','添加成功');
		}else{
			return redirect('/admin_user/create')->with('error','添加失败');
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
		//获取管理员信息
		$data = DB::table('admin_users') -> where('id','=',$id) -> first();
		// dd($data);
        //加载模板
		return view('Admin.Adminuser.edit',['data'=>$data]);
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
        //修改管理员名
		$name['name'] = $request -> name;
		$data = DB::table('admin_users') -> where('id','=',$id) -> update($name);
		if($data){
			return redirect('/admin_user') -> with('success','修改成功');
		}else{
			return redirect('/admin_user') -> with('success','修改失败');
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
        //删除管理员
		$user = DB::table('admin_users') -> where('id','=',$id) -> delete();
		$user_role = DB::table('user_role') -> where(
		'uid','=',$id) -> delete();
		if($user_role){
			return redirect('/admin_user') -> with('success','删除成功');
		}else{
			return redirect('/admin_user') -> with('success','删除失败');
		}
    }
}
