@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>轮播图修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/carouse/{{$info->id}}" method="post" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
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
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
        <ul class="mws-form-list inline">
		  <li><input type="radio" name="status" value="0" @if($info->status==0)checked @endif><label>禁用</label></li>
		  <li><input type="radio" name="status" value="1" @if($info->status==1)checked @endif><label>启用</label></li>
          
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
</html>
@endsection
@section('title','轮播图修改')