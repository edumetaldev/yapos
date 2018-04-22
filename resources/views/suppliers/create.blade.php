@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('supplier.new_supplier')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::Model('Supplier',array('route' => 'suppliers.store', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('company_name', trans('supplier.company_name').' *') !!}
					{!! Form::text('company_name', old('company_name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('name', trans('supplier.name')) !!}
					{!! Form::text('name', old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('supplier.email')) !!}
					{!! Form::text('email', old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('phone_number', trans('supplier.phone_number')) !!}
					{!! Form::text('phone_number', old('phone_number'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('avatar', trans('supplier.choose_avatar')) !!}
					{!! Form::file('avatar', old('avatar'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('address', trans('supplier.address')) !!}
					{!! Form::text('address', old('address'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('city', trans('supplier.city')) !!}
					{!! Form::text('city', old('city'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('state', trans('supplier.state')) !!}
					{!! Form::text('state', old('state'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('zip', trans('supplier.zip')) !!}
					{!! Form::text('zip', old('zip'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('comments', trans('supplier.comments')) !!}
					{!! Form::text('comments', old('comments'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('account', trans('supplier.account').' #') !!}
					{!! Form::text('account', old('account'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit(trans('supplier.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
