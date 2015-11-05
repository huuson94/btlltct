@if($product)
<li class="item-image album">
	
    <article>
        
        <a href='{{Asset('product/view/'.$product->id)}}'>
            <img src="" alt="{{$product->name}}">
        </a>
        <div class="photo_content">
            
                <p class="title">Title: {{$product->title}}</p>
                <p class="user_by">{{$product->user->name}}</p>
                <a href='{{ url('product/view/'.$product->id) }}'><img src='{{ url('public/'.$product->images->first()->path) }}'></a>	
        </div>
       		
    </article>
    
</li>
@endif