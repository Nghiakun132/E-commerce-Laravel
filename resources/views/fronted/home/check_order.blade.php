@extends('layout.app_fronted')
@section('content')
@section('title', 'Kiểm tra đơn hàng')
<div class="container">
    <h3>Kiểm tra đơn hàng</h3>
    <div class="row">
        <div class="col-lg-12">
            <input class="form-control mt-3 mb-3" id="myInput" type="text" placeholder="Tìm nhanh">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Tổng tiền</th>
                    <th>Đơn vị vận chuyển</th>
                    <th>Trạng thái</th>
                </tr>
                <tbody id="myTable">
                @foreach ($order as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_total.'đ' }}</td>
                        <td>
                            @if ($order->transport == 1)
                                Giao hàng nhanh
                            @elseif($order->transport==2)
                                Giao hàng tiết kiệm
                            @elseif($order->transport==3)
                                Viettel Post
                            @elseif($order->transport==4)
                                VietNam Post
                            @elseif($order->transport==5)
                                J*T Express
                            @elseif($order->transport==6)
                                Ninja Van
                            @elseif($order->transport==7)
                                LEX Express
                            @elseif($order->transport==8)
                                GrabShip
                            @elseif($order->transport==9)
                                Shoppe Express
                            @endif
                        </td>
                        <td>
                            @if ($order->order_status == 0)
                                    <span class="badge badge-success ac">Đang xử lý</span>
                            @elseif ($order->order_status == 1)
                                <span class="badge badge-warning ac">Đã xác nhận</span>
                            @elseif ($order->order_status == 2)
                                <span class="badge badge-danger ac">Đang vận chuyển</span>
                            @elseif ($order->order_status == 3)
                                <span class="badge badge-info ac">Đã giao hàng</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
@stop
