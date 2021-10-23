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
                                <span>Danh mục -</span>
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
                                <img class="product__details__pic__item--large" src="{{ url_file($product->pro_avatar) }}"
                                    alt="">
                            </div>
                            <div class="product__details__pic__slider owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-927px, 0px, 0px); transition: all 1.2s ease 0s; width: 1590px;">
                                        @foreach ($img as $img)
                                            <div class="owl-item cloned" style="width: 112.5px; margin-right: 20px;"><img
                                                    data-imgbigurl="{{ url_file($img->anh) }}"
                                                    src="{{ url_file($img->anh) }}" alt=""></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev"><span aria-label="Previous">‹</span></button><button
                                        type="button" role="presentation" class="owl-next"><span
                                            aria-label="Next">›</span></button></div>
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
                                <span>({{ $product->pro_view }} lượt xem)</span>
                            </div>
                            <form action="{{ URL::to('/save-cart') }}" method="post">
                                @csrf
                                <div class="product__details__price">
                                    {{ number_format($product->pro_price - $product->pro_price * $product->pro_sale, 0, ',', '.') . 'đ' }}
                                </div>
                                <p>{{ $product->pro_content }}</p>
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" id="qty" value="1" name="qty" min="1"
                                                max="{{ $product->pro_number }}">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                @if ($product->pro_number != 0)
                                    <button type="submit" class="btn btn-success btn-lg">ADD TO CARD</button>
                                @else
                                    <button type="submit" class="btn btn-success btn-lg " disabled>ADD TO CARD</button>
                                @endif
                                <a href="{{URL::to('add-favorite',$product->id)}}" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            </form>
                            <?php
                            $message4 = Session::get('message_qty');
                            $message5 = Session::get('message_qty2');
                            if ($message4) {
                                echo "<script type='text/javascript'>alert('$message4');</script>";
                            } elseif ($message5) {
                                echo "<script type='text/javascript'>alert('$message5');</script>";
                            } ?>
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
                                <div class="tab-pane active" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Thông tin sản phẩm</h6>
                                        <p>
                                            {{ $product->pro_description }}
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane " id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Mô tả</h6>
                                        <p>{{ $product->pro_content }}
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
                            <h2>NKS gợi ý cho bạn</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($related as $related)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ url_file($related->pro_avatar) }}"
                                    style="background-image: url(&quot;.././public/img/product/product-1.jpg&quot;);">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ $related->pro_name }}</a></h6>
                                    <h5>{{ number_format($related->pro_price, 0, ',', '.') . 'đ' }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="comment">
            <div class="container mt-3">
                <h2>Bình luận </h2>
                <span>Có {{$countComment}} bình luận</span>
                @foreach ($comment as $comment)
                    <div class="media border p-3">
                        <img src="{{url_file($comment->avatar)}}" class="mr-3 mt-3 rounded-circle" style="width:80px;">
                        <div class="media-body">
                            <h4>{{$comment->name}}<small><i class="ml-2">{{$comment->created_at}}</i></small></h4>
                            <p style="font-size: 18px">{{$comment->comment}}</p>
                            <a href="{{URL::to('like-comment',$comment->id)}}"><i class="fa fa-thumbs-up text-info" aria-hidden="true"></i>
                            <span>{{$comment->liked}}</span></a>
                        </div>
                    </div>
                @endforeach
                <div class="comment_write">
                    <form action="{{ route('comment') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment" cols="50" rows="5"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Bình luận</button>
                    </form>
                </div>
            </div>
    </div>
@stop
