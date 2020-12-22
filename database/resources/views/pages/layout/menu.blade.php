
           <!-- slider -->
    

    <div id="banner" class="">
    <div class="top-banner w-clear">
        <div class="w-clear wikis">
            <div class="top-banner-l ">
                <span class="" >
                    <i class="fas fa-map-marker-alt"></i> 
                    C3 Quang Trung phường 11 Quận Gò Vấp Tp. HCM                </span>
            </div>
            <div class="top-banner-r">
                <span class="hotline">
                    <i class="fas fa-phone-volume"  data-fa-transform="rotate-30" ></i> Hotline: 
                    <a href="tel:0903691070" title="0903691070">0903691070</a>
                </span>
            </div>
        </div>

    </div>
    <div class=" box_scroll "><div class="w-clear">     
    <div class="w-clear wikis">
        <div class="banner w-clear">
            <a href="trangchu" tppabs="{{asset('')}}" class="logo">
                <img src="public/front_asset/86176_logo_vi.png" tppabs="{{asset('')}}public/front_asset/86176_logo_vi.png" alt="CÔNG TY CỔ PHẦN XÂY DỰNG AN ĐẠI LỘC" />
            </a>
            <div class="banner-mid w-clear">
                <div class="banner_img ">
                    <img src="public/front_asset/86176_banner_vi.png" tppabs="{{asset('')}}public/front_asset/86176_banner_vi.png" alt="Banner" class="banner_img   "/>
                </div>
            </div>
            <div class="banner-right">
                                
                    
                <div class="w-clear banner-mn">
                    
<div id="menu" class="w-clear" >
    <div class="w-clear menu text-center" >



        <ul id="main-menu" class="sm sm-blue w-clear  menu-l">

            <li class="menu-line  activem">
                <a href="trangchu" tppabs="{{asset('')}}">
                    <!-- <i class="fa fa-home " aria-hidden="true" style="font-size:28px;"></i> -->
                    Trang chủ                </a>
            </li>

            <li class="menu-line ">
                <a href="gioi-thieu">Giới thiệu</a>
            </li>

           <li class="menu-line ">
                <a href="dich-vu">Dịch vụ</a>
                                <ul>
                                    <li>
                        <a href="dich-vu" >tư vấn giám sát</a>
                    </li>
                                    </ul>
                            </li>

            <li class="menu-line cap ">
                <a href="du-an.html" tppabs="{{asset('')}}du-an.html">Dự án</a>
                                <ul>
                             @foreach($theloai as $theloai)       
                             <li  >
                            <a href="{{$theloai->TenKhongDau}}.{{$theloai->id}}.html" />{{$theloai->Ten}}</a>
                             </li>
                             @endforeach   
                             </ul>
                            </li>


            <li class="menu-line ">
                <a href="tuyen-dung">Tuyển dụng</a>
            </li>

            <li class="menu-line ">
                <a href="lien-he">Liên hệ</a>
            </li>
        </ul>
        <div class="menu-r">
            <a class="bt-hs" href="https://drive.google.com/open?id=1tZ04SdWeaXdw0W_8DRAxYXVkkYgWOIhO" target="_blank">
                Hồ sơ năng lực
            </a>
        </div>
                

    </div>
</div>





