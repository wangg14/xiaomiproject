@extends("Admin.AdminPublic.publics")
@section('admin')
<DOCTYPE html>
<html>
 <head>
  <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 </head>
<body>
<div class="container"> 
    <div class="mws-panel-body no-padding"> 
     <form class="mws-form" action="/saveauth" method="post"> 
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">权限信息</label> 
        <div class="mws-form-item clearfix"> 
         <h4>当前角色:<span style="color:red;">{{$role->name}}</span>的权限信息</h4> 
         <ul class="mws-form-list inline" style="background-color:pink;margin-left:-50px">
          @foreach($node as $row)
          <li style="margin-left:50px;margin-top:30px;"><input type="checkbox" name="nid[]" value="{{$row->id}}" @if(in_array($row->id,$nid)) checked @endif> <label>{{$row->name}}</label></li>
          @endforeach
        </ul>
		<ul>
		 <ul class="mws-form-list inline" style="margin-left:-60px;margin-top:20px;">
		  <li><a href="javascript:void(0)" class="btn btn-success allchoose">全选</a></li>
		  <li><a href="javascript:void(0)" class="btn btn-success nochoose">全不选</a></li>
		  <li><a href="javascript:void(0)" class="btn btn-success fchoose">反选</a></li>
		 </ul>
		</ul>
        </div> 
       </div> 
      </div> 
      <div class="mws-button-row">
        {{csrf_field()}}
        <input type="hidden" name="rid" value="{{$role->id}}">
       <input value="分配权限" class="btn btn-danger" type="submit"> 
       <input value="Reset" class="btn " type="reset"> 
      </div> 
     </form> 
    </div> 
    <!-- Panels End --> 
   </div>
</body>
</html>
   <script type="text/javascript">
	$('.allchoose').click(function(){
		$(':checkbox').attr('checked',true);
	});
	$('.nochoose').click(function(){

		$(':checkbox').attr('checked',false);
	});
	$('.fchoose').click(function(){
		// alert($);
		$(':checkbox').each(function(){
			$(this).attr('checked',!$(this).attr('checked'));
		});
		
	});
   </script>
@endsection
@section('title','分配权限')