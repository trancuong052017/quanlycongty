<!-- Main content wrapper -->
@extends('admin.layout1.index')
@section('content')
<div class="wrapper" style="margin: 40px;">
    
	   	<!-- Form -->
		<form class="form" id="form" action="admin/product/them" method="post" enctype="multipart/form-data">
			 <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img src="public/admin_asset1/images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới Sản phẩm</h6>
					</div>
					
				    @include('admin.thongbao')
					
					<div class="tab_container">
					     <div id='tab1' class="tab_content pd0">
					         <div class="formRow">
	<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left"><input type="file"  id="image" name="image"  ></div>
		<div name="image_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Ảnh kèm theo:</label>
	<div class="formRight">
		<div class="left"><input type="file"  id="image_list" name="image_list[]" multiple></div>
		<div name="image_list_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="formRow">
	<label class="formLeft">Ảnh kèm theo:</label>
	<div class="formRight">
		<div class="left"><input type="file"  id="image_list" name="image_list[]" multiple></div>
		<div name="image_list_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<!-- Price -->
<div class="formRow">
	<label class="formLeft" for="param_price">
		Giá :
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="unit_price"  style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" />
			<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='public/admin_asset1/crown/images/icons/notifications/information.png'/>
		</span>
		<span name="price_autocheck" class="autocheck"></span>
		<div name="price_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>

<!-- Price -->
<div class="formRow">
	<label class="formLeft" for="param_discount">
		Giảm giá (VNĐ) 
		<span></span>:
	</label>
	<div class="formRight">
		<span>
			<input name="promotion_price"  style='width:100px' id="param_discount" class="format_number"  type="text" />
			<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'  src='public/admin_asset1/crown/images/icons/notifications/information.png'/>
		</span>
		<span name="discount_autocheck" class="autocheck"></span>
		<div name="discount_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>


<div class="formRow">
	<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<select name="type_product" _autocheck="true" id='param_cat' class="left">
			<option value="">Lựa chọn danh mục</option>
			@foreach($type_product as $type)
			<option value="{{$type->id}}">{{$type->name}}</option>			    
			 @endforeach      
					</select>
		<span name="cat_autocheck" class="autocheck"></span>
		<div name="cat_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>


<!-- warranty -->



				        
						     			
<div class="formRow">
	<label class="formLeft" for="param_site_title">Title:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea name="description" id="param_site_title" _autocheck="true" rows="4" cols=""></textarea></span>
		<span name="site_title_autocheck" class="autocheck"></span>
		<div name="site_title_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>




						
	        		</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" value="Thêm mới" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
		<div class="clear mt30"></div>
@endsection		