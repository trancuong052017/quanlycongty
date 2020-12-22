
@extends('admin.layout1.index')
@section('content')

<div class="wrapper" id="main_product">
    <div class="widget">
        <div class="title">
      <h3 style="margin-left: 130px;">DANH SÁCH  CHI TIẾT CÁC DỤNG CỤ TẠI CÔNG TRÌNH -ĐƠN VỊ </h3>
       </div>
       
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
            
            <thead class="filter"><tr><td colspan="11">
                <form class="list_filter form" action="admin/tonghopdungcu/timkiem" method="get">
                    <table cellpadding="0" cellspacing="0" width="80%"><tbody>
                    
                         <tr>
                            
                            <td class="item"><label for="filter_id">Chọn dung cụ </label><select class="form-control"name ='madungcu'style="width:160px;"> 
                                 <option value=''>--chọn dụng cụ --</option>
                              @foreach($danhsachdungcu  as $ct)
                              <option value='{{$ct->id}}'>{{$ct->ten}}</option>
                              @endforeach
                                </select>
                            </td>
                            <td class="item"><label for="filter_id">Chọn công trình</label><select class="form-control"name ='idcongtrinh'style="width:210px;"> 
                                <option value=''>--chọn công trình --</option>
                              @foreach($congtrinh as $ct)
                              <option value='{{$ct->id}}'>{{$ct->ten}}</option>
                              @endforeach
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
            
<thead>
    <tr>
        <th>Mã dụng cụ</th>
        <th>tên dụng cụ</th>
        <th>số lượng</th>
        <th>Tên đơn vị nhận </th>
        <th>Người nhận</th>
       
        <th>Ngày nhận </th>
        <th>phiếu bàn giao </th>
        <th>ảnh dụng cụ </th>
     </tr>
    </thead>
            
            
            
<tbody class="list_item">
                  @foreach($dungcu   as $ct) 
                  <tr>   
                    <td>{{$ct->madungcu}}</td>
                    <td>{{$ct->ten}}</td>
                    <td>{{$ct->soluong}}</td>
                    <td>{{$ct->tencongtrinh}}</td>
                    <td>{{$ct->nguoinhan}}</td>
                   
        <td>{{date("d/m/Y",strtotime($ct->ngaychuyen))}}</td>
                    <td>
                     <img src="public/upload/danhsachdungcu/{{$ct->anh}}"width=
                     '90px' height='80px'class ='zoomin' />   
                    </td>

                 <td><img height="80px" width="90px" src ='public/upload/danhsachdungcu/{{$ct->anhdovat}}'class ='zoomin'/></td>
               </tr>
               @endforeach      
              </tbody>              
               
             <div id='menu'>                  
       
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
        </div>    
       
            
        </table>
    </div>
     {{$dungcu 
      ->links()}}
   
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