@extends('layout.app_backend')
@section('content')
<h3>Mã giảm giá</h3>
<div class="container-fluid">
<a href="{{URL::to('admin/coupon/add-coupon')}}"><button class="btn btn-primary">Thêm mã giảm giá</button></a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mã</th>
            <th>Số lượng</th>
            <th>Giảm</th>
            <th>Thời gian</th>
        </tr>
        @foreach ($coupon as $cp)
        <tr>
            <td>{{$cp->cp_id}}</td>
            <td>{{$cp->cp_name}}</td>
            <td>{{$cp->cp_code}}</td>
            <td>{{$cp->cp_qty}}</td>
            <td>{{($cp->cp_condition*100) .'%'}}</td>
            <td>{{$cp->cp_time}}</td>
        </tr>
        @endforeach
    </table>
</div>
@stop
