@extends('layouts.standart')

@section('title','Item Create')

@section('body')
<form action="{!! route('items.store') !!}" method="POST">
   {{ csrf_field() }}
  @include('items.fields')
</form>

@endsection
