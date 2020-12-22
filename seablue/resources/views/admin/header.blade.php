
     
   
                <!-- /.col-lg-12 -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        @if(count($errors)>0)
    <div class='alert alert-danger'>
     @foreach($errors->all() as $err) 
     {{$err}}<br>
     @endforeach 
     </div> 
    @endif
    
    
    </div>
    <!-- /.navbar-header -->
    
    <ul class="nav navbar-top-links navbar-right">
       <!-- /.dropdown -->
        <li><a href="admin/trangchu"style ="color:blue">Trang chủ 
     </a></li>
       <li><a href='{{asset("")}}'style ="color:blue">trở về trang web  </a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-user">
                @if(session('name'))
                <li><a href="#"><i class="fa fa-user fa-fw"></i>{{session('name')}}</a>
                </li>
                <li><a href="admin/user/sua/{{session('id')}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="admin/dangxuat"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
@if(session('thongbao'))
    
    <div class='alert alert-success'style="text-align: center">
     {{session('thongbao')}}
     </div>
     @endif
     @if(session('loi'))
     <div class='alert alert-danger'style="text-align: center">
     {{session('loi')}}
     </div>
     @endif
      
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                     
                    <!-- /input-group -->
                </li>
                <li>

                    <a href="admin/trangchu"><i class="fa fa-dashboard fa-fw"></i>menu</a>
                
                </li>
                 <li>

                    <a href="admin/menu/them"><i class="fa fa-dashboard fa-fw"></i>them menu</a>
                
                </li> 
                <li>

                    <a href="admin/jidlo/danhsach"><i class="fa fa-dashboard fa-fw"></i>danh sách món ăn</a>
                
                </li> 
                <li>

                    <a href="admin/jidlo/them"><i class="fa fa-dashboard fa-fw"></i>thêm món ăn</a>
                
                </li> 
                <li>

                    <a href="admin/dangky"><i class="fa fa-dashboard fa-fw"></i>đăng ký thành viên </a>
                
                </li> 
                <li>
                     <a href="admin/dangxuat"><i class="fa fa-users fa-fw"></i>đăng xuất<span class="fa arrow"></span></a>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>