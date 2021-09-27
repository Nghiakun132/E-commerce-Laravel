@extends('layout.app_backend')
@section('content')
@section('title', 'Xem thông tin')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form action="{{URL::to('admin/change',$info->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" name="name" class="form-control" value="{{$info->name}}" aria-describedby="helpId">
                    @if ($errors->first('name'))
                        <small id="helpId" class="text-danger">{{$errors->first('name')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$info->email}}" aria-describedby="helpId">
                    @if ($errors->first('email'))
                        <small id="helpId" class="text-danger">{{$errors->first('email')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" value="{{$info->password}}" aria-describedby="helpId">
                    @if ($errors->first('password'))
                        <small id="helpId" class="text-danger ">{{$errors->first('password')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="{{$info->address}}" aria-describedby="helpId">
                    @if ($errors->first('address'))
                        <small id="helpId" class="text-danger">{{$errors->first('address')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{$info->phone}}" aria-describedby="helpId">
                    @if ($errors->first('phone'))
                        <small id="helpId" class="text-danger">{{$errors->first('phone')}}</small>
                    @endif
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="avatar">
                    <label for="customFile" class="custom-file-label">Chọn ảnh từ máy tính</label>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Xử lý</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>

@stop
