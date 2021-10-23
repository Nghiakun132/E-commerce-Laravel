@extends('layout.app_fronted')
@section('content')
@section('title', 'Kiểm tra đơn hàng')
<style>
    h2{
        font-weight: bold;
        color: red;
    }
</style>
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
            @if ($countOrder  > 3 )
            <h2>Tìm nhanh</h2>
            <input class="form-control mt-3 mb-3" id="myInput" type="text" placeholder="Tìm nhanh">
            @endif
            <h2>Danh sách đơn hàng đã đặt</h2>
            <table class="table table-hover table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Tổng tiền</th>
                    <th>Đơn vị vận chuyển</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                <tbody id="myTable">
                    @if ($countOrder > 0)
                        @foreach ($order as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_total * 1000 . 'đ' }}</td>
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
                                    @if ($order->order_status != 0)
                                        <a href="#" class="disabled"
                                            title="Không thể hủy đơn hàng khi đã xác nhận"><i
                                                class="fa fa-times-circle-o text-danger ml-2 delete "
                                                style="font-size:30px" aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ URL::to('cancel', $order->id) }}" title="Hủy đơn hàng"><i
                                                class="fa fa-times-circle-o text-danger ml-2 delete"
                                                style="font-size:30px" aria-hidden="true"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="12">
                                <h3 class="text-center text-danger">Không có đơn hàng</h3>
                            </td>
                        </tr>
                    @endif
            </table>
        </div>
    </div>
</div>
{{-- <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('/cancel-order',$order->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="custom-select" name="reasion">
                            <option selected>Open this select menu</option>
                            <option value="Thay đổi ý định">Thay đổi ý định</option>
                            <option value="Thay đổi địa chỉ">Thay đổi địa chỉ</option>
                            <option value="Thời gian giao hàng quá lâu">Thời gian giao hàng quá lâu</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Hủy đơn hàng</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}
<style>
    .info:hover {
        color: green !important;
    }

    .delete:hover {
        color: red !important;
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
