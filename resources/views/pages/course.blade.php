@extends('layout')

@section('content')

	<div class="step-page bgp-top p200" style="background-image: url(/img/settings/{{$settings['course_page_bg']}})">
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
						<a href="{{$settings['take_course_link']}}" type="text" class="ad-btn book-ico" style="background-color: {{$settings['course_button_color']}}">ПОЛУЧИТЬ</a>
					</div>

				</div> <!-- / row -->
			</div>
		</div>
	</div>

@endsection