<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta name="Generator" content="ECSHOP v2.7.3" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="Keywords" content="" /> 
  <meta name="Description" content="" /> 
  <title>用户中心_diaoyu666 - Powered by ECShop</title> 
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

</script> 
  <script type="text/javascript">
          var user_name_empty = "请输入您的用户名！";
          var email_address_empty = "请输入您的电子邮件地址！";
          var email_address_error = "您输入的电子邮件地址格式不正确！";
          var new_password_empty = "请输入您的新密码！";
          var confirm_password_empty = "请输入您的确认密码！";
          var both_password_error = "您两次输入的密码不一致！";
        </script> 
  <div class="register_wrap"> 
   <div class="bugfix_ie6 dis_none"> 
    <div class="n-logo-area clearfix"> 
     <a href="./" class="fl-l"><img src="/static/homes/picture/logo.gif" width="55" /></a> 
    </div> 
   </div> 
   <div id="main" class=""> 
    <div class="n-frame device-frame reg_frame"> 
     <div class="title-item dis_bot35 t_c"> 
      <h4 class="title-big">请输入您注册的用户名和注册时填写的电子邮件地址。 </h4> 
     </div> 
     <div class="regbox"> 
      <form action="/find" method="post" name="getPassword"> 
	  <div class="err_tip"> 
         <span>@if(session('error'))
            {{session('error')}}
            @endif </span>
        </div>
       <div class="inputbg"> 
        <label class="labelbox"> <input name="username" type="text" size="30" placeholder="用户名" /> </label> 
        <span class="t_text">用户名</span> 
        <span class="error_icon"></span> 
       </div> 
       <div class="inputbg"> 
        <label class="labelbox"> <input name="email" type="text" size="30" class="inputBg" placeholder="电子邮件地址" /> </label> 
        <span class="t_text">电子邮件地址</span> 
        <span class="error_icon"></span> 
       </div> 
       <div class="fixed_bot mar_phone_dis1"> 
	   {{csrf_field()}}
        <input type="submit" name="submit" value="提 交" class="btn332 btn_reg_1 submit-step" style="border:none;" /> 
        <input name="button" type="button" onclick="history.back()" value="返回上一页" style="border:none;" class="button" /> 
       </div> 
      </form> 
     </div> 
    </div> 
    <div class="n-footer"> 
     <div class="nl-f-nav"> 
      <span> <a href="http://www.ecshop119.com" target="_blank" title="ECSHOP模板屋">ECSHOP模板屋</a> </span> 
     </div> 
     <p class="nf-intro"><span>&copy;<a href="http://www.ecshop119.com/">ecshop模板屋</a> 福建省厦门市集美区天凤路 <a href="#">歡迎來电151-059-550-77本網站由 ECSHOP模板屋www.ecshop119.com 製作。</a></span></p> 
    </div> 
   </div>  
   <script type="text/javascript">

</script> 
  </div>
 </body>
</html>
