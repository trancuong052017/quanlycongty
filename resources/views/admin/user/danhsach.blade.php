
@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách  
                            <small>nhân viên </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                
                             <th>Họ Tên</th>
                                
                                <th>Email</th>
                        
                               <th>Delete</th>
                              
                                <th>Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($user as $user) 
                      <tr class="odd gradeX" align="center">
                        
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                       
                       
                         <td class="center">
                          @can('user.xoa')<i class="fa fa-trash-o  fa-fw"></i>
                           
                            <a href="admin/user/xoa/{{$user->id}}"> Delete</a>
                            @endcan
                           </td>
                        
                         
                        <td class="center">@can('user.sua')<i class="fa fa-pencil fa-fw"></i>
                            <a href="admin/user/sua/{{$user->id}}">Edit</a>@endcan
                        </td>
                        
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
