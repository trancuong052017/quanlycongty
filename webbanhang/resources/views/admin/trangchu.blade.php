  @extends('admin.layout1.index')
@section('content')
 
<div class="widget"style="margin-top:40px;">
		<div class="title" style="margin-top:0px;">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
	<h6>Danh sách Giao dịch</h6>
		</div>
		@include('admin.thongbao')
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			
			<thead>
				<tr>
					<td style="width:10px;"><img src="public/admin_asset1/images/icons/tableArrows.png" />

					</td>
					<td style="width:50px;">Mãđơn hàng</td>
					<td style="width:105px;">Tên người mua </td>
					<td style="width:70px;">Số tiền</td>
					<td style="width:70px;">Hình thức</td>
					<td style="width:80px;">tình trạng </td>
					<td style="width:75px;">Ngày đặt</td>
					
					<td style="width:55px;">xem chi tiết</td>
					<td style="width:55px;">xóa </td>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="9">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/tran/del_all.html">
									<span style='color:white;margin-bottom: 60px; '>Xóa hết</span>
								</a>
						 </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				@foreach($bills as $bill)
				<tr>
					<td><input type="checkbox" name="id[]" value="{{$bill->id}}" /></td>
					<td class="textC">{{$bill->id}}</td>
					<td class="textC">{{$bill->customer->name}}</td>
					
					
					
					<td class="textC">{{$bill->total}}</td>
					
					<td class="textC">{{$bill->payment}}</td>
					
					
					<td class="status textC">
						<span class="pending">
						@if($bill->status==0)
						<span>chờ xử lý </span>
						@else 
						<span>đã thanh toán </span>
						@endif 					</span>
					</td>
					
					<td class="textC">{{$bill->date_order}}</td>
					
					<td class="textC">
							<a href="admin/giohang/xem/{{$bill->id}}"  title="chi tiết">
								chi tiết 
							</a>
						</td>	
						<td class="textC">	
				<a href="admin/giohang/xoa/{{$bill->id}}" title="Xóa" class="tipS verify_action" >
						    <img src="public/admin_asset1/images/icons/color/delete.png" />
						   </a>
					</td>
				</tr>
				@endforeach 			
		</tbody>
			
		</table>
	</div>


	

		
@endsection
