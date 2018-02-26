@extends('admin.layout')

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Отзывы
		</h1>
		<a href="testimonial/add" class="btn btn-success" title="Добавить отзыв">
			<i class="fa fa-plus"></i>
			Добавить отзыв
		</a>
	</section>
	<br>

	<section class="content">

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Имя</th>
					<th>Должность</th>
					<th>Фото</th>
					<th>Текст</th>
					<th>Действия</th>
				</tr>
			</thead>
			<tbody>
				@foreach($testimonials as $testimonial)
				<tr>
					<td>{{$testimonial->name}}</td>
					<td>{{$testimonial->position}}</td>
					<td>
						<img src="/img/testimonials/{{$testimonial->photo}}" class="admin-testimonials-photo">
					</td>
					<td>{!! $testimonial->content !!}</td>
					<td>
						<a href="testimonial/edit/{{$testimonial->id}}" class="btn btn-success" title="Редактировать">
							<i class="fa fa-edit clear"></i>
							Редактировать
						</a>
						<a 	href="testimonial/delete/{{$testimonial->id}}"
							class="btn btn-danger ad-del-testimonials-btn"
							title="Удалить"
							onclick="return confirm('Вы действительно хотите удалить данный отзыв ?')">
							<i class="fa fa-trash clear"></i>
							Удалить
						</a>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	
	</section>
</div>
@endsection