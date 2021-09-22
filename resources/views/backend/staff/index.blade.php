@extends('layout.app_backend')
@section('content')
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
                            <th>
                                Chức vụ
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    @if ($value->status == 0)
                                        Giám đốc
                                    @elseif ($value->status == 1)
                                        Quản lý
                                    @else
                                        Nhân viên
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-2 col-sm-12"></div>
        </div>
    </div>
@stop
