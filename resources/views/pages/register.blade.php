@extends('layout')

@section('content')

<!-- COUNTDOWN -->
<div id="reg-node1" class="ad-fw-block">
<div id="reg-node1-inner">
	<div class="container">
		<div class="ad-logo"></div>
	
<!-- 		<div class="row">
			@if (Notify::all())
				<div class="col-12">
					@foreach (Notify::get('success') as $alert)
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							{{ $alert }}
						</div>
					@endforeach

					@foreach (Notify::get('error') as $alert)
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							{{ $alert }}
						</div>
					@endforeach

					@foreach (Notify::get('info') as $alert)
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							{{ $alert }}
						</div>
					@endforeach

					@foreach (Notify::get('warning') as $alert)
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							{{ $alert }}
						</div>
					@endforeach
				</div>
			@endif
		</div> -->



			<!-- info block -->
<!-- 			<div class="col-12 base-block">
				<div class="base-content">
					<h1>КОМПЛЕКТ №1 -БЕСПЛАТНЫЕ МАСТЕР-КЛАССЫ ПО ВЕДИЧЕСКОЙ АСТРОЛОГИИ ОТ ИКСА</h1>
					<ol>
						<li>Закрытые мастер-классы от Василия Тушкина в ИКСА (2 темы)</li>
						<li>Практика разбора натальных карт Специалистов 3.</li>
						<li>Кураторский созвон по теме Раху-Кету</li>
					</ol>
					<h4>Формат курса — Видео-запись</h4>
				</div>
			</div>   -->




		<!-- VIDEO and FORM -->
		<div class="row">
			<!-- video block -->
			<div class="col-12 col-lg-7">
				<div class="video-block">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/KRj2zz5_828?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>

			<!-- register form block -->
			<div class="col-12 col-lg-5">
				@if( session('status') )
					<div class="alert alert-danger">
						{{session('status')}}
					</div>
				@endif
				
				@include('admin.errors')

				<form class="" role="form" method="post" action="/register">
					{{csrf_field()}}

					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Ваше Имя">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="E-mail адрес">
					</div>
					<input type="hidden" name="referal" value="{{$referal}}">

					<button type="submit" class="ad-btn email-ico" style="background-color: {{$settings['title_email_button_color']}}">Получить</button>

				</form>

				<div class="page-title">
					До конца раздачи осталось:
				</div>

			<!-- COUNTDOWN -->
			<div id="countdown" class="bodycontainer clearfix big" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
				<ul id="countscript">
					<li class="cd-group">
						<div class="top-line">
							<div class="days"></div>
							<div class="label">ДНЕЙ</div>	
						</div>
						<span class="separator">:</span>
					</li>

					<li class="cd-group">
						<div class="top-line">
							<div class="hours"></div>
							<div class="label">ЧАСОВ</div>
						</div>
						<span class="separator">:</span>
					</li>

					<li class="cd-group">
						<div class="top-line">
							<div class="minutes"></div>
							<div class="label">МИНУТ</div>
						</div>
						<span class="separator">:</span>
					</li>

					<li class="cd-group">
						<div class="top-line">
							<div class="seconds"></div>
							<div class="label">СЕНКУНД</div>
						</div>
						<!-- <span class="separator" style="opacity:0;">:</span> -->
					</li>
				</ul>
			</div> <!-- / COUNTDOWN -->

		</div> <!-- / .row -->

	</div> <!-- / .container -->
</div> <!-- / #reg-node1-inner -->
</div> <!-- / #reg-node1 -->



<!-- CUPS -->
<div id="reg-node2" class="ad-fw-block">
<div id="reg-node2-inner">
	<div class="container">
		<div class="row">

<!-- 			@ foreach ($cups as $cup)
				<div class="col col-md-4">
					<div class="cup-pic"></div>
					<div class="cup-title">
						{ !! $cup->value !!}
					</div>
				</div>
			@ endforeach -->
<!-- 			<div class="col col-md-4">
				<div class="cup-pic pic-2">
					{ {$cup->content2}}
				</div>
			</div>
			<div class="col col-md-4">
				<div class="cup-pic pic-3">
					{ {$cup->content3}}
				</div>
			</div>
 -->
	    </div>  <!-- / .row -->
	</div> <!-- / .container -->
</div> <!-- / #reg-node2-inner -->
</div> <!-- / #reg-node2 -->


<!-- TESTIMONIALS -->
<div id="reg-node3" class="ad-fw-block">
<div id="reg-node3-inner">
	
	<div class="container">
	    <div class="row">

			<div class="col col-md-10">

				<div id="testimonial-slider" class ="owl-carousel">
					@foreach ($testimonials as $testim)
						<div class="testimonial">
							<p class="description">{{$testim->content}}</p>
							<div class="pic">
								<img src="/img/testimonials/{{$testim->photo}}" alt="">
							</div><h3 class="testimonial-title">{{$testim->name}}<small>{{$testim->position}}</small></h3>
						</div>
					@endforeach
	            </div>

	        </div>

	    </div>  <!-- / .row -->
	</div> <!-- / .container -->

</div> <!-- / #reg-node3-inner -->
</div> <!-- / #reg-node3 -->


<!-- INLINE FORM -->
<div id="reg-node2" class="ad-fw-block">
<div id="reg-node2-inner">
	<div class="container">
		<div class="row">

			<!-- register form block -->
			<div class="col-12 col-md-12">
				<div class="base-content">
					@if( session('status') )
						<div class="alert alert-danger">
							{{session('status')}}
						</div>
					@endif
					
					@include('admin.errors')

					<form class="" role="form" method="post" action="/register">
						{{csrf_field()}}

						<div class="form-group row">
							<div class="col-12 col-md-4">
								<input type="text" class="form-control" id="name" name="name" placeholder="Ваше Имя">
							</div>
							<div class="col-12 col-md-4">
								<input type="text" class="form-control" id="email" name="email" placeholder="E-mail адрес">
							</div>
							<div class="col-12 col-md-4">
								<input type="hidden" name="referal" value="{{$referal}}">
								<button type="submit" class="ad-btn small">Получить</button>
							</div>
						</div>
					</form>

				</div>
			</div>

	    </div>  <!-- / .row -->
	</div> <!-- / .container -->
</div> <!-- / #reg-node2-inner -->
</div> <!-- / #reg-node2 -->



<!-- FOOTER -->
<div id="reg-node4" class="ad-fw-block">
<div id="reg-node4-inner">
	<div class="container">
		<div class="row">

	        <div class="col col-md-4">
				<p class="footer-title">Институт Консалтинга<br>и Социального Анализа<br>[ИКСА]</p>
				<p class="footer-subtitle">Программы профессионального обучения</p>
			</div>
	        
			<div class="col col-md-4 second">
				<p class="footer-contacts-title">Контакты</p>
				<p class="footer-contacts">Ватсап/Вайбер - 8 (913) 675 87 76<br>vaspronas@gmail.com<br>Скайп: vaspronas</p>
			</div>

	    </div>  <!-- / .row -->
	</div> <!-- / .container -->
</div> <!-- / #reg-node4-inner -->
</div> <!-- / #reg-node4 -->


<!-- BOTTOM BAR (COPYRIGHT) -->
<div id="reg-node5" class="ad-fw-block">
	<div class="container">
		<div class="row">
			<p>&copy; ICSA Copyright. 2015-2018 All Rights Reserved</p>
	    </div>  <!-- / .row -->
	</div> <!-- / .container -->
</div> <!-- / #reg-node5 -->


@if ( $is_reg == 1 ) 
	<!-- Modal -->
<!-- 	<div class="modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="false">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="registerModalLabel">Регистрация</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">

			@if (Notify::all())
				<div class="col-12">
					@foreach (Notify::all() as $alert)
						{{ $alert }}
					@endforeach
				</div>
			@endif

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-info" data-dismiss="modal">Закрыть</button>
		  </div>
		</div>
	  </div>
	</div>

	<script>
		$('#registerModal').modal('show');
	</script> -->

@endif
@endsection