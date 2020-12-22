




    @extends('admin.layout1.index')
@section('content')
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

</style>
    <!-- Main content wrapper -->
<div class="wrapper" id="main_product">
    <div class="widget">
    
        <div class="title">
            <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
            <h6>
                Tên dụng cụ :
             @if(isset($ten))
            {{$ten}} 
            @endif
             </h6>
             <div class="num f12" >Mã dụng cụ : <b> @if(isset($madungcu))
            {{$madungcu}} 
            @endif </b> 
             </div>
            <div class="num f12" >Đến ngày : <b> @if(isset($denngay))
            {{date("d/m/Y",strtotime($denngay))}} 
            @endif </b>
           </div>
            <div class="num f12">Từ ngày : <b> @if(isset($tungay))
            {{date("d/m/Y",strtotime($tungay))}}
            @endif </b>
        </div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
            
            <thead class="filter"><tr><td colspan="11">
                <form class="list_filter form" action="admin/danhsachdungcu/timkiem" method="get">
                    <table cellpadding="0" cellspacing="0" width="80%"><tbody>
                    
                         <tr>
                            
                            <td class="item"><label for="filter_status">Mã dụng cụ </label>
                            <input name="madungcu" value="" id="filter_iname" type="text" style="width:80px;" />
                            </td>
                            <td class="item"><label for="filter_status">tên dụng cụ </label>
                            <input name="ten" value="" id="filter_iname" type="text" style="width:80px;" />
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
            <th width='70'>ID dụng cụ </th>
            <th width='100'>tên dụng cụ</th>
             <th width='70'>số lượng</th>
              <th width='170'>nội dung</th>
             <th width='100'>ngày nhập </th>
             <th width='120'>ảnh hóa đơn </th>
            <th width='120'>ảnh dụng cụ </th>
            <th width='70'>sửa</th>
           
              </tr>
         </thead>
        <tbody class="list_item">
                @foreach($danhsachdungcu   as $dc)  
                <tr class="odd gradeX" align="">
                 
                    <td>{{$dc->id}}</td>
                    <td>{{$dc->ten}}</td>
                     <td>{{$dc->soluong}}</td>
                     <td>{{$dc->noidung}}</td>
                     <td>{{date("d/m/Y",strtotime($dc->ngaynhap))}}</td>
                    <td>
                     <img src="public/upload/danhsachdungcu/{{$dc->anh}}"width=
                     '120px' height='100px'class='zoomin' />   
                    </td>
                    <td>
                     <img src="public/upload/danhsachdungcu/{{$dc->anhdovat}}"width=
                     '120px' height='100px'class='zoomin' />   
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                    <a href="admin/danhsachdungcu/sua/{{$dc->id}}">Sửa</a> 
                    </td>
                   
                    
                 </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    <?php if(isset($madungcu)){$madungcu=$madungcu;}else{$madungcu='';}
    if(isset($ten)){$ten=$ten;}else{$ten='';}
    if(isset($tungay)){$tungay=$tungay;}else{$tungay='';}
    if(isset($denngay)){$denngay=$denngay;}else{$denngay='';}
    
     ?>
     {{$danhsachdungcu->appends(array('madungcu'=>$madungcu,'ten'=>$ten,'tungay'=>$tungay,'denngay'=>$denngay))->links()}}
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