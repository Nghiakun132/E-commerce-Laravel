{{-- <!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('././css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('././css/style.css') }}" type="text/css">
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
</html> --}}
<?php
$message = Session::get('message');
if ($message) {
    echo '<h2 class="text-center text-danger mt-7">' . $message . '</h2>';
    Session::put('message', null);
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
    <head>
        <title>Trang đăng nhập</title>
        <!--Made with love by Mutiullah Samim -->
        <!--Bootsrap 4 CDN-->
    <link rel="icon" href="{{ asset('././././img/2.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!--Custom styles-->
        <link rel="stylesheet" type="text/css" href=".././public/css/login.css">
    </head>
    <body>
        <?php $messages = Session::get('message'); ?>
        <h3 class="text-danger text-center"> <?php echo $messages?></h2>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Đăng nhập</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{URL::to('/admin/adminlogin')}}">
                            @csrf
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="email" name="email">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                        {{-- <input type="password" name="matkhau" class="form-control" placeholder="Enter password" id="pwd"> --}}
                        <input type="password" class="form-control" placeholder="password" name="matkhau" >
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    <input type="submit" value="Login" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

