@extends('layout.app_backend')
@section('content')
@section('title', 'Quản lý đơn hàng')

<h2>Đơn hàng</h2>
<div class="card">
    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Đơn vị vận chuyển</th>
            <th>Trạng thái đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Ngày xác nhận</th>
            <th>Action</th>
        </tr>
        @foreach ($order as $value)
            <tr>

                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ $value->pk_address }}</td>
                <td>{{ ($value->order_total) * 1000 .'đ' }}</td>
                <td>
                    @if ($value->transport == 1)
                        Giao hàng nhanh
                    @elseif($value->transport==2)
                        Giao hàng tiết kiệm
                    @elseif($value->transport==3)
                        Viettel Post
                    @elseif($value->transport==4)
                        VietNam Post
                    @elseif($value->transport==5)
                        J*T Express
                    @elseif($value->transport==6)
                        Ninja Van
                    @elseif($value->transport==7)
                        LEX Express
                    @elseif($value->transport==8)
                        GrabShip
                    @elseif($value->transport==9)
                        Shoppe Express
                    @endif
                </td>
                <td>
                    @if ($value->order_status == 0)
                        <a id="del" href="{{ URL::to('admin/order/change-status', $value->id) }}">
                            <span class="badge badge-success ac">Đang xử lý</span></a>
                    @elseif ($value->order_status == 1)
                        <a id="del" href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                class="badge badge-warning ac">Đã xác nhận</span></a>
                    @elseif ($value->order_status == 2)
                        <a id="del" href="{{ URL::to('admin/order/change-status', $value->id) }}"><span
                                class="badge badge-primary ac">Đang vận chuyển</span></a>
                    @elseif ($value->order_status == 3)
                        <span class="badge badge-info ac">Đã giao hàng</span>
                    @else
                        <span class="badge badge-danger ac">Đã hủy</span>
                    @endif
                </td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->time_confirm }}</td>
                <td><a href="{{ URL::to('admin/order/view-detail/' . $value->id) }}" style="margin-right: 12px"><i
                            class="fas fa-pen"></i></a>
                    <a href="{{ URL::to('admin/order/delete-order/' . $value->id) }}"><i class="fa fa-trash"
                            aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>


@stop
