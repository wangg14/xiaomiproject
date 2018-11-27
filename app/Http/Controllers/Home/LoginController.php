<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//导入Mail类
use Mail;
//引入第三方验证码类库
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出登录
		$request -> session() -> pull('username');
		return redirect("/homeindex");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	//验证码引入
	public function code(){
		//清楚操作
		ob_clean();
		$builder = new CaptchaBuilder;
		//可以设置图片宽高及字体
		$builder->build($width = 100, $height = 30, $font = null);
		//获取验证码的内容
		$phrase = $builder->getPhrase();
		//把内容存入session
		session(['vcode'=>$phrase]);
		//生成图片
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-Type: image/jpeg');
		$builder->output();
		// die;
	}
    public function create()
    {
        //加载登录模板
		return view('Home.Login.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取验证码的内容
		$fcode = $request -> input("fcode");
		//获取系统的验证码
		$vcode = session('vcode');
		// dd($vcode);
		if($fcode == $vcode){
			$data = $request -> only(['username','password']);
			$sql = DB::table('users')->select('password','email','phone')->get();
			// dd($sql);
			//匹配用户名和密码
			foreach($sql as $v){
				$name[] = $v->email;
				$name[] = $v->phone;
				
			}
			if(strstr($data['username'],'@')){
				$info = DB::table('users')->select('username','password')->where('email','=',$data['username'])->first();
			}else{
				$info = DB::table('users')->select('username','password')->where('phone','=',$data['username'])->first();
			}
			// dd($info);
			if(in_array($data['username'],$name) && Hash::check($data['password'],$info->password)){
				//把用户名存储在session里
				session(['username'=>$info->username]);
				return redirect("/homeindex");
			}else{
				return back()->with('error','用户名或密码错误');
			}
			
		}else{
			return back() -> with('error','输入验证码错误');
		}
    }
	//发送邮件
	public function sendmail($email,$id,$token){
		//在闭包函数内部引入闭包函数外部变量 use 
        Mail::send('Home.Login.edit',['id'=>$id,'token'=>$token],function($message)use($email){
            //接收方
            $message->to($email);
            //主题
            $message->subject('用户密码修改');
        });
        return true;
	}
	
	//找回密码
	public function back(){
		//加载模板
		return view('Home.Login.back');
	}
	public function find(Request $request){
		$data = $request -> only(['username','email']);
		$sql = DB::table("users") -> pluck('username');
		// dd($sql);
		foreach($sql as $v){
			$username[] = $v;
		}
		if(in_array($data['username'],$username)){
			$info = DB::table("users") -> select('id','email','token') -> where('username','=',$data['username']) -> first();
			// dd($info);
			if($data['email'] == $info->email){
				$res = $this -> sendmail($data['email'],$info->id,$info->token);
				if($res){
                    echo "邮件已经发送,请登录邮箱修改密码";
                }
			}else{
				return back() -> with('error','邮箱不存在');
			}
		}else{
			return back() -> with('error','用户名不存在');
		}
	}
	
	//修改密码模板
	public function edit1(Request $request){
		$id = $request -> input('id');
		$info=DB::table("users")->where("id",'=',$id)->first();
		//获取token
        $token=$request->input("token");
		if($token==$info->token){
            //加载模板
			return view('Home.Login.update',['id'=>$id]);
        }
	}
	//修改密码到数据库
	public function idd(Request $request){
		$id = $request ->input('id');
		$password = $request -> input('password');
		$data['password'] = Hash::make($password);
		//修改数据库
		$info = DB::table('users')->where('id','=',$id)->update($data);
		if($info){
			return redirect('/homelogin/create');
		}else{
			return back() -> with('error','修改失败');
		}
		// dd($password);
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
