<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta name="Generator" content="ECSHOP v2.7.3" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="Keywords" content="" /> 
  <meta name="Description" content="" /> 
  <title>用户注册</title>
  <style type="text/css">
  .cur{
    border:1px solid red;
  }

  .curs{
    border:1px solid green;
  }
  </style>
  <link rel="stylesheet" href="/static/homes/bootstrap/css/bootstrap.css" />
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
  <div class="register_wrap" style=" background-color:rgb(195,195,195)"> 
   <div class="bugfix_ie6 dis_none"> 
    <div class="n-logo-area clearfix"> 
     <a href="./" class="fl-l"><img src="/static/homes/picture/logo.gif" width="55" /></a> 
    </div> 
   </div> 
   <div id="main"> 
    <div class="n-frame device-frame reg_frame"> 
     <div class="title-item dis_bot35 t_c"> 
      <h4 class="title-big">注册小米帐号 </h4> 
     </div> 
     <div class="regbox" id="register_box"> 
      <form action="/homeregister" method="post" name="formUser" id="form"> 
        
       <div class="phone_step1"> 
		
		<div class="inputbg"> 
         <label class="labelbox" style="width:200px"> <input name="phone" type="text" id="phone" placeholder="手机号" reminder="请输入手机号" style="width:180px;"/> </label>  
		 <a href="javascript:void(0)" class="btn btn-success" id="btn">获取校验码</a>
        </div>
		<div class="err_tip" id="phone_notice">
         <em></em> 
        </div>
		
		<div class="inputbg"> 
         <label class="labelbox" style="width:230px"> <input name="code" type="text" id="code" placeholder="校验码" reminder="请输入校验码" style="width:210px;"/> </label>  
        </div>
		<div class="err_tip" id="code_notice">
         <em></em> 
        </div>
		
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
         <input name="Submit" type="submit" value="同意协议并注册" class="btn332 btn_reg_1 submit-step" /> 
        </div> 
        <div class="trig">
         已有账号? 
         <a href="/homelogin/create" class="trigger-box">点击登录</a> 
        </div> 
       </div> 
      </form> 
     </div> 
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
	PHONE=false;
	CODE=false;
	PWD=false;
	//获取焦点
	$("input").focus(function(){
		//样式清除
		$(this).removeClass("curs");
		$(this).removeClass("cur");
	});
	$("input[name='phone']").blur(function(){
		z = $(this);
		//清除
		$(this).removeClass('cur');
		//获取reminder属性值
		reminder = $(this).attr("reminder");
		//获取手机号
		phone = $(this).val();
		// alert(phone.match(/^\d{11}$/));
		if(phone == ""){
			$("#phone_notice").css("color","").html("手机号码不能为空");
			$("#btn").attr('disabled',true);
			z.addClass('cur');
			PHONE =false;
		}else if(phone.match(/^\d{11}$/) == null){
			$("#phone_notice").css("color","").html("手机号码不合法");
			$("#btn").attr('disabled',true);
			z.addClass('cur');
			PHONE =false;
		}else{
			$.ajax({
				type: 'GET',
				data: {phone:phone},
				url: '/checkphone',
				success: function(data){
					// alert(data);
					if(data == 1){
						$("#phone_notice").css("color","").html("手机号码重复");
						$("#btn").attr('disabled',true);
						z.addClass('cur');
						PHONE =false;
					}else{
						$("#phone_notice").css("color","green").html("手机号码可用");
						$("#btn").attr('disabled',false);
						z.addClass('curs');
						PHONE =true;
					}
				},
			});
		}
		
	});
	//获取校验码
	$("#btn").click(function(){
		a = $(this);
		phone = $("input[name='phone']").val();
		//提交手机号
		$.ajax({
			type: "GET",
			data: {phone:phone},
			url: "/getcode",
			dataType: "json",
			success: function(data){
				// alert(data);
				if(data.code == 000000){
					m = 60;
					timmer = setInterval(function(){
					m--;
					a.html(m+"秒后重新发送");
					//禁用按钮
					a.attr("disabled",true);
					a.css("pointer-events","none");
					if(m == 0){
						//清除定时器
						clearInterval(timmer);
						a.html("重新发送");
						a.attr("disabled",false);
						a.css("pointer-events","auto");
					}
					},1000);
				}
			}
		});
	});
	//输入校验码检测
	$("input[name='code']").blur(function(){
		i = $(this);
		//获取输入的校验码
		code = $(this).val();
		$.ajax({
			type: "GET",
			data: {code:code},
			url: "/checkcode",
			success: function(data){
				if(data == 1){
					$("#code_notice").css("color","green").html("校验码正确");
					i.addClass("curs");
					CODE = true;
				}else if(data == 2){
					$("#code_notice").css("color","").html("校验码错误");
					i.addClass("cur");
					CODE = false;
				}else if(data == 3){
					$("#code_notice").css("color","").html("校验码不能为空");
					i.addClass("cur");
					CODE = false;
				}else{
					$("#code_notice").css("color","").html("校验码已过期");
					i.addClass("cur");
					CODE = false;
				}
			}
		});
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
		if(PHONE && CODE && PWD){
			return true;
		}else{
			return false;
		}
	});
  </script>  
 </body>
</html>