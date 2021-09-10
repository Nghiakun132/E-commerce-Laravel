@extends('layout.app_fronted')
@section('content')
@section('title','Sản phẩm yêu thích')
<section class="breadcrumb-section set-bg" data-setbg="./././public/img/breadcrumb.jpg" style="background-image: url(&quot;.././public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Kiểm tra chi tiết đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="http://localhost/nienluancoso">Trang chủ</a>
                        <span>Kiểm tra chi tiết đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mt-2 mb-2">
    <h2>Sản phẩm yêu thích</h2>
    <div class="row">
        <div class="col-lg-12 card">
            <div class="row featured__filter">
                @foreach ($data as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{url_file2($item->pro_avatar)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{URL::to('delete-favorite',$item->id)}}"><i class="fa fa-trash"></i></a></li>
                                <li><a href="{{ route('get.product_detail', $item->pro_slug) }}"
                                    title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6>{{$item->pro_name}}</h6>
                            <h5>{{number_format(($item->pro_price)-(($item->pro_price)*($item->pro_sale)),0,',','.').'đ'}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop
