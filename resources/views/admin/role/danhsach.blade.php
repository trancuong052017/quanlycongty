
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
   
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">vai tro</h2>
                <small>danh sach</small></h2>
            
       
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>ten vai tro</th>
                     <th>mo ta vai tro</th>
                    <th>Delete</th>
                    <th>Edit</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX" align="">
                @foreach($role as $tl)    
                    <td>{{$tl->id}}</td>
                    <td>{{$tl->name}}</td>
                  
                     <td>{{$tl->diplay_name}}</td>
                  
                    <td class="center">@can('role.xoa')<i class="fa fa-trash-o  fa-fw"></i>
                        <a href="admin/role/xoa/{{$tl->id}}"> Delete</a>@endcan
                    </td>

                    <td class="center">@can('role.sua')<i class="fa fa-pencil fa-fw"></i> <a href="admin/role/sua/{{$tl->id}}">Edit</a>@endcan</td>
                    
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
