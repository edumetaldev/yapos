<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('app.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard:') !!}
    {!! Form::Select('guard_name', config('cobierto_acl.guards'), null, ['class' => 'form-control']) !!}
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>{{__('app.permission')}}s:</strong>
        <br/>
        @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'form-checkbox')) }}
            {{ $value->name }}</label>
        <br/>
        @endforeach
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('app.actions.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">{{__('app.actions.cancel')}}</a>
</div>
