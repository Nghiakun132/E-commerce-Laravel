@extends('layout.app_backend')
@section('content')
@section('title','Quản lý nhân viên')
<style>
    body{
        background-color: rgba(236, 196, 240, 0.692);
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>Thông tin nhân viên</h2>
                <table class="table table-hover table-secondary">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>
                                Chức vụ
                            </th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->email }}</td>
                                <td>@if ($value->status == 0)
                                    Đang làm
                                @elseif ($value->status == 1)
                                    Nghỉ việc
                                @endif</td>
                                <td>
                                    @if ($value->level == 0)
                                        <span class="badge badge-pill badge-success">Giám đốc</span>
                                    @elseif ($value->level == 1)
                                            @if ($staff2->level == 0)
                                                <a href="{{URL::to('admin/staff/promotion',$value->id)}}" title="Giáng chức cho nhân viên" onclick="return confirm('Bạn có chắc muốn giáng chức nhân viên này không ?')"><span class="badge badge-pill badge-warning b">Quản lý</span></a>
                                            @else
                                                <span class="badge badge-pill badge-warning">Quản lý</span>
                                            @endif
                                    @else
                                        @if ($staff2->level == 0)
                                            <a href="{{URL::to('admin/staff/promotion',$value->id)}}" title="Thăng chức cho nhân viên" onclick="return confirm('Bạn có chắc muốn thăng chức nhân viên này không')"><span class="badge badge-pill badge-danger">Nhân viên</span></a>
                                        @else
                                            <span class="badge badge-pill badge-danger">Nhân viên</span>
                                        @endif
                                    @endif

                                </td>
                                <td>
                                    @if ($staff2->level == 0)
                                        @if ($value->level != 0)
                                        <a href="{{URL::to('admin/staff/delete-account',$value->id)}}" onclick="return confirm('Bạn có chắc muốn xóa không')"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                        @endif
                                    @else
                                        <a href="" title="Bạn không có đặc quyền"><button class="btn btn-danger" disabled="disabled">Xóa</button></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($staff2->level == 0)
                    <a href="{{URL::to('admin/staff/add-staff')}}" title="Thêm tài khoản nhân viên"><button class="btn btn-primary">Thêm tài khoản</button></a>
                @else
                    <a href="#" title="Bạn không có đặc quyền"><button class="btn btn-danger" disabled="disabled">Thêm tài khoản</button></a>
                @endif
                </div>

            <div class="col-lg-2 col-sm-12"></div>
        </div>
    </div>
@stop
