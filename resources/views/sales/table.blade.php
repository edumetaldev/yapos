
  <table class="table table-striped table-condensed">
      <thead>
          <th>@lang('Date')</th>
          <th>@lang('Customer')</th>
          <th>@lang('Amount')</th>
          <th>@lang('Items') / @lang('Units')</th>
          <th>@lang('Detail')</th>
      </thead>
      <tbody>
      @foreach($sales as $sale)
          <tr>
              <td>{!! $sale->emitdate !!}</td>
              <td>{!! $sale->customer->name !!}</td>
              <td>{!! $sale->amount !!}</td>
              <td>{!! $sale->items->count() !!} / {!! $sale->items->sum('quantity') !!}</td>
              <td><a href="{{ url("sales/$sale->id") }}" class="btn btn-info"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a></td>
          </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">
            {{$sales->links()}}
          </td>
        </tr>
      </tfoot>
  </table>
