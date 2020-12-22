@extends('admin.layout1.index')

@section('content')
<div class="line"></div>

<div class="wrapper"  style="margin: 40px;">
      <div class="widget">
           <div class="title">
		<h6>Thêm mới danh mục sản phẩm</h6>
         @include('admin.thongbao')      
		</div>

      <form id="form" class="form" enctype="multipart/form-data" method="post" action="admin/type_product/them">
         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
          <fieldset>
                
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên danh mục :<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="" name="name"></span>
                		
                		
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