@extends('frontend.layout')
@section('title')
 | 编辑软件
@endsection
@section('content')
	<div class="col-md-9">
		<ul class="list-group">
			@foreach($lists as $list)
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-2">
						<img src="{{ $list->cover }}" class="cover" onerror="this.src='/static/default/images/img-error.jpg'">
					</div>
					<div class="col-md-9">
						<h4>{{ $list->name }}</h4>
						<p>简介：{{ $list->introduce }}</p>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	@include('frontend.aside')
@endsection