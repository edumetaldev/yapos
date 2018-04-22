@extends('layouts.standart')

@section('title','Item Show')

@section('title-right')
  <a href="{!! route('items.index') !!}" class="btn btn-info">Back</a>
@endsection

@section('body')
  @include('items.show_fields')
@endsection
