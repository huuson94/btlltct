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
		{{-- <ul>
		@foreach( $exchanges as $key => $exchange)
			<li class="item">
				@include('frontend/exchanges/_exchange', array('exchange',$exchange))
			</li>
		@endforeach
		</ul> --}}
		<div class="exchange_content request">
			<div class="pop-up-exchange">
				<div class="wrapper">
					<h4>Chọn vật phẩm bạn muốn đổi</h4>
					<ul>
						<li>
							<div class="title"><p>Bán xe máy chất lượng tàu</p></div>
							<div class="img">
								<img src="{{url('public/assets/images/test.jpg')}}" alt="">
							</div>
							<div class="send_p">
								<div>
									<p>Người gửi :</p>
									<p>Trần Bảo Huy</p>
								</div>
							</div>
							<div class="accept">
								<div>
									<button>Đồng ý</button>
									<button>Xóa</button>
								</div>
							</div>
						</li>
						<li>
							<div class="title"><p>Bán xe máy chất lượng tàu</p></div>
							<div class="img">
								<img src="{{url('public/assets/images/test.jpg')}}" alt="">
							</div>
							<div class="send_p">
								<div>
									<p>Người gửi :</p>
									<p>Trần Bảo Huy</p>
								</div>
							</div>
							<div class="accept">
								<div>
									<button>Đồng ý</button>
									<button>Xóa</button>
								</div>
							</div>
						</li>
						<li>
							<div class="title"><p>Bán xe máy chất lượng tàu</p></div>
							<div class="img">
								<img src="{{url('public/assets/images/test.jpg')}}" alt="">
							</div>
							<div class="send_p">
								<div>
									<p>Người gửi :</p>
									<p>Trần Bảo Huy</p>
								</div>
							</div>
							<div class="accept">
								<div>
									<button>Đồng ý</button>
									<button>Xóa</button>
								</div>
							</div>
						</li>
					</ul>
					<div class="submit"><button>Xác nhận</button></div>
				</div>
			</div>
			
		</div>
	</div>
@stop
