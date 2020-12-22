
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
     @endif           <form action="admin/dungcu/sua/{{$dungcu->id}}" method="POST" enctype="multipart/form-data">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>

                        
          <fieldset>
            <div class="formRow">
                    <label for="param_date" class="formLeft">chọn công trình bàn giao : <span class="req">*</span></label>
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
                  <span class="oneTwo">
                    <select class="form-control"name ='iduser'id='user'> 
                    <!--  <option value={{$dungcu->user->id}}>{{$dungcu->user->name}}</option>  -->
                     <option>--------------</option> 
                     
                       </select></span>
                     </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_qty" class="formLeft">Tên dụng cụ giao *</label>
                    <div class="formRight">
                <span class="oneTwo"><input class="form-control" value='{{$dungcu->ten}}'readonly =''style="color:blue " ></span>
                   
                       
                   </div>
                  </div>
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">Số lượng còn <span class="req">*</span></label>
                    <div class="formRight">
                       <input type="text" _autocheck="true"  class ="format_number" name="" value='{{$dungcu->soluong}}'disabled=''style='color: blue ;text-align: center; '>
                   
                    </div>
                    <div class="clear"></div>
                </div>
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">Số lượng giao <span class="req">*</span></label>
                    <div class="formRight">
                       <input type="text" _autocheck="true"  class ="format_number" name="soluong"style='color: blue ;text-align: center;'value =''>
                   
                    </div>
                    <div class="clear"></div>
                </div>
                   <div class="formRow">
                    <label for="param_qty" class="formLeft">ngày giao <span class="req">*</span></label>
                    <div class="formRight">
                       <input type="date" _autocheck="true"  id="param_qty" name="ngaychuyen">
                   
                    </div>
                    <div class="clear"></div>
                </div>
               
                <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh giấy biên nhận  <span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="file" _autocheck="true"  id="param_date" name="anh"></span>
                       
                    </div>
                   
                    <div class="clear"></div>
                </div>
               <div class="formRow">
                    <label for="param_date" class="formLeft">ảnh dụng cụ <span class="req">*</span></label>
                    <div class="formRight">
                      <img src= 'public/upload/danhsachdungcu/{{$dungcu->anhdovat}}'width='100'heigth='100' class='zoomin'/>
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

         $('.zoomin').click(function(){
      a=this.src;
      $('#imageszoom').attr('src',a);
      $(".box-full-zoom").show();
       }); 

      $(".box-full-zoom").click(function(){
      $(".box-full-zoom").hide(); 
       });

    });
 </script>   
@endsection     
 