@extends('layouts.standart')

@section('title', 'Customer Edit')
@section('title-right')
  <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('customers.index') !!}">Back to List</a>
@endsection
@section('body')
    <form action="{!! route('customers.update',[$customer->id]) !!}" method="post">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      @include('customers.fields')
    </form>
@endsection
