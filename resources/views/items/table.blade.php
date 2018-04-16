  <table class="table table-striped table-condensed" id="myTable">
      <thead>
          <th>Upc Ean Isbn</th>
          <th>Name</th>
          <th>Cost Price</th>
          <th>Selling Price</th>
          <th>Quantity</th>
          <th>Action</th>
      </thead>
      <tbody>
      @foreach($items as $item)
          <tr>
              <td>{!! $item->upc_ean_isbn !!}</td>
              <td>{!! $item->name !!}</td>
              <td>{!! $item->cost_price !!}</td>
              <td>{!! $item->selling_price !!}</td>
              <td>{!! $item->quantity !!}</td>
              <td>
                <form action="{!! route('items.destroy',[$item->id]) !!}" method="POST">
                  <div class='btn-group'>
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <a href="{!! route('items.show', [$item->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="{!! route('items.edit', [$item->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                      <button class ="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></button>
                  </div>
                </form>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
