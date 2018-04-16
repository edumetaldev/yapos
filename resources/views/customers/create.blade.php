@extends('layouts.app')

@section('content')

<div class="row">
    <div class=" col-md-8 col-md-offset-2">
      <section class="content-header">
          <h1>
              Customer
          </h1>
      </section>
      <div class="content">
          <div class="box box-primary">

              <div class="box-body">
                  <div class="row">

                  <form action="{!! route('customers.store') !!}" method="POST">
                     {{ csrf_field() }}
                    @include('customers.fields')

                  </form>

                  </div>
              </div>
          </div>
      </div>
    </div>
</div>

@endsection
