

@extends('admin.layout1.index')
@section('content')

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
            
        <div  style="margin-left:250px;font-size: 20px;">
            DANH SÁCH DỤNG CỤ CỦA :
             @if(isset($congtrinh))
              @foreach($congtrinh as $ct)
            <b>{{$ct->ten}} </b>
            @endforeach
            @endif
        </div>
             
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
            
            <thead class="filter"><tr><td colspan="11">
                <form class="list_filter form" action="admin/dungcu/timkiem" method="get">
                    <table cellpadding="0" cellspacing="0" width="100%"><tbody>
                    
                         <tr>
                            
                           
                            <td class="item"><label for="filter_id">Danh sách dụng cụ </label>
                                <select class="form-control"name ='madungcu'style="width:200px;"> 
                              <option value=''>--chọn tên dụng cụ ---</option>  
                              @foreach($danhsachdungcu  as $ds)
                              <option value='{{$ds->id}}'>{{$ds->ten}}</option>
                              @endforeach
                                </select>
                            </td>
                            <td class="item"><label for="filter_id">công trình </label>
                                <select class="form-control"name ='idcongtrinh'style="width:200px;"> 
                             
                              @foreach($congtrinh   as $ds)
                              <option value='{{$ds->id}}'>{{$ds->ten}}</option>
                              @endforeach
                                </select>
                            </td>
                           <td class="item">
                            <label for="filter_status">Từ ngày</label>
                            <input name="tungay" value="" id="filter_iname" type="date" style="width:100px;" />
                            </td>
                            <td class="item"><label for="filter_status">Đến ngày </label>
                            <input name="denngay" value="" id="filter_iname" type="date" style="width:100px;" />
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
        
        <th>Chuyển</th>
        
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
                     
                    <td class="center">
                       
                        <i class="fa fa-pencil fa-fw"></i>
                    <a href="admin/dungcu/sua/{{$ct->id}}">Chuyển</a>
                    </td>
                  </tr>  
                @endforeach     
            </tbody>              
               
        </table>
    </div>
     {{$dungcu->links()}}        
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