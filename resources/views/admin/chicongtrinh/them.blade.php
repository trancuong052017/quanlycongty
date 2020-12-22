
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
        
     <form action="admin/chicongtrinh/them" method="POST"enctype="multipart/form-data">
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
                    <label for="param_price" class="formLeft">Số tiền chi :<span class="req">*</span></label>
                    <div class="formRight">
<input type="text"  name="tien"value="" _autocheck='true' class = 'format_number'>
                     </div>
                <div class="clear"></div>
                 </div>
                  <div class="formRow">
                    <label for="param_qty" class="formLeft">ngày chi <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="date" _autocheck="true"  id="param_qty" name="ngaychi"></span>
                   <span class="autocheck" name="name_autocheck"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                
                 <div class="formRow">

                    <label for="param_price" class="formLeft">Nội dung chi <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><textarea class="form" rows="4" name = 'noidung' cols='60'></textarea></span>
                     <span class="autocheck" name="name_autocheck"></span>
                        
                    </div>
                    <div class="clear"></div>
                </div>
                
               
                 <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh hóa đơn<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true"  id="param_date" name="anh1"></span>
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

@endsection

 