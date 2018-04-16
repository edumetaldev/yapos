@extends('layouts.app')

@section('content')
   <div class="content">
     <div class="row">
       <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
         <h1>Customers</h1>
       </div>
     </div>
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
            <form action="{!! route('customers.update',[$customer->id]) !!}" method="post">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              @include('customers.fields')
            </form>
        </div>
     </div>
   </div>
@endsection
