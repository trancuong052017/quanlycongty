@extends('pages.layout.index')
@section('content')

<!-- //mail -->
<div id="container" class="w-clear">
                <div class="w-clear wikis">
                    <div class=" w-clear ">
    <div class="w-clear ">
        <div class="main-tit"><h2 class="name">Liên hệ</h2></div>
            </div>
</div>
<div class="content">
    <div class="w-clear ">
        <div class="content w-clear ">
            <div class="w-clear cot_2">
                <h1 color:="" helvetica="" line-height:="" style="box-sizing: border-box; margin: 20px 0px 10px; padding: 0px; font-size: 36px; font-family: "><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 22px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">CÔNG TY CỔ PHẦN XÂY DỰNG AN ĐẠI LỘC</span></span></span></span></h1>

<p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: "><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">Địa chỉ: C3 Quang Trung, P 11 Quận Gò Vấp Tp. HCM</span></span></span></p>

<p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: "><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">VPĐD: 79/24 Lê Thị Riêng, P Thới An, Q 12, TP HCM</span></span></span></p>

<p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: "><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">Tel: 028.62571916 -&nbsp;028.62571881&nbsp; &nbsp;Fax: 028 0255 38797</span></span></span></p>

<p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 5px; padding: 0px; color: rgb(255, 255, 255); font-family: "><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background: transparent;">Email: info@andailoc.vn&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Website:&nbsp;</span></span></span><a href="http://andailoc.vn/" style="box-sizing: border-box; margin: 0px; padding: 0px; background-color: transparent; color: rgb(255, 255, 255); text-decoration-line: none; transition: all 0.5s ease 0s; font-size: 18px;"><span style="color:#2F4F4F;"><span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;">andailoc.vn</span></span></a></p>
 
            </div>
            <div class="w-clear cot_2">
                
<script language="javascript" src="admin/media/scripts/my_script.js"></script>
<script language="javascript">
    function js_submit(){

        if(isEmpty(document.getElementById('ten'), "Vui lòng nhập họ tên!")){
            document.getElementById('ten').focus();
            return false;
        }

            // if(isEmpty(document.getElementById('diachi'), "Vui lòng nhập địa chỉ!")){
            //  document.getElementById('diachi').focus();
            //  return false;
            // }

            if(isEmpty(document.getElementById('dienthoai'), "Vui lòng nhập điện thoại!")){
                document.getElementById('dienthoai').focus();
                return false;
            }

            if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ!")){
                document.getElementById('dienthoai').focus();
                return false;
            }

            if(!check_email(document.frm.email.value)){
                alert("Email không hợp lệ!");
                document.frm.email.focus();
                return false;
            }
/*
            if(isEmpty(document.getElementById('tieude1'), "_xinnhaptieude")){
                document.getElementById('tieude1').focus();
                return false;
            }
            */
            if(isEmpty(document.getElementById('noidung'), "_xinnhapnoidung")){
                document.getElementById('noidung').focus();
                return false;
            }

            document.frm.submit();
        }
    </script>

    <form method="post" name="frm" action="lien-he" enctype="multipart/form-data">
        <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                <div class="w-clear">


            <div class="box-lh">
                <div class="w-clear">
                    <div class="cot_3">
                        <div class="w-clear">
                            <input name="ten" type="text" id="ten" class="ipct input" placeholder="Họ và tên (*)">
                        </div>
                    </div>
                    <div class="cot_3">
                        <div class="w-clear">
                            <input name="email" type="text" class="ipct input" placeholder="Email (*)">
                        </div>
                    </div>
                    <div class="cot_3">
                        <div class="w-clear">
                            <input name="dienthoai" type="text" id="dienthoai" class="ipct input" placeholder="Điện thoại (*)">
                        </div>
                    </div>
                </div>
                <div class="w-clear">
                    <textarea name="noidung" cols="52" rows="5" id="noidung" class="tact" placeholder="Nội dung"></textarea>
                </div>
                <div class="w-clear">
               
                    <input type="submit" value="Liên hệ"  class="btnct button">
                   
                </div>
            </div>
            </div>
            
        </form>
            </div>
        </div>


    </div>
 <div class="contact-bottom">
                
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.6406108151705!2d106.65216331406891!3d10.8387909922792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529a1b84d9205%3A0xbdaebc3b904a01ef!2zOTMvQzMgUXVhbmcgVHJ1bmcsIFBoxrDhu51uZyA4LCBHw7IgVuG6pXAsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2scz!4v1603488345723!5m2!1svi!2scz" width="600" height="450" frameborder="0" style="border:0;width: 1400px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
    
                </div>
            </div>

  @endsection 