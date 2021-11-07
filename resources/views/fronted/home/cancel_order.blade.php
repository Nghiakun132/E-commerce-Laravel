@extends('layout.app_fronted')
@section('content')
@section('title','Hủy đơn hàng')
<div class="container">
<form action="{{URL::to('cancel-order',$order->order_id)}}" method="post">
    @csrf
        <div class="table-responsive-md">
            <table class="table table-hover">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiên</th>
                    <th>Lý do hủy</th>
                </tr>
                <tr>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->product_qty}}</td>
                    <td>{{$order->order_total*1000 . 'đ' }}</td>
                    <td>
                        <select class="custom-select" name="reason">
                            <option value="Thay đổi ý định">Thay đổi ý định</option>
                            <option value="Thay đổi địa chỉ">Thay đổi địa chỉ</option>
                            <option value="Thời gian giao hàng quá lâu">Thời gian giao hàng quá lâu</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <a href="" onclick="return confirm('Bạn có chắc muốn xóa không')"><button class="btn btn-primary">Hủy đơn hàng</button></a>

</form>
</div>
@stop

