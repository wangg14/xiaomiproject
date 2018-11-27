@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/lang/zh-cn/zh-cn.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>商品修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/shop/{{$info->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">名字</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$info->name}}"/> 
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">原图</label> 
       <div class="mws-form-item"> 
        <img src="{{$info->pic}}" width="100px" height="100px">
		<input type="hidden" name="old" value="{{$info->pic}}">
       </div> 
      </div> 
        <div class="mws-form-row"> 
       <label class="mws-form-label">新图片</label> 
       <div class="mws-form-item"> 
        <input type="file" class="large" name="pic" /> 
       </div> 
      </div>
        <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="descr" value="{{$info->descr}}"/> 
       </div> 
      </div>
        <div class="mws-form-row"> 
       <label class="mws-form-label">数量</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="num" value="{{$info->num}}"/> 
       </div> 
      </div>

        <div class="mws-form-row"> 
       <label class="mws-form-label">单价</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="price" value="{{$info->price}}"/> 
       </div> 
      </div>
     </div> 
     <div class="mws-button-row"> 
      {{csrf_field()}}
      {{method_field('PUT')}}
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 
 </script>
</html>
@endsection
@section('title','商品修改')