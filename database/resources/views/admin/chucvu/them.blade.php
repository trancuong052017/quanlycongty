
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3  class="page-header">Chức vụ 
                            <small>thêm</small>
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
                      <form action="admin/chucvu/them" method="POST">
                       
                            
                           <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>

                            <div class="form-group">
                        <label>Tên hiển thị </label> 
                        <input class="form-control" name ="hien_thi" placeholder="tên hiển thị" />
                            </div>
                            
                             <div class="form-group">
                         <label>Tên chức vụ</label>
                          <input class="form-control" name ="ten"/>
                      
                            </div>
                            <div class="form-group">
                           <label>Tên nhân viên </label>
                             <select class="form-control"name ='user_ids[]'
                       id='quyen' multiple>
                       
                       @foreach($user as $user)
                       
                        <option
                         value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                        </select>
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

@section('js')
<script>
    $('.checkbox_wrapper').on('click',function(){
    $(this).parents('.form').find('.checkbox_children').prop('checked',$(this).prop('checked')); 
    });
 </script>   
@endsection