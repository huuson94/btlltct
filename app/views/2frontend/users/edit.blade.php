@extends('frontend/layout/master')
@section('style-bot')
{{ HTML::style('public/assets/css/users/signup.css') }}
@stop
@section('script-bot')
{{ HTML::script('public/assets/js/users/signup.js') }}
@stop
@section('content')
<h1>Edit User</h1>
<div class="signup-form">
    {{ Form::model($user, array('method' => 'POST', 'files'=>true, 'route' =>array('Details.update', $user->id))) }}
    <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Full name</label>
                <div class="col-sm-10">
                    {{Form::text('name', null, array('class'=>'form-control', 'id'=>'name','placeholder'=>'Full name'))}}
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Phone</label>
                <div class="col-sm-10">
                    {{Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone','placeholder'=>'Phone'))}}
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Address</label>
                <div class="col-sm-10">
                {{Form::textarea('address', null, array('class'=>'form-control', 'id'=>'address','placeholder'=>'Address'))}}
                </div>
        </div>
        {{-- <div class="form-group">
            <label class="col-sm-2 control-label">Avatar</label>
            <div class="col-sm-10">
                {{Form::file('path', array("accept" => "image/*", "class" => "single form-control", 'multiple' => 'true'))}}
            </div>
        </div> --}}


        <input class="form-control submit" type="submit" class="btn btn-default" value="Edit">
    </div> 
    {{Form::close()}}
</div>

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif
@stop