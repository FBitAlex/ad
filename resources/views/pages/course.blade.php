@extends('layout')

@section('content')

	<div class="step-page bg-2 bgp-top p200">
		<div id="step-page-inner">
			<div class="container">
				<div class="row">

					<div class="col col-md-4">
						@include('pages.steps-header')
					</div>

					<div class="col-12 col-md-8 ad-active-content {{$active_step}}">
						<h2 class="ta-center">Доступ к материалу открыт!</h2>
						<br>
						<h4 class="ta-center">КОМПЛЕКТ №1<br>БЕСПЛАТНЫЕ МАСТЕР-КЛАССЫ<br>ПО ВЕДИЧЕСКОЙ АСТРОЛОГИИ ОТ ИКСА</h4>
						<br>

						<ol class="custom-list">
							<li>Закрытые мастер-классы от Василия Тушкина в ИКСА (2 темы)</li>
							<li>Практика разбора натальных карт Специалистов</li>
							<li>Кураторский созвон по теме Раху-Кету</li>
						</ol>

						<p class="ta-center">Получайте и изучайте прямо сейчас!</p>
						<a href="{{$params->course_link}}" type="text" class="ad-btn share-link book-ico">ПОЛУЧИТЬ</a>
					</div>

				</div> <!-- / row -->
			</div>
		</div>
	</div>

@endsection