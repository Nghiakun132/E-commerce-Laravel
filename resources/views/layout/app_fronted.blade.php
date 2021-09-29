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
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="/"><img src=".././public/img/2.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('get.cart')}}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src=".././public/img/language.png" alt="">
                <div>Tiếng Việt</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">Tiếng Việt</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('get.home')}}">Trang chủ</a></li>
                <li><a href="">Shop</a></li>
                <li><a href="#">Trang</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                        <li><a href="#">Shoping Cart</a></li>
                        <li><a href="#">Check Out</a></li>
                        <li><a href="#">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="">Blog</a></li>
                <li><a href="">Contact</a></li>
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
                <li>Miễn phí vận chuyển cho đơn hàng trên 1k</li>
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
                                <li>Miễn phí vận chuyển từ 1k</li>
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
                                <div>Tiếng Việt</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Tiếng Việt</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                    $userId = Session::get('user_id');
                                    $userName = Session::get('user_name');
                                    if($userId != NULL) {
                                ?>
                                <a href="{{URL::to('logout')}}"><i class="fa fa-user"></i> Đăng xuất:
                                <?php
                                    echo $userName;
                                ?>
                            </a>
                                <?php
                                    }else{
                                ?>
                                <a href="{{URL::to('login-checkout')}}"><i class="fa fa-user"></i>Đăng nhập</a>

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
                            <li class="active"><a href="{{route('get.home')}}">Trang chủ</a></li>
                            <li><a href="{{route('get.map')}}" title="Địa chỉ ">Shop</a></li>
                            <li><a href="#">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="">Giỏ hàng</a></li>
                                </ul>
                            </li>
                            <li><b style="cursor: pointer">BÀI VIẾT</b>
                                <ul class="header__menu__dropdown">
                                    @foreach ($menuGlobal as $item)
                                    <li>
                                        <a href="{{route('get.menu',$item->mn_slug)}}">{{$item->mn_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="https://www.facebook.com/nghiakun132" target="_blank">liên hệ</a></li>
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
                            <li><a href="{{URL::to('tracking-order')}}" class="order" title="Kiểm tra đơn hàng"><i class="fa fa-check-circle text-success iconss" aria-hidden="true"></i></a></li>
                            <li><a href="{{URL::to('view-data')}}" class="order" title="Cập nhật thông tin"><i class="fa fa-address-book text-info iconss" aria-hidden="true"></i></a></li>
                            <li><a href="{{URL::to('view-favorite')}}" class="order"><i class="fa fa-heart text-danger iconss" title="Yêu thích"></i></a></li>
                            <li><a href="{{route('get.cart')}}" title="Giỏ hàng" class="order"><i class="fa fa-shopping-bag text-warning iconss"></i></a></li>
                            {{-- <li><a href="{{URL::to('adu')}}" title="Mã giảm giá" class="order"><i class="fa fa-gift text-danger iconss"></i></a></li> --}}
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
                          <span class="hero_span">Danh mục</span>
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
                                    Tất cả
                                    </span>
                                </div>
                                <input type="text" placeholder="Bạn cần gì ???" name='tukhoa'>
                                <button type="submit" class="site-btn">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0776585055</h5>
                                <span>Hỗ trợ 24/7 </span>
                            </div>
                        </div>
                    </div>

                    <div class="hero__item set-bg" data-setbg="{{asset('././public/img/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
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
                            <li>Địa chỉ: Bình Tân, Vĩnh Long</li>
                            <li>Điện thoại: 0776585055</li>
                            <li>NghiaB1809377@student.ctu.edu.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liên kết hữu ích</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Vận chuyển an toàn</a></li>
                            <li><a href="#">Thông tin vận chuyển</a></li>
                            <li><a href="#">Chính sách</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Dịch vụ của chúng tôi</a></li>
                            <li><a href="#">Dự án</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Phản ánh</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia với chúng tôi ngay bây giờ</h6>
                        <p>Nhập email để chúng tôi liên hệ sớm nhất và ưu đãi đặc biệt</p>
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



</body>

</html>
