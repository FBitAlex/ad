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
				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->self_referal}}</td>
<!-- 					<td>{{$user->parent_referal}}</td> -->
					<td>{{$user->confirm_link}}</td>
					<td>{{$user->created_at}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	
	</section>
</div>
@endsection