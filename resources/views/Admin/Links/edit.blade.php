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
    <span>友情链接修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/links/{{$info->id}}" method="post"> 
     <div class="mws-form-inline"> 
      
        <div class="mws-form-row"> 
       <label class="mws-form-label">链接名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$info->name}}"/> 
       </div> 
      </div>
        <div class="mws-form-row"> 
       <label class="mws-form-label">链接地址</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="url" value="{{$info->url}}"/> 
       </div> 
      </div>

        <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <ul class="mws-form-list inline">
		  <li><input type="radio" name="status" value="0" @if($info->status==0)checked @endif><label>上架</label></li>
		  <li><input type="radio" name="status" value="1" @if($info->status==1)checked @endif><label>下架</label></li>
          
        </ul>  
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
@section('title','友情链接修改')