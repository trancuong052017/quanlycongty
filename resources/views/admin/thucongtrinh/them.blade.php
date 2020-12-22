
@extends('admin.layout1.index')
@section('content')
<div id="page-wrapper">
<div class="wrapper">
      <div class="widget">
          
         
        @if(count($errors)>0)
                    
        <div class='alert alert-danger'>
           @foreach($errors->all() as $err) 
           {{$err}}<br>
           @endforeach 
       </div> 
         @endif
          @if(session('thongbao'))
   
    <div class='alert alert-success'>
     
     {{session('thongbao')}}
     </div>
     @endif
     @if(session('loi'))
     <div class='alert alert-danger'style="text-align: center color:red">
     {{session('loi')}}
     </div>
     @endif          
        
     <form action="admin/thucongtrinh/them" method="POST"enctype="multipart/form-data">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
          <fieldset>
                 <div class="formRow">
            <label><b>Công trình đang phụ trách(chọn 1) :</b></label>
           <div class="title" style="margin-top:50">
            @foreach($congtrinh_user  as $ct)
           <div style ='float: left'> 
<input type="radio" name="idcongtrinh" value="{{$ct->id}}" checked="" >
    {{$ct->ten}}
       </div> 
           @endforeach 
          
        </div>
       </div>
                <div class="formRow">
                    <label for="param_price" class="formLeft">Số tiền thu :<span class="req">*</span></label>
                    <div class="formRight">
<input type="text"  name="tien"value="" _autocheck='true' class = 'format_number'>
                     </div>
                <div class="clear"></div>
                 </div>
                  
                
                <!--  <div class="formRow">
                    <label for="param_price" class="formLeft">Số tiền thu :<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="gia" oninput='checkNumber()'  name="tien"value="" _autocheck='true' class = 'format_number'></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        
                    </div>
                <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_price" class="formLeft">gía:<span class="req">*</span></label>
                    <div class="formRight">
                        <input type="text"_autocheck='true'class='format_number'  name="_price">
                        
                        
                    </div>
                    <div class="clear"></div>
                </div> -->
                 <div class="formRow">
                    <label for="param_qty" class="formLeft">ngày thu <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="date" _autocheck="true"  id="param_qty" name="ngaythu"></span>
                   <span class="autocheck" name="name_autocheck"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                
                 <div class="formRow">

                    <label for="param_price" class="formLeft">Nội dung thu <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><textarea class="form" rows="4" name = 'noidung' cols='60'></textarea></span>
                     <span class="autocheck" name="name_autocheck"></span>
                        
                    </div>
                    <div class="clear"></div>
                </div>
                
               
                 <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh 1 <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true"  id="param_date" name="anh1"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh 2  <span class="req">không bắt buộc </span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true"  id="param_date" name="anh2"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        
                    </div>
                    <div class="clear"></div>
                </div>
               
               
                <div class="formSubmit">
                        <input type="submit" class="redB" value="Thêm mới">
                </div>
          </fieldset>
      </form>
      
      </div>
</div>
<script type="text/javascript" src="public/admin_asset1/js1/jquery/number/jquery.number.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/js1/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
@endsection
<!-- <script>
function checkNumber() {
var x =document.getElementById('gia').value;
if(isNaN(x)){document.getElementById('gia').style.color='red';
    
}
else{ document.getElementById('gia').style.color='green';}
}
 
 </script>  lam đỏ số liệu -->
 