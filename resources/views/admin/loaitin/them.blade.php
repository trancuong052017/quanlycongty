
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>them</small>
                        </h1>
                    </div>
                     <div class="col-lg-7" style="padding-bottom:120px">
                    
                    @if(count($errors)>0)
                    
                    <div class='alert alert-danger'>
                       @foreach($errors->all() as $err) 
                       {{$err}}<br>
                       @endforeach 
                   </div> 
                   @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/loaitin/them" method="POST">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                            <div class="form-group">
                                <label>the loai</label>
                                <select class="form-control" name = 'idTheLoai'>
                                    
                                    @foreach($theloai as $tl)
                                    <option
                                     value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ten  loai tin</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Category Name"/>
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
        
            