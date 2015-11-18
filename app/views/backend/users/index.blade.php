@extends('backend.layout.main')
@section('content')
<h1>All User</h1>
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-hover table-classroom">
                <thead>
                <tr>
                    <th class="text-center row-number">#</th>
                    <th width="200">Email</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th class="text-center" width="200">Thời gian cập nhật</th>
                    <th class="action" width="150">Action</th>

                </tr>
                </thead>
                <tbody>
                @if(count($users) > 0)
                    <?php $i=1; ?>
                    @foreach($users as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}.</td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{ $item->address }}
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td class="date">{{ e($item->updated_at) }}</td>
                            {{-- <td class="action">
                                    
                            </td> --}}
                            <td>
                            {{ link_to_route('admin.user.edit', 'Edit',array($item->id), array('class' => 'btn btn-info')) }}
                            </td>
                            <td>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.user.destroy', $item->id))) }}         {{ Form::submit('Delete', array('class'=> 'btn btn-danger delete-btn')) }}
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
