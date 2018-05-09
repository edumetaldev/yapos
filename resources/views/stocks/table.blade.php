<table class="table table-striped table-condensed">
    <thead>
        <th>@lang('Date')</th>
        <th>@lang('Item')</th>
        <th>@lang('Remarks')</th>
        <th>@lang('In Out')</th>
        <th>@lang('quantity')</th>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
        <tr>
            <td>{!! $stock->emitdate !!}</td>
            <td>{!! $stock->item->name !!}</td>
            <td>{!! $stock->remarks!!}</td>
            <td>{!! $stock->in_out !!}</td>
            <td>{!! $stock->quantity !!}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">
          {{$stocks->links()}}
        </td>
      </tr>
    </tfoot>
</table>
