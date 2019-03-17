@extends('backend.layout')

@section('title')
 | 权限列表
@endsection

@section('content')
<div class="btn">
	<a href="{{ route('b_access_add') }}" class="layui-btn">添加</a>
</div>
<table class="layui-table">
	<colgroup>
	    <col width="25%">
	    <col width="25%">
	    <col width="25%">
	    <col width="25%">
	    <col>
	</colgroup>
	<thead>
	    <tr>
			<th>名称</th>
			<th>url</th>
			<th>route</th>
			<th>操作</th>
	    </tr> 
	</thead>
	<tbody>
		@foreach($lists as $list)
		<tr>
			<td>{{ $list->name }}</td>
			<td>{{ $list->url }}</td>
			<td>{{ $list->route }}</td>
			<td>
				<a href="{{ route('b_access_edit',['id'=>$list->id]) }}" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
				<a href="{{ route('b_access_del',['id'=>$list->id]) }}" class="layui-btn layui-btn-danger layui-btn-sm">刪除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists -> links('backend.page') }}
@endsection