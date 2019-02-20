<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $role->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('app.name').':') !!}
    <p>{!! $role->name !!}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', 'Guard:') !!}
    <p>{!! $role->guard_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('app.common.created_at').':') !!}
    <p>{!! $role->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('app.common.updated_at').':') !!}
    <p>{!! $role->updated_at !!}</p>
</div>
