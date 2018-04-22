
  <table class="table table-striped table-condensed">
      <thead>
          <th>Id</th>
          <th>Date</th>
          <th>Amount</th>
          <th>items / units</th>
          <th>Detail</th>
      </thead>
      <tbody>
      @foreach($receivings as $row)
          <tr>
              <td>{!! $row->id !!}</td>
              <td>{!! $row->emitdate !!}</td>
              <td>{!! $row->amount !!}</td>
              <td>{!! $row->items->count() !!} / {!! $row->items->sum('quantity') !!}</td>

              <td><a href="{{ url("receivings/$row->id") }}" class="btn btn-info"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a></td>
          </tr>
      @endforeach
      </tbody>
  </table>
