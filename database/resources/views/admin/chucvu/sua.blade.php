
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3  class="page-header">Chức vụ 
                            <small>Sửa</small>
                        </h3
                        >
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                      <form action="admin/chucvu/sua/{{$chucvu->id}}" method="POST">
                       
                            
                           <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>

                            <div class="form-group">
                        <label>Tên hiển thị </label> 
                        <input class="form-control" name ="hien_thi" value='{{$chucvu->hien_thi}}' />
                            </div>
                            
                             <div class="form-group">
                         <label>Tên chức vụ</label>
                          <input class="form-control" name ="ten"value='{{$chucvu->ten}}'/>
                      
                            </div>
                            
                       
                       <div class="form-group">
                        <label> chọn nhân viên phải sửa </label>
                       
                       <select class="form-control"name ='user_ids[]' multiple 
                       id='TheLoai'>
                       <option value="">-------</option>
                       @foreach($user  as $user)
                            
                        <option value="{{$user->id}}"  @if($userChecked)
                    {{$userChecked->contains('id',$user->id)? 'selected' : ''}}
                    @endif>{{$user->name}}</option>
                        @endforeach
                        </select>
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

@section('js')
<script>
    $('.checkbox_wrapper').on('click',function(){
    $(this).parents('.form').find('.checkbox_children').prop('checked',$(this).prop('checked')); 
    });
 </script>   
@endsection