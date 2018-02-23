@extends('admin.layout')

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Отзывы
		</h1>
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
				</tr>
			</thead>
			<tbody>
				@foreach($testimonials as $testimonial)
				<tr>
					<td>{{$testimonial->name}}</td>
					<td>{{$testimonial->position}}</td>
					<td>{{$testimonial->photo}}</td>
					<td>{{$testimonial->content}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	
	</section>
</div>
@endsection