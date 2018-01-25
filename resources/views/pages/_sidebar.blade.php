<div class="col-md-5" data-sticky_column>
	<div class="primary-sidebar">

		<div class="widget">
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