@extends('layout.app_fronted')
@section('content')
@section('title','Sản phẩm yêu thích')
<section class="breadcrumb-section set-bg" data-setbg="./././public/img/breadcrumb.jpg" style="background-image: url(&quot;.././img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Sản phẩm yêu thích</h2>
                    <div class="breadcrumb__option">
                        <a href="http://localhost/nienluancoso">Trang chủ</a>
                        <span>Sản phẩm yêu thích</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    h3{
        font-weight: bold;
        animation: quay 1s linear infinite;
    }
    @keyframes quay{
        from { color: red; }
        to {color: green; }
    }
</style>
<div class="container mt-2 mb-2 card">
    <h3>Sản phẩm yêu thích</h3>
    <hr>
    <div class="row">
        <div class="col-lg-12 ">
            <div class="row featured__filter">
                @if ($countdata  > 0)
                @foreach ($data as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{url_file2($item->pro_avatar)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{URL::to('delete-favorite',$item->id)}}" onclick="return confirm('Are you sure you want to delete this item ? ')"><i class="fa fa-trash"></i></a></li>
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
                @else
                <div class="col-lg-12">
                    <h3 class="text-center text-danger">Không có sản phẩm yêu thích</h3>
                </div>
                @endif
            </div>
        </div>
        @if ($countdata >= 2)
        <a href="{{URL::to('delete-all-favorite')}}"><button class="btn btn-danger m-2 btn-lg" title="Xóa tất cả trong danh sách" onclick="return confirm('Bạn có muốn xóa hết danh sách thích này không ?')">Xóa tất cả</button></a>
        @endif
    </div>
</div>
<?php
    $messages = session::get('favorite_message');
    if($messages){
        echo "<script type='text/javascript'>alert('$messages');</script>";
    }
    session::forget('favorite_message');
?>
@stop
