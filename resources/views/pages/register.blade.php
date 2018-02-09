@extends('layout')

@section('content')
<div class="main-content">
	<div class="container">
	
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

		<div class="row">

			<!-- info block -->
			<div class="col-12 base-block">
				<div class="base-content">
					<h1>КОМПЛЕКТ №1 -БЕСПЛАТНЫЕ МАСТЕР-КЛАССЫ ПО ВЕДИЧЕСКОЙ АСТРОЛОГИИ ОТ ИКСА</h1>
					<ol>
						<li>Закрытые мастер-классы от Василия Тушкина в ИКСА (2 темы)</li>
						<li>Практика разбора натальных карт Специалистов 3. Кураторский созвон по теме Раху-Кету</li>
					</ol>
					<h4>Формат курса — Видео-запись</h4>
				</div>
			</div>  

		</div>

		<div class="row">

			<!-- video block -->
			<div class="col-12 col-md-7 base-block">
				<div class="base-content">
					<h2>Что внутри?</h2>
					<h4>Посмотрите видео, чтобы узнать</h4>
					{!! $home_video !!}
				</div>
			</div>
			
			<!-- register form block -->
			<div class="col-12 col-md-5 base-block">
				<div class="base-content">
					@if( session('status') )
						<div class="alert alert-danger">
							{{session('status')}}
						</div>
					@endif
					
					<h3 class="text-uppercase">Login</h3>
					@include('admin.errors')
					<br>

					<form class="" role="form" method="post" action="/register">
						{{csrf_field()}}

						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Ваше Имя">
						</div>

						<div class="form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="E-mail адрес">
						</div>
						<input type="hidden" name="referal" value="{{$referal}}">

						<button type="submit" class="btn send-btn">Получить (за прилашение 4 друзей)</button>

					</form>
				</div>
			</div>
		
		</div> <!-- / row -->

	</div>
</div>

@if ( $is_reg == 1 ) 
	<!-- Modal -->
	<div class="modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="false">
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
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
		  </div>
		</div>
	  </div>
	</div>

	<script>
		$('#registerModal').modal('show');
	</script>

@endif
@endsection