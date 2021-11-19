{{-- <!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href=".././public/css/register.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font --><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="main-w3layouts wrapper">
		<h1>Form đăng ký</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="{{URL::to('add-user')}}" method="post">
                    @csrf
					<input class="text" type="text" name="name" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
                    <small class="form-text text-danger"> {{ $errors->first('email') }}</small>
					<input class="text" type="password" name="password" placeholder="Password" required="">
                    <small class="form-text text-danger"> {{ $errors->first('password')}}</small>
					<input class="text" style="margin:24px 0" type="text" name="address" placeholder="address" required="">
					<input class="text" style="margin:24px 0" type="number" name="phone" placeholder="Phone" required="">
                    <small class="form-text text-danger"> {{ $errors->first('phone')}}</small>
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>Bạn đồng ý với các điều khoản, điều kiện</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="Đăng ký">
				</form>
				<p>Đã có tài khoản <a href="{{route('get.user.index')}}"> Đăng nhập ngay!</a></p>
			</div>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</body>
</html> --}}


<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký thành viên</title>
    <link rel="icon" href="{{ asset('././././img/2.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./public/css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Đăng ký</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('add-user') }}" method="post">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nhập họ và tên" name="name">
                        </div>
                        <span class="text-danger"><b>{{$errors->first('name')}}</b></span>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Nhập email" name="email">
                        </div>
                        <span class="text-danger"><b>{{$errors->first('email')}}</b></span>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone">
                        </div>
                        <span class="text-danger"><b>{{$errors->first('phone')}}</b></span>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address">
                        </div>
                        <span class="text-danger"><b>{{$errors->first('address')}}</b></span>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        </div>
                        <span class="text-danger"><b>{{$errors->first('password')}}</b></span>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="re_password">
                        </div>
                        <span class="text-danger"><b>{{$errors->first('re_password')}}</b></span>
                        <div class="form-group">
                            <input type="submit" value="Đăng ký" class="btn float-right login_btn">
                        </div>
                    </form>

                </div>
                <div class="card-footer">

                    <div class="d-flex justify-content-center links link">
                        Đã có tài khoản <a href="{{ URL::to('login-checkout') }}">đăng nhập ngay</a>
                    </div>
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

</html>
