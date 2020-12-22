
<div class=" search_box_hide">
    <div class="search">
        <input type="text" id="keywords" class="input" value="" placeHolder="Nhập từ khóa..." onkeypress="doEnters(event)" />
        <a  onclick="onSearchs(event)"  class="bt-search" >
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
    </div>
</div>
                </div>
            </div>
                        
        </div>
    </div>
    <div id="smenu" class="w-clear ">
    <div class="w-clear">

        <a data-role="none" class="navmenu_link fl" title="Thanh điều hướng website" href="#navmenu"><i class="fa fa-bars"></i></a>
        <a data-role="none" class="bt-hs fr " target="_blank" href="javascript:if(confirm(%27https://drive.google.com/open?id=1tZ04SdWeaXdw0W_8DRAxYXVkkYgWOIhO  \n\nThis file was not retrieved by Teleport Ultra, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27https://drive.google.com/open?id=1tZ04SdWeaXdw0W_8DRAxYXVkkYgWOIhO%27" tppabs="https://drive.google.com/open?id=1tZ04SdWeaXdw0W_8DRAxYXVkkYgWOIhO">Hồ sơ năng lực</a>
            </div>

</div>
</div></div>

    
</div>
                    

    
                            <link rel="stylesheet" href="public/front_asset/jssor.css" tppabs="{{asset('')}}plugin/jssor-slider/jssor.css">
<script type="text/javascript" src="public/front_asset/jssor.slider.js" tppabs="{{asset('')}}public/front_asset/jssor-slider/jssor.slider.js"></script>
<script>
    jQuery(document).ready(function ($) {

        var jssor_1_SlideoTransitions = [
            [{ b: -1, d: 1, o: -1 }, { b: 400, d: 800, x: 100, o: 1}],
            [{ b: -1, d: 1, o: -1 }, { b: 400, d: 800, x: -100, o: 1}]        
        ];
        var _SlideshowTransitions = [
        // {$Duration:5000,$Zoom:2.5,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:1}
         { $Duration: 1200, $Opacity: 2 }
        
        ];
        var jssor_1_options = {
            $AutoPlay: true,
            $Idle: 3000,
            $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: false                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },
            $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

//responsive code begin
//you can remove responsive code if you don't want the slider scales while window resizing
function ScaleSlider() {
    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
    if (refSize) {
        refSize = Math.min(refSize, 1366);
        jssor_1_slider.$ScaleWidth(refSize);
    }
    else {
        window.setTimeout(ScaleSlider, 30);
    }
}
ScaleSlider();
$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);
//responsive code end

//responsive code begin
//you can remove responsive code if you don't want the slider scales while window resizing
function ScaleSlider() {
    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
    if (refSize) {
        refSize = Math.min(refSize, 1366);
        jssor_1_slider.$ScaleWidth(refSize);
    }
    else {
        window.setTimeout(ScaleSlider, 30);
    }
}
ScaleSlider();
$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);
//responsive code end
});
</script>
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1366px; height: 530px; overflow: hidden; visibility: hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('loading.gif')/*tpa={{asset('')}}img/loading.gif*/ no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1366px; height: 530px; overflow: hidden;">
                    <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/1535075662_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/1535075662_1366x530.jpg" />
                            </div>            
                        <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/1531211867_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/1531211867_1366x530.jpg" />
                            </div>            
                        <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/15351828260_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/15351828260_1366x530.jpg" />
                            </div>            
                        <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/15483041241_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/15483041241_1366x530.jpg" />
                            </div>            
                        <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/15312108320_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/15312108320_1366x530.jpg" />
                            </div>            
                        <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/1528684503_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/1528684503_1366x530.jpg" />
                            </div>            
                        <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/slider-1531210652_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/slider-1531210652_1366x530.jpg" />
                            </div>            
                        <div data-p="112.50" style="display: none;">
                <img data-u="image" src="public/front_asset/15483047270_1366x530.jpg" tppabs="{{asset('')}}upload/hinhanh/15483047270_1366x530.jpg" />
                            </div>            
            
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;" data-autocenter="1">
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>

    </div>      
                
