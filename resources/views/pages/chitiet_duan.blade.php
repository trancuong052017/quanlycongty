@extends('pages.layout.index')

@section('content')
<div id="container" class="w-clear">
				<div class="w-clear wikis">
					<link href="public/front_asset/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen">
<script src="public/front_asset/magiczoomplus.js" type="text/javascript"></script>
<link href="public/front_asset/magiczoomplus-style.css" rel="stylesheet" type="text/css" media="screen">


<div class=" w-clear ">
    <div class="breadcrumd">
        <a class="name" href="">
            Trang chủ        </a> &gt; 

        <a class="name" >Dự án</a>

                    &gt; <a class="name">
           {{$chitiet->Ten}}
        </a> 
            </div>

    <div class="w-clear text-center  main-tit">
        <div class="name">
            Dự án        </div>
    </div>
    
    <div class="w-clear content bg_f">
        <div class="w-clear">
            <div class="w-clear">
                <div class="ct-l">
                    <div class="ct-img ">
                        <a id="Zoom-1" class="MagicZoom" href="public/upload/duan/{{$chitiet->anh}}">
                            <figure class="mz-figure mz-hover-zoom mz-ready"><img src="public/upload/duan/{{$chitiet->anh}}"alt="{{$chitiet->Ten}}"  style="width: 840px; height: 420px;"><div class="mz-lens" style="top: 0px; transform: translate(-10000px, -10000px); width: 170px; height: 132px;"><img src="{{asset('')}}public/upload/duan/{{$chitiet->anh}}" style="position: absolute; top: 0px; left: 0px; width: 1000px; height: 288px;"></div><div class="mz-loading"></div><div class="mz-hint"><span class="mz-hint-message">Hover to zoom</span></div></figure>
                        </a>
                    </div>
                     <div class="ct-img-list">
                        <!-- Thumb list zoom -->
                         <div class="slick-img-thumb">
                        <?php $anhkemtheo = json_decode($chitiet->anhkemtheo);?>
                                    @if(is_array($anhkemtheo))
                                     @foreach($anhkemtheo as $anhkemtheo)  
                       
                            <div>
                                <div style="padding: 5px;">
                                   
                                        <img src="public/upload/duan/{{$anhkemtheo}}" class="thumb" />
                                  
                                </div>
                            </div>
                        
                         @endforeach

                     @endif
                      </div>
                    </div>
                     </div>
                <div class="ct-r">
                    <table border="0" width="100%;" class="ct-sp">
                        <tbody><tr>
                            <td colspan="2"><h2 style="font-size:24px;margin:0;">  {{$chitiet->Ten}} </h2> </td>
                        </tr>
                                                                                                <tr>
                            <td colspan="2"><b class="tt">Đối tác &amp; Chủ đầu tư : </b>   {{$chitiet->doitac}}</td>
                        </tr>
                                                                        <tr>
                            <td colspan="2"><b class="tt">Vị trí dự án : </b>   {{$chitiet->vitri}}</td>
                        </tr>
                                                
                                                <tr>
                            <td colspan="2"><b class="tt">Thời gian thi công : </b>   {{$chitiet->ngaythicong}}</td>
                        </tr>
                                                                        <tr>
                            <td colspan="2"><b class="tt">Ngày hoàn thành : </b>  {{$chitiet->ngayhoanthanh}}</td>
                        </tr>
                                                                        <tr>
                            <td colspan="2"><b class="tt">Lượt xem :</b> {{$chitiet->luotxem}}</td>
                        </tr>

                                                

                    </tbody></table>
                    <div class="w-clear box-share"><div class="addthis_native_toolbox" data-url="http://andailoc.vn/du-an/tru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html" data-title=" TRỤ SỞ CÔNG TY TNHH MTV XỔ SỐ KIẾN THIẾT LONG AN - CÔNG TY CỔ PHẦN XÂY DỰNG AN ĐẠI LỘC"><div id="atstbx" class="at-share-tbx-element at-share-tbx-native addthis_default_style addthis_20x20_style addthis-smartlayers addthis-animated at4-show"><a class="addthis_button_facebook_like at_native_button at300b" fb:like:layout="button_count"><div class="fb-like fb_iframe_widget" data-layout="button_count" data-show_faces="false" data-share="false" data-action="like" data-width="90" data-height="25" data-font="arial" data-href="http://andailoc.vn/du-an/tru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html" data-send="false" style="height: 25px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=http%3A%2F%2Fandailoc.vn%2Fdu-an%2Ftru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90"><span style="vertical-align: bottom; width: 69px; height: 28px;"><iframe name="f20934aeb7a9174" width="90px" height="25px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://web.facebook.com/v2.5/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df20410fe8a34f18%26domain%3Dandailoc.vn%26origin%3Dhttp%253A%252F%252Fandailoc.vn%252Ff126af25ea12a54%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=http%3A%2F%2Fandailoc.vn%2Fdu-an%2Ftru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90" style="border: none; visibility: visible; width: 69px; height: 28px;" class=""></iframe></span></div></a><a class="addthis_button_facebook_share at_native_button at300b" fb:share:layout="button_count"><div class="fb-share-button fb_iframe_widget" data-layout="button_count" data-href="http://andailoc.vn/du-an/tru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html" style="height: 25px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fandailoc.vn%2Fdu-an%2Ftru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey"><span style="vertical-align: bottom; width: 77px; height: 20px;"><iframe name="f1fad5b02aa3b78" width="1000px" height="1000px" data-testid="fb:share_button Facebook Social Plugin" title="fb:share_button Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://web.facebook.com/v2.5/plugins/share_button.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1d2827cd639e4%26domain%3Dandailoc.vn%26origin%3Dhttp%253A%252F%252Fandailoc.vn%252Ff126af25ea12a54%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fandailoc.vn%2Fdu-an%2Ftru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey" style="border: none; visibility: visible; width: 77px; height: 20px;" class=""></iframe></span></div></a><a class="addthis_button_facebook_send at_native_button at300b"><div class="fb-send" data-href="http://andailoc.vn/du-an/tru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html" data-type="box_count" style="height: 25px;"></div></a><a class="addthis_button_google_plusone at_native_button"></a><a class="addthis_counter addthis_pill_style at_native_button addthis_nonzero" href="#" style="display: inline-block;"><a class="atc_s addthis_button_compact">Chia sẻ<span></span></a><a class="addthis_button_expanded" target="_blank" title="Thêm..." href="#">1</a></a><div class="atclear"></div></div></div></div>
                </div>
            </div>
        </div>

        <div class="w-clear">
            <div class="box-tab-tit">
                <div class="active">
                    Thông tin                </div>
                <div class="">
                    Bình luận                </div>
            </div>
            <div>
                <div class="box-tab-con" style="display:block;">
                    <div class="w-clear">
                                            </div>
                </div>
                <div class="box-tab-con">
                                        <div class="w-clear">
                        <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-href="{{asset('')}}chitiet_duan/{{$chitiet->id}}.html" data-width="100%" data-numposts="5" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;height=100&amp;href=http%3A%2F%2Fandailoc.vn%2Fdu-an%2Ftru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.5&amp;width=" style="width: 100%;"><span style="vertical-align: bottom; width: 100%; height: 0px;"><iframe name="f21828194df66" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://web.facebook.com/v2.5/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df5af1cf02e5efc%26domain%3Dandailoc.vn%26origin%3Dhttp%253A%252F%252Fandailoc.vn%252Ff126af25ea12a54%26relation%3Dparent.parent&amp;container_width=0&amp;height=100&amp;href=http%3A%2F%2Fandailoc.vn%2Fdu-an%2Ftru-so-cong-ty-tnhh-mtv-xo-so-kien-thiet-long-an-36.html&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.5&amp;width=" class=" fb_iframe_widget_lift" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></div>
                    </div>
                </div>
            </div>
        </div>
            </div>
</div>

<div class="w-clear" style="margin-top: 20px;">
        <div class="w-clear">
        <div class="main-tit">
            <h2 class="name">
                Dự án khác
            </h2>
        </div>
        <div class="w-clear">
            <div class=" sukienclick ds_sp col_4">
                
                @foreach($duan as $da)
                <div class="box-sp w-clear ">
                    <a href="chitiet_duan/{{$da->id}}.html">
                        <div class="images">
                            <img src="public/upload/duan/{{$da->anh}}" >
                        </div>
                    </a>
                    <div class="info w-clear">
                        <a href=".html">
                            <div class="name">{{$da->Ten}}
                            </div>
                       </a>
                    </div>
                    <a class="more button" href="chitiet_duan/{{$da->id}}.html">
                        Xem thêm                               
                    </a>
                </div>
            @endforeach
                
             </div>
             <div class="phantrang"> {{$duan->links()}} </div>
    </div>
    </div>

				</div>
			</div>
   @endsection         