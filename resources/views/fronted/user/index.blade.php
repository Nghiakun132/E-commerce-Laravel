<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang đăng nhập</title>
    <link rel="icon" href="{{ asset('././././img/2.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./public/css/login.css">
    </head>
    <body>

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
                        <form method="POST" action="{{URL::to('login-user')}}">
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
                                <input type="password" class="form-control" placeholder="password" name="password" >
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Đăng nhập" class="btn float-right login_btn">
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links link">
                            Chưa có tài khoản<a href="{{URL::to('sign-up')}}">Đăng ký ngay!</a>
                        </div>
                        <div class="d-flex justify-content-center links link">
                            <a href="{{URL::to('forgot-password')}}">Quên mật khẩu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
        $messages = Session::get('message');
        $message_error = Session::get('message_error');
        $change_password = Session::get('change_password');
        if($messages){
            echo '<script type="text/javascript">alert("'.$messages.'")</script>';
            Session::put('message',null);
        }elseif($change_password){
            echo '<script type="text/javascript">alert("'.$change_password.'")</script>';
            Session::put('change_password',null);
        }elseif ($message_error) {
            echo '<script type="text/javascript">alert("'.$message_error.'")</script>';
            Session::put('message_error',null);
        }

    ?>
    <style>
        .link a{
            color: rgb(20, 196, 228);
            text-decoration: none;
        }
        .link a:hover{
            text-decoration: none;
            color: rgb(140, 255, 9);
        }
    </style>
</html>
