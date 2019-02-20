<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('app.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('app.password').':') !!}
    {!! Form::password('password',['class' => 'form-control']) !!}
    {!! Form::label('confirm-password', __('app.password').' '.__('app.confirm').':') !!}
    {!! Form::password('confirm-password',['class' => 'form-control']) !!}
</div>

<!-- roles Field -->
<div class="form-group col-sm-6">
    <strong>{!! Form::label('Roles', __('app.roles')).':' !!}</strong>
    <br/>
    @foreach($roles as $value)
      <label>{{ Form::checkbox('roles[]', $value->id, in_array($value->id, $userRole) ? true : false, array('class' => 'form-checkbox')) }}
      {{ $value->name }} </label>
    <br/>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('app.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">{{__('app.cancel')}}</a>
</div>
