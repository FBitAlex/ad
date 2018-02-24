@extends('admin.layout')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Фоновые изображения
		</h1>
	</section>

	<br>

	<section class="content">
		@foreach ($params as $param)
			<form class="" role="form" method="post" action="background" enctype="multipart/form-data">
				{{csrf_field()}}

				<label for="{{$param->name}}">{{$param->desc}}</label>
				<div class="row">
					<div class="form-group col-4 col-md-1 img-container">
						<img src="/img/settings/{{$param->value}}">

					</div>

					<div class="form-group col-8 col-md-2" >
						<div class="upload-btn-wrapper">
		  					<button class="btn btn-primary btn-fw">Загрузить</button>
		  					<input type="file" class="form-control btn btn-default" id="{{$param->name}}" name="bgimage">
						</div>						

						<input type="hidden" name="id" value="{{$param->id}}">
						<input type="hidden" name="filename" value="{{$param->name}}">
						<input type="submit" value="Сохранить" class="btn btn-success btn-fw">
					</div>
				
				</div>				
			</form>
			<hr>
		@endforeach
				
<!-- 			<div class="form-group col-2 col-md-4">
				<input type="hidden" name="{{$param->name}}" value="{{$param->group}}">
				<input type="submit" value="Сохранить">
			</div>
			
		</form>
 -->
	</section>

</div>
@endsection