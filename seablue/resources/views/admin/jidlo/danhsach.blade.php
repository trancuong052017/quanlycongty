@extends('admin.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách  
                            <small> jidlo </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                
                             <th>id_menu</th>                                
                                <th>ten</th>
                        
                               <th>anh</th>
                              
                                <th>xoa</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($danhsachjidlo as $ds) 
                      <tr class="odd gradeX" align="center">
                        
                        <td>{{$ds->id_menu}}</td>
                        <td>{{$ds->name}}</td>
                       
                       
                         <td class="center">
                        

                     <img   src='public/image/jidlo/{{$ds->image}}'
                       width="100px;"height='100px'/>
                        
                        </div>
                   
                           </td>
                        
                         
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a href="admin/jidlo/xoa/{{$ds->id}}">xoa</a>
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
