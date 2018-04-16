@extends('layouts.app')
@section('content')

<div class="content" id="app">
  <div class="col-xs-12 col-md-8 col-md-offset-2">
    <div class="row">
      <div class="content-header">
          <h3 class="pull-left">Customers</h3>
          <h3 class="pull-right">
             <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('customers.create') !!}">Add New</a>
          </h3>
      </div>
    </div>

    <div class="row">
        @include('customers.table')
    </div>
  </div>
</div>
@endsection
