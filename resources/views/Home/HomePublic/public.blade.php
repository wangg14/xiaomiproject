<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head> 
  <meta name="Generator" content="ECSHOP v2.7.3" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="Keywords" content="diaoyu666" /> 
  <meta name="Description" content="diaoyu666" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> 
  <title>@yield("title")</title> 
  <link rel="shortcut icon" href="favicon.ico" /> 
  <link rel="icon" href="animated_favicon.gif" type="image/gif" /> 
  <link href="/static/homes/css/style.css" rel="stylesheet" type="text/css" /> 
  
  <link href="/static/homes/css/user.css" rel="stylesheet" type="text/css" /> 
  <link rel="alternate" type="application/rss+xml" title="RSS|diaoyu666 - Powered by ECShop" href="feed.php" /> 
  <script type="text/javascript" src="/static/homes/js/common.js"></script>
  <script type="text/javascript" src="/static/homes/js/index.js"></script>
 </head> 
 <body> 
  <script type="text/javascript" src="/static/homes/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery.json.js"></script>
  <script type="text/javascript" src="/static/homes/js/transport_jquery.js"></script>
  <script type="text/javascript" src="/static/homes/js/utils.js"></script>
  <script type="text/javascript" src="/static/homes/js/jquery.superslide.js"></script>
  <script type="text/javascript" src="/static/homes/js/xiaomi_common.js"></script>
  <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("请输入搜索关键词！");
            return false;
        }
    }
    -->
    
    </script> 
  <div class="site-topbar"> 
   <div class="container"> 
    <div class="topbar-nav"> 
     <a href="mobile" class="snc-link snc-order">手机版</a> 
     <span class="sep">|</span> 
     <a href="#" target="_blank" class="snc-link snc-order">MIUI</a> 
     <span class="sep">|</span> 
     <a href="#" target="_blank" class="snc-link snc-order">米聊</a> 
     <span class="sep">|</span> 
     <a href="#" target="_blank" class="snc-link snc-order">游戏</a> 
     <span class="sep">|</span> 
     <a href="#" target="_blank" class="snc-link snc-order">多看阅读</a> 
     <span class="sep">|</span> 
     <a href="#" target="_blank" class="snc-link snc-order">云服务</a> 
     <span class="sep">|</span> 
     <a href="/mobile" target="_blank" class="snc-link snc-order">移动版商城</a> 
     <span class="sep">|</span> 
     <a href="#" class="snc-link snc-order">Select region</a> 
     <span class="sep">|</span> 
     <a href="article_cat.php?id=3" class="snc-link snc-order">网店帮助分类</a> 
     <span class="sep">|</span> 
     <a href="message.php" target="_blank" class="snc-link snc-order">留言板</a> 
     <span class="sep">|</span> 
     <a href="goods.php?id=104" class="snc-link snc-order">会员等级商品测试</a> 
    </div> 
    
	@if(session('cart'))
	<div class="topbar-cart" id="ECS_CARTINFO"> 
   <a class="cart-mini cart-mini-filled" href="/homecart"> <i class="iconfont"></i> 购物车 <span class="mini-cart-num J_cartNum" id="hd_cartnum">({{$at[1]}})</span> </a> 
   <div id="J_miniCartList" class="cart-menu"> 
    <ul> 
	@foreach($as as $row)
     <li class="clearfix first"> 
      <div class="cart-item"> 
       <a class="thumb" target="_blank" href="/goods/{{$row->id}}"> <img src="{{$row->pic}}" /> </a> 
       <a class="name" target="_blank" href="/goods/{{$row->id}}">{{$row->name}}</a> 
       <span class="price">{{$row->price}}元 x {{$row->num}}</span> 
       <a class="btn-del delItem" href=""> <i class="iconfont">x</i> </a> 
      </div> </li> 
	@endforeach
    </ul> 
    <div class="count clearfix"> 
     <span class="total"> 共计<em id="hd_cart_count">{{$at[1]}}</em>件商品 <strong>合计：<em id="hd_cart_total">{{$at[0]}}元</em></strong> </span> 
     <a class="btn btn-primary" href="/homecart">去购物车结算</a> 
    </div> 
   </div> 
  </div>
	
	@else
	
	<div class="topbar-cart" id="ECS_CARTINFO"> 
     <a class="cart-mini " href="/homecart"> <i class="iconfont"></i> 购物车 <span class="mini-cart-num J_cartNum" id="hd_cartnum">(0)</span> </a> 
     <div id="J_miniCartList" class="cart-menu"> 
      <p class="loading">购物车中还没有商品，赶紧选购吧！</p> 
     </div> 
    </div> 
	
	@endif
	
	@if(session('username'))
  <div class="topbar-info J_userInfo" id="ECS_MEMBERZONE"> 
   <span class="user"> <a class="user-name" target="_blank" href="/homeuser"><span class="name">{{session("username")}}</span><i class="iconfont"></i></a> 
    <ul class="user-menu"> 
     <li><a target="_blank" href="/homeuser">个人中心</a></li> 
     <li><a target="_blank" href="">我的收藏</a></li> 
     <li><a target="_blank" href="">我的评论</a></li> 
     <li><a target="_blank" href="">跟踪包裹</a></li> 
     <li><a href="/homelogin">退出登录</a></li> 
    </ul> </span> 
   <span class="sep">|</span> 
   <a href="/orderlist" class="link">我的订单</a> 
  </div>
	
	@else
  <div class="topbar-info J_userInfo" id="ECS_MEMBERZONE"> 
     <a class="link" href="/homelogin/create" rel="nofollow">登录</a> 
     <span class="sep">|</span> 
     <a class="link" href="/homeregister/create" rel="nofollow">注册</a> 
  </div>
	@endif
	
	
   </div> 
  </div> 
  <div class="site-header" style="clear:both;"> 
   <div class="container"> 
    <div class="header-logo"> 
     <a href="/homeindex" title="diaoyu666"><img src="/static/homes/picture/logo.gif" /></a> 
    </div> 
    <div class="header-nav"> 
     <ul class="nav-list"> 
      <li class="nav-category"> <a class="btn-category-list" href="catalog.php" @if($k) style="display:none;" @endif>全部商品分类</a> 
	  
	  
	<!-------------商品分类开始------------------>  
       <div class="site-category @if(!$k) category-hidden @endif"> 
        <ul class="site-category-list clearfix" id="site-category-list"> 
		
		
		<!------------------开始遍历分类数据------------------------->
		<!--顶级分类-->
         @foreach($cate as $row)
         <li class="category-item"> <a class="title" href="/category/{{$row->id}}">{{$row->name}}<i class="iconfont">></i></a> 
          <div class="children clearfix"> 
           <ul class="children-list"> 
		   @if(count($row->suv))
		   @foreach($row->suv as $rows)
			
			 @foreach($data as $k)
		     @if($k->scid == $rows->id)
		<!--二级分类-->
			<li> <a href="/goods/{{$k->sid}}" class="link"> <img class="thumb" src="{{$k->spic}}" width="40" height="40" /> <span>{{$k->sname}}</span> </a> </li> 
			 @endif
			 @endforeach
			
           @endforeach
		   @endif
           </ul> 
          </div> 
		  </li> 
		  @endforeach
		<!------------------开始遍历分类数据----------------------->
		  
		  
        </ul> 
       </div> 
	   </li>    
	   <!--一级分类-->
	   @foreach($cate as $shop)
	    @if(count($shop->suv))
		@foreach($shop->suv as $shops)
      <li class="nav-item"> <a class="link" href="#"><span>{{$shops->name}}</span></a> 
       <div class="item-children"> 
        <div class="container"> 
         <ul class="children-list clearfix"> 
			@foreach($data as $v)
		    @if($v->scid == $shops->id)
          <li class="first"> 
           <div class="figure figure-thumb">
            <a href="/goods/{{$v->sid}}"><img src="{{$v->spic}}" alt="{{$shops->name}}" /></a>
           </div> 
           <div class="title">
            <a href="/goods/{{$v->sid}}">{{$v->sname}}</a>
           </div> <p class="price">{{$v->sprice}}<em>元</em></p> </li> 
		    @endif
			@endforeach
           
		   
         </ul> 
        </div> 
       </div> </li> 
		 @endforeach
		 @endif
		@endforeach 
		
       
       
       
     </ul> 
    </div> 
	
	
	<!-------------商品分类结束------------------> 
	
	
    <div class="header-search"> 
     <form action="search.php" method="get" id="searchForm" name="searchForm" onsubmit="return checkSearchForm()" class="search-form clearfix"> 
      <label class="hide">站内搜索</label> 
      <input class="search-text" type="text" name="keywords" id="keyword" value="" autocomplete="off" /> 
      <input type="hidden" value="k1" name="dataBi" /> 
      <button type="submit" class="search-btn iconfont"></button> 
      <div class="hot-words"> 
       <a href="search.php?keywords=%E5%B0%8F%E7%B1%B3%E6%89%8B%E7%8E%AF" target="_blank">小米手环</a> 
       <a href="search.php?keywords=%E8%80%B3%E6%9C%BA" target="_blank">耳机</a> 
       <a href="search.php?keywords=%E6%8F%92%E7%BA%BF%E6%9D%BF" target="_blank">插线板</a> 
      </div> 
     </form> 
    </div> 
   </div> 
   <div id="J_navMenu" class="header-nav-menu" style="display: none;"> 
    <div class="container"></div> 
   </div> 
  </div> 
  <script type="text/javascript" src="/static/homes/js/xiaomi_index.js"></script>
  
  
  
  
  
  @section("main")
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
     <p class="sites"> <a href="http://www.ecshop119.com" target="_blank" title="ECSHOP模板屋">ECSHOP模板屋</a> </p> 
     <p> &copy;<a href="http://www.ecshop119.com/">ecshop模板屋</a> 福建省厦门市集美区天凤路 <a href="#">歡迎來电151-059-550-77本網站由 ECSHOP模板屋www.ecshop119.com 製作。</a> </p> 
    </div> 
    <div class="info-links"> 
     <a href="#"><img src="/static/homes/picture/cnnicverifyseal.png" alt="可信网站" /></a> 
     <a href="#"><img src="/static/homes/picture/szfwverifyseal.gif" alt="诚信网站" /></a> 
     <a href="#"><img src="/static/homes/picture/save.jpg" alt="网上交易保障中心" /></a> 
    </div> 
   </div> 
  </div>   
 </body>
</html>