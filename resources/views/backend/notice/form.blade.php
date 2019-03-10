@extends('backend.layout')

@section('title')
 | {{ isset($data) ? '修改通知' : '添加通知' }}
@endsection

@section('content')
<a href="{{ route('b_notice_list') }}" class="layui-btn layui-btn-sm layui-btn-danger">返回</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
 	<legend>{{ isset($content) ? '修改通知' : '添加通知' }}</legend>
</fieldset>
<form class="layui-form" action="{{ isset($data) ? route('b_notice_edit') : route('b_notice_add')}}">
	@if(isset($data))
		<input type="hidden" name="id" value="{{ $data -> id }}">
	@endif
	<div class="layui-form-item">
	    <label class="layui-form-label">标题</label>
	    <div class="layui-input-block">
			<input type="text" name="title" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input" value="{{ isset($data) ? $data->title : '' }}">
		</div>
	</div>
	<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">内容</label>
		<div class="layui-input-block">
			<!-- 加载编辑器的容器 -->
		    <script id="container" name="content" type="text/plain" style="width:100%">
		        {{ isset($data) ? $data->content : '' }}
		    </script>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
		</div>
	</div>
</form>
<!-- 配置文件 -->
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript" src="/static/admin/js/app.js"></script>
<script>
layui.use(['form','jquery'], function(){
	var form = layui.form;
	var $ = layui.jquery;

	//监听提交
	form.on('submit(formDemo)', function(data){
		// layer.msg(JSON.stringify(data.field));
		var datas = data.field;
		var action = data.form.action;
		$.ajax({
			url: action,
			data: datas,
			type: 'post',
			dataType: 'json',
			success:function(msg){
				if (msg.status==200) {
					layer.msg(msg.txt, {icon:1});
				}else{
					layer.msg(msg.txt, {icon:5});
				}
			},
			error:function(xhr){
				layer.msg('提交出错', {icon:5, anim:6});
            }
		});
		return false;
	});
});
</script>
@endsection