@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
   
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Chức vụ </h2>
                <small>danh sách</small></h2>
            
       
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>tên chức vụ </th>
                     <th>mô tả chức vụ </th>
                    <th>Delete</th>
                    <th>Edit</th>
                     
                </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX" align="">
                @foreach($chucvu  as $tl)    
                    <td>{{$tl->id}}</td>
                    <td>{{$tl->ten}}</td>
                  
                     <td>{{$tl->hien_thi}}</td>
                    
                    <td class="center"> @can('chucvu.xoa')<i class="fa fa-trash-o  fa-fw"></i>
                    <a href="admin/chucvu/xoa/{{$tl->id}}"> Delete</a>
                         @endcan
                        </td>
                       <td class="center">@can('chucvu.sua')<i class="fa fa-pencil fa-fw"></i> 
                        <a href="admin/chucvu/sua/{{$tl->id}}">Edit</a>@endcan</td>
                    
                </tr>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection        
