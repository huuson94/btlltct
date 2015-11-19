<div class='errors-content'>
@if(Session::has('status') && Session::get('status') == false && Session::has('messages'))
    <div class="errors-message">
    @foreach(Session::get('messages') as $message)
    <p class="error-message">{{$message}}</p>
    @endforeach
    </div>
@elseif(Session::has('status') && Session::get('status') == true)
    @foreach(Session::get('messages') as $message)
    <p class="success-message">{{$message}}</p>
    @endforeach
@endif
</div>