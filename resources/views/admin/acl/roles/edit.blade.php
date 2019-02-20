@extends('admin.acl.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('app.role')}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}

                        @include('admin.acl.roles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
