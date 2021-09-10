@extends('layout.app_fronted')
@section('content')
@section('title','Thông tin tài khoản')
<section class="breadcrumb-section set-bg" data-setbg="./././public/img/breadcrumb.jpg" style="background-image: url(&quot;.././public/img/breadcrumb.jpg&quot;);">
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
        <h3>Thông tin</h3>
        <div class="col-lg-12 card mt-2 mb-2">
            <table class="table table-hover">
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    {{-- <th>Địa chỉ</th> --}}
                    <th>Số điện thoại</th>
                </tr>
                @foreach ($user as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    {{-- <td>
                        <select>
                            @foreach ($address as $address)
                            <option>{{$address->address}}</option>
                            @endforeach
                        </select>
                    </td> --}}
                    <td>{{$user->phone}}</td>
                </tr>
                @endforeach
            </table>
            <ul class="nav">
            <li class="nav-item mr-2"><a href="{{URL::to('update-tt')}}"><button class="btn btn-primary">Thay đổi thông tin</button></a></li>
            <li class="nav-item"><a href="{{URL::to('update-address')}}"><button class="btn btn-primary">Sổ địa chỉ</button></a></li>
        </ul>
        </div>
    </div>
</div>






@stop
