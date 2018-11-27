@extends("Home.HomePublic.public")
@section("main")

<html>
 <head>
  <script type="text/javascript" src="/static/homes/js/xiaomi_category.js"></script>
  <link href="/static/homes/css/category.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
  <div class="breadcrumbs"> 
   <div class="container"> 
    <a href=".">首页</a> 
    <code>&gt;</code> 
    <a href="category.php?id=69">{{$first->name}}</a> 
   </div> 
  </div> 
  <div class="content"> 
   <div class="container"> 
    <div class="order-list-box clearfix"> 
     <form method="GET" name="listform"> 
      <ul class="order-list"> 
       <li class="first active"><a title="销量" href="category.php?category=69&amp;display=grid&amp;brand=0&amp;price_min=0&amp;price_max=0&amp;filter_attr=0&amp;page=1&amp;sort=sales_volume&amp;order=ASC#goods_list" class="curr" rel="nofollow"><span class="search_DESC">销量</span>&nbsp;<i class="iconfont"></i></a></li> 
       <li class=""><a title="价格" href="category.php?category=69&amp;display=grid&amp;brand=0&amp;price_min=0&amp;price_max=0&amp;filter_attr=0&amp;page=1&amp;sort=shop_price&amp;order=ASC#goods_list" rel="nofollow"><span class="">价格</span></a></li> 
       <li class=""><a title="上架时间" href="category.php?category=69&amp;display=grid&amp;brand=0&amp;price_min=0&amp;price_max=0&amp;filter_attr=0&amp;page=1&amp;sort=goods_id&amp;order=DESC#goods_list" rel="nofollow"><span class="">上架时间</span></a></li> 
       <input type="hidden" name="category" value="69" /> 
       <input type="hidden" name="display" value="grid" id="display" /> 
       <input type="hidden" name="brand" value="0" /> 
       <input type="hidden" name="price_min" value="0" /> 
       <input type="hidden" name="price_max" value="0" /> 
       <input type="hidden" name="filter_attr" value="0" /> 
       <input type="hidden" name="page" value="1" /> 
       <input type="hidden" name="sort" value="sales_volume" /> 
       <input type="hidden" name="order" value="DESC" /> 
      </ul> 
     </form> 
     <ul class="type-list"> 
      <li>显示方式：</li> 
      <li> <a href="javascript:;" onclick="javascript:display_mode('list')"><img src="/static/homes/picture/display_mode_list.gif" alt="" /></a></li> 
      <li><a href="javascript:;" onclick="javascript:display_mode('grid')"><img src="/static/homes/picture/display_mode_grid_act.gif" alt="" /></a></li> 
      <li><a href="javascript:;" onclick="javascript:display_mode('text')"><img src="/static/homes/picture/display_mode_text.gif" alt="" /></a></li>&nbsp;&nbsp; 
     </ul> 
    </div> 
    <form name="compareForm" action="compare.php" method="post" onsubmit="return compareGoods(this);"> 
     <div class="goods-list-box"> 
      <div class="goods-list clearfix"> 
	  
	  @foreach($arr as $row)
	  @foreach($row as $rows)
       <div class="goods-item"> 
        <div class="figure figure-img"> 
         <a href="/goods/{{$rows->id}}"><img src="{{$rows->pic}}" alt="{{$rows->name}}" class="goodsimg" /></a> 
        </div> 
        <p class="desc">千元旗舰，青春优选</p> 
        <h2 class="title"><a href="/goods/{{$rows->id}}" title="{{$rows->name}}">{{$rows->name}}</a></h2> 
        <p class="price"> 本店价<font class="shop_s">{{$rows->price}}<em>元</em></font> 
         <del>
          专柜价
          <font class="market_s">{{$rows->price+500}}<em>元</em></font>
         </del> </p> 
        <div class="thumbs J_attrImg"> 
         <div style="width:212px;margin:0 auto;"> 
          <ul class="thumb-list clearfix J_imgList"> 
           <li class="active" data-config="{figure:&quot;{{$rows->pic}}&quot;}"> <a><img src="{{$rows->pic}}" width="34" height="34" /></a> </li> 
          </ul> 
         </div> 
        </div> 
        <div class="actions clearfix"> 
         <a href="javascript:collect(78);" class="btn-like J_likeGoods"><i class="iconfont"></i> <span>收藏</span></a> 
        </div> 
        <div class="flags"> 
         <div class="flag flag-saleoff">
          8.3折促销
         </div> 
        </div> 
       </div> 
	   @endforeach
	   @endforeach
        
      </div> 
     </div> 
    </form> 
    <script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script> 
    <script type="text/javascript">
window.onload = function()
{
  Compare.init();
  fixpng();
}
var button_compare = '';
var exist = "您已经选择了%s";
var count_limit = "最多只能选择4个商品进行对比";
var goods_type_different = "\"%s\"和已选择商品类型不同无法进行对比";
var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
var btn_buy = "购买";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
</script> 
    <form name="selectPageForm" action="/category.php" method="get"> 
     <div class="clearfix"> 
      <div id="pager" class="pagebar"> 
       <span class="f_l f6" style="margin-right:10px;">总计 <b>6</b> 个记录</span> 
      </div> 
     </div> 
    </form> 
    <script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script> 
   </div> 
  </div> 
  <div class="add_ok" id="cart_show"> 
   <div class="tip"> 
    <i class="iconfont"> </i>商品已成功加入购物车 
   </div> 
   <div class="go"> 
    <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a> 
    <a href="flow.php" class="btn">去结算</a> 
   </div> 
  </div>
 </body>
</html>

@endsection
@section("title","前台商品列表")