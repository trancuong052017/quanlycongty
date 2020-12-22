
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
        
     <form action="admin/thuketoan/them" method="POST"enctype="multipart/form-data">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
          <fieldset>
                 
                <div class="formRow">
                    <label for="param_price" class="formLeft">Số tiền thu :<span class="req">*</span></label>
                    <div class="formRight">
                   <input type="text"  name="tien"value="" _autocheck='true' class = 'format_number'>
                    </div>
                <div class="clear"></div>
                 </div>
                  <div class="formRow">
                    <label for="param_price" class="formLeft"> tiền thu từ công trình :<span class="req">*</span></label>
                    <div class="formRight">
                     <select name ='idcongtrinh'>  
                   <option value="">--- chọn công trình -----</option> 
                       @foreach($congtrinh   as $ct)
                       <option value="{{$ct->id}}">{{$ct->ten}}</option>
                         @endforeach
                     </select>
                    </div>
                <div class="clear"></div>
                 </div>
                  
                 <div class="formRow">
                    <label for="param_price" class="formLeft">Người thu :<span class="req">*</span></label>
                    <div class="formRight">
                   <input type="text" style="color: blue" name="nguoithu"value="{{$nguoithu}}" readonly >
                    </div>
                <div class="clear"></div>
                 </div>
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
                    <label for="param_date" class="formLeft">ảnh  chứng từ <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true"  id="param_date" name="anh"></span>
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
 