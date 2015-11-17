@extends('frontend/layout/master')
@section('style-bot')
{{ HTML::style('public/assets/css/users/upload.css') }}
@stop
@section('script-bot')
{{ HTML::script('public/assets/js/users/upload.js') }}
@stop
@section('width_70per')
	width_70per
@stop
@section('title')
	Add product
@stop
@section('content')
    
    @if(Session::get('status') == 'success')
    <p class="alert-success">Saved</p>
    @elseif (Session::get('status') == 'fail')
    <p class="alert-danger">Can't save</p>
    @endif
    <div id='upload-tabs' class="upload_content col-md-10 center-block">
          <ul>
            
            <li><a href="#upload-album-tabs">Add product</a></li>
          </ul>
        
		<div id='upload-album-tabs' class="upload_right">
            {{ Form::open(array('url'=>'product/save','files'=>true, 'method' => 'POST')) }}
                <h1>Add product</h1>
                <!--<p class="note">Sử dụng nút <span>Chọn ảnh</span> để chọn ảnh cho album của bạn. Đăng <span>tẹt ga thoải con gà mái nhé</span>!</p>-->
                <div>
                    <ul>
                        
                        <li>
                            <p>Category</p>
                            <select name="category">
                                @foreach($categories as $index => $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <p>Title</p>
                            <input class="form-control" placeholder="Title" name="title" required='true'>
                        </li>
                        <li>
                            <p>Description</p>
                            <textarea class="form-control" placeholder="Description" name='description'></textarea>
                        </li>
                        <li>
                            <p>Images</p>
                            <p>{{Form::file('path[]', array("accept" => "image/*", "class" => "form-control", 'multiple' => 'true', 'required' => 'true'))}}</p>

                        </li>
                        <li>
                            <p>Public</p>
                            <select name='public'>
                                <option value='1' selected='true'>Yes</option>
                                <option value='2'>No</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <p><input type="submit" class="btn btn-default" value="Upload">
                <a href='{{ url('home') }}'><input type='button' class="btn btn-default" value="Cancel"></a>
                </p>
                
                <div id="files-array-multiple" class="hidden"></div>
            {{Form::close()}}
        </div>
	</div>
    <div class="clearfix"></div>
@stop