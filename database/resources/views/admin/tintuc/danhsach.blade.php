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
                                <th>ID</th>
                                <th>tieu de </th>
                                <th>the loai</th>
                                <th>tom tat</th>
                                <th>loai tin</th>
                                <th>luot xem</th>
                                <th>noi bat</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)

                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td><p>{{$tt->TieuDe}}</p>
                                <img width ='100px'src='public/upload/tintuc/{{$tt->Hinh}}'/></td>
                                <td> {{$tt->loaitin->theloai->Ten}}</td>
                                 <td>{{$tt->TomTat}}</td>
                                <td>{{$tt->loaitin->Ten}}</td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td>{{$tt->NoiBat}}</td>
                                <td class="center">@can('tintuc.xoa')<i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->id}}"> Delete</a>@endcan</td>
                                <td class="center">@can('tintuc.sua')<i class="fa fa-pencil fa-fw"></i><a href="admin/tintuc/sua/{{$tt->id}}">Edit</a>@endcan</td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
            </div>
            
        </div>
@endsection        
