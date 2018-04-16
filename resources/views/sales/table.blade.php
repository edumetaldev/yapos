
  <table class="table table-striped table-condensed">
      <thead>
          <th>Id</th>
          <th>Date</th>
          <th>Customer</th>
          <th>Amount</th>
          <th>Detail</th>
      </thead>
      <tbody>
      @foreach($sales as $sale)
          <tr>
              <td>{!! $sale->id !!}</td>
              <td>{!! $sale->created_at !!}</td>
              <td>{!! $sale->customer->name !!}</td>
              <td>{!! $sale->amount !!}</td>
              <td><a href="{{ url("sales/$sale->id") }}" class="btn btn-info"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a></td>
          </tr>
      @endforeach
      </tbody>
  </table>
