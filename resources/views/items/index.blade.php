@extends('layouts.standart')

@section('title',__('Items'))

@section('title-right')
  <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('items.create') !!}">@lang('Add New')</a>
@endsection

@section('body')
  @include('items.table')
@endsection
