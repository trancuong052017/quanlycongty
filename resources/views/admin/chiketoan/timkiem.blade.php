	@extends('admin.layout1.index')
@section('content')


</style>
    <!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
	      <div class="title">
			
			<h3 style="margin-left: 370px;">Bảng chi kế toán </h3>
			 
		</div> 
		<div class="title">

			
			<div class="num f12" >
			 Công trình đơn vị:
			 @if(isset($tencongtrinh))
			<b>{{$tencongtrinh}} </b>
			@endif
			 </div>
			  <div class="num f12" >chi  :<b> @if($hinhthuc!=null)
			{{$hinhthuc}} 
			@else
			<?php echo  'toàn bộ'?>
			@endif </b>
		    </div>
			 <div class="num f12" >Tổng chi : <b> @if(isset($totall))
			{{number_format($totall)}}vnd 
			@endif </b>
		    </div>
		    <div class="num f12">Từ ngày : <b> @if($tungay!=null)
			{{date("d/m/Y",strtotime($tungay))}}
			@else
			<?php echo  'khởi công'?>
			@endif </b>
		   </div>
		    <div class="num f12" >Đến ngày : <b> @if($denngay!=null)
			{{date("d/m/Y",strtotime($denngay))}} 
			@else
			<?php echo  'hôm nay'?>
			@endif </b>
		   </div>
		 	
		  </div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="8">
				<form class="list_filter form" action="admin/chiketoan/timkiem" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					
						<tr>
						
							
						<td class="item"><label for="filter_id">Chọn công trình</label><select class="form-control"name ='idcongtrinh'style="width:200px;"> 
                       
                      <option value=''>-chọn công trình -</option> 
                      @foreach($congtrinh as $ct)
                      <option value='{{$ct->id}}'>{{$ct->ten}}</option>
                      @endforeach
                        </select></td>
							
							
							<td class="item"><label for="filter_status">Từ ngày </label>
							<input name="tungay" value="" id="filter_iname" type="date" style="width:170px;" />
                            </td>
                            <td class="item"><label for="filter_status">Đến ngày </label>
							<input name="denngay" value="" id="filter_iname" type="date" style="width:170px;" />
                            </td>
								
						<td class="item"><label for="filter_id">Hình thức</label><select class="form-control"name ='hinhthuc'style="width:150px;"> 
                <option value=''>-chọn hình thức-</option> 
               <option value='tiền_mặt'>tiền mặt cho chỉ huy</option>
               <option value='vật_tư'>tiền mua vật tư</option>
               <option value='tiền_lương'>tiền lương  </option>
                        </select>
                       </td>
							
							<td class="item"><label for="filter_status">Tìm kiếm </label>
							<input type="submit" class="button blueB" value="submit"style='width:100px' />
							
							</td>
							
						</tr>
					</tbody>
				</table>
				</form>
			</td>
		</tr>
	</thead>
			
<thead>
		<tr>
			<!-- <td style="width:10px;"><img src="public/admin_asset1/images/icons/tableArrows.png" /></td> -->
			<td style="width:30px;">id</td>
			<td style="width:145px;">Công trình nhận </td>
			<td style="width:80px;">Số tiền</td>
			<td style="width:130px;">Người nhận</td>
			<td style="width:130px;">hinhf thức </td>
            <td style="width:150px;">Ảnh </td>
			<td style="width:75px;">Ngày chi</td>
			
			<td style="width:20px;">Xóa </td>
		</tr>
</thead>
			
 			
			
<tbody class="list_item">
				@foreach($chiketoan  as $chi)
				  <tr>
					<!-- <td><input type="checkbox" name="id[]" value="21" /></td> -->
					
					<td class="textC">{{$chi->id}}</td>
					
					<td>
						{{$chi->congtrinh->ten}}
					</td>
					
					<td class="textR red">
					{{number_format($chi->tien)}}
				    </td>
					<td>
						{{$chi->nguoinhan}}
					  </td>
					  <td>
						{{$chi->hinhthuc}}
					  </td>
					   <td>
						<img src ='public/upload/chiketoan/{{$chi->anh}}'width='150' height='120' class='zoomin'/>
						</td>
					
					
					<td class="textC">
				{{date("d/m/Y",strtotime($chi->ngaychi))}}	
					</td>
					
					   <td>	
						   <a href="admin/chiketoan/xoa/{{$chi->id}}" title="Xóa" class="tipS verify_action" >
						    <img src="public/admin_asset1/images/icons/color/delete.png" />
						   </a>
					   </td>
				</tr>
						
			    @endforeach
			             
        
          @if(count($errors)>0)
                    
        <div class='alert alert-danger'>
           @foreach($errors->all() as $err) 
           {{$err}}<br>
           @endforeach 
         </div> 
         @endif
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
         
	   </tbody>
			
		</table>
	</div>
	<?php if(isset($id)){$id=$id;}else{$id='';}
	if(isset($idcongtrinh)){$idcongtrinh=$idcongtrinh;}else{$idcongtrinh='';}
	if(isset($tungay)){$tungay=$tungay;}else{$tungay='';}
	if(isset($denngay)){$denngay=$denngay;}else{$denngay='';}
	if(isset($hinhthuc)){$hinhthuc=$hinhthuc;}else{$hinhthuc='';}
	 ?>
	 {{$chiketoan->appends(array('id'=>$id,'idcongtrinh'=>$idcongtrinh,'tungay'=>$tungay,'denngay'=>$denngay,'hinhthuc'=>$hinhthuc ))->links()}}
</div>
</div>	
</div>
</div>	
@endsection
@section('script')       
<script type="text/javascript">
     $(document).ready(function(){
        $('.zoomin').click(function(){
      a=this.src;
      $('#imageszoom').attr('src',a);
      $(".box-full-zoom").show();
       }); 

      $(".box-full-zoom").click(function(){
      $(".box-full-zoom").hide(); 
       });
   });
</script>
@endsection