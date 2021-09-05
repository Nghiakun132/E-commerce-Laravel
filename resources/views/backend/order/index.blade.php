@extends('layout.app_backend')
@section('content')
@section('title','Quản lý đơn hàng')

<h2>Đơn hàng</h2>
<table class="table table-hover">
    <tr>
    <th>Id</th>
    <th>User_id</th>
    <th>Name</th>
    <th>Address</th>
    <th>Order_total</th>
    <th>Transport</th>
    <th>Order_status</th>
    <th>Created_at</th>
    <th>Action</th>
</tr>
    @foreach ($order as $value)
<tr>

    <td>{{$value->id}}</td>
    <td>{{$value->user_id}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->address}}</td>
    <td>{{$value->order_total}}</td>
    <td>
        @if($value->transport==1)
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
    <td><a href="{{URL::to('admin/order/change-status/'.$value->id)}}">
        @if ($value->order_status==1)
            Đang chờ xử lý
        @else
            Đã xác nhận
        @endif
    </a></td>
    <td>{{$value->created_at}}</td>
    <td><a href="{{URL::to('admin/order/view-detail/'.$value->id)}}" style="margin-right: 12px"><i class="fas fa-pen"></i></a>
        <a href="{{URL::to('admin/order/delete-order/'.$value->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </td>
</tr>
@endforeach
</table>

@stop
