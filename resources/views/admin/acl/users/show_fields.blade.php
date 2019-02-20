<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('app.name').':') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at',  __('app.common.created_at').':') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('app.common.updated_at').':') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
  {!! Form::label('permission', __('app.permission').'s:') !!}
    @include('users.datatables_roles')
</div>
