@extends('backend.layout.main')
@section('content')
@if(Session::has('errors_message') && Session::get('status') === false)
@foreach(Session::get('errors_message') as $key => $errors)
@foreach($errors as $error)
{{ $error }}
@endforeach
@endforeach
@endif
<h1>Edit Category</h1>
{{ Form::model($category, array('method' => 'PATCH', 'route' =>array('admin.category.update', $category->id))) }}
<div class="form-group">
	<label class="control-label col-sm-2" for="title">Title</label>
	<div class="col-sm-10">
		{{Form::text('title', null, array('class'=>'form-control', 'id'=>'email','placeholder'=>'Title'))}}
	</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="description">Description</label>
	<div class="col-sm-10">
		{{Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description','placeholder'=>'Description'))}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="p_id">Parent category</label>
	<div class="col-sm-10">
		<select name="p_id" id="p_id">
            <option value="0">Không có</option>
            	@foreach ($p_id as $pid)
            <option value="{{ $pid->id }}" {{$category->p_id == $pid->id? 'selected' : ''}}>{{ $pid->title }}</option>
                @endforeach
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