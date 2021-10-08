@extends('layout.app_backend')
@section('content')
@section('title', 'Chi tiết đơn hàng')
<style>
    body {
            background-image: url('../../../public/img/a.jpg');
        }
</style>
<h2>Chi tiết đơn hàng</h2>
<br>
<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8 card bg-secondary">
        <h3>Thông tin đơn hàng</h3>
        <table class="table table-hover">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
            @foreach ($order_detail as $value2)
                <tr>

                    <td>{{ $value2->product_id }}</td>
                    <td>{{ $value2->product_name }}</td>
                    <td>{{ number_format($value2->product_price, 0, ',', '.') . 'đ' }}</td>
                    <td>{{ $value2->product_qty }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-lg-2">
    </div>

@stop
