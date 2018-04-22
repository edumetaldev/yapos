@extends('layouts.standart')

@section('title','Customers')

@section('title-right')
  <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('customers.create') !!}">Add New</a>
@endsection

@section('body')
    @include('customers.table')
@endsection
