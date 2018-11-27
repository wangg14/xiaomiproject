@extends("Home.HomePublic.publics")
@section("shops")
<html>
 <head></head>
 <body>
  <div class="page-main"> 
   <div class="container clearfix"> 
    <div class="checkout-box confirm-order-box"> 
     <h2>确认订单信息页面</h2> 
     <div class="flowBox_in"> 
      <form action="/flow" method="post" name="theForm" id="theForm"> 
 
       <ul class="box-main clearfix"> 
        <li class="section-options clearfix"> <h3 class="section-header"><span>收货人信息</span></h3> 
         <div class="section-body"> 
          <div class="checkout-item active">
		  {{$address->name}} {{$address->adds}}
          </div> 
          <span class="addr-name">{{$address->name}}</span> 
          <span class="addr-info">{{$address->huo}}</span> 
          <span class="addr-tel">{{$address->phone}}</span> 
          <a href="/flow/{{$address->id}}/edit" class="modify">修改</a> 
         </div> </li> 
        <li class="section-options clearfix"> <h3 class="section-header"><span>支付方式</span></h3> 
         <div class="section-body"> 
          <ul class="item-list clearfix payment-list" id="payment-list"> 
           <li> <label class="checkout-item" for="payment_1">快钱人民币网关</label> <input type="radio" name="payment" class="radio" id="payment_1" value="5" iscod="0" /> 
            <div class="text"> 
             <i></i>手续费：0.00
             <em>元</em> 
            </div> </li> 
           <li> <label class="checkout-item" for="payment_2">余额支付</label> <input type="radio" name="payment" class="radio" id="payment_2" value="1" iscod="0" /> 
            <div class="text"> 
             <i></i>手续费：0.00
             <em>元</em> 
            </div> </li> 
           <li> <label class="checkout-item" for="payment_3">银行汇款/转帐</label> <input type="radio" name="payment" class="radio" id="payment_3" value="2" iscod="0" /> 
            <div class="text"> 
             <i></i>手续费：0.00
             <em>元</em> 
            </div> </li> 
           <li> <label class="checkout-item" for="payment_4">货到付款</label> <input type="radio" name="payment" class="radio" id="payment_4" value="3" iscod="1" disabled="true" /> 
            <div class="text"> 
             <i></i>手续费：
             <span id="ECS_CODFEE">0.00<em>元</em></span> 
            </div> </li> 
           <li> <label class="checkout-item" for="payment_5">网银在线</label> <input type="radio" name="payment" class="radio" id="payment_5" value="4" iscod="0" /> 
            <div class="text"> 
             <i></i>手续费：1% 
            </div> </li> 
           <li> <label class="checkout-item" for="payment_6">支付宝</label> <input type="radio" name="payment" class="radio" id="payment_6" value="6" iscod="0" /> 
            <div class="text"> 
             <i></i>手续费：0.00
             <em>元</em> 
            </div> </li> 
          </ul> 
         </div> </li> 
        <li class="section-options clearfix section-shipping"> <h3 class="section-header"><span>配送方式</span></h3> 
         <div class="section-body"> 
          <ul class="item-list clearfix payment-list" id="shipping-list"> 
           <li> <label class="checkout-item" for="ECS_NEEDINSURE_1">申通快递</label> <input name="shipping" type="radio" id="ECS_NEEDINSURE_1" value="5" supportcod="0" insure="0" class="radio" /> 
            <div class="text"> 
             <i></i>费用：15.00
             <em>元</em>&nbsp;&nbsp;免费额度：0.00
             <em>元</em> 
            </div> </li> 
           <li> <label class="checkout-item" for="ECS_NEEDINSURE_2">城际快递</label> <input name="shipping" type="radio" id="ECS_NEEDINSURE_2" value="3" supportcod="1" insure="0" class="radio" /> 
            <div class="text"> 
             <i></i>费用：10.00
             <em>元</em>&nbsp;&nbsp;免费额度：100000.00
             <em>元</em> 
            </div> </li> 
           <li> <label class="checkout-item" for="ECS_NEEDINSURE_3">邮局平邮</label> <input name="shipping" type="radio" id="ECS_NEEDINSURE_3" value="6" supportcod="0" insure="0" class="radio" /> 
            <div class="text"> 
             <i></i>费用：3.50
             <em>元</em>&nbsp;&nbsp;免费额度：50000.00
             <em>元</em> 
            </div> </li> 
           <li> <label class="checkout-item" for="ECS_NEEDINSURE_4">中通速递</label> <input name="shipping" type="radio" id="ECS_NEEDINSURE_4" value="10" supportcod="0" insure="1%" class="radio" /> 
            <div class="text"> 
             <i></i>费用：10.00
             <em>元</em>&nbsp;&nbsp;免费额度：0.00
             <em>元</em> 
            </div> </li> 
          </ul> 
          <div style="margin-top:20px;"> 
           <label for="ECS_NEEDINSURE"> <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox" value="1" disabled="true" /> 配送是否需要保价 </label> 
          </div> 
         </div> </li> 
        <li class="section-options clearfix section-goods"> 
         <div class="section-header clearfix"> 
          <h3 class="title">商品列表</h3> 
          <a href="" class="modify">返回购物车<i class="iconfont"></i></a> 
         </div> 
         <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" class="goods-list-table"> 
          <tbody>
		  @foreach($arr as $row)
           <tr> 
            <td bgcolor="#ffffff"> <img src="{{$row->pic}}" title="{{$row->name}}" width="30" height="30" /> <a href="" target="_blank" class="f6">{{$row->name}}&nbsp;</a> </td> 
            <td bgcolor="#ffffff" align="center">{{$row->price}}<em>元</em>&nbsp;x&nbsp;{{$row->num}}</td> 
            <td bgcolor="#ffffff" align="center"><span style="color:#ff6700;">{{$row->price*$row->num}}<em>元</em></span></td> 
           </tr> 
		  @endforeach
           <tr> 
            <td bgcolor="#ffffff" colspan="7"> 购物金额小计 {{$amount}}<em>元</em></td> 
           </tr> 
          </tbody>
         </table> </li> 
         
        <li class="section-options clearfix"> <h3 class="section-header">其它信息</h3> </li> 
        <li class="section-options clearfix"> <h3 class="section-header">使用红包</h3> 
		
		<!-------bonus---------->
         <div class="section-body"> 
          <span class="item"> 选择已有红包 <select name="bonus"  id="ECS_BONUS" style="border:1px solid #ccc;"> <option value="0" selected="">请选择</option> </select> </span> 
          <span class="item"> 或者选择已有优惠券 <select name="bonus"  id="ECS_BONUS" style="border:1px solid #ccc;"> <option value="0" selected="">请选择</option> </select> </span>
         </div> </li> 
      
        <li class="section-options clearfix"> <h3 class="section-header">订单附言</h3> 
		
		<!-------postscript-------->
         <div class="section-body"> 
          <textarea name="postscript" cols="80" rows="3" id="postscript" style="border:1px solid #ccc;"></textarea> 
         </div> </li> 
        <li class="section-options clearfix"> <h3 class="section-header">缺货处理</h3> 
         <div class="section-body"> 
          <ul class="item-list clearfix" id="quehuo-list"> 
		  
		  <!-----how_oos------->
           <li> <label class="checkout-item" for="how_oos_0" onclick="javascript:void(0);">等待所有商品备齐后再发</label> <input name="how_oos" id="how_oos_0" type="radio" value="0" class="radio" checked="" /> </li> 
           <li> <label class="checkout-item" for="how_oos_1" onclick="javascript:void(0);">取消订单</label> <input name="how_oos" id="how_oos_1" type="radio" value="1" class="radio"  /> </li> 
           <li> <label class="checkout-item" for="how_oos_2" onclick="javascript:void(0);">与店主协商</label> <input name="how_oos" id="how_oos_2" type="radio" value="2" class="radio" /> </li> 
          </ul> 
         </div> </li> 
        <li class="section-options clearfix section-count"> 
         <!--<h3 class="section-header"><span>费用总计</span></h3>--> 
         <div id="ECS_ORDERTOTAL" class="money-box"> 
          <ul> 
           <li class="clearfix"> <label>订购即送：</label> <span class="val"> <font class="f4_b">{{$amount}}</font> 积分 ，以及价值 <font class="f4_b">0.00<em>元</em></font>的红包。 </span> </li> 
           <li class="clearfix"> <label>商品总价：</label><span class="val">{{$amount}}<em>元</em></span> </li> 
           <li class="clearfix total-price"> <label>应付款金额：</label> <span class="val"><em>{{$amount}}<em>元</em></em></span> </li> 
          </ul> 
         </div> </li> 
        <li class="section-options clearfix" style="border-bottom:none;"> 
         <div style="margin:8px auto; text-align:right;"> 
		 {{csrf_field()}}
          <input type="image" id="bttn" src="/static/homes/images/bnt_subOrder.gif" /> 
          <input type="hidden" name="amount" value="{{$amount}}">
         </div> </li> 
       </ul> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
  $("#bttn").click(function(){
	  if(!$('#payment-list li').hasClass('active')){
		alert('请选择一种支付方式');
	    return false;
	  }else{
		  // alert($('#payment-list .active').find('input').val());
		  if($('#payment-list .active').find('input').val() !=6){
			  alert('其他卡都没钱了，用支付宝吧');
			  return false;
		  }
	  }
	  if(!$('#shipping-list li').hasClass('active')){
		alert('请选择一种配送方式');
		return false;
	  }
  });
  
  
 </script>
</html>
@endsection
@section("title","购物车")