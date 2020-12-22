

@extends('admin.layout1.index')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
   @include('admin.thongbao')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Công trình 
                <small>danh sách</small>
            </h1>
           
        </div>
       <div class="title">
      
      <h3 style="margin-left: 370px;">Bảng tổng hợp công nợ các công trình  </h3>
       
    </div>         
    <div class="title">
      <div class="num f12">
      <b>@if(isset($vondautu))Tổng  vốn đầu tư các công trình : {{number_format($vondautu)}} vnd @endif </b></div>
       <div class="num f12">
      <b>@if(isset($tiendathu))Tổng đã thu : {{number_format($tiendathu)}} vnd @endif </b></div>
       <div class="num f12">
      <b>@if(isset($tienconno))Tiền còn nợ : {{number_format($tienconno)}} vnd @endif</b> 
        </div>
    </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="margin-left: 3px;">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>tên công trình </th>
                    <th>địa chỉ </th>
                    <th>vốn đầu tư </th>
                    <th>tiền đã thu </th>
                    <th>tiền còn nợ </th>
                    <th>Ngày khởi công </th>
                     <th>Ngày hoàn thành</th>
                    <th>người phụ trách  </th>
                    <th>Giới thiệu </th>
                    <th>tình trạng hoạt động </th>
                    <th>ảnh </th>
                    <th>sửa</th>
                   
                     
                </tr>
            </thead>
            <tbody>
               @foreach($congtrinh  as $ct)
                <tr class="odd gradeX" align="">
                
                    <td>{{$ct->id}}</td>
                    <td>{{$ct->ten}}</td>
                    <td>{{$ct->diachi}}</td>
              <td>{{number_format($ct->vondautu)}}</td>
              <td>{{number_format($ct->tiendathu)}}</td>
              <td>{{number_format($ct->tienconno)}}</td>
                   @if($ct->ngaykhoicong)
                <td>{{date("d/m/Y",strtotime($ct->ngaykhoicong))}}</td>
                   @else
                   <td>chưa khởi công</td>
                   @endif 
                    @if($ct->ngayhoanthanh)
                 <td>{{date("d/m/Y",strtotime($ct->ngayhoanthanh))}}</td>
                   @else 
                   <td> chưa hoàn thành </td>
                   @endif 
                    <td>{{$ct->chihuy}}</td>
                    <td>{{$ct->noidung}}</td>
                     <td>@if($ct->tinhtrang==1)
                        đang hoạt động 
                       @else
                         không hoạt động
                        
                    @endif </td>
                 <td><img height="40px" width="40px" src ='public/upload/congtrinh/{{$ct->anh}}' class='zoomin'/></td>
                   
                    <td class="center">@can('congtrinh.sua')<i class="fa fa-pencil fa-fw"></i>
                    <a href="admin/congtrinh/sua/{{$ct->id}}">Edit</a>@endcan
                    </td>
                    
                    
               
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
     {{$congtrinh->links()}}
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