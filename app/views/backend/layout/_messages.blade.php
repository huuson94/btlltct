@if(Session::has('messages') && Session::get('status') === false)
@foreach(Session::get('messages') as $key => $errors)
@foreach($errors as $error)
{{ $error }}
@endforeach
@endforeach
@endif