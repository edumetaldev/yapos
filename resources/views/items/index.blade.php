@extends('layouts.app')
@section('content')

<div class="content">

  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
      <div class="content-header">
          <h3 class="pull-left">Items</h3>
          <h3 class="pull-right">
             <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('items.create') !!}">Add New</a>
          </h3>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12  col-md-8 col-md-offset-2">
      <div class="table-responsive">
        @include('items.table')
      </div>
    </div>
  </div>

</div>

@endsection
@section('css')
  <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('js')
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable({
          responsive: true,
          rowGroup: {
              dataSrc: 'group'
          }
        });
    } );
  </script>
@endsection
