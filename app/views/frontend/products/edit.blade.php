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
                <input value="{{ $product['title'] }}" name="title">
                @if(Session::get('current_user')==$product->user['id'])
                @elseif(Session::has('my_user'))
					<div class="float_right">
                        <a href="{{url('exchange/create?id='.$product->id)}}" style="font-size: 18px;">Trao đổi</a>
					</div>
				@endif
			</div>
			<ul>
				@foreach($product->images as $key => $img)
					<li>
						<img src="{{url($img['path'])}}" alt="">
					</li>
				@endforeach
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
			</ul>
            <div class="float_left">
                <button type="submit">Cập nhật sản phẩm</button>
            </div>
		</div>
		{{ Form::close() }}
        
        {{Form::open(array('method' => 'DELETE', 'route' => array('product.destroy', $product->id))) }}         
        {{ Form::submit('Xóa sản phẩm') }}
        {{ Form::close() }}
	</div>
@stop
@section('script-bot')
	<script type="text/javascript">
		
		$(window).ready(function(){

//			/
			//End Delete Post

			$('#edit').on('click',function(e){
				e.preventDefault();
					
				$('.image_left .top div.float_right')
					.append('<a href="#" id="save_edit">Lưu</a>')
					.append('<a href="#" id="cancle">Hủy</a>');
				function edit(selector,name){
					$(selector).each(function(){
						var content=$(this).html();
						var addInput='<input class="edit" type="text" name="'+name+'" spellcheck="false" value="'+content+'" placeholder="Nhập nội dung">';
						$(this).html('').html(addInput);
					})
					
				}

				edit('.image_left h1','title');
				edit('.image_right li>p.content','description');
			})

		})
		
	</script>
@stop