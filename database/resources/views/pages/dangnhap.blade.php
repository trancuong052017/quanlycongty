<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Khoa Pham</title>
     <base href='{{asset("")}}'
    <!-- Bootstrap Core CSS -->
    <link href="public/front_asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/front_asset/css/shop-homepage.css" rel="stylesheet">
    <link href="public/front_asset/css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

   

    <!-- Page Content -->
    <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng nhập</div>
                    <div class="panel-body">
                        @if(session('thongbao'))
   
                    <div class='alert alert-success'>
                     
                     {{session('thongbao')}}
                     </div>
                     @endif
                     @if(session('loi'))
                     <div class='alert alert-danger'style="text-align: center color:red">
                     {{session('loi')}}
                     </div>
                     @endif       
                        <form action="dangnhap" method="post">
                            <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                            <div>
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" 
                                >
                            </div>
                            <br>    
                            <div>
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Đăng nhập
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

 
    < <script src="public/front_asset/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/front_asset/js/bootstrap.min.js"></script>
    <script src="public/front_asset/js/my.js"></script>
    @yield('script')
</body>

</html>
