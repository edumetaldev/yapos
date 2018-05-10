@extends('layouts.app')

@section('content')

<div class="content">

<div class="row">

<div class="col-md-10 col-md-offset-1">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">@lang('Items status')</h3>
        </div>
        <div class="panel-body">
          @foreach($itemstatus as $status)
            <p>
              {{$status->title}}:  {{$status->value}}
            </p>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">@lang('Top items selling')</h3>
        </div>
        <div class="panel-body">
          @foreach($topitems as $topitem)
            <p>
              {{$topitem->name}} - {{$topitem->quantity}}
            </p>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">@lang('Last Items Selling')</h3>
        </div>
        <div class="panel-body">
          @foreach($lastsellings as $selling)
            <p>
              {{$selling->name}} - sell ({{$selling->quantity}}) - stock ({{$selling->stock}})
            </p>
          @endforeach
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">@lang('Top Customers by amount')</h3>
    </div>
    <div class="panel-body">
      @foreach($topcustomers as $topcustomer)
        <p>
          {{$topcustomer->name}} -$ {{$topcustomer->amount}}
        </p>
      @endforeach
    </div>
  </div>
    </div>


    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">@lang('Last Items Receiving')</h3>
        </div>
        <div class="panel-body">
          @foreach($lastreceivings as $receiving)
            <p>
              {{$receiving->name}} - sell ({{$receiving->quantity}}) - stock ({{$receiving->stock}})
            </p>
          @endforeach
        </div>
      </div>
    </div>


    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">@lang('Last Items Updated')</h3>
        </div>
        <div class="panel-body">
          @foreach($lastitemsupdates as $update)
            <p>
              {{$update->name}} /  quantity: {{$update->quantity}} / cost price: ${{$update->cost_price}} / selling price: ${{$update->selling_price}}
            </p>
          @endforeach
        </div>
      </div>
    </div>

    </div>
  </div>
</div>


  </div>
</div>

</div>

@endsection
