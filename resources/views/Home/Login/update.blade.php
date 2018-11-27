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
 <style type="text/css">
  .cur{
    border:1px solid red;
  }

  .curs{
    border:1px solid green;
  }
  </style>
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
      <h4 class="title-big">请修改您的密码。 </h4> 
     </div> 
     <div class="regbox"> 
      <form action="/idd" method="post" name="getPassword"> 
	   <input type="hidden" name="id" value="{{$id}}">
       <div class="inputbg"> 
         <label class="labelbox"> <input type="password" name="password" id="password" placeholder="密码" reminder="请输入密码"/> </label>  
        </div> 
        <div class="err_tip" id="password_notice"> 
         <em></em> 
        </div> 
        <div class="inputbg"> 
         <label class="labelbox"> <input name="repassword" type="password" id="repassword" placeholder="确认密码" reminder="请与密码符合"/> </label>  
        </div> 
        <div class="err_tip" id="repassword_notice"> 
         <em></em> 
        </div> 
       <div class="fixed_bot mar_phone_dis1"> 
	   {{csrf_field()}}
        <input type="submit" name="submit" value="提 交" class="btn332 btn_reg_1 submit-step" style="border:none;" /> 
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
   PWD = false;
    //获取焦点
	$("input").focus(function(){
		//样式清除
		$(this).removeClass("curs");
		$(this).removeClass("cur");
	});
	//匹配密码
	$("input[name='password']").blur(function(){
		password = $(this).val();
		x = $(this);
		$.ajax({
			type: "GET",
			data: {password:password},
			url: "/getpassword",
			success: function(data){
				if(data == 1){
					$("#password_notice").css("color","green").html("密码格式正确");
					x.addClass("curs");
					PWD = true;
				}else if(data == 2){
					$("#password_notice").css("color","").html("密码不能为空");
					x.addClass("cur");
					PWD = false;
				}else{
					$("#password_notice").css("color","").html("18位由字母数字下划线组成的密码");
					x.addClass("cur");
					PWD = false;
				}
			}
		});
	});
	//查看与密码是否一样
	$("input[name='repassword']").blur(function(){
		password = $("input[name='password']").val();
		repassword = $(this).val();
		c = $(this);
		$.ajax({
			method: "POST",
			data: {password:password,repassword:repassword,'_token':'{{csrf_token()}}'},
			url: "/checkpassword",
			// dataType: "json",
			success: function(data){
				// alert(data);
				if(data == 1){
					$("#repassword_notice").css("color","").html("不能为空");
					c.addClass("cur");
					PWD = false;
				}else if(data == 2){
					
					$("#repassword_notice").css("color","green").html("与密码相符");
					c.addClass("curs");
					PWD = true;
				}else{
					$("#repassword_notice").css("color","").html("与密码不相符");
					c.addClass("cur");
					PWD = false;
				}
			}
		});
	});
	//表单提交处理
	$("form").submit(function(){
		// alert("不能提交");
		$("input").trigger("blur");
		if(PWD){
			return true;
		}else{
			return false;
		}
	});
   </script> 
  </div>
 </body>
</html>
