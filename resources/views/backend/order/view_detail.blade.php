@extends('layout.app_backend')
@section('content')
@section('title', 'Chi tiết đơn hàng')
<h2>Chi tiết đơn hàng</h2>
<br>
<div class="row">
    <div class="col-lg-6 card">
        <h3>Thông tin người mua</h3>
        <table class="table table-hover">
            <tr>
                <th>Tên</th>
                <th>Số điện thoại</th>
            </tr>
            @foreach ($order_detail as $value)
            @if($loop->last)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->phone}}</td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    <div class="col-lg-6 card">
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

                <td>{{$value2->product_id}}</td>
                <td>{{$value2->product_name}}</td>
                <td>{{number_format(($value2->product_price),0,',','.').'đ'}}</td>
                <td>{{$value2->product_qty}}</td>
            </tr>
            @endforeach
        </table>
    </div>


@stop
