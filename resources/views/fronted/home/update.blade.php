@extends('layout.app_fronted')
@section('content')
@section('title', 'Cập nhật thông tin')

<div class="container">
    <h2>Cập nhật thông tin</h2>
    <hr>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            @foreach ($user as $value)
            <form action="{{URL::to('update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" name="name" value="{{$value->name}}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$value->email}}">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="{{$value->address}}">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" value="{{$value->password}}">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="{{$value->phone}}">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
            </form>
            @endforeach
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
@stop
