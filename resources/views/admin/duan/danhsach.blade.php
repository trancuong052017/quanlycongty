
@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <h1 class="page-header">danh sach
                            <small>tin tuc</small>
                         </h1>
                        
                    </div>

                   
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                            <th>Mã dự án </th>
                            <th>tên dự án </th>
                            <th>địa chỉ </th>
                            <th>Tên đơn vị đối tác </th>
                            <th>ngày khởi công </th>
                           
                            <th>Ngày hoàn thành</th>
                             <th>danh mục dự án </th>
                            <th>ảnh </th>
                            
                            
                            
                            <th>sửa</th>
                            <th>xóa  </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($duan as $ct)

                            <tr class="odd gradeX" align="center">
                                <td>{{$ct->id}}</td>
                    <td>{{$ct->Ten}}</td>
                    <td>{{$ct->vitri}}</td>
                    <td>{{$ct->doitac}}</td>
                     <td>{{date("d/m/Y",strtotime($ct->ngaythicong))}}</td>
                     <td>{{date("d/m/Y",strtotime($ct->ngayhoanthanh))}}</td>
                    <td>{{$ct->theloai->Ten}}</td>
                   
        
                    <td>
                     <img src="public/upload/duan/{{$ct->anh}}"width=
                     '90px' height='80px'class ='zoomin' />   
                    </td>
                 
                    <td class="center">
                       
                        <i class="fa fa-pencil fa-fw"></i>
                    <a href="admin/duan/sua/{{$ct->id}}">sửa </a>
                    </td>
                    
                   <td class="center">
                       
                        <i class="fa fa-trash-o  fa-fw"></i>
                    <a href="admin/duan/xoa/{{$ct->id}}">xóa</a>
                    </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
            </div>
            
        </div>
@endsection        
