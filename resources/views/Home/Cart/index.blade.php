@extends("Home.HomePublic.publics")
@section("shops")
<html>
 <head></head>
 <body>
 <div id="del">
  <div class="page-main" id="cart-box"> 
   <div class="container"> 
    <div class="cart-goods-list"> 
     <div class="list-head clearfix"> 
      <div class="col col-img" id="itemsnum-top">
       图片
      </div> 
      <div class="col col-name">
       商品名称
      </div> 
      <div class="col col-price">
       单价
      </div> 
      <div class="col col-num">
       数量
      </div> 
      <div class="col col-total">
       小计
      </div> 
      <div class="col col-action">
       操作
      </div> 
     </div> 
	 
	 @foreach($arr as $row)
	 
     <div class="list-body "> 
      <div class="item-box"> 
       <div class="item-table"> 
        <div class="item-row clearfix"> 
         <div class="col col-img"> 
          <a href="goods.php?id=80" target="_blank"> <img alt="{{$row->name}}" src="{{$row->pic}}" /></a> 
         </div> 
         <div class="col col-name"> 
          <h3 class="name"><a href="goods.php?id=80" target="_blank">{{$row->name}} </a></h3> 
          <span>最低起订数量：<em class="ys">1 </em> （请按最低起订数<em class="ys">1 </em>的倍数购买） </span> 
          <p class="desc"> <span></span>  </p> 
         </div> 
         <div class="col col-price">
		 {{$row->price}}
          <em>元</em> 
         </div> 
		 <a href="javascript:void(0)" onclick="change('-',{{$row->id}})" class="btn btn-info" style="width:20px;margin-top:20px">-</a>
         <div class="col col-num" > 
          <div class="change-goods-num clearfix" > 
		  
           <input type="text" value="{{$row->num}}" id="num">
		   
          </div> 
         </div> 
		  <a href="javascript:void(0)" onclick="change('+',{{$row->id}})" class="btn btn-info" style="width:20px;margin-top:20px">+</a> 
         <div class="col col-total">
          <span>{{$row->num*$row->price}}<em>元</em></span>
         </div> 
         <div class="col col-action"> 
          <a class="del" href="javascript:void(0)" onclick="del({{$row->id}})"><i class="iconfont">×</i></a> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
	 
	 @endforeach
	 
     <p class="clear-cart"> <a id="del-all" href="/empty">清空购物车</a> </p> 
     <div class="cart-bar clearfix"> 
      <div class="section-left"> 
       <a class="back-shopping btn btn-gray" href="/homeindex">继续购物</a> 
      </div> 
      <span class="total-price"><span class="total-num"></span>&nbsp;&nbsp;&nbsp;合计：<b id="totalSkuPrice">{{$amount}}<em>元</em></b></span> 
      <a href="/flow" class="btn btn-pay btn-primary">去结算</a> 
     </div> 
    </div> 
   </div> 
  </div> 
  </div>
  <script type="text/javascript">
	var input = $('#num').val();
	function change(a,id){
		if(a == '-'){
			$.ajax({
				type: "GET",
				data: {id:id},
				url: "/jian",
				success: function(data){
					if(data == 1){
						alert('不能再少了');
					}else{
						$('#del').html(data);
					}
				},
			});
		}else{
			$.ajax({
				type: "GET",
				data: {id:id},
				url: "/addd",
				success: function(data){
					if(data == 1){
						alert('超过库存了');
					}else{
						// alert(data);
						$('#del').html(data);
					}
				},
			});
		}
	}
	function del(id){
		$.ajax({
			type: "GET",
			data: {id:id},
			url: "/del",
			// dataType: "JSON",
			success: function(data){
				$('#del').html(data);
					
					// alert(data);
				
			},
		});
	}
  </script>
  <script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script>  
  <div class="blank"></div>
 </body>
</html>
@endsection
@section("title","购物车")