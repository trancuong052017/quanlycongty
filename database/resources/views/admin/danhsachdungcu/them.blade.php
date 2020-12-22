
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
        
     <form action="admin/danhsachdungcu/them" method="POST"enctype="multipart/form-data">
         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
             <div class="formRow">
                    <label for="param_qty" class="formLeft">Tên dụng cụ <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text"   name="ten"></span>
                 
                    </div>
                    <div class="clear"></div>
                </div>
                 <div class="formRow">
                    <label for="param_qty" class="formLeft">Nội dung<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text"   name="noidung"></span>
                 
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_qty" class="formLeft">Số lượng<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text"   name="soluong" _autocheck='true' class='format_number'></span>
                 
                    </div>
                    <div class="clear"></div>
                </div>
                 <div class="formRow">
                    <label for="param_qty" class="formLeft">Ngày nhập<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="date"   name="ngaynhap"></span>
                 
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh hóa đơn<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type='file' name="anh"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh đồ vật <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type='file' name="anhdovat"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        
                    </div>
                    <div class="clear"></div>
                </div>
               
                <div class="formSubmit">
                        <input type="submit" class="redB" value="Thêm mới">
                </div>
         
      </form>
      
      </div>
</div>

@endsection
<!-- <script>
function checkNumber() {
var x =document.getElementById('gia').value;
if(isNaN(x)){document.getElementById('gia').style.color='red';
    
}
else{ document.getElementById('gia').style.color='green';}
}
 
 </script>  lam đỏ số liệu -->
 