@extends('frontend/layout/master')
@section('style-bot')
{{ HTML::style('public/assets/css/users/signup.css') }}
@stop
@section('script-bot')
{{ HTML::script('public/assets/js/users/signup.js') }}
@stop
@section('content')
@if(Session::has('signup_status'))
@if(Session::get('signup_status') == true)
<p class="alert-success">Signuped</p>
@elseif (Session::get('signup_status') == false)
<p class="alert-danger">Can't Signup</p>
@endif
@endif
<div class="signup-form">
    {{ Form::open(array('url'=>'user/signup', 'method' => 'POST')) }}
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input class="form-control" type="text form-control" pattern=".{6,255}" name="name" placeholder="Họ và tên" required title="6 characters minimum">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">User name</label>
            <div class="col-sm-10">
              <input class="form-control" type="text form-control" pattern=".{6,255}" name="account" placeholder="Tên tài khoản" required title="6 characters minimum">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" pattern=".{6,255}" name="password" placeholder="Nhập mật khẩu" required title="6 characters minimum">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Re-Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" pattern=".{6,255}" name="password_confirm" placeholder="Nhập lại mật khẩu" required title="6 characters minimum">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" type="text form-control" name="email" placeholder="Email( example@gmail.com )">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
                <input class="form-control" type="text form-control" name="phone" placeholder="Nhập số điện thoại">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input class="form-control" type="text form-control" name="address" placeholder="Nhập địa chỉ">
            </div>
        </div>
        <input class="form-control submit" type="submit" class="btn btn-default" value="Signup">
    </div> 
    {{Form::close()}}
</div>
@stop