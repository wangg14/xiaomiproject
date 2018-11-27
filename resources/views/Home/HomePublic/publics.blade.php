<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta name="Generator" content="ECSHOP v2.7.3" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="Keywords" content="" /> 
  <meta name="Description" content="" /> 
  <title>@yield("title")</title> 
  <link rel="shortcut icon" href="favicon.ico" /> 
  <link rel="icon" href="animated_favicon.gif" type="image/gif" /> 
  <link href="/static/homes/css/style.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/homes/css/cart.css" rel="stylesheet" type="text/css" /> 
  <script type="text/javascript" src="/static/homes/js/common.js"></script>
  <script type="text/javascript" src="/static/homes/js/shopping_flow.js"></script>
 </head> 
 <body> 
  <script type="text/javascript" src="/static/homes/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery.json.js"></script>
  <script type="text/javascript" src="/static/homes/js/transport_jquery.js"></script>
  <script type="text/javascript" src="/static/homes/js/utils.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery.superslide.js"></script>
  <script type="text/javascript" src="/static/homes/js/xiaomi_common.js"></script>
  <script type="text/javascript" src="/static/homes/js/xiaomi_flow.js"></script> 
  <script type="text/javascript" src="/static/homes/js/showdiv.js"></script> 

  <div class="site-header site-mini-header"> 
   <div class="container"> 
    <div class="header-logo">
     <a href="/homeindex" class="logo"><img src="/static/homes/picture/logo.gif" /></a>
    </div> 
    <div class="header-title">
     <h2>我的购物车<span id="selectedCount"></span></h2>
    </div> 
	
	@if(session('username'))
	<div class="topbar-info J_userInfo"> 
   <span class="user"> <a class="user-name" target="_blank" href="user.php"><span class="name">{{session("username")}}</span><i class="iconfont"></i></a> 
    <ul class="user-menu"> 
     <li><a target="_blank" href="/homeuser">个人中心</a></li> 
     <li><a target="_blank" href="#">我的收藏</a></li> 
     <li><a target="_blank" href="#">我的评论</a></li> 
     <li><a target="_blank" href="#">跟踪包裹</a></li> 
     <li><a href="/homelogin">退出登录</a></li> 
    </ul> </span> 
   <span class="sep">|</span> 
   <a href="/orderlist" class="link">我的订单</a>
  </div>
    
	@else
	<div class="topbar-info J_userInfo"> 
     <a class="link" href="/homelogin/create" rel="nofollow">登录</a> 
     <span class="sep">|</span> 
     <a class="link" href="/homeregister/create" rel="nofollow">注册</a> 
    </div> 
	  
	@endif
        
            
        </div>
	
	
   </div> 
  </div> 
  
  @section("shops")
  @show
  
  
  <div class="site-footer"> 
   <div class="container"> 
    <div class="footer-service"> 
     <ul class="list-service clearfix"> 
      <li> <a rel="nofollow" href="javascript:void(0)"> <i class="iconfont"></i>1小时快修服务 </a> </li> 
      <li> <a rel="nofollow" href="javascript:void(0)"> <i class="iconfont"></i>7天无理由退货 </a> </li> 
      <li> <a rel="nofollow" href="javascript:void(0)"> <i class="iconfont"></i>15天免费换货 </a> </li> 
      <li> <a rel="nofollow" href="javascript:void(0)"> <i class="iconfont"></i>满150元包邮 </a> </li> 
      <li> <a rel="nofollow" href="javascript:void(0)"> <i class="iconfont"></i>520余家售后网点 </a> </li> 
     </ul> 
    </div> 
    <div class="footer-links clearfix"> 
     <div class="blank"></div> 
     <dl class="col-links"> 
      <dt>
       帮助中心
      </dt> 
      <dd> 
       <a href="article.php?id=9" target="_blank" title="配送方式" rel="nofollow">配送方式</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=10" target="_blank" title="支付方式" rel="nofollow">支付方式</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=11" target="_blank" title="购物指南" rel="nofollow">购物指南</a> 
      </dd> 
     </dl> 
     <dl class="col-links"> 
      <dt>
       服务支持
      </dt> 
      <dd> 
       <a href="article.php?id=21" target="_blank" title="相关下载" rel="nofollow">相关下载</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=22" target="_blank" title="自助服务" rel="nofollow">自助服务</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=23" target="_blank" title="售后政策" rel="nofollow">售后政策</a> 
      </dd> 
     </dl> 
     <dl class="col-links"> 
      <dt>
       小米之家
      </dt> 
      <dd> 
       <a href="article.php?id=12" target="_blank" title="预约亲临到店服务" rel="nofollow">预约亲临到店服务</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=13" target="_blank" title="服务网点" rel="nofollow">服务网点</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=14" target="_blank" title="小米之家" rel="nofollow">小米之家</a> 
      </dd> 
     </dl> 
     <dl class="col-links"> 
      <dt>
       关于小米
      </dt> 
      <dd> 
       <a href="article.php?id=24" target="_blank" title="联系小米" rel="nofollow">联系小米</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=25" target="_blank" title="加入小米" rel="nofollow">加入小米</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=26" target="_blank" title="了解小米" rel="nofollow">了解小米</a> 
      </dd> 
     </dl> 
     <dl class="col-links"> 
      <dt>
       关注小米
      </dt> 
      <dd> 
       <a href="article.php?id=15" target="_blank" title="官方微信" rel="nofollow">官方微信</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=16" target="_blank" title="小米部落" rel="nofollow">小米部落</a> 
      </dd> 
      <dd> 
       <a href="article.php?id=17" target="_blank" title="新浪微博" rel="nofollow">新浪微博</a> 
      </dd> 
     </dl> 
     <div class="col-contact"> 
      <p class="phone">15105955077</p> 
      <p>周一至周日 8:00-18:00<br />（仅收市话费）</p> 
      <a rel="nofollow" class="btn btn-line-primary btn-small"> <i class="iconfont"></i> 24小时在线客服 </a> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="site-info"> 
   <div class="container"> 
    <div class="logo ir">
     diaoyu666
    </div> 
    <div class="info-text"> 
     <p class="sites"> </p> 
     <p> &copy;<a href="http://www.ecshop119.com/">ecshop模板屋</a> 福建省厦门市集美区天凤路 <a href="#">歡迎來电151-059-550-77本網站由 ECSHOP模板屋www.ecshop119.com 製作。</a> </p> 
    </div> 
    <div class="info-links"> 
     <a href="#"><img src="/static/homes/picture/cnnicverifyseal.png" alt="可信网站" /></a> 
     <a href="#"><img src="/static/homes/picture/szfwverifyseal.gif" alt="诚信网站" /></a> 
     <a href="#"><img src="/static/homes/picture/save.jpg" alt="网上交易保障中心" /></a> 
    </div> 
   </div> 
  </div> 
  <script type="text/javascript">
var process_request = "正在处理您的请求...";
var username_empty = "用户名不能为空。";
var username_shorter = "用户名长度不能少于 3 个字符。";
var username_invalid = "用户名只能是由字母数字以及下划线组成。";
var password_empty = "登录密码不能为空。";
var password_shorter = "登录密码不能少于 6 个字符。";
var confirm_password_invalid = "两次输入密码不一致";
var email_empty = "Email 为空";
var email_invalid = "Email 不是合法的地址";
var agreement = "您没有接受协议";
var msn_invalid = "msn地址不是一个有效的邮件地址";
var qq_invalid = "QQ号码不是一个有效的号码";
var home_phone_invalid = "家庭电话不是一个有效号码";
var office_phone_invalid = "办公电话不是一个有效号码";
var mobile_phone_invalid = "手机号码不是一个有效号码";
var msg_un_blank = "用户名不能为空";
var msg_un_length = "用户名最长不得超过7个汉字";
var msg_un_format = "用户名含有非法字符";
var msg_un_registered = "用户名已经存在,请重新输入";
var msg_can_rg = "可以注册";
var msg_email_blank = "邮件地址不能为空";
var msg_email_registered = "邮箱已存在,请重新输入";
var msg_email_format = "邮件地址不合法";
var msg_blank = "不能为空";
var no_select_question = "您没有完成密码提示问题的操作";
var passwd_balnk = "- 密码中不能包含空格";
var username_exist = "用户名 %s 已经存在";
var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
var btn_buy = "购买";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
</script>   
 </body>
</html>