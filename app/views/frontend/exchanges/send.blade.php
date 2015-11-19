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
					<h4>Vật phẩm gửi yêu cầu đổi</h4>
                    <ul>
                        @foreach($exchanges as $exchange)
                        {{Form::open(array('method' => 'PATCH', 'route' => array('exchange.update', $exchange->id))) }}  
						<li>
                            <div class="request_product my_product">
	                            <div class="img">
                                    @if($exchange->sProduct->images)
									<img src="{{url($exchange->sProduct->images->first()->path)}}" alt="">
                                    @else
                                    <img src="{{url(BaseHelper::getDefaultProductImage())}}" alt="">
                                    @endif
								</div>
								<div class="title">
                                    <p>Bạn muốn trao đổi:</p>
									<p><strong>{{$exchange->sProduct->title}}</strong></p>
                                    <p>với</p>
								</div>
							</div>
							<div class="my_product">
	                            <div class="img">
                                    @if($exchange->rProduct->images)
									<img src="{{url($exchange->rProduct->images->first()->path)}}" alt="">
                                    @else
                                    <img src="{{url(BaseHelper::getDefaultProductImage())}}" alt="">
                                    @endif
								</div>
								<div class="title">
                                    <p><strong>{{$exchange->rProduct->title}}</strong></p>
								</div>
							</div>
							
							<div class="accept">
								<div>
                                    @if($exchange->status == 1)
									<input type='submit' name='action' value='Đã chấp nhận' disabled="true">>
                                    @elseif($exchange->status == -1)
                                    <input type='submit' name='action' value='Không được chấp nhận' disabled="true">
                                    @elseif($exchange->status == 0)
                                    <input type='submit' name='action' value='Đang chờ' disabled="true">
                                    @endif
									
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
