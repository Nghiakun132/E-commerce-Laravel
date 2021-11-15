@extends('layout.app_fronted')
@section('content')
@section('title', 'Tìm kiếm')

{{-- <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End --> --}}

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('./public/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>NghiaKun Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('get.home')}}">Trang chủ</a>
                        <span>Tìm kiếm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach ($categoriesGlobal as $category)
                            <li><a href="#">{{$category->c_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($latesProduct as $latesProduct)

                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{url_file2($latesProduct->pro_avatar)}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$latesProduct->pro_name}}</h6>
                                            <span>{{number_format($latesProduct->pro_price - ($latesProduct->pro_price * $latesProduct->pro_sale),0,'.','.').'đ'}}</span>
                                        </div>
                                    </a>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
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
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{url_file2($product->pro_avatar)}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="{{URL::to('add-favorite',$product->id)}}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{URL::to('chi-tiet',$product->pro_slug)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{$product->pro_name}}</a></h6>
                                    <h5>{{number_format($latesProduct->pro_price - ($latesProduct->pro_price * $latesProduct->pro_sale),0,'.','.').'đ'}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="product__pagination">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>













{{-- <section class="breadcrumb-section set-bg" data-setbg="././public/img/breadcrumb.jpg"
    style="background-image: url(&quot;../public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="https://localhost/nienluancoso">Home</a>
                        <span>Tìm kiếm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <hr>
        <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">

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
        @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ url_file2($product->pro_avatar) }}"
                        style="background-image: url(&quot;img/product/product-1.jpg&quot;);">
                        <ul class="product__item__pic__hover">
                            <li><a href="{{URL::to('add-favorite',$product->pro_slug)}}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{URL::to('chi-tiet',$product->pro_slug)}}">{{ $product->pro_name }}</a></h6>
                        <h5>{{ number_format($product->pro_price - $product->pro_price * $product->pro_sale, 0, ',', '.') . 'đ' }}
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#sort').on('change', function() {
            var url = $(this).val();
            // alert(url);
            if (url) {
                window.location = url;
            } else {
                return false;
            }
        });
    });
</script>
@stop
