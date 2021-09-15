<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

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
        background-color: rgba(79, 139, 216, 0.856);
    }
</style>

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="p-3">
                <form action="{{URL::to('/admin/adminlogin')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="matkhau" class="form-control" placeholder="Enter password" id="pwd">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>

    </div>
</body>
</html>
<?php
$message = Session::get('message');
if ($message) {
    echo '<h2 class="text-center text-danger mt-7">' . $message . '</h2>';
    Session::put('message', null);
}
?>


