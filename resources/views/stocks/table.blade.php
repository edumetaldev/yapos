<table class="table table-striped table-condensed">
    <thead>
        <th>Date</th>
        <th>Item</th>
        <th>In Out</th>
        <th>Quantity</th>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
        <tr>
            <td>{!! $stock->emitdate !!}</td>
            <td>{!! $stock->item->name !!}</td>
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
