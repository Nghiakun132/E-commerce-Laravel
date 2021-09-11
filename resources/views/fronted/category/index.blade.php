@extends('layout.app_fronted')
@section('content')
@section('title', 'Danh mục')
<div class="nghia">
    <section class="breadcrumb-section set-bg" data-setbg="../public/img/breadcrumb.jpg"
        style="background-image: url(&quot;../public/images/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>NghiaKun Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('get.home') }}">Home</a>
                            <span>Danh mục</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- phan2 --}}
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục</h4>
                            <ul>
                                @foreach ($categoriesGlobal as $item)
                                    <li><a href="{{ route('get.category', $item->c_slug) }}"
                                            title="{{ $item->c_name }}">{{ $item->c_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-420px, 0px, 0px); transition: all 1.2s ease 0s; width: 1260px;">
                                            <div class="owl-item cloned" style="width: 210px;">
                                                <div class="latest-prdouct__slider__item">
                                                    @foreach ($lates as $lates)
                                                        <a href="{{ URL::to('chi-tiet', $lates->pro_slug) }}"
                                                            class="latest-product__item">
                                                            <div class="latest-product__item__pic">
                                                                <img src="{{ url_file($lates->pro_avatar) }}"
                                                                    style="width:106px" alt="">
                                                            </div>
                                                            <div class="latest-product__item__text">
                                                                <h6>{{ $lates->pro_name }}</h6>
                                                                <span>{{ number_format($lates->pro_price - $lates->pro_price * $lates->pro_sale, 0, ',', '.') . 'đ' }}</span>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Giảm giá</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-1200px, 0px, 0px); transition: all 0.5s ease 0s; width: 2880px;">
                                        @foreach ($sales as $sale)
                                            <div class="owl-item cloned" style="width: 240px;">
                                                <div class="col-lg-4">
                                                    <div class="product__discount__item">
                                                        <div class="product__discount__item__pic set-bg"
                                                            data-setbg="{{ url_file($sale->pro_avatar) }}"
                                                            style="background-image: url(&quot;img/product/discount/pd-4.jpg&quot;);">
                                                            <div class="product__discount__percent">
                                                                {{ $sale->pro_sale * 100 . '%' }}</div>
                                                            <ul class="product__item__pic__hover">
                                                                <li><a
                                                                        href="{{ URL::to('add-favorite', $sale->id) }}"><i
                                                                            class="fa fa-heart"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                                <li><a href="{{ route('get.product_detail', $sale->pro_slug) }}"
                                                                        title="Thêm vào giỏ hàng"><i
                                                                            class="fa fa-shopping-cart"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product__discount__item__text">
                                                            {{-- <span>Dried Fruit</span> --}}
                                                            <h5><a
                                                                    href="{{ URL::to('chi-tiet', $sale->pro_slug) }}">{{ $sale->pro_name }}</a>
                                                            </h5>
                                                            <div class="product__item__price">
                                                                {{ number_format($sale->pro_price - $sale->pro_price * $sale->pro_sale, 0, ',', '.') . 'đ' }}
                                                                <span>{{number_format(($sale->pro_price),0,',','.').'đ'}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev"><span aria-label="Previous">‹</span></button><button
                                        type="button" role="presentation" class="owl-next"><span
                                            aria-label="Next">›</span></button></div>
                                <div class="owl-dots"><button role="button"
                                        class="owl-dot active"><span></span></button><button role="button"
                                        class="owl-dot"><span></span></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select style="display: none;">
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Default</span>
                                        <ul class="list">
                                            <li data-value="0" class="option selected">Default</li>
                                            <li data-value="0" class="option">Default</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $count }}</span> Sản phẩm tìm thấy</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($product as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ url_file($product->pro_avatar) }}"
                                        style="background-image: url(&quot;img/product/product-1.jpg&quot;);">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{ URL::to('add-favorite', $product->id) }}"><i
                                                        class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ route('get.product_detail', $product->pro_slug) }}"
                                                    title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a
                                                href="{{ URL::to('chi-tiet', $product->pro_slug) }}">{{ $product->pro_name }}</a>
                                        </h6>
                                        <h5>{{ number_format($product->pro_price - $product->pro_price * $product->pro_sale, 0, ',', '.') . 'đ' }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@stop
