@extends('layout.app_fronted')
@section('content')
@section('title','Mã giảm giá')

<section class="breadcrumb-section set-bg" data-setbg="././public/img/breadcrumb.jpg" style="background-image: url(&quot;././public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="http://localhost/nienluancoso">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <table class="table table-hover table-secondary">
                <thead class="table-danger">
                    <tr>
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Giảm</th>
                        <th>Thời hạn</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                @foreach ($coupon as $cp)
                <tr>
                    <td>{{$cp->cp_id}}</td>
                    <td>{{$cp->cp_code}}</td>
                    <td>{{$cp->cp_value * 100 . '%' }}</td>
                    <td>{{$cp->cp_expiry}}</td>
                    <td>
                        @if($cp->cp_status==0)
                            Chưa sử dụng
                        @else
                            Đã sử dụng
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@stop
