@extends('backend.layout.main')
@section('content')
<h1>All Product</h1>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-hover table-classroom">
                <thead>
                <tr>
                    <th class="text-center row-number">#</th>
                    <th width="200">Title</th>
                    <th width="200">Image</th>
                    <th width="200">User</th>
                    <th width="200">Category</th>
                    <th width="200">Location</th>
                    <th width="200">Public</th>
                    <th>Description</th>
                    <th class="text-center" width="200">Thời gian cập nhật</th>
                    <th class="action" width="150">Action</th>

                </tr>
                </thead>
                <tbody>
                @if(count($products) > 0)
                       <?php $i = 1; ?>
                    @foreach($products as $item)
                    
                        <tr>
                            <td class="text-center">{{ $i++ }}.</td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td>
                                
                                @if(!is_null($item->images)))
                                <img src="{{url($item->images->first()->path)}}" alt="">
                                @else
                                <img src="{{Asset(BaseHelper::getDefaultProductImage())}}" alt="">
                                @endif
                            </td>
                            <td>
                                {{ $item->user->name }}
                            </td>
                            <td>
                                {{ $item->category->title }}
                            </td>
                            <td>
                                {{ $item->location->name }}
                            </td>
                            <td>
                                {{ $item->public }}
                            </td>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td class="date">{{ $item->updated_at }}</td>
                            <td>
                            {{ link_to_route('admin.product.edit', 'Edit',array($item->id), array('class' => 'btn btn-info')) }}
                            </td>
                            <td>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.product.destroy', $item->id))) }}         {{ Form::submit('Delete', array('class'=> 'btn btn-danger delete-btn')) }}
                            {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            Data empty
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="box-tools">
                <div class="col-md-9 text-right">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".delete-btn").click(function(e){
                
                if(confirm("Bạn có muốn xóa không?")){

                }else{
                    e.preventDefault();
                }
            });
        });
    </script>
@stop
