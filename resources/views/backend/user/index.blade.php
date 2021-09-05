@extends('layout.app_backend')
@section('content')
@section('title', 'Danh sách thành viên')
<div class="row">
<div class="col-lg-6">
<h3>Danh sách thành viên</h3>
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Action</th>
    </tr>
    @foreach ($user as $value )
    <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->address}}</td>
        <td>{{$value->phone}}</td>
    <td><a href="{{URL::to('admin/user/delete/'.$value->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>
    @endforeach
</table></div>
<div class="col-lg-6">
<h3>Danh sách khách không đăng ký tài khoản</h3>
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Action</th>
    </tr>
    @foreach ($no_user as $value2 )
    <tr>
        <td>{{$value2->id}}</td>
        <td>{{$value2->s_name}}</td>
        <td>{{$value2->s_email}}</td>
        <td>{{$value2->s_address}}</td>
        <td>{{$value2->s_phone}}</td>
    <td><a href="{{URL::to('admin/user/delete-shipping/'.$value2->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

    </tr>
    @endforeach
</table>
</div>
</div>
@stop
