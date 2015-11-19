@extends('frontend/layout/master')
@section('width_70per')
	width_70per
@stop
@section('title')
	Trao đổi sản phẩm
@stop
@section('content')
	<div class="exchange_content">
		<div class="pop-up-exchange">
            <form action="{{url('exchange')}}" method="POST">
			<div class="wrapper">
				<h4>Chọn vật phẩm bạn muốn đổi</h4>
				<ul>
                    @foreach($products as $index => $product)
					<li>
                        @if($index == 0)
                        <input class="float_left" type="radio" name="s_product_id" value="{{$product->id}}" checked="true">
                        @else
                        <input class="float_left" type="radio" name="s_product_id" value="{{$product->id}}">
                        @endif
                        
						<div class="img">
                            @if(is_null($product->images))
							<img src="{{url($product->images->first()->path)}}" alt="">
                            @else
                            <img src="{{Asset(BaseHelper::getDefaultProductImage())}}" alt="">
                            @endif
						</div>
						<div class="title"><p>{{$product->title}}</p></div>
					</li>
                    @endforeach
				</ul>
				<div class="submit"><button type="submit">Xác nhận</button></div>
			</div>
            </form>
		</div>
		
	</div>
@stop
@section('script-bot')
@stop