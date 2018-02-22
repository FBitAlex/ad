@extends('admin.layout')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Название страницы
      </h1>
    </section>


    @foreach ($params as $param)
    
    @endforeach

    <!-- Main content -->
    <section class="content">
      Контент
    </section>
    <!-- /.content -->
  </div>
@endsection