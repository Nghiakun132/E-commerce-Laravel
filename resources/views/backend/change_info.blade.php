@extends('layout.app_backend')
@section('content')
@section('title', 'Xem thông tin')
<style>
    body {
        background-image: url('../../public/img/a.jpg');
    }

</style>
<div style="margin-top:36px">
</div>
<div class="content">
    <h3>Thông tin nhân viên</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title">Chỉnh sửa thông tin</h3>
                        <p class="card-category">Hoàn thành thông tin của bạn</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ URL::to('admin/change', $info->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="bmd-label-floating">Họ tên</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $info->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $info->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="bmd-label-floating">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $info->address }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="bmd-label-floating">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $info->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="bmd-label-floating">Phương châm</label>
                                        <textarea class="form-control" rows="2"
                                            name="slogan">{{ $info->slogan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                                        <input type="file" class="form-control" accept="image/*" id="customFile"
                                            name="avatar">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Cập nhật thông tin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img-fluid img-thumbnail" src="{{ url_file3($info->avatar) }}"
                                alt="{{ $info->name }}" >
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">
                            @if ($info->level == 0)
                                CEO

                            @elseif($info->level ==1)
                                Quản lý
                            @else
                                Nhân viên
                            @endif
                        </h6>
                        <h4 class="card-title">{{ $info->name }}</h4>
                        <p class="card-description">
                            {{ $info->slogan }}
                        </p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-primary btn-round">Thay đổi mật khẩu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $password_error = Session::get('password_error');
    if($password_error){
        echo '<script type="text/javascript">
        alert("'.$password_error.'");
        </script>';
        Session::put('password_error', null);
    }
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('admin/change-password', $info->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Mật khẩu cũ</label>
                        <input type="password" name="old_password" class="form-control">
                        <p class="text-danger">{{$errors->first('old_password')}}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" name="new_password" class="form-control">
                        <p class="text-danger">{{$errors->first('new_password')}}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" name="cf_new_password" class="form-control">
                        <p class="text-danger">{{$errors->first('cf_new_password')}}</p>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-round text-center">Cập
                        nhật</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@stop
