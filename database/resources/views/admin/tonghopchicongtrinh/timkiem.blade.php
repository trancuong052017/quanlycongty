	@extends('admin.layout1.index')
@section('content')
<style>#menu li {
  color: #f1f1f1;
  float: left;
  margin-bottom:5px;
}

</style>
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
    <!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
		<div class="title" >
			<h3 style="margin-left: 300px;">BẢNG TỔNG HỢP CHI TIỀN MẶT CÁC CÔNG TRÌNH </h3>
	    </div>
		<div class="title">
			
			
            <div class="num f12">
             <b>  Công trình đơn vị:
             @if(isset($tencongtrinh))
            {{$tencongtrinh}} 
            @endif
            </b>
            </div>
            <div class="num f12">Tổng chi: <b> @if(isset($totall))
            {{number_format($totall)}} vnd 
            @endif </b> 
             </div>
             
             <div class="num f12">Từ ngày : <b> @if(isset($tungay))
            {{date("d/m/Y",strtotime($tungay))}}
            @endif </b>
            </div>
            <div class="num f12" >Đến ngày : <b> @if(isset($denngay))
            {{date("d/m/Y",strtotime($denngay))}} 
            @endif </b>
           </div>
          
       
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="8">
				<form class="list_filter form" action="admin/tonghopchicongtrinh/timkiem" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					
						<tr>
                            
                            <td class="item"><label for="filter_id">công trình</label><select class="form-control"name ='idcongtrinh'style="width:200px;" id ="congtrinh"> 
                      <option value=''>chọn công trình -đơn vị </option> 
                                           
                      @foreach($congtrinh as $ct)
                      <option value='{{$ct->id}}'>{{$ct->ten}}</option>
                      @endforeach
                        </select>
                    </td>
                     <td class="item"><label for="filter_id">Người chỉ huy</label><select class="form-control"name ='id'style="width:170px;" id='user'> 
                      <option value=''> ---</option> 
                     </select>
                    </td>
                           <td class="item">
                            <label for="filter_status">Từ ngày</label>
                            <input name="tungay" value="" id="filter_iname" type="date" style="width:200px;" />
                            </td>
                            <td class="item"><label for="filter_status">Đến ngày </label>
                            <input name="denngay" value="" id="filter_iname" type="date" style="width:200px;" />
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
					<td>id</td>
					<td>Tên công trình </td>
					<td>Số tiền</td>
					<td>Diễn giải </td>
					<td>Phiếu chi  </td>

					<td>Ngày chi</td>
					
				</tr>
</thead>
			
 			
			
<tbody class="list_item">
				@foreach($chicongtrinh as $chi)
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
						{{$chi->noidung}}
					  </td>
					   <td>
						<img src ='public/upload/chicongtrinh/{{$chi->anh1}}'width='100' height='80' class='zoomin'/>
						</td>
					
					
					<td class="textC">
					 {{date("d/m/Y",strtotime($chi->ngaychi))}} 	
					</td>
					
					
					
					
						
				</tr>
						
			    @endforeach
			 	              
          
	   </tbody>
			
		</table>
	</div>

	<?php 
	if(isset($idcongtrinh)){$idcongtrinh=$idcongtrinh;}else{$idcongtrinh='';}
	if(isset($tungay)){$tungay=$tungay;}else{$tungay='';}
	if(isset($denngay)){$denngay=$denngay;}else{$denngay='';}
	
	 ?>
	 {{$chicongtrinh->appends(array('idcongtrinh'=>$idcongtrinh,'tungay'=>$tungay,'denngay'=>$denngay ))->links()}}
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

      $('#congtrinh').change(function(){
         var idcongtrinh=$(this).val();
         //alert(idcongtrinh);
         $.get('admin/ajax/user/'+idcongtrinh,function(data){
           //alert(data);
            $('#user').html(data);
         });
        });
   });
</script>
@endsection
