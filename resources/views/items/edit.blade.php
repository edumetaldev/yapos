@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Item
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">

                  <form action="{!! route('items.update',[$item->id]) !!}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    @include('items.fields')
                  </form>

           </div>
       </div>
   </div>
@endsection
