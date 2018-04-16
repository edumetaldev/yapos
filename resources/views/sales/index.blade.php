@extends('layouts.app')

@section('content')

<div class="content">

<div class="row">

  <div class=" col-md-8 col-md-offset-2">
    <div class="content-header">
        <h3 class="pull-left">Sales</h3>
        <h3 class="pull-right">
           
        </h3>
    </div>
          @include('sales.table')
  </div>
</div>

</div>

@endsection
