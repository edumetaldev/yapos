@extends('admin.acl.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ __('app.role') }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.acl.roles.show_fields')
                    <a href="{!! route('roles.index') !!}" class="btn btn-default">{{__('app.actions.back')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
