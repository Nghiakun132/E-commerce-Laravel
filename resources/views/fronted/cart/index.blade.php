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
                            @foreach ($content as $value)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <h2>{{ $value->name }}</h2>
                                    </td>
                                    <td class="shoping__cart__item">
                                        <img src="{{ url_file2($value->options->image) }}" width="100px" height="110px"
                                            alt="">
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($value->price, 0, ',', '.') . 'đ' }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form action="{{URL::to('/update-qty')}}" method="post">
                                                @csrf
                                                <div class="pro-qtyy">
                                                    <input type="text" name="cart_qty" value="{{ $value->qty }}">
                                                    <input type="hidden" name="product_rowid" value="{{ $value->rowId }}">
                                                </div>
                                                <button type="submit" name="update-qty" class="btn btn-info btn-sm">Cập
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('get.home') }}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    <a href="{{ URL::to('delete-coupon') }}" class="primary-btn cart-btn">Xóa mã giảm giá</a>
                    <?php
                            $success = Session::get('success');
                            ?>
                    <span class="text-success"><?php echo $success; ?></span>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="{{URL::to('check-coupon')}}" method="post">
                            @csrf
                            <input type="text" placeholder="Nhập mã giảm giá" name="coupon">
                            <button type="submit" class="btn btn-success text-default">Nhập</button>
                        </form>
                        <?php
                            $message = Session::get('message');
                            $message_error = Session::get('message_error');
                            $message_error2 = Session::get('message_error2');
                            if($message){?>
                            <span style="font-size:18px" class="text-success"><?php echo $message; ?></span>
                            <?php
                            }else if($message_error){
                            ?>
                            <span style="font-size:18px" class="text-danger"><?php echo $message_error; ?></span>
                            <?php }else{
                                ?>
                            <span style="font-size:18px" class="text-danger"><?php echo $message_error2; ?></span>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <?php
                    $code = Session::get('cp_condition');
                    ?>
                    <h5>Tổng giỏ hàng</h5>
                    <ul>
                        <li>Thuế <span>{{ Cart::tax(0,',','.'). 'đ' }}</span></li>
                        <li>Phí vận chuyển<span>Miễn phí</span></li>
                        <li>Voucher giảm giá<span><?php echo $code*100 .'%' ?></span></li>
                        {{-- <li>Giảm giá<span>{{Cart::total (0,',','.') * ($code*1000)}}</span></li> --}}
                        {{-- <li>Giảm giá<span>{{$code}}</span></li> --}}
                        @if($code > 0)
                        <li>Tổng tiền
                            <span>{{ Cart::total (0,',','.')-(Cart::total (0,',','.')*$code). 'đ' }}
                            </span>
                        </li>
                        @else
                        <li>Tổng tiền
                            <span>{{ Cart::total (0,',','.') . 'đ' }}
                            </span>
                        </li>
                        @endif
                    </ul>
                   <a href="{{URL::to('payment')}}" class="primary-btn" >Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
