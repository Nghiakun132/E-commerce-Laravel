@extends('layout.app_backend')
@section('content')
@section('title','Quản lý nhân viên')
<style>
    body{
        background-color: rgba(236, 196, 240, 0.692);
    }
    .add-add{
        float: right;
    }
</style>
<div class="container-fluid">
    <h2>Quản lý nhân viên</h2>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Quản lý nhân viên
                @if($staff2->level == 0)
                    <a href="{{URL::to('admin/staff/add-staff')}}" class="add-add" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Thêm tài khoản nhân viên"><button class="btn btn-primary">Thêm tài khoản</button></a>
                @else
                    <a href="#" title="Bạn không có đặc quyền" class="add-add"><button class="btn btn-danger" disabled="disabled">Thêm tài khoản</button></a>
                @endif
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead class="table-success">
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
                <tfoot>
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
                </tfoot>
                <tbody>
                    @foreach ($staff as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->email }}</td>
                        <td>@if ($value->status == 1)
                            Đang online
                        @elseif ($value->status == 0)
                            Đang offline
                        @endif</td>
                        <td>
                            @if ($value->level == 0)
                                <span class="badge rounded-pill bg-success">CEO</span>
                            @elseif ($value->level == 1)
                                    @if ($staff2->level == 0)
                                        <a href="{{URL::to('admin/staff/promotion',$value->id)}}" title="Giáng chức cho nhân viên" onclick="return confirm('Bạn có chắc muốn giáng chức nhân viên này không ?')"><span class="badge rounded-pill bg-warning b">Quản lý</span></a>
                                    @else
                                        <span class="badge rounded-pill bg-warning">Quản lý</span>
                                    @endif
                            @else
                                @if ($staff2->level == 0)
                                    <a href="{{URL::to('admin/staff/promotion',$value->id)}}" title="Thăng chức cho nhân viên" onclick="return confirm('Bạn có chắc muốn thăng chức nhân viên này không')"><span class="badge rounded-pill bg-danger">Nhân viên</span></a>
                                @else
                                    <span class="badge rounded-pill bg-danger">Nhân viên</span>
                                @endif
                            @endif

                        </td>
                        <td>
                            @if ($staff2->level == 0)
                                @if ($value->level != 0)
                                <a href="{{URL::to('admin/staff/delete-account',$value->id)}}" onclick="return confirm('Bạn có chắc muốn xóa không')"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                @endif
                            {{-- @else
                                <a href="" title="Bạn không có đặc quyền"><button class="btn btn-danger" disabled="disabled">Xóa</button></a> --}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ URL::to('admin/staff/add-account') }}" method="POST" class="m-2">
                @csrf
                <div class="mb-3">
                    <label for="">Tên</label>
                    <input type="text" name="name" class="form-control" placeholder="">
                    @if ($errors->first('name'))
                        <small class="form-text text-danger"> {{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="">
                    @if ($errors->first('email'))
                        <small class="form-text text-danger"> {{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="">
                    @if ($errors->first('password'))
                        <small class="form-text text-danger"> {{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="">
                    @if ($errors->first('address'))
                        <small class="form-text text-danger"> {{ $errors->first('address') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="">
                    @if ($errors->first('phone'))
                        <small class="form-text text-danger"> {{ $errors->first('phone') }}</small>
                    @endif
                </div>
                {{-- <input type="submit"class="btn btn-primary mb-2" value="Thêm"> --}}
                <button type="submit" class="btn btn-primary">Xử lý</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    {{-- <div class="container-fluid">
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
    </div> --}}
@stop
