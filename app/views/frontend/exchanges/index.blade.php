@extends('frontend/layout/master')
@section('title')
	Lời mời trao đổi
@stop
@section('script-bot')
	{{HTML::script('public/assets/js/frontend/exchanges/index.js')}}
@stop
@section('width_70per')
	width_70per
@stop

@section('category')
	<span class="category">Hedspi-Exchange</span>
@stop
@section('content')
	<div class="container">
		<div class="exchange_content request">
			<div class="pop-up-exchange">
				<div class="wrapper">
					<h4>Chọn vật phẩm bạn muốn đổi</h4>
					<ul>
                        @foreach($exchanges as $exchange)
						<li>
                        	<div class="title"><p>{{$exchange->sProduct->title}}</p></div>
                            <div class="img">
								<img src="{{url($exchange->sProduct->images->first()->path)}}" alt="">
							</div>
							<div class="send_p">
								<div>
									<p>Người gửi :</p>
									<p>{{$exchange->sProduct->user->name}}</p>
								</div>
							</div>
							<div class="accept">
								<div>
									<button>Đồng ý</button>
									<button>Xóa</button>
								</div>
							</div>
                        </li>
                        @endforeach
					</ul>
					<div class="submit"><button>Xác nhận</button></div>
				</div>
			</div>
			
		</div>
	</div>
@stop
