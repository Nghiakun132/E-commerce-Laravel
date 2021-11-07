@extends('layout.app_backend')
@section('content')
@section('title', 'Chi tiết đơn hàng')
<style>
    body {
            background-image: url('../../../public/img/a.jpg');
        }
</style>
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Chi tiết đơn hàng
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($order_detail as $value2)
                    <tr>

                        <td>{{ $value2->product_id }}</td>
                        <td>{{ $value2->product_name }}</td>
                        <td>{{ number_format($value2->product_price, 0, ',', '.') . 'đ' }}</td>
                        <td>{{ $value2->product_qty }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
