@extends('layouts.standart')
@section('title',trans('supplier.list_suppliers'))

@section('title-right')
<a class="btn btn-small btn-info" href="{{ URL::to('suppliers/create') }}">{{trans('supplier.new_supplier')}}</a>
@endsection
@section('body')
	<div class="panel panel-default">
		<div class="panel-heading">{{trans('supplier.list_suppliers')}}</div>
		<div class="panel-body">
		@if (Session::has('message'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif

		@include('suppliers.table')
		</div>
	</div>
@endsection
