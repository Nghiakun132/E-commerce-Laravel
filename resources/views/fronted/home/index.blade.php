@extends('layout.app_fronted')
@section('title','Trang chủ')
@section('content')
<style>
    @keyframes quay3{
        from {
            transform:rotate(0deg)
        }
        to {
            transform:rotate(5deg)
        }
    }
    @keyframes quay32{
        from {
            transform:rotate(0deg)
        }
        to {
            transform:rotate(-5deg)
        }
    }
    .qa:hover img{
        animation: quay3 1s linear infinite;
    }
    .qa2:hover img{
        animation: quay32 1s linear infinite;
    }
</style>
<div class="nghia">
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($categoriesGlobal as $value4 )
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{url_file2($value4->c_avatar)}}">
                            <h5><a href="{{URL::to('danh-muc',$value4->c_slug)}}">{{$value4->c_name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            @foreach ($categoriesGlobal as $item)
                            <li data-filter=".{{$item->c_slug}}">{{$item->c_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($product as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $item->c_slug}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{url_file2($item->pro_avatar)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{URL::to('add-favorite',$item->id)}}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{route('get.product_detail',$item->pro_slug)}}" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6>{{$item->pro_name}}</h6>
                            <h5>{{number_format(($item->pro_price),0,',','.').'đ'}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic qa">
                        <img src="././public/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic qa2">
                        <img src="././public/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($products as $item2)
                                <a href="{{URL::to('chi-tiet',$item2->pro_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{url_file2($item2->pro_avatar)}}" width="80px" height="80px" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item2->pro_name}}</h6>
                                        <span>{{number_format(($item2->pro_price),0,',','.').'đ'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($products as $item2)
                                <a href="{{URL::to('chi-tiet',$item2->pro_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{url_file2($item2->pro_avatar)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item2->pro_name}}</h6>
                                        <span>{{number_format(($item2->pro_price),0,',','.').'đ'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top xem nhiều nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topViews as $view)
                                <a href="{{URL::to('chi-tiet',$view->pro_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{url_file2($view->pro_avatar)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$view->pro_name}}</h6>
                                        <span>{{number_format(($view->pro_price),0,',','.').'đ'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topViews as $view)
                                <a href="{{URL::to('chi-tiet',$view->pro_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{url_file2($view->pro_avatar)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$view->pro_name}}</h6>
                                        <span>{{number_format(($view->pro_price),0,',','.').'đ'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Danh mục xem nhiều nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topViewsCategory as $value7)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{url_file2($value7->c_avatar)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$value7->c_name}}</h6>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topViewsCategory as $value7)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{url_file2($value7->c_avatar)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$value7->c_name}}</h6>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Bài viết</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blog as $blog )
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{url_file2($blog->a_avatar)}}" height="170px" title="Bài viết: {{$blog->a_name}}" alt="{{$blog->a_name}}">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$blog->created_at}}</li>
                                <li><i class="fa fa-comment-o"></i> {{$blog->a_view}}</li>
                            </ul>
                            <h5><a href="{{URL::to('bai-viet',$blog->a_slug)}}"> {{$blog->a_name}}</a></h5>
                            <p>{{$blog->a_description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<?php
    $congratulation = Session::get('congratulation');
    if($congratulation){
        echo "<script type='text/javascript'>alert('$congratulation');</script>";
        Session::forget('congratulation');
    }
?>
@stop












