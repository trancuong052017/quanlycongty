@extends('admin.layout1.index')
@section('content')
<style>#menu li {
  color: #f1f1f1;
  float: left;
  margin-bottom:5px;
}

</style>
    <!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
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
		<div class="title">
			
			<h3 style="margin-left: 170px;">Bảng thu  Công trình - đơn vị:
			 @if(isset($tencongtrinh))
			<b>{{$tencongtrinh}}</b> 
			
			@endif</h3>
			 
		</div>           
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
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
		   
			 <div class="num f12" >Tổng  thu : <b> @if(isset($totall))
			{{number_format($totall)}}vnd 
			@endif </b>
		    </div>
		    
		  </div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="8">
				<form class="list_filter form" action="admin/tonghopthuketoan/timkiem" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					
						<tr>
							
							
							
						<td class="item"><label for="filter_id">Chọn công trình</label><select class="form-control"name ='idcongtrinh'style="width:250px;"> 
                       
                      <option value=''>-chọn công trình -</option> 
                      @foreach($congtrinh as $ct)
                      <option value='{{$ct->id}}'>{{$ct->ten}}</option>
                      @endforeach
                        </select>
                    </td>
							
							
							<td class="item">
							<label for="filter_status">Từ ngày</label>
							<input name="tungay" value="" id="filter_iname" type="date" style="width:270px;" />
                            </td>
                            <td class="item"><label for="filter_status">Đến ngày </label>
							<input name="denngay" value="" id="filter_iname" type="date" style="width:270px;" />
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
					<td style="width:150px;">Tên công trình-đơn vị trả </td>
					<td style="width:125px;">Người nhận</td>
					<td style="width:60px;">Số tiền</td>
					<td style="width:120px;">Nội dung </td>
					<td style="width:170px;">Phiếu ảnh  </td>

					<td style="width:75px;">Ngày chuyển</td>
					<td style="width:75px;">Xóa</td>
				</tr>
</thead>
			
 			
			
<tbody class="list_item">
				@foreach($thuketoan as $thu)
				  <tr>
					<!-- <td><input type="checkbox" name="id[]" value="21" /></td> -->
					
					<td class="textC">{{$thu->id}}</td>
					<td>
						{{$thu->congtrinh->ten}}
					</td>
					
					<td>
						{{$thu->nguoithu}}
					</td>
					
					<td class="textR red">
					{{number_format($thu->tien)}}
				    </td>
					<td>
						{{$thu->noidung}}
					  </td>
					   <td>
						<img src ='public/upload/thuketoan/{{$thu->anh}}'width='170' height='120' class='zoomin'/>
						</td>
					
					
					<!-- <td class="textC">
					{{$thu->ngaythu}}	
					</td> -->
	            <td>{{date("d/m/Y",strtotime($thu->ngaythu))}}</td>
					<!-- <td class="textC">
							<a href="admin/thuketoan/sua/{{$thu->id}}"class="tipS"title="sua">
	                <img src="public/admin_asset1/images/icons/color/edit.png" />
							</a>
						</td>-->
						<td>	
						   <a href="admin/thuketoan/xoa/{{$thu->id}}" title="Xóa" class="tipS verify_action" >
						    <img src="public/admin_asset1/images/icons/color/delete.png" />
						   </a>
					   </td> 
				</tr>
						
			    @endforeach
			
         
	   </tbody>
			
		</table>
	</div>
	{{$thuketoan->links()}}
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