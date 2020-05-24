@extends('admin/public/extend')
@section('content')
    

<div class="page-container">
<table class="table table-border table-bordered table-bg">
		<thead>
			<!-- <tr>
				<th colspan="7" scope="col">文章信息</th>
			</tr> -->
			<tr class="text-c">
				<th>ID</th>
				<th>标题</th>
				<th>描述</th>
				
				<th>发布时间</th>
				<th>最近一次更新时间</th>
				<th>发布人</th>
				<th>分类</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($data as $v)
			<tr class="text-c">
				<td>{{$v->cate_id}}</td>
				<td>{{$v->cate_title}}</td>
				<td>{{$v->cate_description}}</td>
				<td>{{$v->cate_time}}</td>
				<td>{{$v->cate_tupdate}}</td>
				<td>{{$v->cate_author}}</td>
				<td>{{$v->cate_classify}}</td>
				<td><a href="{{url('/admin/index/'.$v->cate_id.'/alter')}}">修改</a> <a href="{{url('/admin/index/'.$v->cate_id.'/delete')}}">删除</a></td>
			</tr>
		@endforeach
		
		
	</table>
	<div style="width:100%;height:100px;display:flex;justify-content:center;align-items:center;flex-direction: row;">
				<!-- 分页 -->	{{$data->links()}}
					
                    </div>
</div>
@endsection