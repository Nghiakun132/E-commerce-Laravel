@extends('layout.app_fronted')
@section('content')
@section('title', 'Thanh toán');
<section class="shoping-cart spad">
    <div class="container">
                <h2 style="font-weight: bold" class="text-warning">Xem lại giỏ hàng</h2>
                <hr>
                <div class="row">
                <div class="col-lg-12">
            </div>
            <div class="col-lg-12 ">
                <div class="shoping__cart__table">
                    <?php
                    $content = Cart::content();
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th class="">Tên</th>
                                <th class="">Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content as $value)
                                <tr>
                                    <td class="shoping__cart__item" align="center">
                                        <h2>{{ $value->name }}</h2>
                                    </td>
                                    <td class="shoping__cart__item" align="center">
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
                                                    <input type="text" name="cart_qty" value="{{ $value->qty }}">
                                                    <input type="hidden" name="product_rowid"
                                                        value="{{ $value->rowId }}">
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
                    <a href="{{ route('get.home') }}" class="btn btn-success btn-lg text-danger" style="font-weight: bold">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
            <hr>

        <style>
            .ac{
                margin-top: 8px;
            }
            .bg_info{
                background-color: #ccc;
            }
            .item{
                font-size:23px;
            }
        </style>
        <div class="row">
            <div class="col-lg-6">
                <h2 style="font-weight: bold">Thông tin giao hàng</h2>
                <div class="bg_info">
                <ul class="list-group list-group-flush ac">
                    <li class="list-group-item item"><b>Họ tên:</b> {{$user->name}}</li>
                    <li class="list-group-item item"><b>Số điện thoại:</b> {{$user->phone}}</li>
                    <li class="list-group-item item"><b>Địa chỉ:</b> {{$address->address}}</li>
                    <li class="list-group-item item"><b>Email:</b> {{$user->email}}</li>
                </ul>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <?php
                    $code = Session::get('cp_value');
                    ?>
                    <h5>Tổng giỏ hàng</h5>
                    <ul>
                        <li>Thuế <span>{{ Cart::tax(0,',','.'). 'đ' }}</span></li>
                        <li>Phí vận chuyển<span>Miễn phí</span></li>
                        @if ($code)
                        <li>Voucher giảm giá<span><?php echo $code*100 . '%'; ?></span></li>
                        @else
                        <li>Voucher giảm giá<span>0%</span></li>
                        @endif
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
                   <a href="{{URL::to('order-place')}}" class="primary-btn" >Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
