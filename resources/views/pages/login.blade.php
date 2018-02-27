@extends('layout')

@section('content')
<div class="main-content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col col-md-5">

				<div class="login-title text-uppercase">Login</div>

				@if( session('status') )
					<div class="alert alert-danger">
						{{session('status')}}
					</div>
				@endif

				@include('admin.errors')

				<form class="login-form" role="form" method="post" action="/login">
					{{csrf_field()}}

					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
					</div>

					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
					</div>

					<button type="submit" class="ad-btn login-ico">Login</button>

				</form>

			</div>
		</div>
	</div>
</div>

@endsection