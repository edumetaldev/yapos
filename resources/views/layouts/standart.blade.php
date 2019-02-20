@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="row">

  <div class="col-md-10 col-md-offset-1">
        <h2 class="pull-left">@yield('title')</h2>
        <h2 class="pull-right">@yield('title-right')</h2>
  </div>
</div>

@if ($errors->any())
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  </div>
</div>
@endif

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    @yield('body')
  </div>
</div>




@endsection
