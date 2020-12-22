
@extends('admin.layout1.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
               @include('admin.thongbao')
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Công trình 
                            <small>thêm </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/congtrinh/them" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    <div class="form-group">
                        <label> chọn người quản lý </label>
                       
                     <select class="form-control"name ='idchihuy'> 
                    
                       <option value="">chọn người chỉ huy </option>
                       @foreach($user as $tl)
                            
                        <option value="{{$tl->id}}">{{$tl->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tên công trình </label>
                        <input class="form-control" name="ten" placeholder="nhập tên công trình " />
                    </div>
                     <div class="form-group">
                        <label>Địa chỉ  công trình</label>
                        <input class="form-control" name="diachi" placeholder="nhập địa chỉ  công trình " />
                    </div>
                     <div class="form-group">
                        <label>Vốn đầu tư </label>
                    <input class = 'format_number' name="vondautu" placeholder="nhập vốn đầu tư  " />
                    </div>
                    
                     <div class="form-group">
                        <label>Ngày khởi công </label>
                        <input class="form-control" name="ngaykhoicong" placeholder="chon ngày thang " type = "date"/>
                    </div>
                     <div class="form-group">
                        <label>Ngày hoàn thành  </label>
                        <input class="form-control" name="ngayhoanthanh" placeholder="chon ngày thang " type = "date"/>
                    </div>
                    
                     <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea class="form-control" rows="3" name = 'noidung'></textarea>
                    </div>
                    <div class="form-group">
                        <label>anh</label>
                        <input type="file" class="form-control" name='anh'/>
                    </div>

                    <!-- <div class="form-group">
                        <label>ảnh kèm theo </label>
                        <input type="file" class="form-control" name='anhkemtheo[]'/>
                    </div>
                      <div class="form-group">
                        <label>ảnh kèm theo </label>
                        <input type="file" class="form-control" name='anhkemtheo[]'/>
                    </div>   -->
                     <div class="form-group">
                    <label>tình trạng hoạt động </label>
                        <label class="radio-inline">
                            <input name="tinhtrang" value="1" checked="" type="radio">đang thi công 
                        </label>
                        <label class="radio-inline">
                            <input name="tinhtrang" value="0" type="radio">hoàn thành 
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



