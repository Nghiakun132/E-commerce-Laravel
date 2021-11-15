@extends('layout.app_fronted')
@section('content')
@section('title', 'Kiểm tra đơn hàng')
<section class="breadcrumb-section set-bg" data-setbg=".././public/img/breadcrumb.jpg"
    style="background-image: url(&quot;.././public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Kiểm tra chi tiết đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="http://localhost/nienluancoso">Trang chủ</a>
                        <span>chi tiết đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <h3>Chi tiết đơn hàng</h3>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                @foreach ($order as $order)
                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td align="center"><img src="{{ url_file($order->pro_avatar) }}" class="img-thumbnail" width="200px"
                                height="100px"></td>
                        <td>{{ number_format($order->product_price, 0, ',', '.') . 'đ' }}</td>
                        <td>{{ $order->product_qty }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@stop
