@extends('layout.app_fronted')
@section('content')
@section('title','Sản phẩm yêu thích')

<div class="container">
    <h2>Sản phẩm yêu thích</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="row featured__filter">
                @foreach ($data as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{url_file2($item->pro_avatar)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{URL::to('delete-favorite',$item->pro_slug)}}"><i class="fa fa-trash"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{route('get.product_detail',$item->pro_slug)}}">{{$item->pro_name}}</a></h6>
                            <h5>{{number_format(($item->pro_price),0,',','.').'đ'}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop
