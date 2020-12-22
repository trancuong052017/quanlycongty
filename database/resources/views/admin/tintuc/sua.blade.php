
@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                @if(count($errors)>0)
                    <div class='alert alert-danger'>
                       @foreach($errors->all() as $err) 
                       {{$err}}<br>
                       @endforeach 
                   </div> 
                   @endif
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>{{$tintuc->Ten}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    <div class="form-group">
                        <label>the loai</label>
                       
                       <select class="form-control"name ='TheLoai'
                       id='TheLoai'>
                       @foreach($theloai as $tl)
                        <option 
                         @if($tintuc->loaitin->theloai->id==$tl->id){
                        {{'selected'}}
                         }
                        @endif
                        
                        value="{{$tl->id}}">{{$tl->Ten}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>loai tin</label>
                       <select class="form-control" name='idLoaiTin'id='LoaiTin'>
                       
                         @foreach($loaitin as $lt)
                            
                        <option 
                         @if($tintuc->loaitin->id==$lt->id){
                        {{'selected'}} 
                        }
                        @endif
                        value="{{$lt->id}}">{{$lt->Ten}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>tieu de </label>
                        <input class="form-control" name="TieuDe" value='{{$tintuc->TieuDe}}' />
                         @if($errors->has('TieuDe'))
                        <div class ='alert alert-danger'>
                            <strong>{{$errors->first('TieuDe')}}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>anh</label>
                        <input type="file" class="form-control" name='Hinh'  />
                        <p><img height="70px" width="100px" src="upload/tintuc/{{$tintuc->Hinh}}"/></p>
                    </div>
                    <div class="form-group">
                        <label>tom tat</label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name = 'TomTat'>
                            {{$tintuc->TomTat}}
                        </textarea>
                         @if($errors->has('TomTat'))
                    <div class ='alert alert-danger'>
                        <strong>{{$errors->first('TomTat')}}</strong>
                    @endif
                    </div>

                    <div class="form-group">
                        <label>noi  dung</label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name='NoiDung'>{{$tintuc->NoiDung}}</textarea>
                    </div>
                     <div class="form-group">
                    <label>noi bat</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" 
                            type="radio" 
                            @if($tintuc->NoiBat==1)
                            {{"checked"}}
                            @endif/>
                            co
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" type="radio"
                            @if($tintuc->NoiBat==0)
                            {{"checked"}}
                            @endif />
                             khong
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">sua</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
                   
           </div>
                <!-- /.row -->
                
                    <div class="col-lg-12">
                        <h1 class="page-header">danh sach
                            <small>binh luan</small>
                        </h1>
                    </div>
                   
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>nguoi dung </th>
                                <th>noi dung</th>
                                <th>ngay dang</th>
                                
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->comment as $tt)
                             
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->user->name}}</td>
                                
                                <td> {{$tt->NoiDung}}</td>
                                <td>{{$tt->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$tt->id}}/{{$tintuc->id}}"> Delete</a></td>
                                                      
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
            <!-- /.container-fluid -->
        </div>
@endsection  
@section('script')
<script>
    $(document).ready(function(){
        $('#TheLoai').change(function(){
         var idTheLoai=$(this).val();
         //alert(idTheLoai);
         $.get('admin/ajax/loaitin/'+idTheLoai,function(data){
            $('#LoaiTin').html(data);
         });
        });

    });
 </script>   
@endsection     

