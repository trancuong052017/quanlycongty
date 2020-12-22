
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
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    <div class="form-group">
                        <label> chon the loai</label>
                       
                       <select class="form-control"name ='TheLoai'
                       id='TheLoai'>
                       <option value="">-------</option>
                       @foreach($theloai as $tl)
                            
                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>chon loai tin</label>
                 <select class="form-control" name='idLoaiTin'id='LoaiTin'>
                         <option value="">-------</option>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label>tieu de </label>
                        <input class="form-control" name="TieuDe" placeholder="nhap tieu de" />
                    </div>
                    <div class="form-group">
                        <label>anh</label>
                        <input type="file" class="form-control" name='Hinh'/>
                    </div>
                    <div class="form-group">
                        <label>tom tat</label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name = 'TomTat'></textarea>
                    </div>

                    <div class="form-group">
                        
                    
                        <label>noi  dung</label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name='NoiDung'></textarea>
                    </div>
                     <div class="form-group">
                    <label>noi bat</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" checked="" type="radio">co
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" type="radio">khong
                        </label>
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
@section('script')
<script>
    $(document).ready(function(){
        $('#TheLoai').change(function(){
         var idTheLoai=$(this).val();
         //alert(idTheLoai);
         $.get('admin/ajax/loaitin/'+idTheLoai,function(data){
           //alert(data);
            $('#LoaiTin').html(data);
         });
        });

    });
 </script>   
@endsection     

