
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2  class="page-header">thêm
                            <small>nhân viên </small>
                        </h2>
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
                        <form action="admin/user/them" method="POST">
                              <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    
                                <div class="form-group">
                                <label>họ  tên</label>
                                <input class="form-control" name = "name" placeholder="nhap ten" />
                                   @if($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first('name')}}</strong>
                                  </span>
                                  @endif
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type='email' name="email" placeholder="nhap email" />
                            </div>
                            <div class="form-group">
                                <label>Điện thoại </label>
                                <input class="form-control" type = "number"  name="phon" placeholder="nhập số điện thoai " />
                            </div>
                            <div class="form-group">
                           <label> Quyền truy cập vào website </label>
                             <select class="form-control"name ='role_id[]'
                       id='quyen' multiple>
                       
                       @foreach($role as $role)
                       
                        <option 
                         value="{{$role->id}}">{{$role->diplay_name}}</option>
                        @endforeach
                        </select>
                           </div>
                            <div class="form-group">
                           <label>Chức vụ </label>
                     <select class="form-control"name ='chucvu_ids[]'
                       id='quyen' multiple>
                       
                       @foreach($chucvu  as $chucvu)
                       
                        <option 
                         value="{{$chucvu->id}}">{{$chucvu->hien_thi}}</option>
                        @endforeach
                        </select>
                           </div>
                            <div class="form-group">
                                <label>mật khẩu </label>
                               
                                <input class="form-control" type ='password' name="password" placeholder="nhap mat khau" />
                            </div>
                            <div class="form-group">
                                <label>nhập lại mật khẩu</label>
                                <input class="form-control" name="passwordAgain" type='password'placeholder="nhap lai mat khau" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">thêm</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection        