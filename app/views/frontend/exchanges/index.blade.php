@extends('frontend/layout/master')
@section('title')
	Lời mời trao đổi
@stop
@section('script-bot')
	{{HTML::script('public/assets/js/frontend/exchanges/index.js')}}
@stop
@section('content')
	<div class="container">
		<div class="exchange_content request">
			<div class="pop-up-exchange">
				<div class="wrapper">
					<h4>Vật phẩm được yêu cầu đổi</h4>
                    <ul>
                        @foreach($exchanges as $exchange)
                        {{Form::open(array('method' => 'PATCH', 'route' => array('exchange.update', $exchange->id))) }}  
						<li>
							<div class="my_product">
	                            <div class="img">
									<img src="{{url('public/assets/images/test.jpg')}}" alt="">
								</div>
								<div class="title">
									<p><strong>Vật phẩm của bạn:</strong></p>
									<p>Bàn ghế nhựa</p>
								</div>
							</div>
							<div class="request_product my_product">
	                            <div class="img">
                                    @if($exchange->sProduct->images)
									<img src="{{url($exchange->sProduct->images->first()->path)}}" alt="">
                                    @else
                                    <img src="{{url(BaseHelper::getDefaultProductImage())}}" alt="">
                                    @endif
								</div>
								<div class="title">

									<p><strong>{{$exchange->sProduct->user->name}} muốn trao đổi:</strong></p>
									<p>{{$exchange->sProduct->title}}</p>
								</div>
							</div>
							<div class="accept">
								<div>
									<input type='submit' name='action' value='Đồng ý'>
									<input type='submit' name='action' value='Xóa'>
								</div>
							</div>
                        </li>
                        {{Form::close()}}
                        @endforeach
					</ul>
                    <div class="submit"><a href='{{url('/')}}'><button>Quay về màn hình chính</button></a></div>
				</div>
			</div>
			
		</div>
	</div>
@stop
