@extends("Home.HomePublic.public")
@section("main")
<html>
 <head>
  <script type="text/javascript" src="/static/homes/js/magiczoomplus.js"></script>
  <script type="text/javascript" src="/static/homes/js/easydialog.min.js"></script>
  <script type="text/javascript" src="/static/homes/js/xiaomi_goods.js"></script>
  <link href="/static/homes/css/consultations.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/homes/css/goods.css" rel="stylesheet" type="text/css" /> 
 </head>
 <body>
  <div class="breadcrumbs"> 
   <div class="container"> 
    <a href="/homeindex">首页</a> 
    <code>&gt;</code> 
    <a href="/category/{{$info->cpid}}">{{$info->name}}</a> 
    <code>&gt;</code> 
    <a href="#">{{$info->cname}}</a> 
    <code>&gt;</code> {{$info->sname}} 
   </div> 
  </div> 
  <div class="goods-detail"> 
   <div class="goods-detail-info  clearfix J_goodsDetail"> 
    <div class="container"> 
     <div class="row"> 
      <div class="span13  J_mi_goodsPic_block goods-detail-left-info"> 
       <div class="goods-pic-box" id="detail_img"> 
        <div class="goods-big-pic"> 
         <a href="{{$info->spic}}" class="MagicZoomPlus" id="Zoomer" rel="hint-text: ; selectors-effect: false; selectors-class: current; zoom-distance: 60;zoom-width: 400; zoom-height: 400;"> <img alt="{{$info->sname}}" src="{{$info->spic}}" /> </a> 
        </div> 
        <div class="goods-small-pic" id="item-thumbs"> 
         <a class="prev" href="javascript:void(0);"></a> 
         <a class="next" href="javascript:void(0);"></a> 
         <div class="bd"> 
          <ul class="cle"> 
           <li class="current"> <a href="{{$info->spic}}" rel="zoom-id: Zoomer" rev="{{$info->spic}}"> <img alt="{{$info->cname}}" src="{{$info->spic}}" /> </a> </li> 
          </ul> 
         </div> 
        </div> 
       </div> 
      </div> 
      <div class="span7 goods-info-rightbox"> 
       <form action="/homecart" method="post" name="ECS_FORMBUY" id="form"> 
        <div class="goods-info-box" id="item-info"> 
         <dl class="loaded"> 
          <dt class="goods-info-head"> 
           <dl> 
            <dt class="goods-name">
			{{$info->sname}}
            </dt> 
            <dd class="goods-phone-type">
             <p></p>
            </dd> 
            <del>
             专柜价： 
             <em class="cancel">{{$info->sprice+500}}<em>元</em></em>
            </del> 
            <dd class="goods-info-head-price clearfix"> 
             <span>本店价：</span> 
             <span class="unit"> <b class="nala_price red" id="ECS_SHOPPRICE">{{$info->sprice}}<em>元</em> </b> </span> 
            </dd> 
            <dd> 
             <ul> 
              <li> <span class="lbl">商品货号</span> <em>ECS000056</em> </li> 
              <li> <span class="lbl">商品库存</span> <em>{{$info->snum}} </em> </li> 
              <li> <span class="lbl">上架时间：</span> <em>2018-08-28</em> </li> 
              <li> <span class="lbl">商品重量</span> <em>0克</em> </li> 
              <li><span>此商品可使用：<em class="red">1400</em>积分</span></li> 
              <li><span>最低起订数量：<em class="ys">1 </em> （请按最低起订数<em class="ys">1 </em>的倍数购买） </span> <input name="number2" type="hidden" id="number2" value="1" /></li> 
             </ul> 
            </dd> 
            <dd class="goods-info-choose"> 
             <div id="choose" class="spec_list_box"> 
              <ul> 
              </ul> 
             </div> 
             <style>
                          #choose{margin:0;}
                          #choose li{overflow:hidden; padding-bottom:20px;}
                          #choose .dt{width:72px; text-align:left; float:left; padding:6px 0 0;}
                          #choose .dd{overflow:hidden;}
                          #choose .dd .item{float:left; margin:2px 8px 2px 0; position:relative;}
                          #choose .dd .item a{border:1px solid #ccc; padding:4px 6px; float:left;}
                          #choose .dd .item a span{padding:0 3px; line-height:30px;}
            						  #choose .dd .item a img{width:30px; height:30px;}
                          #choose .dd .item b{width:12px; height:12px; background:url(/static/homes/images/gou.png) no-repeat; position:absolute; bottom:1px; right:1px; overflow:hidden; display:none;}
                          #choose .dd .item.selected a{border-width:2px; border-color:#e4393c; padding:3px 5px;}
                          #choose .dd .item.selected b{display:block;}
                          #choose li.GeneralAttrImg .dt{padding-top:10px;}
                          #choose li.GeneralAttrImg .dd .item a{padding:1px;}
                          #choose li.GeneralAttrImg .dd .item a img{margin:1px;}
                          #choose li.GeneralAttrImg .dd .item.selected a{padding:0;}
                          </style> 
             <script>
                          $(".spec_list_box .item a").click(function(){
                              $(this).parents(".dd").find(".item").removeClass("selected");
                              $(this).parent().addClass("selected");
                              $(this).parents(".dd").find("input:radio").prop("checked",false);
                              $(this).parent().find("input:radio").prop("checked",true);
                              changePrice();
                          })
                          </script> 
             <ul class="sku"> 
              <li class="skunum_li clearfix"> 
               <div class="ghd">
                数量：
               </div> 
               <div class="skunum gbd" id="skunum"> 
                <span class="minus" title="减少1个数量"></span> 
                <input id="number" name="number" type="text" min="1" value="1" onchange="countNum(0)" /> 
                <span class="add" title="增加1个数量"></span>&nbsp;件 
               </div> </li> 
             </ul> 
            </dd> 
            <dd class="goods-info-head-cart"> 
			{{csrf_field()}}
			 <input type="hidden" name="id" value="{{$info->sid}}">
             <a href="#"  onclick="document.getElementById('form').submit();return false" class="btn  btn-primary goods-add-cart-btn" id="buy_btn"><i class="iconfont"></i>加入购物车</a> 
             <a href="#" class=" btn btn-gray  goods-collect-btn " id="fav-btn"><i class="iconfont"></i>喜欢</a> 
            </dd> 
            <dd class="goods-info-head-userfaq clearfix"> 
             <ul> 
              <li class=""><i class="iconfont"></i> 销量 <b>0</b></li> 
              <li class="J_scrollcomment mid"><i class="iconfont"></i> 评价 <b>233</b></li> 
              <li class="J_scrollcomment"><i class="iconfont"></i> 满意度 <b>100%</b></li> 
             </ul> 
            </dd> 
           </dl> 
          </dt> 
         </dl> 
        </div> 
       </form> 
       <div class="seemore_items" id="seemore_items" style="display:none;"> 
        <h3>看了又看<a href="javascript:;" class="next refresh" title="换一组"><i class="iconfont"></i></a></h3> 
        <div class="bd"> 
         <ul id="history_list"> 
         </ul> 
        </div> 
       </div> 
       <script type="text/javascript">
if (document.getElementById('history_list').innerHTML.replace(/\s/g,'').length<1)
{
    document.getElementById('seemore_items').style.display='none';
}
else
{
    //document.getElementById('seemore_items').style.display='block';
}
function clear_history()
{
Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res)
{
document.getElementById('history_list').innerHTML = '您已清空最近浏览过的商品';
}
</script> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="container" style=" margin-bottom:50px;"> 
    <script type="text/javascript">
var btn_buy = "确定";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
var select_base = '请选择套餐基本件';
var select_shop = '请选择套餐商品';
var data_not_complete = '数据格式不完整';
var understock = '库存不足，请选择其他商品';
$(function(){
	
	$(".fittingitem").each(function(i, e) {
        var a = $(this).find(".plus");
		var b = a.size();
		var c = $(this).find("li:not(.plus)");
		var d = c.size();
		$(this).find("ul").width(b*40+d*170);
    });
	
	//组合套餐tab切换
	var _tab = $('#cn_b h2');
	var _con = $('#cn_h blockquote');
	var _index = 0;
	_con.eq(0).show().siblings('blockquote').hide();
	_tab.css('cursor','pointer');
	_tab.click(function(){
		_index = _tab.index(this);
		_tab.eq(_index).removeClass('h2bg').siblings('h2').addClass('h2bg');
		_con.eq(_index).show().siblings('blockquote').hide();
	})
	//选择基本件
	$('.m_goods_body').click(function(){
		if($(this).prop('checked')){
			ec_group_addToCart($(this).attr('item'), 56); //基本件(组,主件)
		}else{
			ec_group_delInCart($(this).attr('item'), 56); //删除基本件(组,主件)
			display_Price($(this).attr('item'),$(this).attr('item').charAt($(this).attr('item').length-1));
		}
	})
	//变更选购的配件
	$('.m_goods_list').click(function(){
		//是否选择主件
		if(!$(this).parents('form').find('.m_goods_body').prop('checked')){
			alert(select_base);
			return false;
		}
		if($(this).prop('checked')){
			ec_group_addToCart($(this).attr('item'), $(this).val(),56); //新增配件(组,配件,主件)
		}else{
			ec_group_delInCart($(this).attr('item'), $(this).val(),56); //删除基本件(组,配件,主件)
			display_Price($(this).attr('item'),$(this).attr('item').charAt($(this).attr('item').length-1));
		}
	})
	//可以购买套餐的最大数量
	$(".combo_stock").keyup(function(){
		var group = $(this).parents('form').attr('name');
		getMaxStock(group);//根据套餐获取该套餐允许购买的最大数
	});
})
//允许购买套餐的最大数量
function getMaxStock(group){
	var obj = $('input[name="'+group+'_number"]');
	var original = parseInt(Number(obj.val()));
	var stock = $("."+group).eq(0).attr('stock');
	//是否是数字
	if(isNaN(original)){
		original = 1;
		obj.val(original);
	}
	$("."+group).each(function(index){
		if($("."+group).eq(index).prop('checked')){
			var item_stock = parseInt($("."+group).eq(index).attr('stock'));
			stock = (stock > item_stock)?item_stock:stock;//取最小值
		}
	});
	//更新
	original = (original < 1)?1:original;
	stock = (stock < 1)?1:stock;
	if(original > stock){
		obj.val(stock);
	}
}
function accAdd(arg1, arg2) {
    var r1, r2, m, c;
    try {
        r1 = arg1.toString().split(".")[1].length;
    }
    catch (e) {
        r1 = 0;
    }
    try {
        r2 = arg2.toString().split(".")[1].length;
    }
    catch (e) {
        r2 = 0;
    }
    c = Math.abs(r1 - r2);
    m = Math.pow(10, Math.max(r1, r2));
    if (c > 0) {
        var cm = Math.pow(10, c);
        if (r1 > r2) {
            arg1 = Number(arg1.toString().replace(".", ""));
            arg2 = Number(arg2.toString().replace(".", "")) * cm;
        } else {
            arg1 = Number(arg1.toString().replace(".", "")) * cm;
            arg2 = Number(arg2.toString().replace(".", ""));
        }
    } else {
        arg1 = Number(arg1.toString().replace(".", ""));
        arg2 = Number(arg2.toString().replace(".", ""));
    }
    return (arg1 + arg2) / m;
}
//统计套餐价格
function display_Price(_item,indexTab){
	var _size = $('.'+_item).size();
	var _amount_shop_price = 0;
	var _amount_spare_price = 0;
	indexTab = indexTab - 1;
	var fitting_num = 0;
	for(i=0; i<_size; i++){
		obj = $('.'+_item).eq(i);
		if(obj.prop('checked')){
			_amount_shop_price = accAdd(_amount_shop_price,parseFloat(obj.attr('data'))); //原件合计
			_amount_spare_price = accAdd(_amount_spare_price,parseFloat(obj.attr('spare'))); //优惠合计
			fitting_num++;
		}
	}
	$('.price_info:eq('+indexTab+') .count b').text(fitting_num);//配件数量
		
	var tip_spare = $('.tip_spare:eq('+indexTab+')');//节省文本
	tip_spare.text(_amount_spare_price+"元");//省钱显示提示信息
	
	//显示总价
	$('.combo_price:eq('+indexTab+')').text("¥"+_amount_shop_price);
	
	//显示参考价
	$('.totalprice:eq('+indexTab+')').text("¥"+(parseInt(_amount_shop_price)+_amount_spare_price));
}
//处理添加商品到购物车
function ec_group_addToCart(group,goodsId,parentId){
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var quick		   = 0;
  var group_item   = (typeof(parentId) == "undefined") ? goodsId : parseInt(parentId);
  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goodsId;
  goods.number   = number;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group = group + '_' + group_item;//组名
  Ajax.call('flow.php?step=add_to_cart_combo', 'goods=' + $.toJSON(goods), ec_group_addToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}
//处理添加商品到购物车的反馈信息
function ec_group_addToCartResponse(result)
{
  if (result.error > 0)
  {
    // 如果需要缺货登记，跳转
    if (result.error == 2)
    {
      alert(understock);
	  cancel_checkboxed(result.group, result.goods_id);//取消checkbox
    }
    // 没选规格，弹出属性选择框
    else if (result.error == 6)
    {
      ec_group_openSpeDiv(result.message, result.group, result.goods_id, result.parent);
    }
    else
    {
      alert(result.message);
	  cancel_checkboxed(result.group, result.goods_id);//取消checkbox
    }
  }
  else
  {
	//处理Ajax数据
	var group = result.group.substr(0,result.group.lastIndexOf("_"));
	$("."+group).each(function(index){
		if($("."+group).eq(index).val()==result.goods_id){
			//主件显示价格、配件显示基本件+属性价
			var goods_price = (result.parent > 0) ? (parseFloat(result.fittings_price)+parseFloat(result.spec_price)):result.goods_price;
			$("."+group).eq(index).attr('data',goods_price);//赋值到文本框data参数
			$("."+group).eq(index).attr('stock',result.stock);//赋值到文本框stock参数
			$('.'+group+'_display').eq(index).text(goods_price);//前台显示
		}
	});
	getMaxStock(group);//根据套餐获取该套餐允许购买的最大数
	display_Price(group,group.charAt(group.length-1));//显示套餐价格
  }
}
//处理删除购物车中的商品
function ec_group_delInCart(group,goodsId,parentId){
  var goods        = new Object();
  var group_item   = (typeof(parentId) == "undefined") ? goodsId : parseInt(parentId);
  goods.goods_id = goodsId;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group = group + '_' + group_item;//组名
  Ajax.call('flow.php?step=del_in_cart_combo', 'goods=' + $.toJSON(goods), ec_group_delInCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}
//处理删除购物车中的商品的反馈信息
function ec_group_delInCartResponse(result)
{
	var group = result.group;
	if (result.error > 0){
		alert(data_not_complete);
	}else if(result.parent == 0){
		$('.'+group).attr("checked",false);
	}
	display_Price(group,group.charAt(group.length-1));//显示套餐价格
}
//生成属性选择层
function ec_group_openSpeDiv(message, group, goods_id, parent) 
{
  var _id = "speDiv";
  var m = "mask";
  if (docEle(_id)) document.removeChild(docEle(_id));
  if (docEle(m)) document.removeChild(docEle(m));
  //计算上卷元素值
  var scrollPos; 
  if (typeof window.pageYOffset != 'undefined') 
  { 
    scrollPos = window.pageYOffset; 
  } 
  else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') 
  { 
    scrollPos = document.documentElement.scrollTop; 
  } 
  else if (typeof document.body != 'undefined') 
  { 
    scrollPos = document.body.scrollTop; 
  }
  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "hidden";
    i++;
  }
  // 新激活图层
  var newDiv = document.createElement("div");
  newDiv.id = _id;
  newDiv.style.position = "absolute";
  newDiv.style.zIndex = "10000";
  newDiv.style.width = "300px";
  newDiv.style.height = "260px";
  newDiv.style.top = (parseInt(scrollPos + 200)) + "px";
  newDiv.style.left = (parseInt(document.body.offsetWidth) - 200) / 2 + "px"; // 屏幕居中
  newDiv.style.overflow = "auto"; 
  newDiv.style.background = "#FFF";
  newDiv.style.border = "3px solid #59B0FF";
  newDiv.style.padding = "5px";
  //生成层内内容
  newDiv.innerHTML = '<h4 style="font-size:14; margin:15 0 0 15;">' + select_spe + "</h4>";
  for (var spec = 0; spec < message.length; spec++)
  {
      newDiv.innerHTML += '<hr style="color: #EBEBED; height:1px;"><h6 style="text-align:left; background:#ffffff; margin-left:15px;">' +  message[spec]['name'] + '</h6>';
      if (message[spec]['attr_type'] == 1)
      {
        for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
        {
          if (val_arr == 0)
          {
            newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' checked /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
          }
          else
          {
            newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
          }
        } 
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
      else
      {
        for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
        {
          newDiv.innerHTML += "<input style='margin-left:15px;' type='checkbox' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + ' [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';     
        }
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
  }
  newDiv.innerHTML += "<br /><center>[<a href='javascript:ec_group_submit_div(\"" + group + "\"," + goods_id + "," + parent + ")' class='f6' >" + btn_buy + "</a>]&nbsp;&nbsp;[<a href='javascript:ec_group_cancel_div(\"" + group + "\"," + goods_id + ")' class='f6' >" + is_cancel + "</a>]</center>";
  document.body.appendChild(newDiv);
  // mask图层
  var newMask = document.createElement("div");
  newMask.id = m;
  newMask.style.position = "absolute";
  newMask.style.zIndex = "9999";
  newMask.style.width = document.body.scrollWidth + "px";
  newMask.style.height = document.body.scrollHeight + "px";
  newMask.style.top = "0px";
  newMask.style.left = "0px";
  newMask.style.background = "#FFF";
  newMask.style.filter = "alpha(opacity=30)";
  newMask.style.opacity = "0.40";
  document.body.appendChild(newMask);
} 
//获取选择属性后，再次提交到购物车
function ec_group_submit_div(group, goods_id, parentId) 
{
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var input_arr      = document.getElementById('speDiv').getElementsByTagName('input'); //by mike
  var quick		   = 1;
  var spec_arr = new Array();
  var j = 0;
  for (i = 0; i < input_arr.length; i ++ )
  {
    var prefix = input_arr[i].name.substr(0, 5);
    if (prefix == 'spec_' && (
      ((input_arr[i].type == 'radio' || input_arr[i].type == 'checkbox') && input_arr[i].checked)))
    {
      spec_arr[j] = input_arr[i].value;
      j++ ;
    }
  }
  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goods_id;
  goods.number   = number;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group    = group;//组名
  Ajax.call('flow.php?step=add_to_cart_combo', 'goods=' + $.toJSON(goods), ec_group_addToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
  document.body.removeChild(docEle('speDiv'));
  document.body.removeChild(docEle('mask'));
  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "";
    i++;
  }
}
//关闭mask和新图层的同时取消选择
function ec_group_cancel_div(group, goods_id){
  document.body.removeChild(docEle('speDiv'));
  document.body.removeChild(docEle('mask'));
  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "";
    i++;
  }
  cancel_checkboxed(group, goods_id);//取消checkbox
}
/*
*套餐提交到购物车 by mike
*/
function addMultiToCart(group,goodsId){
	var goods     = new Object();
	var number    = $('input[name="'+group+'_number"]').val();
	
	goods.group = group;
	goods.goods_id = goodsId;
	goods.number = (number < 1) ? 1:number;
	
	//判断是否勾选套餐
	if(!$("."+group).is(':checked')){
		alert(select_shop);
		return false;	
	}
	
	Ajax.call('flow.php?step=add_to_cart_group', 'goods=' + $.toJSON(goods), addMultiToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}
//回调
function addMultiToCartResponse(result){
	if(result.error > 0){
		alert(result.message);
	}else{
		window.location.href = 'flow.php';
	}
}
//取消选项
function cancel_checkboxed(group, goods_id){
	//取消选择
	group = group.substr(0,group.lastIndexOf("_"));
	$("."+group).each(function(index){
		if($("."+group).eq(index).val()==goods_id){
			$("."+group).eq(index).attr("checked",false);			  
		}
	});
}
/*
//sleep
function sleep(d){
	for(var t = Date.now();Date.now() - t <= d;);
}
*/
</script> 
   </div> 
   <div class="full-screen-border"></div> 
   <div class="goods-detail-main"> 
    <div class="goods-detail-nav" id="goodsDetail"> 
     <div class="container"> 
      <ul class="detail-list"> 
       <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a> </li> 
       <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a> </li> 
       <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">评价晒单(<em>0</em>)</a></li> 
       <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">商品咨询</a></li> 
      </ul> 
     </div> 
    </div> 
    <div class="product_tabs"> 
     <div class="goods-detail-desc goods_con_item"> 
      <div class="container"> 
       <div class="shape-container"> 
        <p><img src="/static/homes/picture/1235.png" width="1015" height="941" alt="" /></p> 
       </div> 
      </div> 
     </div> 
     <div class="goods-detail-nav-name-block goods_con_item"> 
      <div class="container main-block"> 
       <div class="border-line"></div> 
       <h2 class="nav-name">规格参数</h2> 
      </div> 
     </div> 
     <div class="goods-detail-param"> 
      <div class="container"> 
       <ul class="param-list"> 
        <li class="goods-img"><img src="{{$info->spic}}" alt="小米手机4" /></li> 
        <li class="goods-tech-spec"> 
         <ul> 
          <li>产品名称：{{$info->sname}}</li> 
         </ul> </li> <li class="goods-tech-spec"> 
         <ul> 
          <li>产品描述：{{$info->sdescr}}</li> 
         </ul> </li> 
       </ul> 
      </div> 
     </div> 
     <div class="goods-detail-nav-name-block goods_con_item"> 
      <div class="container main-block"> 
       <div class="border-line"></div> 
       <h2 class="nav-name">评价晒单</h2> 
      </div> 
     </div> 
     <div class="goods-detail-comment hasContent z-com-box-head"> 
      <div id="ECS_COMMENT"> 
       <div class="goods-detail-comment-groom" style="border-width:0 0 1px 0"> 
        <div class="container"> 
         <ul class="main-block clearfix"> 
          <li class="percent"> 
           <div class="per-num">
            <i>100</i>%
           </div> 
           <div class="per-title">
            购买后满意
           </div> 
           <div class="per-amount">
            <i>0</i>名用户投票
           </div> </li> 
          <li> 
           <ul class="z-point-list" id="min_points"> 
            <li> <label>好评：</label> <p> <span style="width: 100%;"></span> </p> <em>100%</em> </li> 
            <li> <label>中评：</label> <p> <span style="width: 0%;"></span> </p> <em>0%</em> </li> 
            <li> <label>差评：</label> <p> <span style="width: 0%;"></span> </p> <em>0%</em> </li> 
           </ul> </li> 
          <li class="i-want-comment"> 
           <div>
            对自己购买过的商品进行评价，它将成为大家购买参考依据。
           </div> 
           <div class="good_com_box">
             所有用户都可以对该商品 
            <a href="javascript:void(0);" onclick="commentsFrom()" id="go_com" class="btn btn-primary">我要评价</a> 
           </div> </li> 
         </ul> 
        </div> 
       </div> 
       <div class="goods-detail-comment-content"> 
        <div class="container"> 
         <div class="row"> 
          <div class="span20 goods-detail-comment-list"> 
           <div class="comment-order-title"> 
            <div class="left-title">
             <h3 class="comment-name">最有帮助的评价（0） </h3>
            </div> 
            <div class="right-title J_showImg">
             <i class="iconfont">√</i> 只显示带图评价
            </div> 
           </div> 
           <ul class="comment-box-list">
             暂时还没有任何用户评论 
            <li class="pagenav"> 
             <form name="selectPageForm" action="/goods.php" method="get"> 
              <a href="javascript:;" class="step" style="border:1px solid #eee; color:#ccc;">上一页</a> 
              <a href="javascript:;" class="step" style="border:1px solid #eee; color:#ccc;">下一页</a> 
             </form> </li> 
           </ul> 
          </div> 
         </div> 
        </div> 
       </div> 
       <div class="z-com-box-head"> 
        <div class="z-com-list" id="ECS_COMMENT"> 
         <div id="compage"> 
         </div> 
        </div> 
        <script type="Text/Javascript" language="JavaScript">
        <!--
        
        function selectPage(sel)
        {
          sel.form.submit();
        }
        
        //-->
        </script> 
        <div id="commentsFrom"> 
         <form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm"> 
          <ul class="form addr-form" id="addr-form"> 
           <span style="position:absolute; right:10px; top:5px; font-size:24px; cursor:pointer;" onclick="easyDialog.close();">&times;</span> 
           <li> <label>用户名</label> 匿名用户 </li> 
           <li> <label>E-mail</label> <input type="text" name="email" id="email" maxlength="100" value="" class="txt" /> </li> 
           <li> <label>评价等级</label> <input name="comment_rank" type="radio" value="1" id="comment_rank1" /> <img src="/static/homes/picture/stars1.gif" /> <input name="comment_rank" type="radio" value="2" id="comment_rank2" /> <img src="/static/homes/picture/stars2.gif" /> <input name="comment_rank" type="radio" value="3" id="comment_rank3" /> <img src="/static/homes/picture/stars3.gif" /> <input name="comment_rank" type="radio" value="4" id="comment_rank4" /> <img src="/static/homes/picture/stars4.gif" /> <input name="comment_rank" type="radio" value="5" checked="checked" id="comment_rank5" /> <img src="/static/homes/picture/stars5.gif" /> </li> 
           <li> <label>评论内容</label> <textarea name="content" class="txt" style="height:80px; width:300px;"></textarea> </li> 
           <li> <label>验证码</label> <input type="text" class="txt" name="captcha" maxlength="6" /> <img src="/static/homes/picture/captcha.php" alt="captcha" id="captcha" onclick="this.src='captcha.php?'+Math.random()" width="100" height="34" style="height:34px;" /> </li> 
           <li> <input type="hidden" name="cmt_type" value="0" /> <input type="hidden" name="id" value="56" /> <label>&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="" type="submit" value="提交评论" class="btn" style="border:none; height:40px; cursor:pointer; width:150px; font-size:16px;" /> </li> 
          </ul> 
         </form> 
        </div> 
        <script type="text/javascript">
//<![CDATA[
var cmt_empty_username = "请输入您的用户名称";
var cmt_empty_email = "请输入您的电子邮件地址";
var cmt_error_email = "电子邮件地址格式不正确";
var cmt_empty_content = "您没有输入评论的内容";
var captcha_not_null = "验证码不能为空!";
var cmt_invalid_comments = "无效的评论内容!";

/**
 * 提交评论信息
*/
function submitComment(frm)
{
  var cmt = new Object;

  //cmt.username        = frm.elements['username'].value;
  cmt.email           = frm.elements['email'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = 0;

  for (i = 0; i < frm.elements['comment_rank'].length; i++)
  {
    if (frm.elements['comment_rank'][i].checked)
    {
       cmt.rank = frm.elements['comment_rank'][i].value;
     }
  }

//  if (cmt.username.length == 0)
//  {
//     alert(cmt_empty_username);
//     return false;
//  }

  if (cmt.email.length > 0)
  {
     if (!(Utils.isEmail(cmt.email)))
     {
        alert(cmt_error_email);
        return false;
      }
   }
   else
   {
        alert(cmt_empty_email);
        return false;
   }

   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }

   Ajax.call('comment.php', 'cmt=' + $.toJSON(cmt), commentResponse, 'POST', 'JSON');
   return false;
}

/**
 * 处理提交评论的反馈信息
*/
  function commentResponse(result)
  {
    if (result.message)
    {
      alert(result.message);
	  document.getElementById("captcha").src='captcha.php?'+Math.random();
    }

    if (result.error == 0)
    {
      var layer = document.getElementById('ECS_COMMENT');

      if (layer)
      {
        layer.innerHTML = result.content;
      }
	  easyDialog.close();
	  window.location.reload();
    }
  }
  
	function commentsFrom(){
		easyDialog.open({
			  container : 'commentsFrom'
		});	
	}

//]]>

</script> 
       </div> 
      </div> 
      <div id="ECS_QUESTION" class="goods-detail-nav-name-block goods_con_item"> 
       <div class="consultation" style="width:1226px; margin: 0 auto;"> 
        <div class="ctitbar"> 
         <ul class="tab"> 
          <li id="question_type0" class="curr" onclick="javascript:gotoQuestionPage(1,56,0)">全部咨询</li> 
          <li id="question_type1" onclick="javascript:gotoQuestionPage(1,56,1)">商品咨询</li> 
          <li id="question_type2" onclick="javascript:gotoQuestionPage(1,56,2)">库存及配送 </li> 
          <li id="question_type3" onclick="javascript:gotoQuestionPage(1,56,3)">支付问题 </li> 
          <li id="question_type4" onclick="javascript:gotoQuestionPage(1,56,4)">促销及赠品</li> 
         </ul> 
        </div> 
        <div class="consult_extra clearfix"> 
         <div class="total">
           共
          <strong>0</strong>条咨询&nbsp;&nbsp;
         </div> 
         <div class="join">
           购买之前，如有问题，请向本站咨询。&nbsp;&nbsp; 
          <a id="consultation" href="#formMsg">[发表咨询]</a> 
         </div> 
        </div> 
        <input type="hidden" style="color: rgb(68, 68, 68);" value="" autocomplete="off" name="question_keywords" this.style.color="#444444" id="question_keywords" class="input1" /> 
        <input type="hidden" name="goods_id" value="" /> 
        <input type="hidden" name="type" id="msg_type" value="0" /> 
        <div style="border-top:0px; "> 
         <div class="null_info"> 
          <h2> 没有相关咨询 </h2> 
         </div> 
        </div> 
        <div class="blank"></div> 
        <form action="javascript:;" method="post" name="formMsg" onsubmit="submitQuestion(this)"> 
         <a name="formMsg" id="formMsg"></a> 
         <div class="ctitbar"> 
          <ul class="tab"> 
           <li class="curr">发表咨询</li> 
          </ul> 
         </div> 
         <div class="consultation_Form clearfix"> 
          <ul class=""> 
           <li id="pointType"> <span style="display: inline;">咨询类型：</span> <input type="radio" name="question_type" value="1" checked="checked" onclick="changeAnswerType('1')" /> 商品咨询 <input type="radio" name="question_type" value="2" onclick="changeAnswerType('2')" /> 库存及配送 <input type="radio" name="question_type" value="3" onclick="changeAnswerType('3')" /> 支付问题 <input type="radio" name="question_type" value="4" onclick="changeAnswerType('4')" /> 促销及赠品 </li> 
           <li style="" id="tipAnswer"> <p style="display: block;" id="answer1"> </p> <p style="display: none;" id="answer2"> <strong>发货时间</strong>：现货：下单后一日内即可发货，周日仓库休息不发货。<br /> <strong>运&nbsp;&nbsp;&nbsp;&nbsp;费</strong>：普通快递10元，邮政ems运费15元，顺丰快递20元。货到付款：货到付款需有顺丰速运网店地区方可配送到达，货到付款手续费10元/单.请点此<a href="http://www.sf-express.com/cn/sc/">查看顺丰网点</a>。 <br /> </p> <p style="display: none;" id="answer3"> <strong>支 付 宝:</strong>：diaoyu666商城特约网络支付合作伙伴。 网银汇款:请先选择&quot;支付宝&quot;付款方式，进入支付宝页面后如果没有开通支付宝,请选择&quot;付款方式二没有支付宝&quot;再选择您的网上银行进行支付。<br /> <strong>银行汇款</strong>：银行柜台或者ATM汇款请提交订单后记下您所选择的银行账号去银行柜台或者ATM机上转账汇款。<br /> <strong>货到付款</strong>：货到付款需有顺丰速运网店地区方可配送到达，货到付款手续费10元/单.请点此<a href="http://www.sf-express.com/cn/sc/">查看顺丰网点</a>。<br /> </p> <p style="display: none;" id="answer4"> </p> <p style="display: none;" id="answer5"> </p> </li> 
           <li> <span style="display:inline">咨询内容：</span> <textarea class="area1" name="msg_content" id="msg_content" style="font-size: 14px; color: rgb(0, 0, 0);"></textarea> </li> 
           <li> <span style="display:inline">验&nbsp;证&nbsp;码：</span> <input type="text" name="captcha" class="inputBorder" style="width:50px;" /> <img src="/static/homes/picture/captcha.php" alt="captcha" onclick="this.src='captcha.php?'+Math.random()" class="captcha" /> </li> 
           <li class="buttons"> <input type="hidden" name="id" value="56" /> <input type="image" src="themes/xiaomi/images/consultations/button_08.jpg" id="saveConsultation" style="float:left;margin-left:65px; margin-top:10px;" /> </li> 
          </ul> 
         </div> 
        </form> 
       </div> 
       <div class="blank"></div> 
       <script language="javascript">
var cmt_empty_username = "请输入您的用户名称";
var cmt_empty_email = "请输入您的电子邮件地址";
var cmt_error_email = "电子邮件地址格式不正确";
var cmt_empty_content = "您没有输入评论的内容";
var captcha_not_null = "验证码不能为空!";
var cmt_invalid_comments = "无效的评论内容!";

function submitQuestion(frm)
{
  var cmt = new Object;
  cmt.email           = '';
  cmt.content         = frm.elements['msg_content'].value;
  cmt.type            = 0;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = 0;

  for (i = 0; i < frm.elements['question_type'].length; i++)
  {
    if (frm.elements['question_type'][i].checked)
    {
       cmt.type = frm.elements['question_type'][i].value;
     }
  }
   if (cmt.content.length == 0)
   {
      alert("咨询内容不能为空1");
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }
    $.post('consultations.php',{cmt: $.toJSON(cmt)},function(data){
        alert(data.message);
    },'json');
   return false;
}
function submitQuestionReponse(result)
{
    if (result.message)
    {
      alert(result.message);
    }


}
function changeAnswerType(src)
{
	for(var i=1;i<=5;i++)
	{
		if(i==src)
		{
			document.getElementById('answer'+src).style.display   = "block";
		}
		else
		{
			document.getElementById('answer'+i).style.display   = "none";
		}
	}
}


function gotoQuestionPage(page, id, type)
{
	var keywords = document.getElementById('question_keywords').value;
//    $.get('consultations.php?act=gotopage',{page:page,id:id,type:type,keywords:keywords},function(result){
//        document.getElementById("ECS_QUESTION").innerHTML = result.content;
//    });
	Ajax.call('consultations.php?act=gotopage', 'page=' + page + '&id=' + id + '&type=' + type+'&keywords='+keywords, gotoQuestionPageResponse, 'GET', 'JSON');
}
function gotoQuestionPageResponse(result)
{
    document.getElementById("ECS_QUESTION").innerHTML = result.content;
}

</script> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="goods-sub-bar" id="goodsSubBar" style="z-index: 999999"> 
    <div class="container"> 
     <ul class="detail-list"> 
      <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">详情描述</a> </li> 
      <li> <a class="J_scrollHref" rel="nofollow" href="javascript:void(0);">规格参数</a> </li> 
      <li><a class="J_scrollHref" href="javascript:void(0);" name="pjxqitem" rel="nofollow">评价晒单(<em>0</em>)</a></li> 
      <li><a class="J_scrollHref" href="javascript:void(0);" rel="nofollow">商品咨询</a></li> 
     </ul> 
     <dl class="goods-sub-bar-info clearfix"> 
      <dt>
       <img src="/static/homes/picture/56_thumb_p_1440717641728.jpg" alt="小米手机4" />
      </dt> 
      <dd> 
       <strong>小米手机4</strong> 
       <p><em></em></p> 
      </dd> 
     </dl> 
     <a href="javascript:addToCart(56,1)" class="btn btn-primary goods-add-cart-btn"><i class="iconfont"></i> 加入购物车</a> 
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
  </div>
 </body>
</html>
@endsection
@section("title","前台首页")