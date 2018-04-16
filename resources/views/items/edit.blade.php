@extends('layouts.app')

@section('content')
   <div class="content">
     <div class="row">
       <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
         <h1>Item</h1>
       </div>
     </div>
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
            <form action="{!! route('items.update',[$item->id]) !!}" method="post">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              @include('items.fields')
            </form>
        </div>
     </div>
   </div>
@endsection
