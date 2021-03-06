<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    {{-- <meta name="robots" content=""> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canotical" href="http://localhost/nienluancoso/">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Css Styles -->
    <link rel="icon" href="{{ asset('././././public/img/2.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('././public/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/comment.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="/"><img src="{{asset('/public/img/2.png')}}" alt=""></a>
        </div>
        {{-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('get.cart')}}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> --}}
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('/public/img/language.png')}}" alt="">
                <div>Ti???ng Vi???t</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">Ti???ng Vi???t</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <?php
                $userId = Session::get('user_id');
                $userName = Session::get('user_name');
                if($userId != NULL) {
            ?>
            <a href="{{URL::to('logout')}}"><i class="fa fa-user"></i> ????ng xu???t:
            <?php
                echo $userName;
            ?>
        </a>
            <?php
                }else{
            ?>
            <a href="{{URL::to('login-checkout')}}"><i class="fa fa-user"></i>????ng nh???p</a>

            <?php
            }
            ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="{{route('get.home')}}">Trang ch???</a></li>
                <li><a href="{{route('get.map')}}">Shop</a></li>
                <li><a href="#">Trang</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{route('get.cart')}}">Gi??? h??ng</a></li>
                    </ul>
                </li>
                <li><a href="">Blog</a></li>
                <li><a href="https://www.facebook.com/nghiakun132" target="_blank">li??n h???</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>NghiaB1809377@student.ctu.edu.vn</li>
                <li>Mi???n ph?? v???n chuy???n cho ????n h??ng tr??n 1k</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>NghiaB1809377@student.ctu.edu.vn</li>
                                <li>Mi???n ph?? v???n chuy???n t??? 1k</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/nghiakun132" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{asset('././public/img/vn.png')}}" alt="">
                                <div>Ti???ng Vi???t</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Ti???ng Vi???t</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                    $userId = Session::get('user_id');
                                    $userName = Session::get('user_name');
                                    if($userId != NULL) {
                                ?>
                                <a href="{{URL::to('logout')}}"><i class="fa fa-user"></i> ????ng xu???t:
                                <?php
                                    echo $userName;
                                ?>
                            </a>
                                <?php
                                    }else{
                                ?>
                                <a href="{{URL::to('login-checkout')}}"><i class="fa fa-user"></i>????ng nh???p</a>

                                <?php
                                }
                                ?>

                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('get.home')}}"><img src="{{asset('./public/img/2.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{route('get.home')}}">Trang ch???</a></li>
                            <li><a href="{{route('get.map')}}" title="?????a ch??? ">Shop</a></li>
                            <li><a href="#">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="">Gi??? h??ng</a></li>
                                </ul>
                            </li>
                            <li><b style="cursor: pointer">B??I VI???T</b>
                                <ul class="header__menu__dropdown">
                                    @foreach ($menuGlobal as $item)
                                    <li>
                                        <a href="{{route('get.menu',$item->mn_slug)}}">{{$item->mn_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="https://www.facebook.com/nghiakun132" target="_blank">li??n h???</a></li>
                        </ul>
                    </nav>
                </div>
                <style>
                    .order:hover i{
                        /* color: rgb(247, 4, 4) !important; */
                        animation: quay 0.5s linear infinite;
                    }
                    .iconss{
                        font-size: 20px !important;
                    }
                    @keyframes quay{
                        from {
                            transform: 20(0deg)
                        }
                        to {
                            transform: rotate(360deg)
                        }
                    }
                </style>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{URL::to('tracking-order')}}" class="order" title="Ki???m tra ????n h??ng"><i class="fa fa-check-circle text-success iconss" aria-hidden="true"></i></a></li>
                            <li><a href="{{URL::to('view-data')}}" class="order" title="C???p nh???t th??ng tin"><i class="fa fa-address-book text-info iconss" aria-hidden="true"></i></a></li>
                            <li><a href="{{URL::to('view-favorite')}}" class="order"><i class="fa fa-heart text-danger iconss" title="Y??u th??ch"></i></a></li>
                            <li><a href="{{route('get.cart')}}" title="Gi??? h??ng" class="order"><i class="fa fa-shopping-bag text-warning iconss"></i></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#myModal3" title="M?? gi???m gi??" class="order"><i class="fa fa-gift text-danger iconss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>

    </header>
    {{-- toast --}}

    <!-- Header Section End -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                          <span class="hero_span">Danh m???c</span>
                        </div>
                        <ul>
                            @foreach($categoriesGlobal as $item)
                            <li><a href="{{route('get.category',$item->c_slug)}}" title="{{ $item->c_name }}">{{$item->c_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{URL::to('tim-kiem')}}" method="post">
                                @csrf
                                <div class="hero__search__categories">
                                    T???t c???
                                    </span>
                                </div>
                                <input type="text" placeholder="B???n c???n g?? ???" name='tukhoa'>
                                <button type="submit" class="site-btn">T??m ki???m</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0776585055</h5>
                                <span>H??? tr??? 24/7 </span>
                            </div>
                        </div>
                    </div>

                    <div class="hero__item set-bg" data-setbg="{{asset('././public/img/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>Tr??i c??y t????i</span>
                            <h2>Rau c??? <br />100% t??? nhi??n</h2>
                            <p>H??ng h??a c?? s???n v?? mi???n ph?? v???n chuy???n</p>
                            <a href="#" class="primary-btn">Mua ngay</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @yield('content')
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('get.home')}}"><img src="{{ asset('././public/img/2.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>?????a ch???: B??nh T??n, V??nh Long</li>
                            <li>??i???n tho???i: 0776585055</li>
                            <li>NghiaB1809377@student.ctu.edu.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Li??n k???t h???u ??ch</h6>
                        <ul>
                            <li><a href="#">V??? ch??ng t??i</a></li>
                            <li><a href="#">V???n chuy???n an to??n</a></li>
                            <li><a href="#">Th??ng tin v???n chuy???n</a></li>
                            <li><a href="#">Ch??nh s??ch</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">D???ch v??? c???a ch??ng t??i</a></li>
                            <li><a href="#">D??? ??n</a></li>
                            <li><a href="#">Li??n h???</a></li>
                            <li><a href="#">Ph???n ??nh</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia v???i ch??ng t??i ngay b??y gi???</h6>
                        <p>Nh???p email ????? ch??ng t??i li??n h??? s???m nh???t v?? ??u ????i ?????c bi???t</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart" aria-hidden="true"></i>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{ asset('././public/img/payment-item.png')}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('././public/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('././public/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('././public/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('././public/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('././public/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('././public/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('././public/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('././public/js/main.js')}}"></script>

    <div class="modal" id="myModal3">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Xem m?? gi???m gi?? </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-info">
                    <table class="table table-hover table-secondary">
                        <thead class="table-danger">
                            <tr>
                                <th>M??</th>
                                <th>Gi???m</th>
                                <th>Th???i h???n</th>
                                <th>T??nh tr???ng</th>
                            </tr>
                        </thead>
                        <?php $user_id = session::get('user_id'); ?>
                        @foreach ($couponGlobal as $cp)
                        @if ($cp->cp_user_id == $user_id)
                        <tr>
                            <td>{{$cp->cp_code}}</td>
                            <td>{{$cp->cp_value * 100 . '%' }}</td>
                            <td>{{$cp->cp_expiry}}</td>
                            <td>
                                @if($cp->cp_status==0)
                                    Ch??a s??? d???ng
                                @else
                                    ???? s??? d???ng
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
