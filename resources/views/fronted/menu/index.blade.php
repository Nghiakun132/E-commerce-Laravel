@extends('layout.app_fronted')
@section('content')
@section('title','Blog')

<section class="breadcrumb-section set-bg" data-setbg=".././public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bài viết</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('get.home')}}">Trang chủ &nbsp;</a>
                        <span> Bài viết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">

                    <div class="blog__sidebar__item">
                        <h4>Menus</h4>
                        <ul>
                            @foreach ($menuGlobal as $value1)
                            <li><a href="#">{{$value1->mn_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin mới nhất</h4>
                        <div class="blog__sidebar__recent">
                            @foreach ($menus_late as $value2 )
                            <a href="{{URL::to('bai-viet',$value2->a_slug)}}" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{url_file($value2->a_avatar)}}" width="100%" height="100px" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h5 style="font-weight: bold">{{$value2->a_name}}</h5>
                                    <span>{{$value2->created_at}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Search By</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Apple</a>
                            <a href="#">Beauty</a>
                            <a href="#">Vegetables</a>
                            <a href="#">Fruit</a>
                            <a href="#">Healthy Food</a>
                            <a href="#">Lifestyle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach ($menus as $value )
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{url_file($value->a_avatar)}}" width="100%" height="250px" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{$value->created_at}}</li>
                                    <li><i class="fa fa-comment-o"></i> {{$value->a_view}}</li>
                                </ul>
                                <h5><a href="#">{{$value->a_name}}</a></h5>
                                <p>{{$value->a_description}}</p>
                                </p>
                                <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
