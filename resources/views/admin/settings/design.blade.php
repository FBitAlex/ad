@extends('admin.layout')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Цвета
		</h1>
	</section>

	<br>

	<section class="content">
		<form class="" role="form" method="post" action="/save_param">
			@foreach ($params as $param)
				<div class="form-group">
					<label for="{{$param->name}}">{{$param->desc}}</label>
					<input type="{{$param->type}}" class="form-control" id="name" name="{{$param->name}}" value="{{$param->value}}">
				</div>
			@endforeach
		</form>
	</section>

</div>
@endsection