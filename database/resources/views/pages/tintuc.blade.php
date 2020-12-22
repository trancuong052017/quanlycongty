   <!-- Navigation -->
 @extends('pages.layout.index')

@section('content')
   <!-- slider -->
        @include('pages.layout.slide')

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                     <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                     <a href="#">{{$tintuc->TomTat}}</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" width ="800" height='200'src="public/upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{{$tintuc->NoiDung}}</p>
                <hr>

                <!-- Blog Comments -->
                  @if((session('user')))
                <!-- Comments Form -->
                <div class="well">
                    @if(session('thongbao'))
                     <div class='alert alert-success'style="text-align: center">
                     {{session('thongbao')}}
                      </div>
                   
                    @endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="binhluan/{{$tintuc->id}}" method="Post">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                        <div class="form-group">
                            <textarea class="form-control" name = 'NoiDung' rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                  @endif
                <hr>
                
                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($binhluan as $bl)
                <div class="media">

                   
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small>{{$bl->created_at}}</small>
                        </h4>
                        {{$bl->NoiDung}}
                    </div>
                   
                </div>
                <hr>
                  @endforeach
            </div>
            
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">
                
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin noi bat</b></div>
                    <div class="panel-body">
                          @foreach($tinnoibat as $tnb)    
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tnb->TieuDeKhongDau}}.{{$tnb->id}}.html">
                                    <img class="img-responsive" src="public/upload/tintuc/{{$tnb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tnb->TieuDeKhongDau}}.{{$tnb->id}}.html"><b>{{$tnb->TieuDe}}</b></a>
                            </div>
                            <p>{{$tnb->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                      @endforeach
                        <!-- item -->
                       
                       
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin lien quan</b></div>
                    <div class="panel-body">
                        
                         @foreach($tinlienquan as $tnb)  
                        
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tnb->TieuDeKhongDau}}.{{$tnb->id}}.html">
                                    <img class="img-responsive" src="public/upload/tintuc/{{$tnb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tnb->TieuDeKhongDau}}.{{$tnb->id}}.html"><b>{{$tnb->TieuDe}}</b></a>
                            </div>
                            <p>{{$tnb->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                      @endforeach
                        <!-- end item -->
                     </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection