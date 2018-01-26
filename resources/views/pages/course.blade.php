@extends('layout')

@section('content')
<div class="main-content">
	<div class="container">

		<div class="leave-comment col-md-7">
			<h2>Доступ к материалу открыт!<h2>
			<p>Получайте и изучайте прямо сейчас!</p>
				<a href="{{$params->course_link}}" type="text">ПОЛУЧИТЬ</a>
		</div>
		
		<div class="leave-comment col-md-5">
			<h2>Список другиx проектов<h2>
		</div>

	</div>
</div>
@endsection