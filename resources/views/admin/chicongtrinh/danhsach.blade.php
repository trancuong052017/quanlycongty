	@extends('admin.layout1.index')
@section('content')

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
			
			<h3 style="margin-left: 370px;">Bảng chi tiền mặt của công trình  </h3>
			 
		</div>  
   		<div class="title">
   			<div class="num f12">
			  	Công trình đơn vị:
             @if(isset($congtrinh))
             @foreach($congtrinh as $ct)
              <b>{{$ct->ten}}</b>
              @endforeach
            @endif
             </div>
          <div class="num f12">Từ ngày : <b> @if(isset($tungay))
            {{date("d/m/Y",strtotime($tungay))}}
            @else  khởi công 
            @endif </b>
           </div>
            <div class="num f12" >Đến ngày : <b> @if(isset($denngay))
            {{date("d/m/Y",strtotime($denngay))}} 
            @else  đến hôm nay 
            @endif </b>
           </div>
           <div class="num f12">Tổng chi tiền mặt : <b> @if(isset($tongchi))
            {{number_format($tongchi)}} vnd 
            @else 0 vnd
            @endif </b>
           </div>
           </div>
           <div class="title">
            <div class="num f12">Tổng thu tiền mặt : <b> @if(isset($tongthu))
            {{number_format($tongthu)}} vnd 
            @else 0 vnd
            @endif </b>
           </div>
            <div class="num f12">Tổng còn tiền mặt : <b> @if(isset($tongcon))
            {{number_format($tongcon)}} vnd 
            @else 0 vnd
            @endif </b>
           </div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="8">
				<form class="list_filter form" action="admin/chicongtrinh/timkiem" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					<tr>
                            <td class="item"><label for="filter_id">công trình</label><select class="form-control"name ='idcongtrinh'style="width:200px;"> 
                       @foreach($congtrinh as $ct)
                      <option value='{{$ct->id}}'>{{$ct->ten}}</option>
                      @endforeach
                        </select>
                        </td>
                           <td class="item">
                            <label for="filter_id">Từ ngày</label>
                            <input name="tungay" value="" id="filter_iname" type="date" style="width:220px;" />
                            </td>
                            <td class="item"><label for="filter_status">Đến ngày </label>
                            <input name="denngay" value="" id="filter_iname" type="date" style="width:220px;" />
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
					<td style="width:25px;">id</td>
					<td style="width:125px;">Tên công trình </td>
					<td style="width:50px;">Số tiền</td>
					<td style="width:150px;">Diễn giải </td>
					<td style="width:100px;">Ảnh 1 </td>

					<td style="width:100px;">Ngày chi</td>
					<td style="width:30px;">Sửa </td>
					<td style="width:20px;">Xóa </td>
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
					<td class="textC">
					<a href="admin/chicongtrinh/sua/{{$chi->id}}"class="tipS"title="sua">
	                <img src="public/admin_asset1/images/icons/color/edit.png" />
							</a>
						</td>
						<td>	
						   <a href="admin/chicongtrinh/xoa/{{$chi->id}}" title="Xóa" class="tipS verify_action" >
						    <img src="public/admin_asset1/images/icons/color/delete.png" />
						   </a>
					   </td>
				</tr>
				 @endforeach
		 </tbody>
			
		</table>		
		 </div>  	   
			              
         {{$chicongtrinh->links()}} 
        
     </div>  </div>
	
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