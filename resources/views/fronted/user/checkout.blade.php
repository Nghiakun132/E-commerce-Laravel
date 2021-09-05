@extends('layout.app_fronted')
@section('content')
@section('title', 'Thanh toán');
<section class="breadcrumb-section set-bg" data-setbg="././public/img/breadcrumb.jpg"
    style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .cartt a {
        color: rgb(17, 1, 1) !important;
        font-weight: bold;
    }

    .cartt {
        width: 100%;
    }

    .cartt a:hover {
        color: rgb(255, 255, 255) !important;
    }

</style>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin</h4>
            <form action="{{ URL::to('save-checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Họ tên<span>*</span></p>
                                    <input type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="diachi" placeholder="Ghi chi tiết địa chỉ"
                                class="checkout__input__add">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Điện thoại<span>*</span></p>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú<span>*</span></p>
                            <input type="text" placeholder="Ghi chú cho đơn hàng." name="note">
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
            </form>
            <div class="col-lg-4 col-md-6">

            <button style="float: right; margin-top: 5px" class="btn btn-info cartt btn-lg"> <a href="{{ URL::to('show-cart') }}">Giỏ hàng</a></button>
            <button style="float: right; margin-top: 5px" class="btn btn-info cartt btn-lg"> <a href="{{ URL::to('payment') }}">Thanh toán</a></button>
            </div>
        </div>
    </div>
</section>

@stop
