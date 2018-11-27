@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>商品列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
	 <div id="uid">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">名字</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">类别</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">图片</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">描述</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">数量</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">单价</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>





       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($data as $row) 
       <tr class="odd">
        <td class="  sorting_1">{{$row->sid}}</td> 
        <td class=" ">{{$row->sname}}</td> 
        <td class=" ">{{$row->cname}}</td> 
        <td class=" "><img src="{{$row->pic}}" with="100px" height="100px"></td> 
        <td class=" ">{{$row->descr}}</td> 
        <td class=" ">{{$row->num}}</td> 
        <td class=" ">{{$row->price}}</td> 

        <td class=" ">
          <form action="/shop/{{$row->sid}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}

            <button type="submit" class="btn btn-success" onclick="return confirm('确认删除？')">删除</button>
          </form>
          <a href="/shop/{{$row->sid}}/edit" class="btn btn-info">修改</a></td>
       </tr>
       @endforeach
      </tbody>
     </table>
	 </div>
     <div class="dataTables_info" id="DataTables_Table_1_info">
	  Showing 1 to 10 of 57 entries
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
	  @foreach($num as $dd)
	   <a href="javascript:void(0)" class="btn btn-danger" onclick="page({{$dd}})">{{$dd}}</a>
	  @endforeach
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
	function page(page){
		$.ajax({
			type: 'GET',
			url: '/shop',
			data: {'page':page},
			success: function(data){
				// alert(data);
				$('#uid').html(data);
			},
		});
		
	}
 </script>
</html>
@endsection
@section('title','商品列表')