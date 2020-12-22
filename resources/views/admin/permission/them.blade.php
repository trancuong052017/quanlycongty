
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2  class="page-header">thêm
                            <small>phân quyền cho modul mới </small>
                        </h2>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/permission/them" method="POST">
                          <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                          <div class="form-group">
                           <label>chon module vai tro</label>
                         <select class="form-control"name ='module_parent'
                        > <!-- lay tu config phai tu thêm khi có 1 modul mới vi dụ bảng lương  -->
                      
                       @foreach(config('permissions.table_module') as $per)
                       <option 
                        value="{{$per}}">{{$per}}</option>
                       @endforeach
                       </select>
                          </div>
                          <div class="form-group">
                            @foreach(config('permissions.table_permission_child') as $child)
                           <label class="radio-inline" style="color: blue">
                                <input name = "module_child[]" value = "{{$child}}" 
                                type="checkbox" class='checkbox_wrapper'>
                               {{$child}}
                               </label>
                               @endforeach 
                           </div>
                         <button type="submit" class="btn btn-default">them</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection        