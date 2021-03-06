<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Khoa Phạm</title>
     <base href='{{asset("")}}'>
    <!-- Bootstrap Core CSS -->
    <link href="public/admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="public/admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="public/admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mời bạn đăng nhập </h3>
                    </div>
                    <div class="panel-body">
                        @if(session('thongbao'))
                            <div class='alert alert-danger'>
                             {{session('thongbao')}}
                             </div>
                             @endif
                             
                              
                        <form role="form" action="admin/dangnhap" method="POST">
                             <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                            <fieldset>
                                <div class="form-group">
                                    <label>email đăng nhập</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    @if($errors->has('email'))
                                    <div class ='alert alert-danger'>
                                        <strong>{{$errors->first('email')}}</strong>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>mật khẩu </label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                     @if($errors->has('password'))
                                    <div class ='alert alert-danger'>
                                        <strong>{{$errors->first('password')}}</strong>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">dang nhap</button>
                                <button style="margin: 8px;">
                                    <a href ="quenmatkhau">Quên mật khẩu</a></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="public/admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/admin_asset/dist/js/sb-admin-2.js"></script>

</body>

</html>
