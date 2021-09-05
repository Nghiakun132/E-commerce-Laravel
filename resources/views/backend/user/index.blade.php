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
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Action</th>
        </tr>
        @foreach ($user as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->phone }}</td>
                <td><a href="{{ URL::to('admin/user/delete/' . $value->id) }}"><i class="fa fa-trash"
                            aria-hidden="true"></i></a></td>
            </tr>
        @endforeach
    </table>
</div>
@stop
