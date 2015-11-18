@if(Session::has('signup_status'))
@if(Session::get('signup_status') == true)
<p class="alert-success">Signuped</p>
@elseif (Session::get('signup_status') == false || Session::has('errors_message'))
@foreach (Session::get('errors_message') as $error_message)
<p class="alert-danger">
    {{$error_message}}
</p>
@endforeach
@endif
@endif