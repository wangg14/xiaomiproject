<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta name="Generator" content="ECSHOP v2.7.3" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="Keywords" content="" /> 
  <meta name="Description" content="" /> 
  <title>小米登录</title> 
  <link rel="shortcut icon" href="favicon.ico" /> 
  <link rel="icon" href="animated_favicon.gif" type="image/gif" /> 
  <link href="/static/homes/css/login.css" rel="stylesheet" type="text/css" /> 
  <script type="text/javascript" src="/static/homes/js/common.js"></script>
  <script type="text/javascript" src="/static/homes/js/user.js"></script>
 </head>
 <body> 
  <script type="text/javascript" src="/static/homes/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery.json.js"></script>
  <script type="text/javascript" src="/static/homes/js/transport_jquery.js"></script>
  <script type="text/javascript" src="/static/homes/js/utils.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery.superslide.js"></script>
  <script type="text/javascript" src="/static/homes/js/xiaomi_common.js"></script> 
  <script>
$(function(){

	
	//其它登录方式
	$("#other_method").click(function(){
		if($(".third-area").hasClass("hide")){
			$(".third-area").removeClass("hide");
		}else{
			$(".third-area").addClass("hide");
		}
	})
})
</script> 
  <div id="main" class="layout" style=" background-color:rgb(195,195,195)"> 
   <div class="nl-content"> 
    <div class="nl-logo-area"> 
     <a href="./"><img src="/static/homes/picture/logo.gif" width="55" /></a> 
    </div> 
    <h1 class="nl-login-title">一个帐号，玩转所有小米服务！</h1> 
    <p class="nl-login-intro"></p> 
    <div id="login-box" class="nl-frame-container"> 
     <div class="ng-form-area show-place"> 
      <form name="formLogin" action="/homelogin" method="post" onsubmit="return userLogin()">
		<div class="err_tip"> 
         <span>@if(session('error'))
            {{session('error')}}
            @endif </span>
        </div>
		
       <div class="shake-area"> 
        <div class="enter-area"> 
         <input name="username" type="text" class="enter-item first-enter-item" placeholder="用户名/邮箱/手机号" /> 
         <i class="placeholder">用户名</i> 
        </div> 
        <div class="enter-area"> 
         <input name="password" type="password" class="enter-item last-enter-item" placeholder="密码" /> 
         <i class="placeholder">密码</i> 
        </div> 
       </div> 
       <div class="enter-area img-code-area"> 
        <img src="/code" alt="captcha" class="code-img" onclick="this.src=this.src+'?a=1'" style="margin-top:1px;"/> 
        <input type="text" class="enter-item code-enter-item" name="fcode" maxlength="6" placeholder="验证码" /> 
        <i class="placeholder">验证码</i> 
       </div> 
	   {{csrf_field()}}
       <input type="submit" name="submit" class="button orange" value="立即登录" /> 
       <div class="ng-foot clearfix"> 
        <div class="ng-cookie-area">
         <label><input type="checkbox" value="1" name="remember" id="remember" class="remember-me" />请保存我这次的登录信息。</label>
        </div> 
        <div class="ng-link-area"> 
         <span><a href="javascript:void(0)" id="other_method">其它登录方式</a><span> | </span></span> 
         <span><a href="/back">忘记密码?</a></span> 
         <div class="third-area hide"> 
          <a class="ta-weibo" target="_blank" href="user.php?act=oath&amp;type=weibo" title="weibo">weibo</a> 
          <a class="ta-qq" target="_blank" href="user.php?act=oath&amp;type=qq" title="qq">qq</a> 
          <a class="ta-alipay" target="_blank" href="user.php?act=oath&amp;type=alipay" title="alipay">alipay</a> 
          <em class="corner"></em> 
          <em class="corner-inner"></em> 
         </div> 
        </div> 
       </div> 
       <a class="button" href="/homeregister/create">注册小米用户账号</a> 
      </form> 
     </div> 
    </div> 
   </div> 
   <div class="nl-footer"> 
    <div class="nl-f-nav"> 
     <span> <a href="http://www.ecshop119.com" target="_blank" title="ECSHOP模板屋">ECSHOP模板屋</a> </span> 
    </div> 
    <p class="nl-f-copyright">&copy;<a href="http://www.ecshop119.com/">ecshop模板屋</a> 福建省厦门市集美区天凤路 <a href="#">歡迎來电151-059-550-77本網站由 ECSHOP模板屋www.ecshop119.com 製作。</a></p> 
   </div> 
  </div>  
  <script type="text/javascript">
	
  </script>  
 </body>
</html>