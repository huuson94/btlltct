@if(Session::has('signup_status'))
@if(Session::get('signup_status') == true)
<p class="alert-success">Signuped</p>
@elseif (Session::get('signup_status') == false || Session::has('messages'))
@foreach (Session::get('messages') as $error_message)
<p class="alert-danger">
    {{$error_message}}
</p>
@endforeach
@endif
@endif