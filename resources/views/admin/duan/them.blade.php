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
                        <h1 class="page-header">Dự án 
                            <small>thêm </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/duan/them" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    <div class="form-group">
                        <label> chọn danh mục dự án</label>
                       
                       <select class="form-control"name ='id_theloai'
                       id='TheLoai'>
                       <option value="">-------</option>
                       @foreach($theloai as $tl)
                            
                        <option value="{{$tl->id}}">{{$tl->Ten}}
                        </option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>tên dự án </label>
                        <input class="form-control" name="ten" placeholder="nhap tên dự án" />
                    </div>
                    <div class="form-group">
                        <label>ảnh</label>
                        <input type="file" class="form-control" name='anh'/>
                    </div>
                    <div class="form-group">
                        <label>ảnh kèm theo </label>
                        <input type="file" class="form-control" name='anhkemtheo[]'/>
                    </div>
                    <div class="form-group">
                        <label>ảnh kèm theo </label>
                        <input type="file" class="form-control" name='anhkemtheo[]'/>
                    </div>
                    <div class="form-group">
                        <label>ảnh kèm theo </label>
                        <input type="file" class="form-control" name='anhkemtheo[]'/>
                    </div>
                    <div class="form-group">
                        <label>Đối tác</label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name = 'doitac'></textarea>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ </label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name = 'vitri'></textarea>
                    </div>
                    <div class="form-group">
                        <label>ngày khởi công </label>
                        <input type="date" class="form-control" name='ngaythicong'/>
                    </div>
                   <div class="form-group">
                        <label>ngày hoàn thành </label>
                        <input type="date" class="form-control" name='ngayhoanthanh'/>
                    </div>
                     <div class="form-group">
                    <label>công trinh nổi bậtt</label>
                        <label class="radio-inline">
                            <input name="noibat" value="1" checked="" type="radio">có 
                        </label>
                        <label class="radio-inline">
                            <input name="noibat" value="0" type="radio">không
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



