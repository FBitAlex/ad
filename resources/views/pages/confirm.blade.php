@extends('layout')

@section('content')
<div class="main-content">
	<div class="container">

		<div class="leave-comment col-md-12">
			<h4>Вы успешно подтвердили свой Email</h1>
			<h1>Идет процесс получения курса бесплатно</h1>
		</div>	

		<div class="leave-comment col-md-7">
			<h2>Как пригласить друзей<h2>
			<p>Ваша ссылка для приглашения:</p>
				<input type="text" value="http://ad/{{$user->self_referal}}">
		</div>
		
		<div class="leave-comment col-md-5">
			<h2>Вы пригласили <strong>{{$count_invite}}</strong> друзей из 6<h2>
		</div>

	</div>
</div>
@endsection