@extends('layout.app_fronted')
@section('content')
@section('title', 'Giỏ hàng')
<section class="breadcrumb-section set-bg" data-setbg="././public/img/breadcrumb.jpg"
    style="background-image: url(&quot;.././public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('get.home') }}">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <?php
                    $content = Cart::content();
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Tên</th>
                                <th class="shoping__product">Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($count  > 0)
                            @foreach ($content as $value)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <h2>{{ $value->name }}</h2>
                                    </td>
                                    <td class="shoping__cart__item">
                                        <img src="{{ url_file2($value->options->image) }}" width="100px"
                                            height="110px" alt="">
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($value->price, 0, ',', '.') . 'đ' }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form action="{{ URL::to('/update-qty') }}" method="post">
                                                @csrf
                                                <div class="pro-qtyy">
                                                    <input type="text" id="product_qty" name="cart_qty" value="{{ $value->qty }}">
                                                    <input type="hidden" name="product_rowid"
                                                        value="{{ $value->rowId }}">
                                                </div>
                                                <button type="submit" id="product_submit" name="update-qty" class="btn btn-info btn-sm">Cập
                                                    nhật</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php
                                        $subtotal = $value->price * $value->qty;
                                        echo number_format($subtotal, 0, ',', '.') . 'đ';
                                        ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{ URL::to('/delete-cart', $value->rowId) }}"><span
                                                class="icon_close"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="12">
                                        <h3 class="text-center text-danger">
                                            Hiện tại giỏ hàng đang rỗng! Hãy thêm gì đó vào giỏ hàng
                                        </h3>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('get.home') }}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    <a href="{{ URL::to('delete-coupon') }}"
                        onclick="return confirm('Bạn có muốn xóa mã giảm giá này không')"
                        class="primary-btn cart-btn">Xóa mã giảm giá</a>
                    <?php
                    $success = Session::get('success');
                    $code_error = Session::get('code_error');
                    if ($success) {
                        echo "<script type='text/javascript'>alert('$success');</script>";
                    } elseif ($code_error) {
                        echo "<script type='text/javascript'>alert('$code_error');</script>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="{{ URL::to('check-coupon') }}" method="post">
                            @csrf
                            <?php $cp_code = Session::get('cp_code'); ?>
                            <input type="text" placeholder=
                            "<?php if($cp_code)
                                    echo $cp_code;
                            else{
                                echo 'Nhập mã giảm giá';
                            }
                            ?>"
                            name="coupon">
                            <button type="submit" class="btn btn-success">Nhập</button>
                        </form>
                        <?php
                        $message = Session::get('message');
                        $message_2 = Session::get('message_2');
                        $message_error2 = Session::get('message_error2');
                        if ($message) {
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        } elseif ($message_error2) {
                            echo "<script type='text/javascript'>alert('$message_error2');</script>";
                        } elseif ($message_2) {
                            echo "<script type='text/javascript'>alert('$message_2');</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <?php
                    $code = Session::get('cp_value');
                    ?>
                    <h5>Tổng giỏ hàng</h5>
                    <ul>
                        <li>Thuế <span>{{ Cart::tax(0, ',', '.') . 'đ' }}</span></li>
                        <li>Phí vận chuyển<span>Miễn phí</span></li>
                        @if ($code)
                            <li>Voucher giảm giá<span><?php echo $code * 100 . '%'; ?></span></li>
                        @else
                            <li>Voucher giảm giá<span>0%</span></li>
                        @endif
                        @if ($code > 0)
                            <li>Tổng tiền
                                <span>{{ Cart::total(0, ',', '.') - Cart::total(0, ',', '.') * $code . 'đ' }}
                                </span>
                            </li>
                        @else
                            <li>Tổng tiền
                                <span>{{ Cart::total(0, ',', '.') . 'đ' }}
                                </span>
                            </li>
                        @endif
                    </ul>
                    <a href="{{ URL::to('payment') }}" class="primary-btn">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
