@extends('admin.layout1.index')

@section('content')
<div class="widget" style="margin: 30px;">
     
		<div class="title">
			
			<h3>Danh sách thành viên</h3>
		</div>
		  @include('admin.thongbao')
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			
			
			<thead>
				<tr>
				 <td>Họ tên</td>
                  <td>Email</td>
                  <td>Số điện thoại</td>
                  <td>Địa chỉ</td>
                  
                   <td>Sửa</td>
                   	<td>Xóa</td>
				</tr>
			</thead>
			
 			
			
			<tbody class="list_item">
              <?php foreach ($user as $row):?>
               <tr>
                  <td><?php echo $row->name?></td>
                  <td><?php echo $row->email?></td>

                  <td><?php echo $row->phone?></td>
                 <td><?php echo $row->address?></td>
                   
                    <td>
                    
                     <a class="tipS" title="Chỉnh sửa" href="admin/user/sua/{{$row->id}}">
							<img src="public/admin_asset1/images/icons/color/edit.png">
					    	</a></td>
					    	<td>
						   <a class="tipS verify_action" href="admin/user/xoa/{{$row->id}}" original-title="Xóa">
						    <img src="public/admin_asset1/images/icons/color/delete.png">
						   </a>
                  
                 
                  </td>
               </tr>
               	<?php endforeach;?>
						</tbody>
			
		</table>
	</div>

        	</div>
	
</div>


<div class="clear mt30"></div>

		      

	
	
@endsection 