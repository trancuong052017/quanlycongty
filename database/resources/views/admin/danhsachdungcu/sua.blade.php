
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
     @endif           <form action="admin/danhsachdungcu/sua/{{$dungcu->id}}" method="POST" enctype="multipart/form-data">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>

                        
          <fieldset>
            
                  
                <div class="formRow">
                    <label for="param_qty" class="formLeft">Tên dụng cụ  *</label>
                    <div class="formRight">
                <span class="oneTwo"><input class="form-control" value='{{$dungcu->ten}}' name='ten'></span>
                   
                       
                   </div>
                  </div>
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">Số lượng  <span class="req">*</span></label>
                    <div class="formRight">
                       <input type="text" _autocheck="true"  class ="format_number" name="soluong" value='{{$dungcu->soluong}}'>
                   
                    </div>
                    <div class="clear"></div>
                </div>
                   
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">ngày giao <span class="req">*</span></label>
                    <div class="formRight">
                       <input type="date" _autocheck="true"  id="param_qty" name="ngaynhap" value='{{$dungcu->ngaynhap}}'>
                   
                    </div>
                    <div class="clear"></div>
                   </div>
               
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">nội dung *</label>
                    <div class="formRight"><span class="oneTwo">
                     <input type="text"   name="noidung" value="{{$dungcu->noidung}}"></span>
                   
                    </div>
                    <div class="clear"></div>
                </div>
               
                 <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh giấy biên nhận  <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true" value='{{$dungcu->anh}}' name="anh"></span>
                        <img src='public/upload/danhsachdungcu/{{$dungcu->anh}}'width='150'height='120'/>
                        
                    </div>
                   
                    <div class="clear"></div>
                </div>
               <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh dụng cụ <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true"value='{{$dungcu->anhdovat}}'  name="anhdovat"></span>
                        <img src='public/upload/danhsachdungcu/{{$dungcu->anhdovat}}'width='150'height='120'/>
                        
                    </div>
                   
                    <div class="clear"></div>
                </div>
               
               
                <div class="formSubmit">
                        <input type="submit" class="redB" value="Sửa">
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
 