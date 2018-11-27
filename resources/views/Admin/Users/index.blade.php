@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>用户列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="/adminusers" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: 用户名<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}"/>邮箱<input type="text" aria-controls="DataTables_Table_1" name="keywordss" value="{{$request['keywordss'] or ''}}"/></label>
      <input type="submit" value="搜索">
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">用户名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">邮箱</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>

       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->username}}</td> 
        <td class=" ">{{$row->email}}</td> 
        <td class=" ">{{$row->status}}</td> 
        <td class=" ">{{$row->phone}}</td>
        <td class=" "><a href="/address/{{$row->id}}" class="btn btn-success">收货地址</a>
		<form action="/adminusers/{{$row->id}}" method="post">
          {{csrf_field()}}
          {{method_field("DELETE")}}
          <button type="submit" class="btn btn-warning">普通删除</button>
        </form>
		<a href="javascript:void(0)" class="btn btn-success del">Ajax删除</a><a href="/adminusers/{{$row->id}}/edit" class="btn btn-info">修改</a></td>

       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      {{$data->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 // alert($);
 $(".del").click(function(){
  //获取id
  id=$(this).parents("tr").find("td:first").html();
  //获取删除数据所在的tr
  s=$(this).parents("tr");
  //Ajax
  $.get("/adminusersdel",{id:id},function(data){
    // alert(data.msg);
    if(data.msg==1){
      alert("删除成功");
      //移除删除数据所在的tr
      s.remove();
    }else{
      alert("删除失败");
    }
  },'json');
 });
 </script>
</html>
@endsection
@section('title','会员列表')