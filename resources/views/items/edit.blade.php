@extends('layouts.standart')

@section('title',__('Item'))

@section('title-right')
  <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('items.index') !!}">@lang('Back to List')</a>
@endsection

@section('body')
  <form action="{!! route('items.update',[$item->id]) !!}" method="post">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    @include('items.fields')
  </form>
@endsection
