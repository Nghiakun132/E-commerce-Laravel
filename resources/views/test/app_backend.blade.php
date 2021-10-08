<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/navbar-fixed/">
    <link rel="shortcut icon" href="{{ asset('././././public/img/2.png') }}" type="image/png" width="100px"
        height="100px">
    <link href="https://getbootstrap.com/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('././public/css/user.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

            body {
                min-height: 75rem;
                padding-top: 4.5rem;
            }
        }

        .item a:hover {
            text-decoration: none;
            color: red !important;
        }

        .item {
            font-weight: bold;
        }
        .view {
            font-size: 22px;
        }
        .view:hover{
            background-color: rgba(223, 142, 202, 0.747);
        }
        .dropdown-menu{
            padding: 0 !important;
            top: 116% !important;
        }
    </style>
    {{-- <link href="navbar-top-fixed.css" rel="stylesheet"> --}}
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <a class="navbar-brand" href="{{ route('get_backend.home') }}"><img
                src="{{ asset('./././public/img/2.png') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                @foreach (config('nav.admin.top') as $item)
                    <li class="nav-item item navw">
                        <a class="nav-link text-white text-bold {{ \Request::route()->getName() == $item['route'] ? 'active' : '' }} "
                            href="{{ route($item['route']) }}">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="dropdown">
                <h3 class="text-right item" style="display: block">Xin chào:
                    <a title="Nhấn vào để xem thông tin" href="#" class="text-warning dropdown-toggle"
                        data-toggle="dropdown">
                        <?php
                        $name = Session::get('name');
                        $id = Session::get('id');
                        if ($name) {
                            echo $name;
                        }
                        ?></a>&nbsp;&nbsp;&nbsp;
                    <div class="dropdown-menu dropdown-menu-right bg-success">
                        <a class="dropdown-item view" href="{{URL::to('admin/change-info',$id)}}">Thông tin</a>
                        <a class="dropdown-item view" title="Đăng xuất" href="{{ URL::to('admin/logout') }}">Đăng xuất</a>
                    </div>
                </h3>
            </div>
        </div>
    </nav>
    <main role="main" class="container-fluid">
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    {{-- <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script> --}}
    <script src="https://getbootstrap.com/docs/4.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <img src="{{ asset('././././public/uploads/2021/09/04/2021-09-04__avatar.jpg') }}" width="300px"
                        height="300px" alt="" class="img-thumbnail">
                </div> Bùi Hữu Nghĩa B1809377
            </div>
        </div>
    </div>
</div>



</html>
