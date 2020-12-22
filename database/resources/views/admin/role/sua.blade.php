
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">sửa  vai trò 
                            <small>sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                       
                        <form action="admin/role/sua/{{$role->id}}" method="POST">
                            
                           <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                            <div class="form-group">
                                <label>ten  vai tro</label>
                                <input class="form-control" name="name" value="{{$role->name}}" />
                            </div>
                            <div class="form-group">
                                <label>mo ta  vai tro</label>
                                <input class="form-control" name="diplay_name" value='{{$role->diplay_name}}' />
                            </div>
                              @foreach($permission as $per)
                               <div class="form-group" >
                             
                             <label class="radio-inline" style="color: blue">
                                <input name="" value="" 
                                type="checkbox" class='checkbox_wrapper'/>
                               {{$per->name}}
                               </label>
                               @foreach($per->quyencon as $con)  <label class="radio-inline">
                                <input name=" permission_id[]"
                                
                                {{$permissionChecked->contains('id',$con->id)? 'checked' :''}}
                                 value='{{$con->id}}' 
                                
                                type="checkbox" class="checkbox_children" />
                              {{$con->diplay_name}} 
                            </label>
                            @endforeach
                           
                             </div>
                             @endforeach
                            <button type="submit" class="btn btn-default">sua</button>
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