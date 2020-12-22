
@extends('admin.layout1.index')
@section('content')
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
            <a href="trangchu" tppabs="http://localhost/andailoc/" class="logo">
                <img src="public/front_asset/86176_logo_vi.png" tppabs="http://localhost/andailoc/public/front_asset/86176_logo_vi.png" alt="CÔNG TY CỔ PHẦN XÂY DỰNG AN ĐẠI LỘC" />
            </a>
            <div class="banner-mid w-clear">
                <div class="banner_img " style="margin-left: 150px;">
                    <img src="public/front_asset/86176_banner_vi.png" tppabs="http://localhost/andailoc/public/front_asset/86176_banner_vi.png" alt="Banner" class="banner_img "/>
                </div>
            </div>
	<div id="container"  class="w-clear">
<div class="w-clear wikis">
					
<div class=" w-clear ">
	<div class="w-clear ">
		<div><h2 style="margin-left: 350px">LỜI GIỚI THIỆU </h2></div>
			</div>
</div>
<div class="w-clear ">
	<div class="content  ">
		<p><span style="font-size:18px;"><strong>HƯỚNG DẪN SỬ DỤNG PHẦN MỀM QUẢN LÝ CÔNGTY </strong></span></p>

<p><span style="font-size:18px;"><strong>PHẦN MỀM QUẢN LÝ CÔNG TY  </strong>là một một phần mềm được xây dựng để quản lý trang web bên ngoài của công ty (thay đổi nội dung của trang web theo yêu cầu của công ty).ngoài ra nó còn là 1 trang quản lý toàn bộ hoạt động của công ty ví dụ theo dõi quản lý bộ phận nhân sự ,quản lý công nợ các công trình ,thêm bớt các công trình ,quản lý phần kế toán của công ty ,quản lý các dụng cụ thiết bị của công ty ,và có thể thêm 1 số các chức năng khác theo yêu cầu phát sinh trong quá trình kinh doanh của công ty .</br>Nó dựa trên nguyên tắc phân quyền chuẩn xác ,tức là<b> những người được phép truy cập vào trang quản lý chỉ có thể thực hiện những gì mà mình được phép làm </b>theo sự phân công của người giám đốc công ty ,ví dụ người kế toán chỉ được làm phần kế toán của mình thôi còn các chức năng khác sẽ không làm được ,tạo điều kiện cho giám đốc hay người quản lý theo dõi được toàn bộ hoạt động của công ty trên mạng internet ,tất nhiên cũng có thể theo dõi không cần internet nhưng viẹc cập nhật dữ liệu sẽ vất vả hơn </span></p>
<p><span style="font-size:18px;"><strong>HƯỚNG DẪN CHI TIẾT </strong></span></p>
<p><span style="font-size:18px;"> - GIÁM ĐỐC VÀ PHÓ GIÁM ĐỐC </span></p>

<p><span style="font-size:18px;"> Được cung cấp mật khẩu và email cá nhân được đăng ký với người lập trình sau đó vào trang <b>quanlycongty/admin/dangnhap</b> để đăng nhập nếu quên mật khẩu  thì ắn vào quên mật khẩu sau đó vào email của mình để lấy lại mật khẩu </br>.khi vào trang quản lý sẽ xuất hiện các menu để thực hiện tìm kiếm ấn vào <b>trở về trang 2 </b> để vào mục <b>nhân viên </b> có danh sách các nhân viên có thể thêm ,sửa nhân viên ,nếu nhân viên không còn làm việc nữa chỉ cần đánh dấu vào <b>không làm việc </b> thi người đó sẽ không vào trang quản lý được nữa ,mỗi nhân viên có chức vụ và quyền hạn khi vào trang web chỉ cần đánh dấu vào các mục đó thì sẽ xác  định được quyền truy cập vào trang web của nhân viên đó ,ví dụ  nhân viên đó là chỉ huy công trình thì phần chức vụ là chỉ huy công trình ,và quyền truy cập vào trang web cũng là chỉ huy công trình ,mục <b> các dự án </b>để thêm sửa xóa các dự án ở trang ngoài , mục <b>danh sách các công trình -đơn vị </b>sẽ cho ra danh sách các công trình  và  thông tin của các công trình ví dụ công - nợ vvv... và khi có công trình mới thì  vào mục<b>thêm </b>để thêm công trình mới ,đơn vị hành chính của công ty cũng được coi là 1 công trình việc xóa các công trình là không khuyến khích vì nó liên quan đến phần kế toán nên không thể xóa được chỉ có thể sửa được thôi </br> sau đó ấn vào <b>trở về trang chủ admin </b> sẽ xuất hiện các mục <b>tổng hợp thu kế toán ,chi kế toán </b>sẽ cho người quản lý chi tiết các bảng thu chi của công ty ví dụ thu từ công trình nào ,rồi tìm kiếm theo công trình ,theo ngày tháng vv.. để biết từng chi tiết cụ thể ,vào mục <b>thu công trình,chi công trình</b> để biết chỉ huy các công trình đã thu chi tiền mặt như thế nào ,chú ý vì là không trực tiếp thu chi nên không thể sửa xóa được các chi tiết </b> vào mục <b>tổng hợp dụng cụ </b> để kiểm tra tìm kiếm các dụng cụ nằm ở các công trình hay tổng kho công ty ,vào mục <b>gửi email đẻ gửi email ,có thể gửi  email hàng loạt cho các nhân viên chú ý tất cả các chi tiết đề có ảnh hóa đơn giao nhận để kiểm tra chỉ cần click vào ảnh sẽ hiện ra ảnh lớn cho ta biết cụ thể </b>
</span></p>
<p><span style="font-size:18px;"> - KẾ TOÁN TRƯỞNG </span></p>
<p><span style="font-size:18px;">khi giám đốc cấp cho người kế toán trưởng 1 mật khẩu và email của kế toán trưởng thì cũng vào trang <b>quanlycongty/admin/dangnhap</b>để   đăng nhập trang web  quản lý nó chỉ cho ra mục <b>nhân viên -- thu kế toán --chi kế toán </b> mục NHÂN VIÊN thì có thể sửa mật khẩu và email. còn THU KẾ TOÁN thì nhập phần thu từ các công trình cụ thể ,có chụp ảnh hóa đơn để đưa vào ,CHI KẾ TOÁN thì chọn chi cho công trình nào chi tiền mặt ,hay mua vật liệu hay tiền lương ,khi chi tiền mặt cho chỉ huy thì bên trang <b>thu của công trình</b> sẽ tự động thêm vào người chỉ huy công trình đó không cần phải thêm vào mục <b>thu công trình  </b> ngoài ra còn xem được các bảng tông hợp khác </span></p>
<p><span style="font-size:18px;"> - QUẢN  LÝ DỤNG CỤ </span></p>
<p><span style="font-size:18px;">Sau khi đăng nhập theo mật khảu được cung cấp người quản lý dụng cụ phải vào TÊN LOẠI DỤNG CỤ để thêm tên loại dụng cụ và số  lượng của toàn bộ của toàn bộ công ty ,và có thể sửa số  lượng đó ,sau đó vào CHUYỂN DỤNG CỤ -ĐƠN VỊ để chuyển các dụng cụ kèm theo số  lượng như vậy là dụng cụ đã đươc chuyển về  các đơn vị ,ở mục TỔNG HỢP DỤNG CỤ có thể tìm kiếm thông tin của các dụng cụ </span></p>
<p><span style="font-size:18px;"> - CHỈ HUY CÔNG TRÌNH -ĐƠN VỊ  </span></p>
<p><span style="font-size:18px;"> sau khi đăng nhập vào mục THU CÔNG TRÌNH ĐƠN VỊ để kiểm tra xem phòng kế toán đã gửi tiền vào chưa nếu thây không đúng thì phải khiếu nại ,vào mục CHI -CÔNG TRÌNH ĐƠN VỊ ghi các chi cụ thể  nhớ chụp lại các hóa đơn và gửi lên trang web ,vào  mục CHUYỂN DỤNG CỤ -ĐVI để chuyển các dụng cụ cho đơn vị khác ,muốn kiểm tra các dụng cụ thì vào TỔNG HỢP DỤNG CỤ để tìm kiếm ví dụ cần 1 dụng cụ A chẳng hạn thì vào đó sẽ biết hiện dụng cụ A đang ở đơn vị nào </span></p>

<p><span style="font-size:18px;"><b>CHÚ Ý</b> :TẤT CẢ CÁC BẢNG ĐỀU CÓ THỂ TÌM KIẾM Ở PHÍA TRÊN ,KHI THÊM HAY SỦA 1 BẢN GHI NÀO ĐÓ  CẦN  CHỌN 1 DANH MỤC VÍ DỤ ĐƠN VỊ A CHẲNG HẠN THÌ NÓ SẼ TỰ ĐÔNG CHO RA TÊN NGƯỜI QUẢN LÝ  NHƯNG NẾU BỊ NHẦM CẦN SỬA LẠI THÌ PHẢI ĐỔI TÊN ĐƠN VỊ VÀI LẦN ĐỂ CHƯƠNG TRÌNH CHO RA TÊN NGƯỜI CHỈ HUY CHO ĐÚNG ,PHẦN LỚN CÁC BẢN GHI ĐỀU CÓ ẢNH HÓA ĐƠN HAY ẢNH DỤNG CỤ NÊN PHẢI CHỤP ẢNH VÀ ĐƯA VÀO TRANG WEB ĐỂ THUẬN TIỆN VIẸC KIỂM TRA CHỈ CẦN ĐÚP CHUỘT VÀO ẢNH VÀ KÉO THANH TRƯỢT XUỐNG LÀ ẢNH ĐƯỢC PHÓNG TO RA , NHẬP DỮ LIỆU VỀ CON SỐ NÊN ĐỂ KIỂU  CHỮ LÀ TIẾNG ANH  </span></p>

<p><span style="font-size:18px;">NẾU CÓ SỰ CỐ KHI CHẠY CHƯƠNG TRÌNH CẦN BÁO CHO GIÁM ĐỐC HAY QUẢN TRỊ VIÊN  NGAY LẬP TỨC ,HẠN CHẾ VIỆC XÓA DỮ LIỆU ,KHI NHẬP DỮ LIỆU BỊ SAI THÌ NÊN SƯA LẠI </span></p>

<h1 style="box-sizing: border-box; margin: 20px 0px 10px; padding: 0px; font-size: 36px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(255, 255, 255);"><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 22px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">CÔNG TY CP XÂY DỰNG AN ĐẠI LỘC</span></span></span></span></h1>

<p style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;"><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">Địa chỉ: C3 Quang Trung, P 11 Quận Gò Vấp Tp. HCM</span></span></span></p>

<p style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;"><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">VPĐD: 79/24 Lê Thị Riêng, P Thới An, Q 12, TP HCM</span></span></span></p>

<p style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;"><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">Tel: 028.62571916 - 028.62571881   Fax: 028 0255 38797</span></span></span></p>

<p style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;"><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">Email: info@andailoc.vn      Website: </span></span></span><a href="index.htm" tppabs="http://andailoc.vn/" style="box-sizing: border-box; margin: 0px; padding: 0px; background-color: transparent; color: rgb(255, 255, 255); text-decoration-line: none; transition: all 0.5s ease 0s; font-size: 18px;"><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;">andailoc.vn</span></span></a></p>
				<div class="w-clear">
			<div class="addthis_native_toolbox"></div>
		</div>
	</div>	
</div>

				</div>
			</div>	
					

 @endsection 