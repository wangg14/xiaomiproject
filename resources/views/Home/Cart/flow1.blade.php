@extends("Home.HomePublic.publics")
@section("shops")
<html>
 <head></head>
 <body>
  <div class="page_main"> 
   <div class="container"> 
    <div class="section section-order"> 
     <div class="order-info clearfix"> 
      <div class="fl"> 
       <h2 class="title">感谢您在本店购物！您的订单已提交成功，请记住您的订单号 <b>{{$data['order_num']}}</b></h2> 
      </div> 
      <div class="fr"> 
       <p class="total">您的应付款金额为 <span class="money"><em>{{$data['total']}}.00<em>元</em></em></span></p> 
      </div> 
     </div> 
     <i class="iconfont icon-right">√</i> 
     <div class="order-detail"> 
      <ul> 
       <li class="clearfix"> 
        <div class="label">
         订单号:
        </div> 
        <div class="content">
         <div class="order-num">
          {{$data['order_num']}}
         </div>
        </div> </li> 
       <li class="clearfix"> 
        <div class="label">
         您选定的配送方式为:
        </div>
        <div class="content">
         申通快递
        </div> </li> 
       <li class="clearfix"> 
        <div class="label">
         您选定的支付方式为:
        </div>
        <div class="content">
         支付宝
        </div> </li> 
       <li class="clearfix"> 
        <div class="label">
         您的应付款金额为:
        </div>
        <div class="content money">
         <em>{{$data['total']}}.00<em>元</em></em>
        </div> </li> 
      </ul> 
     </div> 
    </div> 
    <div class="section section-payment"> 
     <div class="pay_action">
      <div style="text-align:center">
       <form action="/pays" name="kqPay" style="text-align:center;" method="get" target="_blank">
        <input type="submit" name="submit" value="立即使用支付宝支付" />
       </form>
      </div>
      <br />
     </div> 
    </div> 
    <p style="text-align:center; margin-bottom:20px;">您可以 <a href="/homeindex">返回首页</a> 或去 <a href="/homeuser">用户中心</a></p> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","购物车")