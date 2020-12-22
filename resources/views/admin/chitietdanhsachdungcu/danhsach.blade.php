

@extends('admin.layout1.index')
@section('content')

<div class="wrapper" id="main_product">
    <div class="widget">
    
        <div class="title">
            <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
            <h4> <?php use Illuminate\Support\Facades\Auth;
                  use App\Congtrinh;
            $user =Auth::user();
            echo 'Công trình - đơn vị :';
            foreach($user->congtrinh as $ct)
            echo $ct->ten.'&nbsp;&nbsp;&nbsp;&nbsp;';
            ?></h4>
        </div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
            
           <thead class="filter"><tr><td colspan="10">
                <form class="list_filter form" action="admin/chitietdanhsachdungcu/timkiem" method="get">
                    <table cellpadding="0" cellspacing="0" width="100%"><tbody>
                    
                        <tr>
                            
                            <td class="item"><label for="filter_status">Mã dụng cụ </label>
                            <input name="madungcu" value="" id="filter_iname" type="text" style="width:80px;" />
                            </td>
                            <td class="item"><label for="filter_id">Chọn công trình</label><select class="form-control"name ='idcongtrinh'style="width:270px;"> 
                       
                      <option value=''>-chọn công trình -</option> 
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
         <tr>
                    <!-- <td style="width:10px;"><img src="public/admin_asset1/images/icons/tableArrows.png" /></td> -->
                    <th>ID dụng cụ </th>
                    <th>tên dụng cụ</th>
                    <th>số lượng</th>
                    <th>Đơn vị nhận  </th>
                    <th>Người nhận</th>
                    <th>Người giao </th>
                    <th>Ngày nhận </th>
                    <th>phiếu bàn giao </th>
                    <th>ảnh dụng cụ </th>
                    <th>xóa</th>
                </tr>
</thead>
            
            
            
<tbody class="list_item">
                 @foreach($chitietdanhsachdungcu   as $ct)
                 <tr> 
                   <td>{{$ct->madungcu}}</td>
                    <td>{{$ct->ten}}</td>
                    <td>{{$ct->soluong}}</td>
                    <td>{{$ct->tencongtrinh}}</td>
                    <td>{{$ct->nguoinhan}}</td>
                    <td>{{$ct->nguoigiao}}</td>
        <td>{{date("d/m/Y",strtotime($ct->ngaychuyen))}}</td>
                    <td>
                     <img src="public/upload/danhsachdungcu/{{$ct->anh}}"width=
                     '100px' height='80px'class='zoomin' />   
                    </td>

                 <td><img height="80px" width="100px" src ='public/upload/danhsachdungcu/{{$ct->anhdovat}}'class='zoomin'/>
                 </td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                     <a href="admin/chitietdanhsachdungcu/xoa/{{$ct->id}}">xóa</a>
                        
                    </td>
                </tr>
            </tbody>             
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
        </div>    
       
        </table>
    </div>
     
             <div id='menu'>                  
          {{$chitietdanhsachdungcu->links()}} 
         
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
