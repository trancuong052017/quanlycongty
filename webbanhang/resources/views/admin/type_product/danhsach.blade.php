@extends('admin.layout1.index')

@section('content')
<div class="line"></div>

<div class="wrapper" style="margin: 40px;">

	<div class="widget">
	
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td>Mã số</td>
					
                    
					<td> Tên danh mục</td>
					<td>Sửa</td>
					<td>xóa</td>
				</tr>
			</thead>
			
 			
 			
			<tbody>
		<?php foreach ($type_product as $row):?>
			<tr class="">
						
						
						<td class="textC"><?php echo $row->id?></td>
                        
						<td class="textC"><?php echo $row->name?></td>
                        
						
						<td class="option">
                        
							<a href="admin/type_product/sua/{{$row->id}}" title="Chỉnh sửa" class="tipS ">
							  <img src="public/admin_asset1/images/icons/color/edit.png" />  
							</a>
							</td>
							<td class="option">
							<a href="admin/type_product/xoa/{{$row->id}}" title="Xóa" class="tipS verify_action" >
							    <img src="public/admin_asset1/images/icons/color/delete.png" />
							</a>
                            
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>
</div>

<div class="clear mt30"></div>
@endsection 