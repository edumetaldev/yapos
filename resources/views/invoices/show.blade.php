@extends('layouts.standart')

@section('title',__('Invoice')." ". __('Detail'))

@section('body')
    <p>@lang('Date'): {!! $invoice->emitdate !!}</p>
    <p>@lang('Amount'): ${!! $invoice->amount !!}</p>
    <p>@lang('Total Cost'): ${!! $invoice->lines->sum('subtotalcost') !!}</p>
    <p>@lang('Profits'): ${!! $invoice->lines->sum('subtotal') - $invoice->lines->sum('subtotalcost')  !!}</p>


    <a href="{{ url("sales") }}" class="btn btn-info"> <span class="glyphicon glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a>



  <table class="table table-striped table-condensed">
      <thead>
          <th>#</th>
          <th>@lang('line')</th>
          <th>@lang('Cost Price')</th>
          <th>@lang('Quantity')</th>
          <th>@lang('Price')</th>
          <th>Subtotal</th>
      </thead>
      <tbody>
      @foreach($invoice->lines as $line)
          <tr>
              <td>{!! $line->id !!}</td>
              <td>{!! $line->line->name !!}</td>
              <td>{!! $line->cost_price !!}</td>
              <td>{!! $line->quantity !!}</td>
              <td>${!! $line->price !!}</td>
              <td>${!! $line->subtotal !!}</td>
          </tr>
      @endforeach

      </tbody>
      <tfoot>
        <tr>
            <td colspan="4"></td>
            <td>Total:</td>
            <td>${!! $invoice->amount !!}</td>
        </tr>
      </tfoot>
  </table>

@endsection
