<!DOCTYPE html>
<html>

<head>
    <title>Quên mật khẩu</title>
    <link rel="icon" href="{{ asset('././././img/2.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../public/css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Quên mật khẩu</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('reset-password', $token) }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <h4 class="text-white">{{$errors->first('password')}}</h4>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="confirm password"
                                name="cf_password">
                            </div>
                            <h4 class="text-white">{{$errors->first('cf_password')}}</h4>
                        <div class="form-group">
                            <input type="submit" value="Change" class="btn float-right login_btn">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</body>
<style>
    .link a {
        color: rgb(20, 196, 228);
        text-decoration: none;
    }

    .link a:hover {
        text-decoration: none;
        color: rgb(140, 255, 9);
    }

</style>
<?php
$email = Session::get('email_error');
$email_success = Session::get('email_success');
if ($email) {
    echo "<script>alert('$email')</script>";
    Session::put('email_error', null);
} elseif ($email_success) {
    echo "<script>alert('$email_success')</script>";
    Session::put('email_success', null);
}
?>

</html>
