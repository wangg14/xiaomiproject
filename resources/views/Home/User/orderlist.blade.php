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
        <li> <a class="on" href="/orderlist">我的订单</a> <a class="" href="/orderaddress">收货地址</a> <a class="" href="#">缺货登记</a> </li> 
       </ul> </li> 
      <li class="item"> 
       <div class="root_node">
        会员中心
       </div> 
       <ul> 
        <li> <a class="" href="/homeuser">我的个人中心</a> <a class="" href="user.php?act=profile">用户信息</a> <a class="" href="user.php?act=collection_list">我的收藏</a> <a class="" href="user.php?act=message_list">我的留言</a> <a class="" href="user.php?act=affiliate">我的推荐</a> <a class="" href="user.php?act=comment_list">我的评论</a> </li> 
       </ul> </li> 
      <li class="item"> 
       <div class="root_node">
        账户中心
       </div> 
       <ul> 
        <li> <a class="" href="user.php?act=bonus">我的红包</a> <a class="" href="user.php?act=track_packages">跟踪包裹</a> <a class="" href="user.php?act=account_log">资金管理</a> </li> 
       </ul> </li> 
     </ul> 
    </div> 
	
	<div id="order">
    <div class="my_nala_centre ilizi_centre"> 
     <div class="ilizi cle"> 
      <div class="box"> 
       <div class="box_1"> 
        <div class="userCenterBox boxCenterList clearfix" style="_height:1%;"> 
         <h1>我的订单</h1> 
         <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"> 
          <tbody>
           <tr align="center"> 
            <td bgcolor="#ffffff">订单号</td> 
            <td bgcolor="#ffffff">下单时间</td> 
            <td bgcolor="#ffffff">订单总金额</td> 
            <td bgcolor="#ffffff">订单状态</td> 
            <td bgcolor="#ffffff">操作</td> 
           </tr> 
		   @if(!empty($arr))
			@foreach($arr as $row)
           <tr> 
            <td align="center" bgcolor="#ffffff"><a href="javascript:void(0)" class="f6" onclick="order({{$row->id}})">{{$row->order_num}}</a></td> 
            <td align="center" bgcolor="#ffffff">2018-11-06 19:45:13</td> 
            <td align="right" bgcolor="#ffffff">{{$row->total}}<em>元</em></td> 
            <td align="center" bgcolor="#ffffff" id="change">未确认,未付款,未发货</td> 
            <td align="center" bgcolor="#ffffff"><font class="f6"><a href="javascript:void(0)" onclick="off({{$row->id}},this)">取消订单</a></font></td> 
           </tr> 
		   @endforeach
		   @endif
          </tbody>
         </table> 
         <form name="selectPageForm" action="/user.php" method="get"> 
          <div class="clearfix"> 
           <div id="pager" class="pagebar"> 
            <span class="f_l f6" style="margin-right:10px;">总计 <b>{{count($arr)}}</b> 个记录</span> 
           </div> 
          </div> 
         </form> 
         
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
	function off(id,obj){
		
		$.ajax({
			type: "GET",
			url: "/off",
			data: {id:id},
			success: function(data){
				if(data == 1){
					$(obj).parent().parent().prev().html("已取消");
				}else{
					alert('刷新看看吧');
				}
				// alert(data);
			},
		});
	}
	function order(id){
		
		$.ajax({
			type: "GET",
			url: "/order",
			data: {id:id},
			success: function(data){
				// if(data == 1){
					// $(obj).parent().parent().prev().html("已取消");
				// }else{
					// alert('刷新看看吧');
				// }
				// alert(data);
				$('#order').html(data);
			},
		});
	}
 </script>
</html>
@endsection
@section("title","个人订单")