@extends('layout.app_fronted')
@section('content')
@section('title', 'Tìm kiếm')
<section class="breadcrumb-section set-bg" data-setbg="././public/img/breadcrumb.jpg"
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
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sort').on('change', function(){
            var url = $(this).val();
            // alert(url);
            if(url){
                window.location = url;
            }else{
                return false;
            }
            });
    });
</script>
@stop
