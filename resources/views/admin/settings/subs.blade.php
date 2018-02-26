@extends('admin.layout')

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Подписчики
		</h1>
	</section>

	<br>

	<section class="content">

		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Имя</th>
					<th>E-mail</th>
					<th>Сылка</th>
					<th>Подтверждение</th>
					<th>Дата регистрации</th>

				</tr>
			</thead>
			<tbody>
				@foreach($subs as $sub)
				<tr>
					<td>{{$sub->id}}</td>
					<td>{{$sub->name}}</td>
					<td>{{$sub->email}}</td>
					<td>{{$sub->self_referal}}</td>
<!-- 					<td>{{$sub->parent_referal}}</td> -->
					<td><a href="/confirm/{{$sub->confirm_link}}" target="_blank">{{$sub->confirm_link}}</a></td>
					<td>{{$sub->created_at}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	
	</section>
</div>
@endsection