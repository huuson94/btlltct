@if($product)
<article>
    <a href="{{url('product/'.$product['id'])}}">
        @if($product->images->count() >0)
        <img src="{{url($product->images->first()->path)}}" alt="">
        @else
        <img src="{{Asset(BaseHelper::getDefaultProductImage())}}" alt="">
        @endif
    </a>
    <div class="photo_content">
        <a href="{{url('product/'.$product['id'])}}"><p class="title">{{ $product['title'] }}</p></a>
        <p class="user_by">{{ $product->user['account'] }}</p>
<!--        <div class="view">
            <span class="like"><i>d</i> <span>16</span></span>
            <span><i>h</i> 8000</span>
        </div>-->
    </div>
</article>
@endif
