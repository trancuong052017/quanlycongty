
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa 
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                     @if(count($errors)>0)
                    <div class='alert alert-danger'>
                       @foreach($errors->all() as $err) 
                       {{$err}}<br>
                       @endforeach 
                   </div> 
                   @endif
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                  <form action="admin/user/sua/{{$user->id}}" method="POST">
                  <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
        
                    <div class="form-group">
                    <label>Họ tên </label>
                    <input class="form-control" name = "name" value="{{$user->name}}" readonly="" />
                </div>
                 <div class="form-group">
                    <label>điện thoại </label>
                    <input class="form-control" name = "phon" value="{{$user->phon}}" />
                </div>
                
                  @if(session('truycap ')==1||session('truycap')==2)
                  <div class="form-group">
                    <label>Chức vụ </label>
                  <select class="form-control"name ='chucvu_ids[]' multiple>
                 @foreach($chucvu as $chucvu) 
           
                  <option  @if($chucvuChecked)
                  {{$chucvuChecked->contains('id',$chucvu->id)? 'selected' : ''}}
                  @endif
                 value='{{$chucvu->id}}'>
                 {{$chucvu->hien_thi}}</option>
                      
                  @endforeach 
                    </select>
                     </div>
                @endif
                   <div class="form-group">
                  <input  name="changeemail" type='checkbox' id ='changeemail'/>
                    <label>email</label>
                    <input class="form-control email" type='email' name="email" value='{{$user->email}}'readonly="" />
                    
                            </div>
                             
                            @if(session('truycap')==1||session('truycap')==2)
                              <div class="form-group">
                                 <label>Quyền truy cập vào trang web </label>
                               <select class="form-control"name ='role_ids[]'
                             id='quyen' multiple>
                             
                             @foreach($role as $role)
                             
                              <option 
                              @if($rolechecked)
                              {{$rolechecked->contains('id',$role->id)? 'selected' : ''}}
                              @endif
                               value="{{$role->id}}">{{$role->diplay_name}}</option>
                              
                              
                              @endforeach
                              </select>
                                 </div>
                              @endif   
                           <input type="radio" name="tinh_trang"
                           value='1'
                            @if($user->tinh_trang==1)
                            {{"checked"}}
                            @endif/>
                            Đang làm việc

                           <input type="radio" name="tinh_trang" value="0"@if($user->tinh_trang==0)
                            {{"checked"}}
                            @endif />Không còn làm việc

                               
                            <div class="form-group">
                                <input  name="changepassword" type='checkbox' id ='changepassword'/>
                                
                                <label>Đổi mật khẩu </label>
                               
                                <input class="form-control password" type ='password' name="password" placeholder ='nhap mat khau moi' disabled="" />
                                
                            </div>
                            <div class="form-group">
                                <label>nhập lại mật khẩu</label>
                                <input class="form-control password" name="passwordAgain" type='password' 
                                placeholder ='nhap mat lai khau ' disabled="" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection        
@section('script')
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
 <script>
    $(document).ready(function(){
        $('#changeemail').change(function(){
         if($(this).is(':checked')){
          $('.email').removeAttr('readonly');
         }
         else{$('.email').attr('readonly','');}
         });
        });

    
 </script>  
@endsection    