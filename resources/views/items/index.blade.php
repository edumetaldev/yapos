@extends('layouts.standart')

@section('title','Items')

@section('title-right')
  <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('items.create') !!}">Add New</a>
@endsection

@section('body')
  @include('items.table')
@endsection
