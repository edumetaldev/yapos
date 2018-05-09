
  <table class="table table-striped table-condensed">
      <thead>
          <th>#</th>
          <th>@lang('Date')</th>
          <th>@lang('Supplier')</th>
          <th>@lang('Amount')</th>
          <th>@lang('Items') / @lang('Units')</th>
          <th>@lang('Detail')</th>
      </thead>
      <tbody>
      @foreach($receivings as $row)
          <tr>
              <td>{!! $row->id !!}</td>
              <td>{!! $row->emitdate !!}</td>
              <td>{!! $row->supplier->name !!}</td>
              <td>{!! $row->amount !!}</td>
              <td>{!! $row->items->count() !!} / {!! $row->items->sum('quantity') !!}</td>

              <td><a href="{{ url("receivings/$row->id") }}" class="btn btn-info"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a></td>
          </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">
            {{$receivings->links()}}
          </td>
        </tr>
      </tfoot>
  </table>
