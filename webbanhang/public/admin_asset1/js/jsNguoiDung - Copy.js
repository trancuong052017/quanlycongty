function timkiem_sanpham(gia , loaisp)
{
    $.ajax({
        url:"ajax/TimKiemAjax.php",
        type:"POST",
        data:{
            gia:gia,
            loaisp:loaisp
        },
        success:function(giatri) {
            $('#loadSP').html(giatri);
        }

    });
}
 function laygiatri(giatri)
{ 
    $.ajax({
        url:"http://localhost/webproduct31/laygiatri/index",
        type:"POST",
        data:{
            giatri:giatri
           
        },
        success:function(giatri) {
            $('#div1').html(giatri); 
        }

    });
}

 function namnu(man_wo)
{  alert(man_wo);
    $.ajax({
        url:"http://localhost/webproduct31/laygiatri/index",
        type:"POST",
        data:{
            giatri:giatri
           
        },
        success:function(giatri) {
            $('#div1').html(giatri); 
        }

    });
}

 function dathang(entry,color,size,id)
{ 
    $.ajax({
        url:"http://localhost/webproduct31/card/add",
        type:"GET",
        data:{
          entry:entry,
		  color:color,
		  size:size,
		  id:id
           
        },
        success:function(giatri) {
            $('#ajax1').html(giatri); 
        }

    });
}
function SuaGioHang(masanpham,soluong)
{   alert();
    $.ajax({
        url:"ajax/SuaGioHang.php",
        type:"POST",
        data:{
            masanpham:masanpham,
            soluong:soluong
        },
        success:function(giatri) {
            $('.in-check').html(giatri);
        }

    });
}
function DoiMatKhau(tendangnhap,matkhaucu, matkhaumoi)
{
    $.ajax({
        url:"ajax/DoiMatKhauAjax.php",
        type:"POST",
        data:{
            tendangnhap:tendangnhap,
            matkhaucu:matkhaucu,
            matkhaumoi:matkhaumoi
        },
        success:function(giatri) {
            $('#dmk_thongbao').text(giatri);
        }

    });
}

function ThemGioHang(masanpham,soluong,kichco)
{ 
    $.ajax({
        url:"ajax/ThemGioHang.php",
        type:"POST",
		
        data:{ 
            masanpham:masanpham,
            soluong:soluong,
			kichco:kichco
        },
        success:function(giatri) {
            $('.divgiohang').html(giatri);
        }

    });
}
function Them(masanpham)
{ 
    $.ajax({
        url:"ajax/ThemGioHang.php",
        type:"POST",
		
        data:{ 
            masanpham:masanpham,
            soluong:soluong,
			kichco:kichco
        },
        success:function(giatri) {
            $('.divgiohang').html(giatri);
        }

    });
}
function SuaGioHang(masanpham,soluong)
{
    $.ajax({
        url:"ajax/SuaGioHang.php",
        type:"POST",
        data:{
            masanpham:masanpham,
            soluong:soluong
        },
        success:function(giatri) {
            $('.in-check').html(giatri);
        }

    });
}

function XoaGioHang(masanpham)
{
    $.ajax({
        url:"ajax/XoaGioHang.php",
        type:"POST",
        data:{
            masanpham:masanpham
        },
        success:function(giatri) {
            $('.in-check').html(giatri);
        }

    });
}

function DanhGiaSP(masanpham,tendangnhap,noidung)
{
    $.ajax({
        url:"ajax/DanhGiaSP.php",
        type:"POST",
        data:{
            masanpham:masanpham,
            tendangnhap:tendangnhap,
            noidung:noidung
        },
        success:function(giatri) {
         
            window.location="ChiTietSanPham.php?MaSP="+masanpham;
        }

    });
}

function XoaBinhLuan(mabinhluan,masanpham)
{
    $.ajax({
        url:"ajax/XoaBinhLuan.php",
        type:"POST",
        data:{
            mabinhluan:mabinhluan
        },
        success:function(giatri) {
            alert(giatri);
            window.location="ChiTietSanPham.php?MaSP="+masanpham;
        }

    });
}
function Xoavideo(masanpham)
{
    $.ajax({
        url:"ajax/Xoavideo.php",
        type:"POST",
        data:{
            masanpham:masanpham
        },
        success:function(giatri) {
            alert(giatri);
            window.location="ChiTietSanPham.php?MaSP="+masanpham;
        }

    });
}
function ChinhSuaBinhLuan(mabinhluan,masanpham,noidung)
{
    $.ajax({
        url:"ajax/ChinhSuaBinhLuan.php",
        type:"POST",
        data:{
            mabinhluan:mabinhluan,
            noidung:noidung
        },
        success:function(giatri) {
            alert(giatri);
            window.location="ChiTietSanPham.php?MaSP="+masanpham;
        }

    });
}