
@extends('pages.layout.index')

@section('content')
<div id="gioithieu" class="w-clear ">
    <div class="w-clear wikis" >
 
            <div class="cot_2">
                <div class="">
                   
                    <div class="images img_gt">
                        <img src="public/front_asset/timthumb.php-src=upload-hinhanh-1534327206.jpg&amp;w=580&amp;h=430&amp;zc=2&amp;q=85.jpg">
                    </div>            
                </div>
            </div>    
            <div class="cot_2 ts">
                <div class="info w-clear">
                    <div class="w-clear">                        
                        <p style="margin: 6pt 9.35pt 6pt 28.5pt;"><span style="font-family: arial, helvetica, sans-serif;"><strong><span style="font-size: 13pt;">CÔNG TY CỔ PHẦN XÂY DỰNG AN ĐẠI LỘC</span></strong><span style="font-size: 13pt;"> là một tập hợp các Kỹ sư năng động và chuyên nghiệp hoá. Với một hội đồng thành viên điều hành công ty là những chuyên gia đầy kinh nghiệm trong lĩnh vực xây dựng, cùng với đội ngũ nhân sự có nhiều năm kinh nghiệm, đội ngũ công nhân lành nghề, chúng tôi hoạt động trên nguyên tắc “Thích ứng với yêu cầu của khách hàng bởi những nhóm chuyên nghiệp thích ứng”. Mục tiêu phát triển của công ty là “Đa thị trường” nhằm cung cấp các sản phẩm chất lượng và tiên tiến đến mọi khách hàng.</span></span></p>

<p style="margin: 6pt 9.35pt 6pt 28.5pt;"><span style="font-family: arial, helvetica, sans-serif;"><span style="font-size: 13pt;">Từ khi thành lập đến nay chúng tôi đã thực hiện rất nhiều hợp đồng xậy dựng bao trùm hầu hết các lĩnh vực nghành nghề xây dựng mà An Đại Lộc đã đăng ký kinh doanh. Với kinh nghiệm phong phú đa dạng về loại hình xây dựng, đa dạng về các loại công trình, đa dạng về kỹ thuật chuyên nghành, đa dạng về khách hàng, cùng với tinh thần cầu tiến và không ngừng sáng tạo, An Đại Lộc hy vọng  phục vụ thoả mãn các yêu cầu rõ nét và tiềm ẩn của khách hàng với sự hài lòng nhất trong khả năng tài chính của khách hàng</span></span></p>
                    </div>
                    <div class="more">
                        <a class="button" href="gioi-thieu">
                            Xem tất cả                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>    


<div id="dichvu" >
    <div class="w-clear wikis">
        <div class="main-tit">
            <div class="name">
                Dự án mới
            </div>
        </div>
        <div class="w-clear">
            <div class="slick_4" style="margin: 0 -12px;">
                   @foreach($duanmoi as $da)
                                    <div class="item " style="padding: 0 12px;">
                        <div class="box-sp w-clear " >
                            <a href="chitiet_duan/{{$da->id}}.html">
                                <div class="images">
                                    <img src="public/upload/duan/{{$da->anh}}" alt="{{$da->Ten}}">
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
                    </div>
                      @endforeach                
                 </div>
        </div>
    </div>
</div> 

<div id="sanpham" class="w-clear dmspnb">
    <div class="wikis w-clear">
        <div class="main-tit">
            <div class="name">
                Dự án tiêu biểu
            </div>
        </div>
        <div class="w-clear text-center">
            <a class="cat auto_click " data-cont=".spnb" data-type="du-an" data-noibat="noibat"  data-lv="0" data-id="0">
                Tất cả
            </a>

                            @foreach($danhmuc as $dm)
                            <a class="cat " data-cont=".spnb" data-type="du-an" data-noibat="noibat"  data-lv="0" data-id="1"
                            href="{{$dm->TenKhongDau}}.{{$dm->id}}.html">
                                {{$dm->Ten}}
                           </a>
                         @endforeach  
                        </div>

        <div class="w-clear spnb sukienclick ">

        </div>
    </div>

</div>
 <div class="w-clear ">
        <div class="content w-clear ">

             <div class=" sukienclick ds_sp col_4">
                @foreach($duan_tieubieu as $da)
                <div class="box-sp w-clear ">
                    
                        <div class="images">
                            <img src="public/upload/duan/{{$da->anh}}" >
                        </div>
                    
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
            <div class="phantrang"> {{$duan_tieubieu->links()}} </div>
            
     </div>
    </div>
@endsection