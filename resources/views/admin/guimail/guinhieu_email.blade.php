<!-- head -->
@extends('admin.layout1.index')
@section('content')


<!--  <script>
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
<script>
    $(document).ready(function(){
    	var $list_action=$('.list_action_email');
       // $list_action.find
        $list_action.find('#submit_emai').click(function(){
        	var ids=new Array();
        	$('[name="id[]"]:checked').each(function(){
             ids.push($(this).val())
        	});
           var title=$('#title').val();
          var message=$('#message').val();
          var url =$(this).attr('url');
          //alert(url+ids);
        
         $.get(url,+ids,function(data){
           alert(data);
            $('#user').html(data);
         });
         $.ajax({
         	alert(),
         	url:url,
         	type:'post',
         	data:{'ids_email':ids,'message':message,'title':title},
         	
         	success: function()
         	 {   //alert('halo ajax');
         		$(ids).each(function(id, val){
                 $('tr.row_'+val).fadeOut();
         		});
         	  }
         	});*/

       
       
        });

        $('#soluongcon').change(function(){
         var madungcu=$(this).val();
         //alert(idcongtrinh);
         $.get('admin/ajax/user/'+madungcu,function(data){
           //alert(data);
            $('#soluongcon').html(data);
         });
        });

       

    });
 </script>   --> 
 <div style="margin-bottom:50">
<div id="main_product" class="wrapper" style="width:900px">
 
	<div class="widget" style="width:980px">
	
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
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<div>
				Danh sách khách hàng
            	
			</div>
		 	
		</div>
		<form enctype="multipart/form-data" method="post"
         action="admin/guinhieu_email" id="form" class="form"> 

            <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
		
		<table width="900" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			
			
			
			<thead>
				<tr class="bang">
					<td><img src="public/admin_asset1/images/icons/tableArrows.png"></td>
					<td>Mã số</td>
					<td>Tên</td>
				    <td>email</td>
                     
                  </tr>
			</thead>
			
 			
			<tbody class="list_item">
			     <?php foreach ($user as $row):?>
			     <tr class="row_<?php echo $row->id?>">
					<td><input type="checkbox" value="<?php echo $row->id?>" name="ids[]"></td>
					
					<td class="textC"><?php echo $row->id?></td>
					
					<td class="textC">
					
					
					
					    <b><?php echo $row->name?></b>
					
					</td>
                   
                     <td class="textC"> <?php echo $row->email?></td>
					
                    
					
					
				</tr>
				<?php endforeach;?>
                <tr>
                <td colspan="10">tiêu đề :<input type="text"  name="title"  style="width:520 ; height:35; font-size:18; margin-left:20"></td>
                </tr>
                <tr>
                <td colspan="10">Nội dung :<textarea type="text"  name="message" cols="130" rows="10" style="font-size:16"></textarea></td>
                </tr>
		   </tbody>
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="10">
                    
						 
                         <div class="formSubmit" style="float:left">
	           			<input type="submit" class="redB" value="Gửi">
	           			<input type="reset" class="basic" value="Hủy bỏ" >
	           	     	</div>
                        	
					     
					</td>
				</tr>
			</tfoot>
		</table>
		</form>
	</div>
	</div>
</div>
</div>
	</div>
</div>
@endsection        
