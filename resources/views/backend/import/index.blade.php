@extends('layout.app_backend')
@section('content')
<style>
    .heading{
        text-align: center;
    }
</style>
<h2 class="heading">Nhập hàng</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive-lg">
                    <table class="table table-hover table-secondary">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá nhập</th>
                            <th>Ngày nhập</th>
                            <th>Ngày xác nhận</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Người nhập hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($import as $value)
                        <tr>
                            <td>{{$value->ip_id}}</td>
                            <td>{{$value->pro_name}}</td>
                            <td>
                                <img src="{{url_file($value->pro_avatar)}}" class="img-thumbnail" width="80px" height="80px"alt=""></td>
                            <td>{{$value->ipd_product_qty}}</td>
                            <td>{{$value->ipd_price . 'đ'}}</td>
                            <td>{{$value->ip_created_at}}</td>
                            <td>{{$value->ip_confirmed}}</td>
                            <td>{{$value->ip_price_total . 'đ'}}</td>
                            <td>
                                @if ($value->ip_status == 0)
                                    <a href="{{URL::to('admin/import/change-status',$value->ip_id)}}"><span class="badge badge-danger">Chưa xác nhận</span></a>
                                @else
                                    <span class="badge badge-success">Đã xác nhận</span>
                                @endif
                            </td>
                            <td>{{$value->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

@stop
