@extends('layout.app_backend')
@section('content')
@section('title', 'Thêm tài khoản')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h2>Thêm tài khoản nhân viên</h2>
            <div class="card ">
                <form action="{{ URL::to('admin/staff/add-account') }}" method="POST" class="m-2">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control" placeholder="">
                        @if ($errors->first('name'))
                            <small class="form-text text-danger"> {{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="">
                        @if ($errors->first('email'))
                            <small class="form-text text-danger"> {{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="">
                        @if ($errors->first('password'))
                            <small class="form-text text-danger"> {{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" placeholder="">
                        @if ($errors->first('address'))
                            <small class="form-text text-danger"> {{ $errors->first('address') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
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
        </div>
    </div>
    <div class="col-lg-4"></div>
</div>
</div>
@stop
