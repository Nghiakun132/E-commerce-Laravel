@extends('layout.app_backend')
@section('content')
@section('title','Quản lý nhân viên')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>Thông tin nhân viên</h2>
                <table class="table table-hover">
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
                                        Giám đốc
                                    @elseif ($value->level == 1)
                                        Quản lý
                                    @else
                                        Nhân viên
                                    @endif

                                </td>
                                <td>
                                    @if ($staff2->level == 0)
                                        <a href=""><button class="btn btn-danger">Xóa</button></a>
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
