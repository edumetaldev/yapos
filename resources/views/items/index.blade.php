@extends('layouts.app')

@section('content')

<div class="content">

<div class="row">

  <div class=" col-md-8 col-md-offset-2">
    <div class="content-header">
        <h3 class="pull-left">Items</h3>
        <h3 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('items.create') !!}">Add New</a>
        </h3>
    </div>
          @include('items.table')
  </div>
</div>

</div>

@endsection
