@extends('admin.layout')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Текстовые блоки
		</h1>
	</section>

	<br>

	<section class="content">
		<form class="" role="form" method="post" action="content">
			{{csrf_field()}}

			@foreach ($params as $param)
				<label for="{{$param->name}}">{{$param->desc}}</label>
				<div class="row">
					<div class="form-group col col-md-4">
						<input type="{{$param->type}}" class="form-control" id="{{$param->name}}" name="{{$param->name}}" value="{{$param->value}}">
					</div>
				</div>
			@endforeach

			<div class="form-group col-2 col-md-4">
				<input type="submit" class="btn btn-success" value="Сохранить">
			</div>
			
		</form>
	</section>

</div>
@endsection