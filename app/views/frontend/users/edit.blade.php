@extends('frontend/layout/master')
@section('style-bot')
{{ HTML::style('/public/assets/css/frontend/users/create.css') }}
@stop
@section('script-bot')
{{ HTML::script('/public/assets/js/frontend/users/create.js') }}
@stop
@section('title')
	Sign Up
@stop
@section('width_70per')
    width_70per
@stop
@section('content')

<div class="signup-form">
    {{ Form::open(array('url'=>'user/'.$user->id, 'method' => 'PATCH','files'=>true)) }}
    <div class="error-content">
        @if(Session::has('update_status'))
        @if(Session::get('update_status') == true)
        <p class="alert-success">Updated</p>
        @elseif (Session::get('update_status') == false && Session::has('errors_message'))
        @foreach (Session::get('errors_message') as $error_message)
        <p class="alert-danger">
            {{$error_message}}
        </p>
        @endforeach
        @endif
        @endif
    </div>
    <div class="form-horizontal">
        <h4>Chỉnh sửa thông tin cá nhân</h4>
        <div class="form-group">
            <label class="control-label">Name</label>
            <div>
              <input class="form-control" type="text form-control" pattern=".{6,255}" name="name" placeholder="Họ và tên" required title="6 characters minimum" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Password</label>
            <div>
                <input class="form-control password" type="password" pattern=".{6,255}" name="password" placeholder="Nhập mật khẩu"  title="6 characters minimum" >
            </div>
        </div>
        <div class="form-group">
            <label class="ontrol-label">Re-Password</label>
            <div>
                <input class="form-control re-password" type="password" pattern=".{6,255}" name="password_confirm" placeholder="Nhập lại mật khẩu"  title="6 characters minimum">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Email</label>
            <div>
                <input class="form-control email" type="text form-control" name="email" placeholder="example@gmail.com" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Phone</label>
            <div>
                <input class="form-control" type="text form-control" name="phone" placeholder="Nhập số điện thoại" value="{{$user->phone}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Address</label>
            <div>
                <input class="form-control" type="text form-control" name="address" placeholder="Nhập địa chỉ" value="{{$user->address}}">
            </div>
        </div>
        <div class="button">
            <input class="form-control submit" type="submit" value="Cập nhật">
        </div>
    </div> 
    {{Form::close()}}
</div>
@stop