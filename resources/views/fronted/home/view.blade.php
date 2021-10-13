@extends('layout.app_fronted')
@section('content')
@section('title', 'Thông tin tài khoản')
<section class="breadcrumb-section set-bg" data-setbg="./././public/img/breadcrumb.jpg"
    style="background-image: url(&quot;.././public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thông tin tài khoản</h2>
                    <div class="breadcrumb__option">
                        <a href="http://localhost/nienluancoso">Trang chủ</a>
                        <span>Thông tin tài khoản</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        {{-- <h3>Thông tin</h3>
        <div class="col-lg-12 mt-2 mb-2">
            <div class="card">
                <table class="table table-hover">
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                    </tr>
                    @foreach ($user as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div> --}}
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card mt-2 mb-2">
                <div class="img_avatar text-center">
                    <img src="{{ url_file2($user->avatar) }}" class="rounded-circle" width="200px" height="200px"
                        alt="">
                </div>
                <div class="info">
                    <h4 class="text-center">{{$user->name}}</h4>
                    <h5 class="text-center">{{$user->email}}</h5>
                    <h5 class="text-center">{{$user->phone}}</h5>
                </div>
                <div>
                    <ul class="nav m-2">
                        <li class="nav-item mr-2"><a href="#" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary">Thay đổi thông tin</button></a></li>
                        <li class="nav-item mr-2"><a href="{{URL::to('update-address')}}"><button class="btn btn-primary">Sổ địa chỉ</button></a></li>
                        <li class="nav-item"><a href="{{URL::to('update-password')}}" data-toggle="modal" data-target="#myModal2"><button class="btn btn-primary">Thay đổi mật khẩu</button></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật thông tin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="avatar">
                        <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mt-2">Cập nhật</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật mật khẩu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('update-password') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" value="{{ $user->password }}">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mt-2">Cập nhật</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@stop
