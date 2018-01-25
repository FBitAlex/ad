@extends('layout')

@section('content')
<div class="main-content">
	<div class="container">
	
		<!-- info block -->
		<div class="leave-comment col-md-12">
			<h1>КОМПЛЕКТ №1 -БЕСПЛАТНЫЕ МАСТЕР-КЛАССЫ ПО ВЕДИЧЕСКОЙ АСТРОЛОГИИ ОТ ИКСА</h1>
			<ol>
				<li>Закрытые мастер-классы от Василия Тушкина в ИКСА (2 темы)</li>
				<li>Практика разбора натальных карт Специалистов 3. Кураторский созвон по теме Раху-Кету</li>
			</ol>
			<h4>Формат курса — Видео-запись</h4>
		</div>  

		<!-- video block -->
		<div class="leave-comment col-md-7">
			<h2>Что внутри?<h2>
			<h4>Посмотрите видео, чтобы узнать</h4>
			{!! $home_video !!}
		</div>
		
		<!-- register form block -->
		<div class="leave-comment col-md-5">
			<div class="primary-sidebar">

				@if( session('status') )
					<div class="alert alert-danger">
						{{session('status')}}
					</div>
				@endif
				
				<h3 class="text-uppercase">Login</h3>
				@include('admin.errors')
				<br>

				<form class="form-horizontal contact-form" role="form" method="post" action="/register">
					{{csrf_field()}}

					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control" id="name" name="name" placeholder="Ваше Имя">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control" id="email" name="email" placeholder="E-mail адрес">
						</div>
					</div>
					<input type="hidden" name="referal" value="{{$referal}}">

					<button type="submit" class="btn send-btn">Получить (за прилашение 4 друзей)</button>

				</form>
			</div>
		</div>


	</div>
</div>
@endsection