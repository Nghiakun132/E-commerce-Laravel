<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký tài khoản</title>

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

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="p-3">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Enter phone" id="phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
