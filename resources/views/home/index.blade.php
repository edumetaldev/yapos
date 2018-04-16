@extends('layouts.app')

@section('content')

<div class="content">

<div class="row">

<div class="col-md-10 col-md-offset-1">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Top Customers by amount</h3>
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

    <div class="col-md-6">
      <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Top items selling</h3>
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
  </div>
</div>


  </div>
</div>

</div>

@endsection
