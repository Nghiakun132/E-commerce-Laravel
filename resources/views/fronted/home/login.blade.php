<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('././public/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././public/css/style.css') }}" type="text/css">
</head>
<body>
<style>
    body{
        background-color: rgb(211, 122, 122);
    }
</style>
<section class="breadcrumb-section set-bg" data-setbg="././public/img/breadcrumb.jpg" style="background-image: url(&quot;./././public/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>NghiaKun Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('get.home')}}">Home</a>
                        <span>Đăng nhập</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="p-3">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('get.register')}}"><span class="text-danger">Đăng ký nếu chưa có tài khoản</span></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
