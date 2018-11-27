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
        <li> <a class="" href="/orderlist">我的订单</a> <a class="on" href="/orderaddress">收货地址</a> <a class="" href="#">缺货登记</a> </li> 
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
	
	<div class="my_nala_centre ilizi_centre"> 
   <div class="ilizi cle"> 
    <div class="box"> 
     <div class="box_1"> 
      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;"> 
       <h1>收货人信息</h1> 

		@if(!empty($address))
       <form action="/addressedit" method="post" name="theForm"> 
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"> 
         <tbody>
          <tr> 
           <td align="right" bgcolor="#ffffff">配送区域：</td> 
           <td colspan="3" align="left" bgcolor="#ffffff">
		   <select name="country" id="selCountries_0"> <option value="0">请选择省份</option>  </select> 
		   <select name="province" id="selProvinces_0" > <option value="0">请选择市</option>  </select> 
		   <select name="city" id="selCities_0"> <option value="0">请选择区</option>  </select> 
		   <select name="district" id="selDistricts_0"> <option value="0">请选择街道</option> </select> (必填) 
		   </td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">收货人姓名：</td> 
           <td align="left" bgcolor="#ffffff"><input name="name" type="text" class="inputBg" id="consignee_0" value="{{$address->name}}" /> (必填) </td> 
           <td align="right" bgcolor="#ffffff">电子邮件地址：</td> 
           <td align="left" bgcolor="#ffffff"><input name="email" type="text" class="inputBg" id="email_0" value="text@ecshop.com" /> (必填)</td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">详细地址：</td> 
           <td align="left" bgcolor="#ffffff"><input name="address" type="text" class="inputBg" id="address_0" value="{{$address->huo}}" /> (必填)</td> 
           <td align="right" bgcolor="#ffffff">邮政编码：</td> 
           <td align="left" bgcolor="#ffffff"><input name="zipcode" type="text" class="inputBg" id="zipcode_0" value="518000" /></td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">电话：</td> 
           <td align="left" bgcolor="#ffffff"><input name="phone" type="text" class="inputBg" id="tel_0" value="{{$address->phone}}" /> (必填)</td> 
           <td align="right" bgcolor="#ffffff">手机：</td> 
           <td align="left" bgcolor="#ffffff"><input name="mobile" type="text" class="inputBg" id="mobile_0" value="" /></td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">标志建筑：</td> 
           <td align="left" bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg" id="sign_building_0" value="{{$address->adds}}" /></td> 
           <td align="right" bgcolor="#ffffff">最佳送货时间：</td> 
           <td align="left" bgcolor="#ffffff"><input name="best_time" type="text" class="inputBg" id="best_time_0" value="2018-08-08" /></td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">&nbsp;</td> 
		   {{csrf_field()}}
           <td colspan="3" align="center" bgcolor="#ffffff"> <input type="submit" name="submit" class="btn btn-primary" value="确认修改" /> <input name="button" type="button" class="btn btn-primary" onclick="if (confirm('你确认要删除该收货地址吗？'))location.href='/homeuser/{{$address->id}}/'" value="删除" /> <input name="user_id" type="hidden" value="{{$address->user_id}}" /> </td> 
          </tr> 
         </tbody>
        </table> 
       </form> 
	   @endif
	   
       <form action="/addressadd" method="post" name="theForm"> 
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd"> 
         <tbody>
          <tr> 
           <td align="right" bgcolor="#ffffff">配送区域：</td> 
           <td colspan="3" align="left" bgcolor="#ffffff">
		   <select name="country" id="selCountries_1" > <option value="0">请选择省份</option> </select> 
		   <select name="province" id="selProvinces_1"> <option value="0">请选择市</option> </select> 
		   <select name="city" id="selCities_1"> <option value="0">请选择区</option> </select> 
		   <select name="district" id="selDistricts_1"> <option value="0">请选择街道</option> </select> (必填) </td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">收货人姓名：</td> 
           <td align="left" bgcolor="#ffffff"><input name="name" type="text" class="inputBg" id="consignee_1" value="" /> (必填) </td> 
           <td align="right" bgcolor="#ffffff">电子邮件地址：</td> 
           <td align="left" bgcolor="#ffffff"><input name="email" type="text" class="inputBg" id="email_1" value="" /> (必填)</td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">详细地址：</td> 
           <td align="left" bgcolor="#ffffff"><input name="address" type="text" class="inputBg" id="address_1" value="" /> (必填)</td> 
           <td align="right" bgcolor="#ffffff">邮政编码：</td> 
           <td align="left" bgcolor="#ffffff"><input name="zipcode" type="text" class="inputBg" id="zipcode_1" value="" /></td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">电话：</td> 
           <td align="left" bgcolor="#ffffff"><input name="phone" type="text" class="inputBg" id="tel_1" value="" /> (必填)</td> 
           <td align="right" bgcolor="#ffffff">手机：</td> 
           <td align="left" bgcolor="#ffffff"><input name="mobile" type="text" class="inputBg" id="mobile_1" value="" /></td> 
          </tr> 
          <tr> 
           <td align="right" bgcolor="#ffffff">标志建筑：</td> 
           <td align="left" bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg" id="sign_building_1" value="" /></td> 
           <td align="right" bgcolor="#ffffff">最佳送货时间：</td> 
           <td align="left" bgcolor="#ffffff"><input name="best_time" type="text" class="inputBg" id="best_time_1" value="" /></td> 
          </tr> 
          <tr> 
		  {{csrf_field()}}
           <td align="right" bgcolor="#ffffff">&nbsp;</td> 
           <td colspan="3" align="center" bgcolor="#ffffff"> <input type="submit" name="submit" class="btn btn-primary" value="新增收货地址" /> <input name="user_id" type="hidden" value="{{$info->id}}" /> </td> 
          </tr> 
         </tbody>
        </table> 
       </form> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
	
   </div> 
  </div>
 </body>
  <script type="text/javascript">
	//第一级
	$.ajax({
		type: "GET",
		data: {upid:0},
		url: "/addresses",
		// typedata: "json",
		success: function(data){

			for(var i=0;i<data.length;i++){
				var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
				// console.log(data[i]);
				$('#selCountries_0').append(info);
			}
		},
	});
	$('select').on('change',function(){
		id = $(this).val();
		o = $(this);
		// alert(o);
		o.nextAll().find('option:first').siblings().remove();
		// if()
		// o.nextAll('select')[0].style.display = "none";
		
		
		// alert(id);
		$.ajax({
			type: "GET",
			data: {upid:id},
			url: "/addresses",
			success: function(data){
				if(!data[0] == ""){
					
					// o.next().find('select')[0].style.display = "block";
					for(var i=0;i<data.length;i++){
						var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
						// console.log(data[i].name);
						o.next().append(info);
					}
				}
			},
		});
	});
	
	//第二部分
	//第一级
	$.ajax({
		type: "GET",
		data: {upid:0},
		url: "/addresses",
		// typedata: "json",
		success: function(data){

			for(var i=0;i<data.length;i++){
				var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
				// console.log(data[i]);
				$('#selCountries_1').append(info);
			}
		},
	});
	$('select').on('change',function(){
		id = $(this).val();
		o = $(this);
		// alert(o);
		o.nextAll().find('option:first').siblings().remove();
		// if()
		// o.nextAll('select')[0].style.display = "none";
		
		
		// alert(id);
		$.ajax({
			type: "GET",
			data: {upid:id},
			url: "/addresses",
			success: function(data){
				if(!data[0] == ""){
					
					// o.next().find('select')[0].style.display = "block";
					for(var i=0;i<data.length;i++){
						var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
						// console.log(data[i].name);
						o.next().append(info);
					}
				}
			},
		});
	})
 </script>
</html>
@endsection
@section("title","个人订单")