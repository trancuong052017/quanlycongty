
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">them vai tro
                            <small>them</small>
                        </h1>
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
                        <form action="admin/role/them" method="POST">
                            
                           <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                            <div class="form-group">
                                <label>ten  vai tro</label>
                                <input class="form-control" name="name" placeholder="ten vai tro" />
                            </div>
                            <div class="form-group">
                                <label>mo ta  vai tro</label>
                                <input class="form-control" name="diplay_name" placeholder="mo ta vai tro" />
                            </div>
                              @foreach($quyen_cha as $cha)
                               <div class="form-group" >
                             
                             <label class="radio-inline" style="color: blue">
                                <input name="" value="" 
                                type="checkbox" class='checkbox_wrapper'/>
                               {{$cha->name}}
                               </label>
                               @foreach($cha->quyencon as $con)
                            <label class="radio-inline">
                                <input name="permission_id[]" value='{{$con->id}}' 
                                type="checkbox" class="checkbox_children" />
                              {{$con->diplay_name}}
                            </label>
                            @endforeach
                            
                             </div>
                             @endforeach
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

@section('js')
<script>
    $('.checkbox_wrapper').on('click',function(){
    $(this).parents('.form').find('.checkbox_children').prop('checked',$(this).prop('checked')); 
    });
 </script>   
@endsection