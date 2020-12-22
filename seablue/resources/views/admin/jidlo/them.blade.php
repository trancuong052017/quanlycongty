
@extends('admin.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
               @include('admin.thongbao')
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">menu
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/jidlo/them" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    <div class="form-group">
                        <label> chon the loai</label>
                       
                       <select class="form-control"name ='id_menu'
                       id='id_menu'>
                       <option value="">-------</option>
                       @foreach($menu as $tl)
                            
                        <option value="{{$tl->id}}">{{$tl->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>ten</label>
                        <input class="form-control" name="name" placeholder="nhap tieu de" />
                    </div>
                    <div class="form-group">
                        <label>anh </label>
                        <input type="file" class="form-control" name='image'/>
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

