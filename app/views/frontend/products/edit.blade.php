@extends('frontend/layout/master')
@section('width_70per')
	width_70per
@stop
@section('title')
	{{ $product['title'] }}
@stop
@section('content')
	<div class="image_content">
		{{Form::open(array('method' => 'PATCH', 'route' => array('product.update', $product->id))) }}  
		<div class="image_left">
			<div class="top">
                <input spellcheck="false" title="click to edit" value="{{ $product['title'] }}" name="title">
{{--                 @if(Session::get('current_user')==$product->user['id'])
                @elseif(Session::has('my_user'))
					<div class="float_right">
                        <a href="{{url('exchange/create?id='.$product->id)}}" style="font-size: 18px;">Trao đổi</a>
					</div>
				@endif --}}
				<br>
				<span>{{$product->updated_at}}</span>
<!--				<span class="like"><i>d</i> <span>16</span></span>
				<span><i>h</i> 25</span>-->
			</div>
			<ul>
                @if($product->images->count() > 0)
				@foreach($product->images as $key => $img)
					<li>
						<img src="{{url($img['path'])}}" alt="">
					</li>
				@endforeach
                @else
                <li>
                <img src="{{Asset(BaseHelper::getDefaultProductImage())}}" alt="">
                </li>
                @endif
			</ul>
		</div>
        
		<div class="image_right">
			<ul>
				<li>
					<p class="title">ĐĂNG BỞI</p>
					<a href="#" class="user_name">{{ $product->user['account'] }}</a>
				</li>
				<li>
					<p class="title">GIỚI THIỆU</p>
					<textarea name="description" class="content">{{ $product['description'] }}</textarea>
				</li>
				<li>
					<p class="title">CHUYÊN MỤC</p>
					<p class="cate">{{ $product->category['title'] }}</p>
				</li>
                <li>
                    <p class="title">Công khai<p>
                        @if($product->public == 1)
                        <input type="checkbox" name="public" checked="true">
                        @else
                        <input type="checkbox" name="public">
                        @endif
                </li>
				<li class="btn">
					<button type="submit">Cập nhật</button>
				</li>
			</ul>
			{{ Form::close() }}
	        
	        {{Form::open(array('method' => 'DELETE', 'route' => array('product.destroy', $product->id))) }}         
	        {{ Form::submit('Xóa sản phẩm',['class' => 'delete-btn']) }}
	        {{ Form::close() }}
		</div>
	</div>
@stop
@section('script-bot')
	{{HTML::script('public/assets/js/frontend/products/edit.js')}}
@stop