
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
      <form action="admin/chiketoan/them" method="POST" enctype="multipart/form-data">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>

                        
          <fieldset>
            <div class="formRow">
                    <label for="param_date" class="formLeft">chọn công trình chi : <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><select class="form-control"name ='idcongtrinh' 
                       id='congtrinh'>
                      <option value=''>--- chọn công trình -----</option> 
                       @foreach($congtrinh   as $ct)
                       <option value="{{$ct->id}}">{{$ct->ten}}</option>
                         @endforeach
                        </select></span>
                     </div>
                    <div class="clear"></div>
                </div>
          
                  <div class="formRow">
                    <label for="param_date" class="formLeft"> chỉ  huy công trình nhận : <span class="req">*</span></label>
                    <div class="formRight">
        <span class="oneTwo"><select class="form-control"name ='iduser'id='user'> 
                   
                     <option value =''>--------------</option> 
                     
                       </select></span>
                     </div>
                    <div class="clear"></div>
                </div>
              
                  <div class="formRow">
                    <label for="param_date" class="formLeft">Chọn chi tiền mặt cho chỉ huy hoặc mua vật liệu : <span class="req">*</span></label>
                    <div class="formRight">
                <span class="oneTwo">
                  <select class="form-control"name ='hinhthuc'> 
                   
                     <option value=''>----------</option> 
                  <option value=''>-chọn hình thức-</option> 
                   <option value='tiền_mặt'>tiền mặt cho chỉ huy</option>
                  <option value='vật_tư'>tiền mua vật tư</option>
                   <option value='tiền_lương'>tiền lương  </option>
                       </select></span>
                     </div>
                    <div class="clear"></div>
                </div>
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">Số tiền giao <span class="req">*</span></label>
                    <div class="formRight">
             <input type="text" _autocheck="true"  class ="format_number" name="tien"value =''>
                   
                    </div>
                    <div class="clear"></div>
                </div>
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">ngày giao <span class="req">*</span></label>
                    <div class="formRight">
             <input type="date" _autocheck="true"  id="param_qty" name="ngaychi">
                   
                    </div>
                    <div class="clear"></div>
                </div>
               
                   <!-- <div class="formRow">
                    <label for="param_qty" class="formLeft">tên người nhận *</label>
                    <div class="formRight"><span class="oneTwo">
                    <input type="text"   name="nguoinhan"id='nguoinhan' ></span>
                   
                    </div>
                    <div class="clear"></div>
                </div> -->
               
                 <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh giấy biên nhận  <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true"  id="param_date" name="anh"></span>
                      
                        
                    </div>
                   
                    <div class="clear"></div>
                </div>
               
               
                <div class="formSubmit">
                        <input type="submit" class="redB" value="Chi">
                </div>
          </fieldset>
      </form>
      
      </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#congtrinh').change(function(){
         var idcongtrinh=$(this).val();
         //alert(idcongtrinh);
         $.get('admin/ajax/user/'+idcongtrinh,function(data){
           //alert(data);
            $('#user').html(data);
         });
        });

        $('#soluongcon').change(function(){
         var madungcu=$(this).val();
         //alert(idcongtrinh);
         $.get('admin/ajax/user/'+madungcu,function(data){
           //alert(data);
            $('#soluongcon').html(data);
         });
        });

       

    });
 </script>  

@endsection     
 