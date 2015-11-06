@extends('frontend/layout/master')
@section('style-bot')
{{ HTML::style('public/assets/css/albums-images/view.css') }}
{{ HTML::style('public/assets/css/albums/view.css') }}
@stop
@section('script-bot')
{{ HTML::script('public/assets/js/albums/jquery-ui-1.10.3.custom.min.js') }}
{{ HTML::script('public/assets/js/albums/jquery.kinetic.min.js') }}
{{ HTML::script('public/assets/js/albums/jquery.mousewheel.min.js') }}
{{ HTML::script('public/assets/js/albums/jquery.smoothdivscroll-1.3-min.js') }}
{{ HTML::script('public/assets/js/albums-images/view.js') }}
{{ HTML::script('public/assets/js/albums/view.js') }}
@stop
@section('width_70per')
	width_70per
@stop
@section('title')
	Product 
@stop
@section('content')
    
	<div class="image_content row">
		<div class="image_left col-md-8">
			@foreach($product->images as $index => $image)
            <article>
                <img class="img-rounded image-view" src="{{url('public/'.$image->path)}}" alt="{{$product->title}}">

                <div class="detail_image_header">
                    <h2 class="detail_image_title">{{$image->title}}</h2>
                </div>
                <ul class="detail_image_info">
                    <li class="detail_image_info_date"><span >{{$image->updated_at}}</span></li>
                    
                </ul>
                <div class="photo_content">
                    <p>
                        <label class="caption">Caption: </label>
                       
                    </p>
                </div>
            </article>
            @endforeach
		</div>
		<div class="image_right col-md-4">
        <p><a href='{{ url('user/view-products/?product_id=').$product->id }}'><button class='btn btn-success'>Trao doi</button></a></p>
			<ul>
				<li>
					<p>ĐĂNG BỞI</p>
					<p>
                        <a href="#" class="user_name">{{$product->user->name}}</a>
                    </p>
                    <p>
                        SDT: <a href="#" class="user_name">{{$product->user->phone}}</a>
                    </p>
				</li>
				<li>
					<p>GIỚI THIỆU</p>
					<p>{{ $product['description'] }}</p>
				</li>
				<li>
					<p>CHUYÊN MỤC</p>
					<p>{{ $product->category->title}}</p>
				</li>
                
                
			</ul>
		</div>
	</div>

@stop
