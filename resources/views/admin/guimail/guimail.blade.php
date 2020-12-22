
<!-- head -->
@extends('admin.layout1.index')
@section('content')

<div class="line"></div>

<div class="wrapper">

      @if(session('thongbao'))
    <div class='alert alert-success'>
     {{session('thongbao')}}
 </div>
    @endif
     @if(session('loi'))
<div class='alert alert-danger'>
 {{session('loi')}}
</div>
@endif
      <h2>Gửi email cho khách hàng</h2>
	   	<!-- Form -->
		<form enctype="multipart/form-data" method="post"
         action="admin/guiemail" id="form" class="form"> 

            <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
 
           	<fieldset>
				<div class="widget">
				    <div class="tab_container">
			     <div class="tab_content pd0" id="tab1" style="display: block;">
                  <div class="formRow">
	<label for="param_name" class="formLeft">email nguoi nhan:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"> 
      <input type="email" class="form-control" id="to_email" name="to_email" placeholder="Nhập email người nhận..." required style="height:25"></span>
		<span class="autocheck" name="to_email_autocheck"></span>
		
	</div>
	<div class="clear"></div>
</div>
					         <div class="formRow">
	<label for="param_name" class="formLeft"for="subject">chủ đề:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"> 
      <input type="text" class="form-control" id="subject" name="tieude" placeholder="Nhập chủ đề của bạn..." required value=""></span>
		<span class="autocheck" name="subject_autocheck"></span>
		
	</div>
	<div class="clear"></div>
</div>
        <div class="formRow">
	<label for="param_message" class="formLeft">nội dung:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"> 
    
      <textarea name="noidung" id="message" rows="5" cols="105" placeholder="Tin nhắn gì...." required></textarea></span>
		<span class="autocheck" name="message_autocheck"></span>
		
	</div>
	<div class="clear"></div>
</div>
<div class="formRow">
	<label class="formLeft">file đính kèm</label>
	<div class="formRight">
		<div class="left">
    		<input type="file" name="file" id="image" size="25"value="">
    		
		</div>
	</div>
	<div class="clear"></div>
</div><br/>


	        		<div class="formSubmit" style="float:left">
	           			<input type="submit" class="redB" value="Gửi">
	           			<input type="reset" class="basic" value="Hủy bỏ" >
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
 
</body>
</html>
@endsection        
