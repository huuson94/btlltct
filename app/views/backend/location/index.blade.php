@extends('backend.layout.main')
@section('content')
<h1>All Location</h1>
    <div class="box box-primary">
        <div class="box-body">
        <h2 class="">
                <a class="btn btn-primary pull-right btn-xs" href="{{ route('admin.location.create') }}">Thêm mới</a>
        </h2>
            <table class="table table-hover table-classroom">
                <thead>
                <tr>
                    <th class="text-center row-number">#</th>
                    <th width="200">Name</th>
                    <th width="200">Location parent</th>
                    <th class="text-center" width="200">Thời gian cập nhật</th>
                    <th class="action" width="150">Action</th>

                </tr>
                </thead>
                <tbody>
                @if(count($locations) > 0)
                        <?php $i = 1; ?>
                    @foreach($locations as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}.</td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                @if ($item->parent)
                                    {{ $item->parent->name }}
                                @endif
                               
                            </td>
                            <td class="date">{{ e($item->updated_at) }}</td>
                            <td>
                            {{ link_to_route('admin.location.edit', 'Edit',array($item->id), array('class' => 'btn btn-info')) }}
                            </td>
                            <td>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.location.destroy', $item->id))) }}         {{ Form::submit('Delete', array('class'=> 'btn btn-danger delete-btn')) }}
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
                    {{$locations->links()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".delete-btn").click(function(e){
                
                if(confirm("Xoa khong?")){

                }else{
                    e.preventDefault();
                }
            });
        });
    </script>
@stop
