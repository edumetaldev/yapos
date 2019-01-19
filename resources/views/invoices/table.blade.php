
  <table class="table table-striped table-condensed">
      <thead>
          <th>@lang('Date')</th>
          <th>@lang('Customer')</th>
          <th>@lang('Amount')</th>
          <th>@lang('Items') / @lang('Units')</th>
          <th>@lang('Detail')</th>
      </thead>
      <tbody>
      @foreach($invoices as $invoice)
          <tr>
              <td>{!! $invoice->emitdate !!}</td>
              <td>{!! $invoice->free_text !!}</td>
              <td>{!! $invoice->amount !!}</td>
              <td>{!! $invoice->lines->count() !!} / {!! $invoice->lines->sum('quantity') !!}</td>
              <td><a href="{{ url("sales/$invoice->id") }}" class="btn btn-info"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a></td>
          </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">

          </td>
        </tr>
      </tfoot>
  </table>
