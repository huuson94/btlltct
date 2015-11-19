@extends('backend.layout.main')
@section('content')
@if(Session::has('errors_message') && Session::get('status') === false)
@foreach(Session::get('errors_message') as $key => $errors)
@foreach($errors as $error)
{{ $error }}
@endforeach
@endforeach
@endif
<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' =>array('admin.user.update', $user->id))) }}
<div class="form-group">
	<label class="control-label col-sm-2" for="email">Email</label>
	<div class="col-sm-10">
		{{Form::text('email', null, array('class'=>'form-control', 'id'=>'email','placeholder'=>'Email', 'disabled' => 'disabled'))}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="account">Account</label>
	<div class="col-sm-10">
		{{Form::text('account', null, array('class'=>'form-control', 'id'=>'account','placeholder'=>'Account', 'disabled' => 'disabled'))}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="name">Full name</label>
	<div class="col-sm-10">
		{{Form::text('name', null, array('class'=>'form-control', 'id'=>'name','placeholder'=>'Full name'))}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="address">Address</label>
	<div class="col-sm-10">
		{{Form::textarea('address', null, array('class'=>'form-control', 'id'=>'address','placeholder'=>'Address', 'rows'=>3))}}
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-2" for="description">Phone</label>
	<div class="col-sm-10">
		{{Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone','placeholder'=>'Phone'))}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="is_admin">Admin</label>
	<div class="col-sm-10">
		<select name="is_admin">
			<option value="1" {{$user->is_admin==1?'selected':''}}>Admin</option>
			<option value="0" {{$user->is_admin==0?'selected':''}}>Không là Admin</option>		
		</select>
	</div>
</div>

<div class="box-footer">
	<div class="form-group">
		<label class="control-label col-sm-2">&nbsp;</label>
		<div class="col-sm-10">
			<button class="btn btn-sm btn-success" type="submit">Submit</button>
			<button class="btn btn-sm btn-default" type="reset">Reset</button>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

{{ Form::close() }}
@stop