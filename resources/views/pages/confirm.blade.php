@extends('layout')

@section('content')

<!-- COUNTDOWN -->
<div id="reg-node1" class="ad-fw-block">
<div id="reg-node1-inner">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<div class="base-content">
					<h4>Вы успешно подтвердили свой Email</h4>
					<h1>Идет процесс получения курса бесплатно</h1>
				</div>	
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-md-7">
				<div class="base-content">
					<h2>Как пригласить друзей</h2>
					<p>Ваша ссылка для приглашения:</p>
					<div class="form-group">
						<input type="text" class="form-control" value="http://ad/{{$user->self_referal}}">
					</div>
				</div>
			</div>
			
			<div class="col-12 col-md-5">
				<div class="base-content">
					<h2>Вы пригласили <strong>{{$count_invite}}</strong> друзей из 6</h2>
					@foreach ( $share_links as $key => $value )
	        			<a href="{{$value}}" class="btn btn-primary share-link {{$key}}">{{$key}}</a>
			    	@endforeach
				</div>
			</div>
		</div> <!-- / row -->
		
	</div>
</div>
</div>
@endsection