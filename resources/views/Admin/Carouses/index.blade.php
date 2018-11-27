@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>轮播图列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="/admincates" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: <input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}"/></label>
      <input type="submit" value="搜索" class="btn btn-warning">
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">图片路径</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">图片状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>

       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" "><img src="{{$row->pic}}" width="100" height="100"></td> 
        <td class=" ">@if($row->status==1) 启用
		@else 禁用
		@endif
		</td> 
        <td class=" "><form action="/carouse/{{$row->id}}" method="post">
          {{csrf_field()}}
          {{method_field("DELETE")}}
          <button type="submit" class="btn btn-info" onclick="return confirm('确认删除吗？')">普通删除</button>
        </form><a href="/carouse/{{$row->id}}/edit" class="btn btn-warning">修改</a></td>

       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
	
 </script>
</html>
@endsection
@section('title','轮播图列表')