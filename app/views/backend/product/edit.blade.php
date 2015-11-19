@extends('backend.layout.main')
@section('content')

<h1>Edit Product</h1>
<div class="clearfix"></div>
{{ Form::model($product, array('method' => 'PATCH', 'route' =>array('admin.product.update', $product->id))) }}

<div class="form-group">
	<label class="control-label col-sm-2" for="user">User</label>
	<div class="col-sm-10">
		{{Form::text('user', $product->user->name, array('class'=>'form-control', 'id'=>'user_id','disabled' => 'disabled'))}}
	</div>
</div>

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
	<label class="control-label col-sm-2" for="location_id">Location</label>
	<div class="col-sm-10">
		<select name="location_id" id="location_id" class="form-control">
            	@foreach ($location as $loca)
            	<option value="{{ $loca->id }}" {{$product->location_id == $loca->id? 'selected' : ''}}>{{ $loca->name }}</option>
                @endforeach
        </select>
	</div>
</div>


<div class="form-group">
	<label class="control-label col-sm-2" for="category_id">Category</label>
	<div class="col-sm-10">
		<select name="category_id" id="category_id" class="form-control">
            	@foreach ($category as $cate)
            	<option value="{{ $cate->id }}" {{$product->category_id == $cate->id? 'selected' : ''}}>{{ $cate->title }}</option>
                @endforeach
        </select>
	</div>
</div>


<div class="form-group">
	<label class="control-label col-sm-2" for="public">Public</label>
	<div class="col-sm-10">
		<select name="public" class="form-control">
			<option value="1" {{$product->public==1?'selected':''}}>Public</option>
			<option value="0" {{$product->public==0?'selected':''}}>Không public</option>		
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
