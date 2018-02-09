@extends('layout')

@section('content')
<div class="main-content">
	<div class="container">

		<div class="row">
			<div class="col-12 col-md-6 base-block">
				<div class="base-content">
					<h2>Доступ к материалу открыт!</h2>
					<p>Получайте и изучайте прямо сейчас!</p>
					<a href="{{$params->course_link}}" type="text" class="btn btn-primary">ПОЛУЧИТЬ</a>
				</div>
			</div>
		
			<div class="col-12 col-md-6 base-block">
				<div class="base-content">
					<h2>Список другиx проектов</h2>
				</div>
			</div>
		</div> <!-- / row -->

	</div>
</div>
@endsection