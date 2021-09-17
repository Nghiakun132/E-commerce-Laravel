@extends('layout.app_backend')
@section('content')
@section('title', 'Danh sách thành viên')

<h3>Danh sách thành viên</h3>
<div class="card">
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            {{-- <th>Địa chỉ</th> --}}
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
        @foreach ($user as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                {{-- <td>{{ $value->address }}</td> --}}
                <td>{{ $value->phone }}</td>
                <td>
                    @if( $value->status == 0)
                        <a  title="Tài khoản hoạt động"  href="{{URL::to('admin/user/change-status-user',$value->id)}}"><i class="fa fa-thumbs-up ml-2 text-success" style="font-size:21px" aria-hidden="true"></i></a>
                    @else
                        <a title="Tài khoản bị khóa"  href="{{URL::to('admin/user/change-status-user',$value->id)}}"><i class="fa fa-thumbs-down text-danger" style="font-size:21px"  aria-hidden="true"></i></a>
                    @endif
                </td>
                <td>
                    <a href="{{ URL::to('admin/user/detail/' . $value->id) }}" ><i class="fa fa-address-book mr-2 text-success"
                            aria-hidden="true"></i></a>
                    <a href="{{ URL::to('admin/user/delete/' . $value->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không')"><i class="fa fa-trash text-danger"
                            aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@stop
