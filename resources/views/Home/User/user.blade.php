@extends("Home.HomePublic.public")
@section("main")
<html>
 <head></head>
 <body>
  <div id="wrapper" class="container"> 
   <div class="breadcrumbs"> 
    <div class="container"> 
     <a href="/homeindex">首页</a> 
     <code>&gt;</code> 用户中心 
    </div> 
   </div> 
   <div class="my_nala_main"> 
    <div class="slidebar"> 
     <ul class="slide_item"> 
      <li class="item"> 
       <div class="root_node">
        订单中心
       </div> 
       <ul> 
        <li> <a class="" href="/orderlist">我的订单</a> <a class="" href="/orderaddress">收货地址</a> <a class="" href="#">缺货登记</a> </li> 
       </ul> </li> 
      <li class="item"> 
       <div class="root_node">
        会员中心
       </div> 
       <ul> 
        <li> <a class="on" href="/homeuser">我的个人中心</a> <a class="" href="#">我的收藏</a> <a class="" href="#">我的留言</a> <a class="" href="#">我的推荐</a> <a class="" href="#">我的评论</a> </li> 
       </ul> </li> 
      <li class="item"> 
       <div class="root_node">
        账户中心
       </div> 
       <ul> 
        <li> <a class="" href="user.php?act=bonus">我的红包</a> <a class="" href="#">跟踪包裹</a> <a class="" href="#">资金管理</a> </li> 
       </ul> </li> 
     </ul> 
    </div> 
	<div id="users">
    <div class="my_nala_centre ilizi_centre"> 
     <div class="ilizi cle"> 
      <div class="box"> 
       <div class="box_1"> 
        <div class="userCenterBox boxCenterList clearfix" style="_height:1%; font-size:14px;"> 
         <div class="portal-main clearfix"> 
		 <div class="err_tip"> 
         <span style="color:red">@if(session('error'))
            {{session('error')}}
            @endif </span>
        </div>
          <div class="user-card"> 
           <h2 class="username">{{session("username")}}</h2> 
           <p class="tip">欢迎您回到小米官网~</p> 
           <a class="link" href="javascript:void(0)" onclick="change()">修改个人资料&gt;</a> 
           <img class="avatar" src="/static/homes/images/photo.jpg" /> 
          </div> 
          <div class="user-actions"> 
           <ul class="action-list"> 
            <li> 您的上一次登录时间：2018-11-20 16:29:24</li> 
            <li class="rank">您的等级是 超级用户 <span>(已经达到王者级别vip)</span></li> 
			@if(empty($email->email))
            <li class="validat">您还没有通过邮件认证 <a href="" style="color:#f70;">点此发送认证邮件</a></li> 
			@else
			<li class="validat">您已经通过邮件认证 </li> 
			@endif
           </ul> 
          </div> 
         </div> 
         <div class="portal-sub"> 
          <ul class="info-list clearfix"> 
           <li> <h3>余额：<span class="num">100000000.00<em>元</em></span></h3> <a href="user.php?act=account_log">查看您的账户余额<i class="iconfont"></i></a> <img src="/static/homes/images/portal-icon-1.png" /> </li> 
           <li> <h3>红包：<span class="num">共计 0 个,价值 0.00<em>元</em></span></h3> <a href="user.php?act=bonus">查看您的账户红包<i class="iconfont"></i></a> <img src="/static/homes/images/portal-icon-2.png" /> </li> 
           <li> <h3>积分：<span class="num">0积分</span></h3> <img src="/static/homes/images/portal-icon-3.png" /> </li> 
           <li> <h3> 用户提醒： <span class="num"> 您最近30天内提交了4个订单<br /> </span> </h3> <img src="/static/homes/images/portal-icon-4.png" /> </li> 
          </ul> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
	</div>
   </div> 
  </div>
 </body>
 <script>
	function change(){
		$.ajax({
			type: "GET",
			url: "/homeusers/create",
			data: {},
			success: function(data){
				$('#users').html(data);
				// alert(data);
			},
		});
	}
 </script>
</html>
@endsection
@section("title","个人订单")