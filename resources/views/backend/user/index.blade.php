@extends('layout.app_backend')
@section('content')
@section('title', 'Danh sách thành viên')
<style>
    body {
        background-color: rgba(217, 182, 228, 0.432);
    }
    .heading{
        font-size: 44px;
        text-shadow: 1px 1px 0px rgb(155, 229, 155);
        animation: nhapnhay 1.2s linear infinite;
        text-align: center;
    }
    @keyframes nhapnhay{
        from { color: red; }
        to { color: green; }
    }
</style>
<h2 class="heading">Danh sách thành viên</h2>
    <table class="table table-hover table-secondary">
        <thead class="text-danger">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            {{-- <th>Địa chỉ</th> --}}
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($user as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                {{-- <td>{{ $value->address }}</td> --}}
                <td>{{ $value->phone }}</td>
                <td>
                    @if( $value->status == 0)
                        <a  title="Tài khoản hoạt động"  href="{{URL::to('admin/user/change-status-user',$value->id)}}"><i  class="fa fa-thumbs-up ml-2 text-success" style="font-size:23px" aria-hidden="true"></i></a>
                    @else
                        <a title="Tài khoản bị khóa"  href="{{URL::to('admin/user/change-status-user',$value->id)}}"><i class="fa fa-thumbs-down text-danger" style="font-size:23px"  aria-hidden="true"></i></a>
                    @endif
                </td>
                <td>
                    <a href="{{ URL::to('admin/user/detail/' . $value->id) }}" ><i style="font-size:23px;margin:4px" class="fa fa-address-book mr-2 text-success"
                            aria-hidden="true"></i></a>
                    <a href="{{ URL::to('admin/user/delete/' . $value->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không')"><i style="font-size:23px;margin:4px" class="fa fa-trash text-danger"
                            aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
