@extends('layout')

@section('content')

	<div class="step-page bg-4 bgp-bottom p200">
		<div id="step-page-inner">
			<div class="container">
				<div class="row">

					<div class="col col-md-4">
						@include('pages.steps-header')
					</div>

					<div class="col-12 col-md-8 ad-active-content {{$active_step}}">
						<div class="info-title">Как подтвердить E-mail?</div>
						<div class="info-subtitle">Последовательность действий для подтверждения вашего E-mail адреса:</div>
						<ol class="custom-list">
							<li>Письмо будет отправлено в течение 1 минуты</li>
							<li>Зайдите в почту, которую вы указали</li>
							<li>Найдите письмо от автора курса: <strong class="proj-name">ИКСА - Джйотиш от Профессионалов</strong></li>
							<li>Перейдите по ссылке внутри письма</li>
						</ol>

						<a class="ad-btn email-ico" href="/">ВЫСЛАТЬ ПОВТОРНО</a>
					</div>

				</div>	
			</div>
		</div>
	</div>

@endsection