<!-- Main content wrapper -->
@extends('admin.layout1.index')

@section('content')
	
	
       <div class="line"></div>

<div class="wrapper" style="margin-top:40px;">
      <div class="widget">
           <div class="title">
			<h3>Thêm mới quản trị viên</h3>
		</div>
		
		@include('admin.thongbao') 
      <form id="form" class="form" enctype="multipart/form-data" method="post" action="admin/user/them">
     <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
          <fieldset>
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name"  name="name"></span>
                		
                	
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_name" class="formLeft">Điện thoại :</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name"  name="phone"></span>
                		
                	
                	</div>
                	<div class="clear"></div>
                </div>
                 <div class="formRow">
                	<label for="param_name" class="formLeft">địa chỉ :</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name"  name="address"></span>
                		
                	
                	</div>
                	<div class="clear"></div>
                </div>
                 <div class="formRow">
                	<label for="param_name" class="formLeft">email:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name"  name="email"></span>
                		
                	
                	</div>
                	<div class="clear"></div>
                </div>
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Password:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="password" _autocheck="true" id="param_password" name="password"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		
                	</div>
                	<div class="clear"></div>
                </div>
                
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Nhập lại mật khẩu:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="password" _autocheck="true" id="param_re_password" name="passwordAgain"></span>
                		
                		
                	</div>
                    
                	<div class="clear"></div>
                </div>
                 
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Thêm mới">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
	@endsection    