@extends('layout.app_fronted')
@section('content')
@section('title', 'Thanh toán');
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-weight: bold">Xem lại giỏ hàng</h3>

            </div>
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
            <div class="col-lg-6">
                <h2>Địa chỉ giao hàng</h2>
                <?php
                $a = Session::get('user_address');
                echo $a->address;
                ?>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng giỏ hàng</h5>
                    <ul>
                        <li>Thuế <span>{{ Cart::tax() . ' ' . 'đ' }}</span></li>
                        <li>Thành tiền <span>{{ Cart::total() . ' ' . 'đ' }}</span></li>
                    </ul>
                    <a href="{{ URL::to('order-place') }}" class="primary-btn orders">Thanh toán</a>
                    <script>
                        $(document).ready(function() {
                            $('.orders').click(function() {
                                alert('Bạn đã thanh toán thành công');
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
