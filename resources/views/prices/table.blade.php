<table class="table table-striped table-condensed">
    <thead>
        <th>@lang('Date')</th>
        <th>@lang('Item')</th>
        <th>@lang('Remarks')</th>
        <th>@lang('sell cost')</th>
        <th>@lang('Value')</th>
    </thead>
    <tbody>
    @foreach($prices as $price)
        <tr>
            <td>{!! $price->emitdate !!}</td>
            <td>{!! $price->item->name !!}</td>
            <td>{!! $price->remarks!!}</td>
            <td>{!! $price->sell_cost !!}</td>
            <td>${!! $price->price !!}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">
          {{$prices->links()}}
        </td>
      </tr>
    </tfoot>
</table>
