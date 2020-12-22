@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
               
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dự án 
                            <small>sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/duan/sua/{{$duan->id}}" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    <div class="form-group">
                        <label> chọn danh mục dự án</label>
                       
                       <select class="form-control"name ='id_theloai'
                       id='TheLoai'>
                       <option value="">-------</option>
                       @foreach($theloai as $tl)
                            
                <option @if($duan->theloai->id==$tl->id)
                        {{'selected'}}
                         
                        @endif value="{{$tl->id}}">{{$tl->Ten}}
                        </option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>tên dự án </label>
                        <input class="form-control" name="ten" value ="{{$duan->Ten}}" />
                    </div>
                    <div class="form-group">
                        <label>ảnh</label>
                        <input type="file" class="form-control" name='anh'/>
                        <img src="public/upload/duan/{{$duan->anh}}"width=
                     '90px' height='80px'class ='zoomin' />   
                    </div>

                    <?php $anhkemtheo = json_decode($duan->anhkemtheo);?>
                    @if(is_array($anhkemtheo))
                     @foreach($anhkemtheo as $anhkemtheo)
                    <div class="form-group">
                        
                        <label>ảnh kèm theo </label>
                        
                        <input type="file" class="form-control" name='anhkemtheo[]'multiple />
                        <img src="public/upload/duan/{{$anhkemtheo}}"width=
                     '90px' height='80px'class ='zoomin' /> 
                    
                    </div>
                     @endforeach

                    @endif
                     <div class="form-group">
                     <label>ảnh kèm theo </label>
                         
                        <input type="file" class="form-control" name='anhkemtheo[]'multiple />
                      </div>

                       <div class="form-group">  
                       <label>ảnh kèm theo </label>
                         
                        <input type="file" class="form-control" name='anhkemtheo[]'multiple />
                    </div>

                     <div class="form-group">
                        <label>ảnh kèm theo </label>
                         
                        <input type="file" class="form-control" name='anhkemtheo[]'multiple /> 
                    </div>
                  
                    
                   <div class="form-group">
                         
                        <input type="file" class="form-control" name='anhkemtheo[]'multiple />
                        <label>Đối tác</label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name = 'doitac'>{{$duan->doitac}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ </label>
                        <textarea id ='demo'class="form-control ckeditor" rows="3" name = 'vitri'>{{$duan->vitri}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>ngày khởi công :{{$duan->ngaythicong}}</label>
                        <input type="date" class="form-control" name='ngaythicong'/>
                    </div>
                   <div class="form-group">
                        <label>ngày hoàn thành :{{$duan->ngayhoanthanh}}</label>
                        <input type="date" class="form-control" name='ngayhoanthanh'/>
                    </div>
                     <div class="form-group">
                    <label>công trinh nổi bậtt</label>
                        <label class="radio-inline">
                            <input name="noibat" value="1" checked="" type="radio" @if($duan->noibat==1)
                            {{"checked"}}
                            @endif/>có 
                        </label>
                        <label class="radio-inline">
                            <input name="noibat" value="0" type="radio"@if($duan->noibat==0)
                            {{"checked"}}
                            @endif />không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection  



