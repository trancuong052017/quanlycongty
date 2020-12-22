
     
   
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
       
        <li><a href='admin/trangchu'style ="color:blue">trở về trang chủ admin</a></li>         
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

                    <a href="admin/user/danhsach"><i class="fa fa-dashboard fa-fw"></i>trang chu</a>
                
                </li>
                  <li>@can('congtrinh.danhsach')
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>  Danh sách công trình-đơn vị  <span class="fa arrow"></span></a>@endcan
                    <ul class="nav nav-second-level">
                        <li>@can('congtrinh.danhsach')

                        <a href="admin/congtrinh/danhsach">Danh Sách</a>
                             @endcan 
                        </li>
                        <li>@can('congtrinh.them')
                            <a href="admin/congtrinh/them">
                                Thêm
                            </a>
                             @endcan 
                        </li>
                    </ul> 
                </li>
                @can('duan.danhsach')
                <li>
                   
                    <a href="#"><i class="fa fa-cube fa-fw"></i>
                        Các dự án(đưa ra web)  
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>@can('duan.danhsach')
                            <a href="admin/duan/danhsach">Danh sách</a>
                            @endcan
                        </li>
                        <li>@can('duan.them')
                         <a href="admin/duan/them">Thêm</a>
                          @endcan 
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li> 
                @endcan
                 <li>
                    @can('thucongtrinh.danhsach')
                    <a href="#"><i class="fa fa-cube fa-fw"></i>
                        Thu-các công trình-đơn vị 
                        <span class="fa arrow"></span></a>@endcan
                    <ul class="nav nav-second-level">
                        <li>@can('thucongtrinh.danhsach')
                            <a href="admin/thucongtrinh/danhsach">Danh sách</a>
                            @endcan
                        </li>
                       <!--  <li>@can('thucongtrinh.them')
                         <a href="admin/thucongtrinh/them">Thêm</a>
                          @endcan 
                        </li> -->
                    </ul>
                    <!-- /.nav-second-level -->
                </li> 
                 <li>
                     @can('chicongtrinh.danhsach')
                    <a href="#"><i class="fa fa-cube fa-fw"></i>
                        Chi-các công trình-đơn vị  
                   <span class="fa arrow"></span></a>@endcan
                    <ul class="nav nav-second-level">
                        <li>@can('chicongtrinh.danhsach')
                            <a href="admin/chicongtrinh/danhsach">Danh sách</a>
                            @endcan
                        </li>
                        <li>@can('chicongtrinh.them')
                         <a href="admin/chicongtrinh/them">Thêm</a>
                          @endcan 
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>     
                <li>@can('theloai.danhsach')
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Thể loại<span class="fa arrow"></span></a>@endcan 
                    <ul class="nav nav-second-level">
                        <li>@can('theloai.danhsach')
                            <a href="admin/theloai/danhsach">Danh Sách</a>
                             @endcan 
                        </li>
                        <li>@can('theloai.them')
                            <a href="admin/theloai/them">
                                Thêm
                            </a>
                             @endcan 
                        </li>
                    </ul>
                </li>
                    <!-- /.nav-second-level -->
                
                <li>
                     @can('loaitin.danhsach')
                    <a href="#"><i class="fa fa-cube fa-fw"></i>Loại Tin<span class="fa arrow"></span></a>@endcan 
                    <ul class="nav nav-secon@can('loaitin.danhsach')d-level">
                        <li>@can('loaitin.danhsach')
                            <a href="admin/loaitin/danhsach">Danh sách</a>
                            @endcan
                        </li>
                        <li>@can('loaitin.them')
                            <a href="admin/loaitin/them">Thêm</a>
                            @endcan
                        </li>
                    </ul>

                 <li>
                    @can('tintuc.danhsach')
                    <a href="#"><i class="fa fa-cube fa-fw"></i> Tin tức<span class="fa arrow"></span></a>@endcan 
                    <ul class="nav nav-second-level">
                        <li>@can('tintuc.danhsach')
                            <a href="admin/tintuc/danhsach">Danh sách</a>
                            @endcan
                        </li>
                        <li>@can('tintuc.them')
                            <a href="admin/tintuc/them">Thêm</a>
                            @endcan
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>@can('user.danhsach')
                    <a href="#"><i class="fa fa-users fa-fw"></i> nhân viên<span class="fa arrow"></span></a>@endcan 
                    <ul class="nav nav-second-level">
                        <li>@can('user.danhsach')
                            <a href="admin/user/danhsach">danh sách</a>
                            @endcan
                        </li>
                        <li>@can('user.them')
                            <a href="admin/user/them">thêm</a>
                            @endcan
                        </li>
                       
                    </ul>
                    @if(session('truycap')==2)
                     <a href="#"><i class="fa fa-users fa-fw"></i> vai trò quản lý<span class="fa arrow"></span></a>
                    
                    <ul class="nav nav-second-level">
                        <li>@can('role.danhsach')
                            <a href="admin/role/danhsach">danh sách</a>
                            @endcan
                        </li>
                        <li>@can('role.them')
                            <a href="admin/role/them">thêm</a>
                            @endcan
                        </li>
                        
                        
                    </ul>
                      @endif
                    <li>
                     @can('chucvu.danhsach')
                    <a href="#"><i class="fa fa-cube fa-fw"></i>Chức vụ
                        <span class="fa arrow"></span></a>@endcan 
                    <ul class="nav nav-second-level">
                         <li>@can('chucvu.danhsach')
                         <a href="admin/chucvu/danhsach">Danh sách </a>
                           @endcan
                        </li>
                        <li>@can('chucvu.them')
                         <a href="admin/chucvu/them">Thêm</a>
                           @endcan
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    @can('permission.them')
                    <a href="#"><i class="fa fa-cube fa-fw"></i>    
                        tạo dữ liệu quyền truy cập
                     @endcan 
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>@can('permission.danhsach')
                            <a href="admin/permission/danhsach">Danh sách</a>
                        </li>@endcan
                        <li>@can('permission.them')
                         <a href="admin/permission/them">Thêm</a>
                          @endcan 
                        </li>
                    </ul>
                     
                    <!-- /.nav-second-level -->
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