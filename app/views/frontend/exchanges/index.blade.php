@extends('frontend/layout/master')
@section('title')
	Lời mời trao đổi
@stop
@section('script-bot')
	{{HTML::script('public/assets/js/frontend/exchanges/index.js')}}
@stop
@section('category')
	<span class="category">Hedspi-Exchange</span>
@stop
@section('content')
	<div class="container">
		<ul>
		@foreach( $exchanges as $key => $exchange)
			<li class="item">
				@include('frontend/exchanges/_exchange', array('exchange',$exchange))
			</li>
		@endforeach
		</ul>
	</div>
@stop
