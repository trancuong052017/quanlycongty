
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
   
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">The loai
                <small>danh sach</small>
            </h1>
             @if(session('thongbao'))
            <div class='alert alert-success'>
             {{session('thongbao')}}
            </div>
             @endif
        </div>
       
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>ten the loai</th>
                    <th>ten khong dau</th>
                    <th>Delete</th>
                    <th>Edit</th>
                     
                </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX" align="">
                @foreach($theloai as $tl)    
                    <td>{{$tl->id}}</td>
                    <td>{{$tl->Ten}}</td>
                    <td>{{$tl->TenKhongDau}}</td>
                    
                    <td class="center">@can('theloai.xoa')<i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/xoa/{{$tl->id}}"> Delete</a>
                        @endcan
                    </td>
                    <td class="center">@can('theloai.sua')<i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$tl->id}}">Edit</a>@endcan</td>
                   
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
