
@extends('admin.index')
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
                    
                    <th>Delete</th>
                    
                     
                </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX" align="">
                @foreach($menu as $tl)    
                    <td>{{$tl->id}}</td>
                    <td>{{$tl->name}}</td>
                    
                    
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/menu/xoa/{{$tl->id}}"> Delete</a>
                       
                    </td>
                    
                   
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
