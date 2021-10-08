@extends('layout.app_backend')
@section('content')
@section('title', 'Xem thông tin')
<style>
    body{
            background-image: url('../../public/img/a.jpg');
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('public/img/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <img class="avatar border-gray" src="{{ url_file3($info->avatar) }}"
                                alt="{{ $info->name }}">
                            <h5 class="title">{{ $info->name }}</h5>
                            <p class="description">
                                {{ $info->email }}
                            </p>
                        </div>
                        <p class="description text-center">
                            " {{ $info->slogan }} "
                        </p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-6 ml-auto">
                                    <h5>{{ $count_imported }}<br><small>Phiếu nhập hàng</small></h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5>{{ $count_order }}<br><small>Đơn hàng đã xác nhận</small></h5>
                                </div>
                                <div class="col-lg-4 mr-auto">
                                    <h5>{{ $count_total }}<br><small>Kiếm được</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thành viên trong nhóm</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            @foreach ($team as $team)
                                <li>
                                    <div class="row">
                                        <div class="col-md-2 col-2">
                                            <div class="avatar">
                                                <img src="{{ url_file3($team->avatar) }}" alt="Circle Image"
                                                    class="img-circle img-no-padding img-thumbnail img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            {{ $team->name }}
                                            <br />
                                            <span class="text-muted"><small>Offline</small></span>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                    class="fa fa-envelope"></i></button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa thông tin</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ URL::to('admin/change', $info->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $info->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $info->phone }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $info->email }}"
                                            name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" value="{{ $info->address }}"
                                            name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Phương châm</label>
                                        <textarea class="form-control textarea"
                                            name="slogan">{{ $info->slogan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" id="customFile"
                                            name="avatar">
                                        <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto mt-2">
                                    <button type="submit" class="btn btn-primary btn-round">Cập nhật</button>
                                </div>
                                <div class="update ml-auto mr-auto mt-2">
                                    <a href="" data-toggle="modal" data-target="#myModal"
                                        class="btn btn-primary btn-round">Thay đổi mật khẩu </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thay đổi mật khẩu </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('admin/change-password', $info->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" id="new" name="new_password" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" id="submit" class="btn btn-primary btn-round text-center">Cập
                                nhật</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop
