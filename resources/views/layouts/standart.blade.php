@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="row">

  <div class="col-md-8 col-md-offset-2">
        <h2 class="pull-left">@yield('title')</h2>
        <h2 class="pull-right">@yield('title-right')</h2>
  </div>
</div>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @yield('body')
  </div>
</div>




@endsection
