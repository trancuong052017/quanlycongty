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

   

</head>

<body>

   

    <!-- Page Content -->
    <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng ký</div>
                    <div class="panel-body">
                       
				     @if(session('loi'))
				     <div class='alert alert-danger'style="text-align: center color:red">
				     {{session('loi')}}
				     </div>
				     @endif       
                        <form action="dangky" method="post">
                            <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                            <div>
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" 
                                >
                               @if ($errors->has('email'))
                   <div class='alert alert-danger'>{{ $errors->first('email') }}</div>
                             @endif
                            </div>
                            <br>    
                            <div>
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                   <div class='alert alert-danger'>{{ $errors->first('password') }}</div> @endif
                            </div>
                            <br>
                            <div>
                                <label>Tên đăng nhập </label>
                                <input type="text" class="form-control" name="name">
                                @if ($errors->has('name'))
               <div class='alert alert-danger'>{{ $errors->first('name') }}</div>
                                 @endif
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Đăng ký 
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

