@extends('admin.layout1.index')

@section('content')
<style>
table td{
	margin-left: 20px;
	padding: 10px;
	border: thin solid rgba(255,153,0,1);
	width: auto;
}
.box-center{
	margin-left: 10px;
	margin-top: 50;
	width: 900px;
	}

</style>

<div class="clear mt30"></div>

 <div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h3>Đơn hàng </h3>
			
		</div>
		
		<div class="clear"></div>
	</div>
</div>



<div id="main_product" class="wrapper">
 <!-- @if(session('thongbao'))
   
    <div class='alert alert-success'>
     
     {{session('thongbao')}}
     </div>
     @endif
     @if(session('loi'))
     <div class='alert alert-danger'style="text-align: center color:red">
     {{session('loi')}}
     </div>
     @endif      -->
     @include('admin.thongbao')
	<div class="widget">
	
		
	
  
	  <div class="box-content-center product">	
		 
           <table> 
			
				<tr>
					<td colspan="1"> Mã đơn hàng giao dịch :{{$donhang->id}}</td>
					<td colspan="1">Tổng số loại hàng  :{{count($danhsach_hang)}}</td>
					<td colspan="2">Tổng số tiền phải trả :{{number_format($donhang->total)}}có :{{number_format($donhang->vanchuyen)}}
					tiền vận chuyển  </td>
                     <td colspan="1"> Tình trạng giao dịch  : <?php
			            if($donhang->status==0)
						{ echo "chưa xuất hàng";}
					     
						 else{
						 
							  echo "đã xuất hàng ";
						    }  ?>
                      </td>
					<td colspan="3"> Ngày tháng :<?php echo date("d/m/Y",strtotime($donhang->date_order))?></td>
				</tr>
                <tr>
                 <td colspan="1">Mã khách hàng  : <?php echo $donhang->id_customer ?></td>
                 <td colspan="1">Tên khách hàng  : <?php echo $donhang->customer->name ?></td>
                 <td colspan="1">điện thoại : <?php echo $donhang->customer->phone ?></td>
				 <td colspan="2" >Địa chỉ :<?php echo $donhang->customer->address ?></td>
                
				<td colspan="2" >ghi chú :<?php echo $donhang->note ?></td>	 
                </tr>
                    
                 
                
		
				<tr>
                    
					<td >Tên hàng</td>
					<td >Mã số đơn hàng</td>
					<td >mã  hàng</td>
                    <td >Số lượng</td>
                    <td >tổng tiền </td>
                  
					<td >ngày tháng</td>
					<td >hành động</td>
					
				</tr>	
					
		
			<tr>
			    <?php foreach ($danhsach_hang as $row):?>
							<tr>
                    <td><?php echo $row->product->name ?></td>     
					<td><?php echo $row->id_bill ?></td>
					
					
					
					<td>
					<?php echo $row->id_product ?>				</td>
                    
					<td>
					<?php echo $row->quantity ?>				</td>
                    <td>
					<?php echo number_format($row->unit_price) ?>				</td>
                     
				
					<td class="textR red"><?php echo date("d/m/Y",strtotime($row->created_at))?></td>
					
					
					<td class="textC">
                           
							<?php if($row->status==0): ?>
                             'chờ xử lý '
                           <?php endif ;?>
					</td>
				</tr>
				<?php endforeach;?>	 
		   </tbody>
		
		</table>
		<div style="margin-left: 300px;margin-top: 50px;">
       <a href="admin/giohang/xuathang/{{$donhang->id}}">xuất hàng </a></div>
          </div>
          </div>
          </div>
          </div>
          @endsection