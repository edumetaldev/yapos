@extends('layouts.standart')

@section('title', 'Customer Create')
@section('title-right')
  <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('customers.index') !!}">Back to List</a>
@endsection
@section('body')
    <form action="{!! route('customers.store') !!}" method="POST">
       {{ csrf_field() }}
      @include('customers.fields')
    </form>
@endsection
