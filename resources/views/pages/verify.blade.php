@extends('layout')

@section('content')

	@include('pages.steps-header')

	<div class="step-page" class="ad-fw-block">
		<div id="reg-node2-inner">
			<div class="container">

				<div class="row">
					
					<div class="col-12 col-md-7">
						<div class="info">
							<div class="info-title">Как подтвердить E-mail?</div>
							<div class="info-subtitle">Последовательность действий для подтверждения вашего E-mail адреса:</div>
							<ol class="custom-list">
								<li>Письмо будет отправлено в течение 1 минуты</li>
								<li>Зайдите в почту, которую вы указали</li>
								<li>Найдите письмо от автора курса: <strong class="proj-name">ИКСА - Джйотиш от Профессионалов</strong></li>
								<li>Перейдите по ссылке внутри письма</li>
							</ol>
						</div>
					</div>

					<div class="col-12 col-md-5">
						<div class="row">
							<a class="col-12 ad-btn link-to-form" href="/">ВЫСЛАТЬ ЕЩЕ РАЗ</a>
							<div class="col-3 info-icon">
								<img src="../img/alert_sign.png">
							</div>
							<div class="col-9 info-text">
								<p>Если письмо не пришло, нужно решить проблему с доставкой письма, иначе курс вам не дойдет.</p>
								<!-- <a class="link-to-form" href="/">Ввести другой E-mail адрес</a> -->
							</div>
						</div>
					</div>

				</div>	
			
			</div>
		</div>
	</div>

@endsection