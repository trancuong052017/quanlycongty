@extends('admin.layout1.index')

@section('content')


<!-- Main content wrapper -->
  <div class="loginWrapper" style="margin-top:0px;">
   @include('admin.thongbao')
        
      <div class="widget" id="admin_login" style="height:auto; margin:auto;">
          <div class="title"><img src="images/icons/dark/laptop.png" alt="" class="titleIcon" />
            <h6>Cập nhật thành viên</h6>
          </div>
          
           <form id="form" class="form" enctype="multipart/form-data" method="post" action="admin/user/sua/{{$user->id}}">
             <fieldset>
              <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    
                  <div class="formRow">
                     <input  name="changeemail" type='checkbox' id ='changeemail'/>
                      <label for="param_username">Đổi Email :</label>
                      <div class="loginInput"><input type="text" name="email" id="email" value="{{$user->email}}" readonly=""/></div>
                      <div class="clear"></div>
                  </div>
                  
                  <div class="formRow">
                     <input  name="changepassword" type='checkbox' id ='changepassword'/>
                                
                      <label for="param_password">Đổi Mật khẩu:</label>
                      <div class="loginInput"><input type="password" name="password" class="password" disabled="" /></div>
                      <div class="clear"></div>
                  </div>
                  <div class="formRow">
                      <label for="param_password">Nhập lại Mật khẩu:</label>
                      <div class="loginInput"><input type="password" name="passwordAgain" class="password" disabled="" /></div>
                      <div class="clear"></div>
                  </div>
                  
                  <div class="loginControl">
                      <input type='hidden' name="submit" value='1'/>
                      <input type="submit"  value="Sửa" class="dredB logMeIn" />
                      <div class="clear"></div>
                  </div>
              </fieldset>
          </form>
      </div>
      
  </div>    
       
      
@endsection
 @section('script')
<script>
    $(document).ready(function(){
        $('#changeemail').change(function(){
         if($(this).is(':checked')){
          $('#email').removeAttr('readonly');
         }
         else{$('#email').attr('readonly','');}
         });
        });

    
 </script>  
 <script>
    $(document).ready(function(){
        $('#changepassword').change(function(){
         if($(this).is(':checked')){
          $('.password').removeAttr('disabled');
         }
         else{$('.password').attr('disabled','');}
         });
        });

    
 </script>         
@endsection		      