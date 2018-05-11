@extends('layouts.standart')

@section('title',__('Sale')." ". __('Detail'))

@section('body')
    <p>@lang('Date'): {!! $sale->emitdate !!}</p>
    <p>@lang('Amount'): ${!! $sale->amount !!}</p>
    <p>@lang('Total Cost'): ${!! $sale->items->sum('subtotalcost') !!}</p>
    <p>@lang('Profits'): ${!! $sale->items->sum('subtotal') - $sale->items->sum('subtotalcost')  !!}</p>


    <a href="{{ url("sales") }}" class="btn btn-info"> <span class="glyphicon glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a>



  <table class="table table-striped table-condensed">
      <thead>
          <th>#</th>
          <th>@lang('Item')</th>
          <th>@lang('Cost Price')</th>
          <th>@lang('Quantity')</th>
          <th>@lang('Price')</th>
          <th>Subtotal</th>
      </thead>
      <tbody>
      @foreach($sale->items as $item)
          <tr>
              <td>{!! $item->id !!}</td>
              <td>{!! $item->item->name !!}</td>
              <td>{!! $item->cost_price !!}</td>
              <td>{!! $item->quantity !!}</td>
              <td>${!! $item->price !!}</td>
              <td>${!! $item->subtotal !!}</td>
          </tr>
      @endforeach

      </tbody>
      <tfoot>
        <tr>
            <td colspan="4"></td>
            <td>Total:</td>
            <td>${!! $sale->amount !!}</td>
        </tr>
      </tfoot>
  </table>

@endsection
