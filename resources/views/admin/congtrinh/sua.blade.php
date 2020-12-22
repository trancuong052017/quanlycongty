
@extends('admin.layout1.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                @include('admin.thongbao')
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Công trình 
                            <small>sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/congtrinh/sua1/{{$congtrinh->id}}" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    <div class="form-group">
                        <label> chọn người quản lý </label>
                       
                       <select class="form-control"name ='idchihuy' 
                       >
                     
                       @foreach($user  as $user)
                            
                        <option value="{{$user->id}}"  @if($userchecked)
                    {{$userchecked->contains('id',$user->id)? 'selected' : ''}}
                    @endif>{{$user->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tên công trình </label>
                        <input class="form-control" name="ten" value='{{$congtrinh->ten}}' />
                    </div>
                    <div class="form-group">
            <label>Ngày khởi công : @if($congtrinh->ngaykhoicong)
                {{date("d/m/Y",strtotime($congtrinh->ngaykhoicong))}}
                   @else
                   chưa khởi công
                   @endif </label>
                        <input class="form-control" name="ngaykhoicong" placeholder="chon ngày thang " type = "date"/>
                    </div>
                    <div class="form-group">
                        <label>Ngày hoàn thành  :   @if($congtrinh->ngayhoanthanh)
                 {{date("d/m/Y",strtotime($congtrinh->ngayhoanthanh))}}
                   @else 
                   chưa hoàn thành 
                   @endif </label>
                        <input class="form-control" name="ngayhoanthanh" placeholder="chon ngày thang " type = "date"/>
                    </div>
                     <div class="form-group">
                        <label>Địa chỉ  công trình</label>
                        <input class="form-control" name="diachi" value ='{{$congtrinh->diachi}}' />
                    </div>
                      <div class="form-group">
                        <label>Vốn đầu tư </label>
                    <input class = 'format_number' name="vondautu" value="{{number_format($congtrinh->vondautu)}}" />
                    </div>
                    <div class="form-group">
                        <label>Tiền đã thu</label>
          <input class = 'format_number' name="tiendathu" value ='{{number_format($congtrinh->tiendathu)}}'disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tiền còn nợ</label>
           <input class = 'format_number' name="tienconno"value ='{{number_format($congtrinh->tienconno)}}' disabled/>
                    </div>
                    
                     <div class="form-group">
                        <label>Giới thiệu</label>
                <textarea class="form-control" rows="3" name = 'noidung'>{{$congtrinh->noidung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>ảnh </label>
                        <img src='public/upload/congtrinh/{{$congtrinh->anh}}'width='100px' height="80px" class="zoomin"></br>
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
                            <input name="tinhtrang" value="1" 
                            type="radio" 
                            @if($congtrinh->tinhtrang==1)
                            {{"checked"}}
                            @endif/>
                            Đang hoạt động 
                        </label>
                        <label class="radio-inline">
                            <input name="tinhtrang" value="0" type="radio"
                            @if($congtrinh->tinhtrang==0)
                            {{"checked"}}
                            @endif />
                            Đã hoàn thành 
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
@section('script')       
<script type="text/javascript">
     $(document).ready(function(){
        $('.zoomin').click(function(){
      a=this.src;
      $('#imageszoom').attr('src',a);
      $(".box-full-zoom").show();
       }); 

      $(".box-full-zoom").click(function(){
      $(".box-full-zoom").hide(); 
       });
   });
</script>
@endsection   


