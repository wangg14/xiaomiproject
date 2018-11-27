@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>公告列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">操作</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">标题</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">内容</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>

       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($annource as $row)
       <tr class="odd">
        <td class=" "><input type="checkbox" value="{{$row->id}}"></td> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->title}}</td> 
        <td class=" ">{!!$row->content!!}</td> 
        <td class=" ">
		<form action="/adminannource/{{$row->id}}" method="post">
		{{csrf_field()}}
		{{method_field('DELETE')}}
		<button type="submit" class="btn btn-success" onclick="return confirm('确认删除吗')">删除</button>
		</form>
		<a href="/adminannource/{{$row->id}}/edit" class="btn btn-info">修改</a></td>
       </tr>
       @endforeach
       <tr>
        <td colspan="5"><a href="javascript:void(0)" class="btn btn-success allchoose">全选</a><a href="javascript:void(0)" class="btn btn-success nochoose">全不选</a><a href="javascript:void(0)" class="btn btn-success fchoose">反选</a></td>
       </tr>
      <tr>
        <td colspan="5"><a href="javascript:void(0)" class="btn btn-warning del" >删除</a></td>
       </tr>
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
 //全选
	$('.allchoose').click(function(){
		$(':checkbox').attr('checked',true);
	});
 //全不选
	$('.nochoose').click(function(){
		$(":checkbox").attr('checked',false);
	});
 //反选
	$('.fchoose').click(function(){
		$(':checkbox').each(function(){
			$(this).attr('checked',!$(this).attr('checked'));
		});
	});
	//ajax删除
	$('.del').click(function(){
		// console.log(arr);
		//批量选择
		if(confirm('确定要删除所选项目？')){
			var arr = [];
			$(':checkbox').each(function(){
				if($(this).attr('checked')){
					id = $(this).val();
					arr.push(id);
				}
			});
			$.ajax({
				type: "GET",
				url: "/annourcedel",
				data: {'arr':arr},
				success: function(data) {
					for(var i=0;i<arr.length;i++){
						$('input[value="'+arr[i]+'"]').parents('tr').remove();
					}
					alert(data);
				},
			});
			// $.get('/annourcedel',{arr:arr},function(data){
				// console.log(data);
				// if(data == 1){
				  // alert(data);
				  // alert("删除成功");
				// }else{
				  // alert("删除失败");
				// }
			// });
		}
		
	});
 </script>
</html>
@endsection
@section('title','公告列表')