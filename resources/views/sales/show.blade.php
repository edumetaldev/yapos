@extends('layouts.app')

@section('content')
    <div id="app" class="content-fluid">
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
          <h1>Sale Detail</h1>
          <h4>Date: {!! $sale->created_at !!}</h4>
          <h4>Amount: ${!! $sale->amount !!}</h4>
        </div>
      </div>
      <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
            <a href="{{ url("sales") }}" class="btn btn-info"> <span class="glyphicon glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a>
            </div>
      </div>
      <div class="row" style="padding-left: 20px">
        <div class="col-xs-8 col-xs-offset-2">
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
                  <tr>
                      <td colspan="3"></td>
                      <td>Total:</td>
                      <td>${!! $sale->amount !!}</td>
                  </tr>
              </tbody>
          </table>

        </div>
      </div>

    </div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>
<script type="text/javascript">
  var vm =  new Vue({
    el: "#app",
    data: {}
  });

  Vue.filter('money_format', function (value) {
      return numeral(value).format('$0,0.00');
  })
</script>
@endsection
