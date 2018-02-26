@extends('admin.layout')

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Новый отзыв
		</h1>
	</section>

	<br>

	<section class="content">
		<form class="" role="form" method="post" action="/admin/testimonial/add-item" enctype="multipart/form-data">
			{{csrf_field()}}

			<label for="name">Name</label>
			<div class="row">
				<div class="form-group col col-md-4">
					<input type="text" class="form-control" id="name" name="name" value="">
				</div>
			</div>

			<label for="position">Position</label>
			<div class="row">
				<div class="form-group col col-md-4">
					<input type="text" class="form-control" id="position" name="position" value="">
				</div>
			</div>

			<label for="photo">Photo</label>
			<div class="row">
				<div class="form-group col-8 col-md-2" >
					<div class="upload-btn-wrapper">
						<button class="btn btn-primary btn-fw">Загрузить фото</button>
						<input type="file" class="form-control btn btn-default" id="photo" name="photo">
					</div>						
				</div>
			</div>	

			<div class="col-md-12">
				<div class="form-group">
				<label for="content">Отзыв</label>
				<textarea id="desc" cols="30" rows="4" class="form-control" name="content"></textarea>
			</div>

			<div class="form-group col-2 col-md-4">
				<input type="submit" class="btn btn-success" value="Сохранить">
			</div>
			
		</form>
	
	</section>
</div>
@endsection