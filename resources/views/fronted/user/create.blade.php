<!--
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
	<!-- main -->
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
		<!-- copyright -->

		<!-- //copyright -->
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
	<!-- //main -->
</body>
</html>
