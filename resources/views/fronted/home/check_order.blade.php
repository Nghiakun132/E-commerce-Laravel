@extends('layout.app_fronted')
@section('content')
@section('title', 'Kiểm tra đơn hàng')
<section class="breadcrumb-section set-bg" data-setbg="./././public/img/breadcrumb.jpg"
    style="background-image: url(&quot;.././public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Kiểm tra đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('get.home') }}">Trang chủ</a>
                        <span>Kiểm tra đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Tìm nhanh</h2>
            <input class="form-control mt-3 mb-3" id="myInput" type="text" placeholder="Tìm nhanh">
            <h2>Danh sách đơn hàng đã đặt</h2>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Tổng tiền</th>
                    <th>Đơn vị vận chuyển</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
                <tbody id="myTable">
                    @foreach ($order as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_total . 'đ' }}</td>
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
                                    <span class="badge badge-info ac">Đang vận chuyển</span>
                                @elseif ($order->order_status == 3)
                                    <span class="badge badge-info ac">Đã giao hàng</span>
                                @else
                                    <span class="badge badge-danger ac">Đã hủy</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::to('tracking-order-details', $order->id) }}"><i
                                        class="fa fa-info-circle text-info info" style="font-size:30px"
                                        aria-hidden="true"></i></a>
                                @if ($order->order_status !=0)
                                <a href="#" class="disabled" title="Không thể hủy đơn hàng khi đã xác nhận"><i class="fa fa-times-circle-o text-danger ml-2 delete " style="font-size:30px" aria-hidden="true"></i></a>
                                @else
                                <a title="Hủy đơn hàng" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng không')" href="{{URL::to('cancel-order',$order->id)}}"><i class="fa fa-times-circle-o text-danger ml-2 delete" style="font-size:30px" aria-hidden="true"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
<style>
.info:hover{
    color:green !important;
}
.delete:hover{
    color:red !important;
}
.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@stop
