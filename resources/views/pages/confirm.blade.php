@extends('layout')

@section('content')

	<div class="step-page bgp-top" style="background-image: url(/img/settings/{{$settings['confirm_page_bg']}})">
		<div id="step-page-inner">
			<div class="container">
				<div class="row">
			
					<div class="col col-md-4">
						@include('pages.steps-header')
					</div>

					<div class="col-12 col-md-8 ad-active-content {{$active_step}}">
						
						<div class="center-alert">
							Вы успешно подтвердили свой Email
						</div>	
	
						<div class="frends-alert">
							Вы пригласили <strong>{{$count_invite}}</strong> друзей из 6
						</div>
	
						<div class="ta-center">
							<h4>Как пригласить больше друзей ?</h4>
						</div>

						<p>Письмом по почте:</p>
						<p>Ваша ссылка для приглашения:</p>
						<div class="form-group">
							<input type="text" class="form-control" value="http://ad/{{$user->self_referal}}">
						</div>

						<form class="" role="form" method="post" action="/invite-mail">
							{{csrf_field()}}
							<!-- <input type="hidden" name="user" value="{ {$invite_mail_content}}"> -->
							<button type="submit" class="ad-btn email-ico" style="background-color: {{$settings['confirm_email_button_color']}}">Отправить письмо другу</button>

						</form>
						
						<br>
						<p>Через соцсети:</p>

						@foreach ( $share_links as $key => $value )
		        			<a href="{{$value}}" class="ad-btn share-link {{$key}}" style="background-color: {{$settings['social_button_color']}}">
		        				{{$key}}
		        				<!-- <img src="/img/{ {$key}}_logo.png"> -->
		        			</a>
				    	@endforeach

					</div>


				</div> <!-- / row -->
			</div>
		</div>
	</div>
	
@endsection