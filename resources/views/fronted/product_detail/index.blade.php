@extends('layout.app_fronted')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <div class="nghia">
        <section class="breadcrumb-section set-bg" data-setbg=".././public/img/breadcrumb.jpg"
            style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Chi tiết sản phẩm</h2>
                            <div class="breadcrumb__option">
                                <a href="{{ route('get.home') }}">Trang chủ</a>
                                <a href="{{ route('get.category', $product->pro_slug) }}">Danh mục</a>
                                <span>Chi tiết</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large"
                                    src="{{url_file($product->pro_avatar)}}" alt="">
                            </div>
                            <div class="product__details__pic__slider owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-927px, 0px, 0px); transition: all 1.2s ease 0s; width: 1590px;">
                                        <div class="owl-item cloned" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-2.jpg"
                                                src=".././public/img/product/details/thumb-1.jpg" alt=""></div>
                                        <div class="owl-item cloned" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-3.jpg"
                                                src=".././public/img/product/details/thumb-2.jpg" alt=""></div>
                                        <div class="owl-item cloned" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-5.jpg"
                                                src=".././public/img/product/details/thumb-3.jpg" alt=""></div>
                                        <div class="owl-item cloned" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-4.jpg"
                                                src=".././public/img/product/details/thumb-4.jpg" alt=""></div>
                                        <div class="owl-item" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-2.jpg"
                                                src=".././public/img/product/details/thumb-1.jpg" alt=""></div>
                                        <div class="owl-item" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-3.jpg"
                                                src=".././public/img/product/details/thumb-2.jpg" alt=""></div>
                                        <div class="owl-item" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-5.jpg"
                                                src=".././public/img/product/details/thumb-3.jpg" alt=""></div>
                                        <div class="owl-item active" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-4.jpg"
                                                src=".././public/img/product/details/thumb-4.jpg" alt=""></div>
                                        <div class="owl-item cloned active" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-2.jpg"
                                                src=".././public/img/product/details/thumb-1.jpg" alt=""></div>
                                        <div class="owl-item cloned active" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-3.jpg"
                                                src=".././public/img/product/details/thumb-2.jpg" alt=""></div>
                                        <div class="owl-item cloned active" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-5.jpg"
                                                src=".././public/img/product/details/thumb-3.jpg" alt=""></div>
                                        <div class="owl-item cloned" style="width: 112.5px; margin-right: 20px;"><img
                                                data-imgbigurl=".././public/img/product/details/product-details-4.jpg"
                                                src=".././public/img/product/details/thumb-4.jpg" alt=""></div>
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button"
                                        role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                                <div class="owl-dots disabled"><button role="button"
                                        class="owl-dot active"><span></span></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3>{{ $product->pro_name }}</h3>
                            <div class="product__details__rating">
                                @for ($i = 1; $i <= $product->pro_review_star; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                <span>({{ $product->pro_view }} reviews)</span>
                            </div>
                            <form action="{{URL::to('/save-cart')}}" method="post">
                                @csrf
                            <div class="product__details__price">
                                {{ number_format($product->pro_price - $product->pro_price * $product->pro_sale, 0, ',', '.') . 'đ' }}
                            </div>
                            <p>{{ $product->pro_content }}</p>
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="qty">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            @if($product->pro_number !=0)
                                 <button type="submit" class="btn btn-success btn-lg">ADD TO CARD</button>
                            @else
                                <button type="submit" class="btn btn-success btn-lg "disabled>ADD TO CARD</button>
                            @endif
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>

                            <ul>
                                <li>
                                    <b>
                                        Tình trạng
                                    </b>
                                    <span class="text-danger">
                                        @if ($product->pro_number > 0)
                                            Còn hàng
                                        @else
                                             Hết hàng
                                        @endif
                                    </span>
                                </li>
                                <li><b>Số lượng</b><span>{{ $product->pro_height }}</li>
                                <li><b>Đơn vị tính</b><span>{{ $product->pro_unit }}</span></li>
                                <li>
                                    <b>Chia sẻ</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                        aria-selected="true">Mô tả sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                        aria-selected="false">Thông tin sản phẩm</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Mô tả</h6>
                                        <p>{{$product->pro_description}}
                                        </p>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Thông tin sản phẩm</h6>
                                        <p>
                                            {{$product->pro_content}}
                                        </p>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related as $related)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{url_file($related->pro_avatar)}}"
                            style="background-image: url(&quot;.././public/img/product/product-1.jpg&quot;);">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$related->pro_name}}</a></h6>
                            <h5>{{number_format(($related->pro_price),0,',','.').'đ'}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    </div>
@stop
