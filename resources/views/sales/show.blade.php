@extends('layouts.standart')

@section('title','Sale Detail')

@section('body')
    <p>Date: {!! $sale->emitdate !!}</p>
    <p>Amount: ${!! $sale->amount !!}</p>


    <a href="{{ url("sales") }}" class="btn btn-info"> <span class="glyphicon glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a>



  <table class="table table-striped table-condensed">
      <thead>
          <th>Id</th>
          <th>Item</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Subtotal</th>
      </thead>
      <tbody>
      @foreach($sale->items as $item)
          <tr>
              <td>{!! $item->id !!}</td>
              <td>{!! $item->item->description !!}</td>
              <td>{!! $item->quantity !!}</td>
              <td>${!! $item->price !!}</td>
              <td>${!! $item->subtotal !!}</td>
          </tr>
      @endforeach

      </tbody>
      <tfoot>
        <tr>
            <td colspan="3"></td>
            <td>Total:</td>
            <td>${!! $sale->amount !!}</td>
        </tr>
      </tfoot>
  </table>

@endsection
