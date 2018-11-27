@extends("Home.HomePublic.publics")
@section("shops")
<html>
 <head></head>
 <body>
  <div class="cle cart_main"> 

   <div class="page-main"> 
    <div class="container"> 
     <form action="/flows" method="post" name="theForm" id="theForm" > 
      <div class="checkout-box"> 
       <h2 class="aui_title" style="cursor: move;">收货人信息</h2> 
       <ul class="box-main clearfix" id="addr-form"> 
        <li class="section-options clearfix"> <label class="section-header">配送区域:</label> 
         <div class="section-body section-address"> 
          <div class="dropdown"> 
           <label class="iconfont">︾</label> 
           <select name="province" id="selProvinces_1" class="input-select">
		    <option value="0">请选择省份</option>
		   </select>
          </div>
		  <div class="dropdown"> 
           <label class="iconfont">︾</label> 
           <select name="city" id="selCities_1" class="input-select" style="display:none">
		    <option value="0">请选择市</option>
		   </select>
          </div>
		  <div class="dropdown"> 
           <label class="iconfont">︾</label> 
           <select name="district" id="selDistricts_1" class="input-select" style="display:none">
		    <option value="0">请选择区</option>
		   </select>
          </div>
		  <div class="dropdown"> 
           <label class="iconfont">︾</label> 
           <select name="street" id="selDistricts_1" class="input-select" style="display:none">
		    <option value="0">请选择街道</option>
		   </select>
          </div>
		 </div>
          </li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>收货人姓名</label> 
         <div class="section-body"> 
          <input name="name" type="text" class="input-text" id="consignee_0" value="{{$info->name}}" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>电子邮件地址</label> 
         <div class="section-body"> 
          <input name="email" type="text" class="input-text" id="email_0" value="text@ecshop.com" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>详细地址</label> 
         <div class="section-body"> 
          <input name="address" type="text" class="input-text" id="address_0" value="{{$info->huo}}" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header">邮政编码</label> 
         <div class="section-body"> 
          <input name="zipcode" type="text" class="input-text" id="zipcode_0" value="123456" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>电话</label> 
         <div class="section-body"> 
          <input name="phone" type="text" class="input-text" id="tel_0" value="{{$info->phone}}" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header">手机</label> 
         <div class="section-body"> 
          <input name="mobile" type="text" class="input-text" id="mobile_0" value="" /> 
         </div> </li>  
       </ul> 
	   {{csrf_field()}}
       <div class="form-confirm clearfix"> 
        <input type="submit" name="Submit" class="btn btn-primary" value="配送至这个地址" /> 
        <input name="address_id" type="hidden" value="{{$info->id}}" />  
       </div> 
      </div> 
     </form> 
    </div> 
    <div class="container"> 
     <form action="" method="post" name="theForm" id="theForm" > 
      <div class="checkout-box"> 
       <h2 class="aui_title" style="cursor: move;">收货人信息</h2> 
       <ul class="box-main clearfix" id="addr-form"> 
        <li class="section-options clearfix"> <label class="section-header">配送区域:</label> 
         <div class="section-body section-address"> 
          <div class="dropdown"> 
           
         </div> </div></li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>收货人姓名</label> 
         <div class="section-body"> 
          <input name="consignee" type="text" class="input-text" id="consignee_1" value="" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>电子邮件地址</label> 
         <div class="section-body"> 
          <input name="email" type="text" class="input-text" id="email_1" value="ecshop123@qq.com" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>详细地址</label> 
         <div class="section-body"> 
          <input name="address" type="text" class="input-text" id="address_1" value="" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header">邮政编码</label> 
         <div class="section-body"> 
          <input name="zipcode" type="text" class="input-text" id="zipcode_1" value="" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header"><em>*</em>电话</label> 
         <div class="section-body"> 
          <input name="tel" type="text" class="input-text" id="tel_1" value="" /> 
         </div> </li> 
        <li class="section-options clearfix"> <label class="section-header">手机</label> 
         <div class="section-body"> 
          <input name="mobile" type="text" class="input-text" id="mobile_1" value="" /> 
         </div> </li> 
 
       </ul> 
       <div class="form-confirm clearfix"> 
        <input type="submit" name="Submit" class="btn btn-primary" value="配送至这个地址" /> 
        <input type="hidden" name="step" value="consignee" /> 
        <input type="hidden" name="act" value="checkout" /> 
        <input name="address_id" type="hidden" value="" /> 
       </div> 
      </div> 
     </form> 
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
				$('#selProvinces_1').append(info);
			}
		},
	});
	$('select').on('change',function(){
		id = $(this).val();
		o = $(this).parent();
		// alert(o);
		o.nextAll().find('select option:first').siblings().remove();
		// if()
		// o.nextAll('select')[0].style.display = "none";
		
		
		// alert(id);
		$.ajax({
			type: "GET",
			data: {upid:id},
			url: "/addresses",
			success: function(data){
				if(!data[0] == ""){
					
					o.next().find('select')[0].style.display = "block";
					for(var i=0;i<data.length;i++){
						var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
						// console.log(data[i].name);
						o.next().find('select').append(info);
					}
				}else{
					// alert(1);
					if(!o.next().find('select')[0] == ""){
						o.next().find('select')[0].style.display = "none";
					}
					
				}
			},
		});
	});
 </script>
</html>
@endsection
@section("title","购物车")