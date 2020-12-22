@extends('pages.layout.index')

@section('content')

   
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
                         @if(session('thongbao'))
   
                        <div class='alert alert-success'>
                         
                         {{session('thongbao')}}
                         </div>
                         @endif
                         @if(session('loi'))
                         <div class='alert alert-danger'style="text-align: center color:red">
                         {{session('loi')}}
                         </div>
                         @endif       
                   
				    	<form action="suanguoidung/{{$nguoidung->id}}" method="post">
                             <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" value='{{$nguoidung->name}}' name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value ='{{$nguoidung->email}}' name="email" aria-describedby="basic-addon1"
							  	
							  	>
							</div>
							<br>	
							<div>
								 <input  name="changepassword" type='checkbox' id ='changepassword'/>
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password"  name="password"   disabled ="" >
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password"  name="passwordAgain" disabled ="" >
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection

@section('script')
<script>
    $(document).ready(function(){
        //alert('halo');
        $('#changepassword').change(function(){
         if($(this).is(':checked')){
          $('.password').removeAttr('disabled');
         }
         else{$('.password').attr('disabled','');}
         });
        });

    
 </script>   
@endsection   




















