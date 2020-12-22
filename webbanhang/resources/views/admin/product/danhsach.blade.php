<!-- head -->

<!-- Main content wrapper -->
@extends('admin.layout1.index')

@section('content')
<div class="wrapper" id="main_product" style="margin: 40px;">
	<div class="widget">
	    @include('admin.thongbao')
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>
				Danh sách sản phẩm			</h6>
		 	<div class="num f12">Số lượng: <b>{{count($danhsach_sp)}}</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="7">
				<form class="list_filter form" action="index.php/admin/product.html" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="" id="filter_id" type="text" style="width:55px;" /></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>
							
							<td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
							<td class="item">
								<select name="catalog">
									<option value=""></option>
																		
									       
							</select>
							</td>
							
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product.html'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="public/admin_asset1/images/icons/tableArrows.png" /></td>
					<td>Mã số</td>
					<td>Tên</td>
					<td>Gới thiệu</td>
					<td> Giá gốc </td>

					<td >Giảm giá </td>
					<td>Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'>
			               			            </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				@foreach($danhsach_sp as $ds)
			       <tr class='row_9'>
					<td><input type="checkbox" name="id[]" value="{{$ds->id}}" /></td>
					
					<td class="textC">{{$ds->id}}</td>
					
					<td>
					<div class="image_thumb">
						<img src="public/source/image/product/{{$ds->image}}" height="50">
						<div class="clear"></div>
					</div>
					
					<a href="admin/product/xem" class="tipS" title="" target="_blank">
					<b>{{$ds->name}}</b>
					</a>
					
					
						
					</td>
					<td style="width: 80px;">{{$ds->description}}</td>
					<td class="textR">
					{{$ds->unit_price}}                              
                           				
					</td>

					<td class="textR">
					{{$ds->promotion_price}}                              
                           				
					</td>
					
					
					<td class="option textC">
											   						
												<a  href="product/view/9.html" target='_blank' class='tipS' title="Xem chi tiết sản phẩm">
								<img src="public/admin_asset1/images/icons/color/view.png" />
						 </a>
						 <a href="admin/product/sua/{{$ds->id}}" title="Chỉnh sửa" class="tipS">
							<img src="public/admin_asset1/images/icons/color/edit.png" />
						</a>
						
						<a href="admin/product/xoa/{{$ds->id}}" title="Xóa" class="tipS verify_action" >
						    <img src="public/admin_asset1/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
		       @endforeach 			     
		      </tboy>
			
		</table>
	</div>
	
</div>
	<div class="clear mt30"></div>


 <script>
        $(document).ready(function(){
            $('#xoa').click(function(){
                if(!confirm("Bạn có thực muốn xóa !"))
                    return false;
            });

            $('#_page').change(function(){
                $('#product').submit();
            });

        });
    </script>

@endsection