
 <!DOCTYPE html PUBLIC>
<html lang="vi">
<head>
    
    <!-- JS Min -->
     <base href="{{asset('')}}">
<!-- <script type="text/javascript" src="public/front_asset/jquery-1.10.2.min.js" tppabs="{{asset('')}}js/jquery-1.10.2.min.js"></script> -->
<script type="text/javascript" src="public/front_asset/jquery-migrate-1.2.1.min.js" tppabs="{{asset('')}}public/front_asset/jquery-migrate-1.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="public/front_asset/platform.js" tppabs="https://apis.google.com/js/platform.js" async defer></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css"  href="public/front_asset/fonts.css" tppabs="{{asset('')}}public/front_asset/fonts.css"/>
<link rel="stylesheet" type="text/css"  href="public/front_asset/bootstrap.min.css" tppabs="{{asset('')}}public/front_asset/bootstrap.min.css"/>

<!-- Font Awesome -->
<link rel="stylesheet" href="public/front_asset/fontawesome-all.css" tppabs="{{asset('')}}public/front_asset/fontawesome-all.css">

<!-- Fancy box -->
<link rel="stylesheet" type="text/css" href="public/front_asset/jquery.fancybox.min.css-v=3.css" tppabs="{{asset('')}}public/front_asset/jquery.fancybox.min.css?v=3" media="screen" />

<!-- Owl -->
<link rel="stylesheet" type="text/css" href="public/front_asset/owl.carousel.css" tppabs="{{asset('')}}public/front_asset/owl.carousel/owl.carousel.css"/>

<!-- Fotorama -->
<link rel="stylesheet" type="text/css" href="public/front_asset/fotorama.css" tppabs="{{asset('')}}public/front_asset/fotorama.css"/>

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="public/front_asset/slick.css" tppabs="{{asset('')}}public/front_asset/slick.css"/>
<link rel="stylesheet" type="text/css" href="public/front_asset/slick-theme.css" tppabs="{{asset('')}}public/front_asset/slick-theme.css"/>

<!--stickytooltip-->
<link href="public/front_asset/stickytooltip.css" tppabs="{{asset('')}}public/front_asset/stickytooltip.css" type="text/css" rel="stylesheet" />

<!-- Slide -->
<link rel="stylesheet" type="text/css" href="public/front_asset/wow.style.css" tppabs="{{asset('')}}public/front_asset/wow.style.css" />


<!-- SmartMenus core CSS (required) -->
<link href="public/front_asset/sm-core-css.css" tppabs="{{asset('')}}public/front_asset/sm-core-css.css" rel="stylesheet" type="text/css" />
<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="public/front_asset/sm-blue.css" tppabs="{{asset('')}}public/front_asset/sm-blue.css" rel="stylesheet" type="text/css" />

<!-- Menu -->
<link type="text/css" rel="stylesheet" href="public/front_asset/jquery.mmenu.all.css" tppabs="{{asset('')}}public/front_asset/jquery.mmenu.all.css" />
<link type="text/css" rel="stylesheet" href="public/front_asset/jquery.mmenu.positioning.css" tppabs="{{asset('')}}public/front_asset/jquery.mmenu.positioning.css" />

<link rel="stylesheet" href="public/front_asset/jquery.simplyscroll.css" tppabs="{{asset('')}}public/front_asset/jquery.simplyscroll.css" media="all" type="text/css">

<!-- My main CSS -->
<link href="public/front_asset/style.css" tppabs="{{asset('')}}public/front_asset/style.css" rel="stylesheet" type="text/css" />
<link href="public/front_asset/giohang.css" tppabs="{{asset('')}}public/front_asset/giohang.css" rel="stylesheet" type="text/css" />

<link href="public/front_asset/index.css" tppabs="{{asset('')}}public/front_asset/index.css" rel="stylesheet" type="text/css" />



    <!-- Google analytics -->
</head>

<body>
<div id="menu" class="w-clear" >
    <div class="w-clear menu text-center" >



        <ul id="main-menu" class="sm sm-blue w-clear  menu-l">

            <li class="menu-line  ">
     <a href="{{asset('')}}" tppabs="{{asset('')}}">
       <h3> Domů</h3>
                </a>
            </li>

            <li class="menu-line ">
                <a href="oteviracidoba"><H3>Otevírací doba</H3></a>
            </li>

           <li class="menu-line ">
                <a href="rozvoz"><H3>Rozvoz jídla</H3></a>
                               
            </li>

            <li class="menu-line cap ">
                <a href="jidelni-list" tppabs="{{asset('')}}du-an.html"><H3>Jídelní lístek</H3></a>
                                <ul>
                             @foreach($menu as $loaitin)       
                             <li  >
                            <a href="jidlo/{{$loaitin->tenkhongdau}}.{{$loaitin->id}}.html" />{{$loaitin->name}}</a>
                             </li>
                             @endforeach   
                             </ul>
                            </li>


            <li class="menu-line ">
                <a href="fotky"><H3>Fotky</H3></a>
            </li>

            <li class="menu-line ">
                <a href="kontakt"><H3>Kontakt</H3></a>
            </li>
        </ul>
        
                

    </div>
</div>

  <script type="text/javascript" src="public/front_asset/jquery.nicescroll.min.js" tppabs="{{asset('')}}public/front_asset/jquery.nicescroll.min.js"></script>
<script type="text/javascript"> 
    $(document).ready(function() { 
        $(".col-scroll").niceScroll({cursorcolor:"#dcdcdc"});
    });
</script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="public/front_asset/bootstrap.min.js" tppabs="{{asset('')}}jpublic/front_asset/bootstrap.min.js"></script>
<!-- Fancy box -->
<script type="text/javascript" src="public/front_asset/jquery.fancybox.min.js-v=3.js" tppabs="{{asset('')}}public/front_asset/jquery.fancybox.min.js?v=3"></script>
<!-- Owl -->
<script type="text/javascript" src="public/front_asset/owl.carousel.min.js" tppabs="{{asset('')}}public/front_asset/owl.carousel/owl.carousel.min.js"></script>
<!-- Fotorama -->
<script type="text/javascript" src="public/front_asset/fotorama.js" tppabs="{{asset('')}}public/front_asset/fotorama.js"></script>
<!-- Slick -->
<script type="text/javascript" src="public/front_asset/slick.min.js" tppabs="{{asset('')}}public/front_asset/slick.min.js"></script>

<!--stickytooltip-->
<script type="text/javascript" src="public/front_asset/stickytooltip.js" tppabs="{{asset('')}}public/front_asset/stickytooltip.js"></script>
<!--stickytooltip-->
<script type="text/javascript" src="public/front_asset/jquery.sticky-kit.js" tppabs="{{asset('')}}public/front_asset/jquery.sticky-kit.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.slick-img-thumb').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows:true,
            vertical:false,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }
            ]
        });

        $('.slick_2').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            nextArrow: '<img src="./img/next-30.png" alt="Next" class="next">',
            prevArrow: '<img src="./img/prev-30.png" alt="Prev" class="prev">',

            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });
        $('.slick_3').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });

        $('.slick_4').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });

        $('.slick_5').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
        
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });

        $('.slick_1').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            autoplay:true,
            fade: true,
            speed:300,
        });
        $('.single-item').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay:true,
            speed:300,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            dots: false,
            infinite: true,
            asNavFor: '.single-item',
            slidesToShow: 4,
            slidesToScroll: 1,
            vertical:true,
            arrows:false,
            autoplay:true,
            speed:300,    
            slide: 'div',
            focusOnSelect: true

        });
        $('.slick-v').slick({
            dots: false,
            infinite: true, 
            slidesToShow: 2,
            slidesToScroll: 1,
            vertical:true,
            arrows:false,
            autoplay:true,
            speed:300,        
        });
        $('.variable-width').slick({
          dots: false,
          infinite: true,
          autoplay:true,
          speed: 300,
          slidesToShow: 1,
          variableWidth: true
        });
    });
</script>

<!-- Tìm kiếm -->
<script type="text/javascript">
    function doEnter_tt(evt)
    {
        // IE                   // Netscape/Firefox/Opera
        var key;
        if(evt.keyCode == 13 || evt.which == 13){
            onSearch_tt(evt);
        }
    }
    function doEnter(evt)
    {
        // IE                   // Netscape/Firefox/Opera
        var key;
        if(evt.keyCode == 13 || evt.which == 13){
            onSearch(evt);
        }
    }
    
    function doEnters(evt)
    {
        // IE                   // Netscape/Firefox/Opera
        var key;
        if(evt.keyCode == 13 || evt.which == 13){
            onSearchs(evt);
        }
    }

    function onSearch_tt(evt) 
    {
        var keyword = document.getElementById("keyword_tt").value;
        var type = $("#keyword_tt").attr('data-type');
        if(keyword=='')
            alert('Bạn chưa nhập từ khóa!');
        else{
            //var encoded = Base64.encode(keyword);
            location.href = "{{asset('')}}tim-kiem/keyword="+keyword+"&tp="+type;
            loadPage(document.location);            
        }
    }   
    
    function onSearch(evt) 
    {
        var keyword = document.getElementById("keyword").value;
        if(keyword=='')
            alert('Bạn chưa nhập từ khóa!');
        else{
            //var encoded = Base64.encode(keyword);
            location.href = "{{asset('')}}tim-kiem/keyword="+keyword;
            loadPage(document.location);            
        }
    }   
    
    function onSearchs(evt) 
    {
        var keyword = document.getElementById("keywords").value;
        if(keyword=='')
            alert('Bạn chưa nhập từ khóa!');
        else{
            //var encoded = Base64.encode(keyword);
            location.href = "{{asset('')}}tim-kiem/keyword="+keyword;
            loadPage(document.location);            
        }
    }    

</script>

<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="public/front_asset/jquery.smartmenus.js" tppabs="{{asset('')}}public/front_asset/jquery.smartmenus.js"></script>
<!-- SmartMenus jQuery init -->
<script type="text/javascript">
    $(function() {
        $('#main-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: 0
        });

        $('#main-menus').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8
        });
    });
</script>

<!-- Menu -->
<script type="text/javascript" src="public/front_asset/jquery.mmenu.min.all.js" tppabs="{{asset('')}}public/front_asset/jquery.mmenu.min.all.js"></script>
<script type="text/javascript">
    $(function() {
        $('#navmenu').mmenu({
            extensions  : [ 'effect-slide-menu', 'pageshadow' ],
            searchfield : false,
            counters  : false,
            offCanvas: {
                position  : "left"
            }
        });
    });
</script>
<script type="text/javascript" src="public/front_asset/jquery.simplyscroll.js" tppabs="{{asset('')}}public/front_asset/jquery.simplyscroll.js"></script>

<script type="text/javascript">
    $(document).ready(function()  {
        $(".left-news").simplyScroll({orientation:'vertical',customClass:'vert'});
        $(".left-news1").simplyScroll({orientation:'vertical',customClass:'vert1'});
    });

</script>

<script type="text/javascript" src="public/front_asset/thanhtam.js" tppabs="{{asset('')}}jpublic/front_asset/thanhtam.js"></script>               <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.async=true;
            js.src = "sdk.js#xfbml=1&version=v2.5"/*tpa=http://connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.5*/;
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
                        
    </body>
    </html>
</body>

</html>
