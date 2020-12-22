
@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                @if(count($errors)>0)
                    <div class='alert alert-danger'>
                       @foreach($errors->all() as $err) 
                       {{$err}}<br>
                       @endforeach 
                   </div> 
                   @endif
                <div class="row">
                    
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                    
                    
                    <div class="form-group">
                        <label>ten</label>
                        <input class="form-control" name="Ten" placeholder="nhap ten" />
                    </div>
                    <div class="form-group">
                        <label>noi dung</label>
                        <input class="form-control" name="NoiDung" placeholder="nhap noi dung" />
                    </div>
                    <div class="form-group">
                        <label>link</label>
                        <input class="form-control" name="Link" placeholder="nhap link" />
                    </div>
                    <div class="form-group">
                        <label>hinh</label>
                        <input type="file" class="form-control" name='Hinh'/>
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


