	
	<!-- Left side content -->
<div id="left_content">
<div id="leftSide" style="padding-top:30px;">
<!-- Account panel -->
<div class="sideProfile"><a href="#" title="" class="profileFace"><img width="40" src="public/admin_asset1/images/user.png" /></a>
	<span>Xin chào: <strong>admin!</strong></span>
	<span>{{session('name')}}</span>
	<div class="clear"></div>
</div>

			
<ul id="menu" class="nav">

  <li class="home">
		
		<a href="admin/user/danhsach" class="" >
			<span>Trở về trang 2</span>
			
		</a>	
	</li>
	 <li class="tran">
		@can('tonghopthuketoan.danhsach')	
		<a href="admin/tonghopthuketoan/danhsach" class="" >
			<span>Tổng hợp thu-kế toán</span>
			
		</a>
		@endcan	
	</li>
	 <li class="tran">
		@can('tonghopchiketoan.danhsach')	
		<a href="admin/tonghopchiketoan/danhsach" class="">
			<span>Tổng hợp-chi kế toán</span>
			
		</a>
		@endcan		
	</li>
	 <li class="tran">
		@can('tonghopchicongtrinh.danhsach')	
		<a href="admin/tonghopchicongtrinh/danhsach" class="">
			<span>Tổng hợp chi công trình </span>
			
		</a>
		@endcan		
	</li>
	<li class="tran">
		@can('tonghopthucongtrinh.danhsach')	
		<a href="admin/tonghopthucongtrinh/danhsach" class="">
			<span>Tổng hợp thu công trình </span>
			
		</a>
		@endcan		
	</li>
	 <li class="tran">
		@can('tonghopdungcu.danhsach')	
		<a href="admin/tonghopdungcu/danhsach"class="" >
			<span>Tổng hợp dụng cụ </span>
			
		</a>
		@endcan		
	</li>
 <li class="tran">
		@can('congtrinh.danhsach')
		<a href="" class=" exp" >
			<span>Danh sách công trình</span>
			
		</a>
		@endcan
			<ul class="sub">
				<li>
				@can('congtrinh.danhsach')	
				<a href="admin/congtrinh/danhsach">
					Danh sách 
				</a>@endcan
			     </li>
				 <li>
				 	@can('congtrinh.them')
				<a href="admin/congtrinh/them">
					Thêm công trình-đơn vị  
				</a>@endcan
			      </li>
			</ul>
						
  </li>
  
 <li class="tran">
		@can('thucongtrinh.danhsach')
		<a href="" class=" exp" >
			<span>Thu -công trình-đơn vị</span>
			
		</a>@endcan
		
			<ul class="sub">
				<li >@can('thucongtrinh.danhsach')
					<a href="admin/thucongtrinh/danhsach">
				
					Danh sách 
				</a>@endcan
			     <!-- </li>
				 <li >@can('thucongtrinh.them')
				<a href="admin/thucongtrinh/them">
					thêm -thu công trình 
				</a>@endcan
			      </li> -->
			</ul>
						
  </li>
 
  <li class="tran">
		@can('chicongtrinh.danhsach')
		<a href="" class=" exp" >
			<span>Chi - công trình-đơn vị</span>
			
		</a>@endcan
		
			<ul class="sub">
				<li >@can('chicongtrinh.danhsach')
					<a href="admin/chicongtrinh/danhsach">
				
					Danh sách 
				</a>@endcan
			     </li>
				 <li >@can('chicongtrinh.them')
				<a href="admin/chicongtrinh/them">
					thêm -chi công trình 
				</a>@endcan
			      </li>
			</ul>
	</li>

	<li class="tran">
		@can('chiketoan.danhsach')
		<a href="" class=" exp" >
			<span>Chi- phòng kế toán </span>
			
		</a>@endcan
		
			<ul class="sub">
				<li >@can('chiketoan.danhsach')
					<a href="admin/chiketoan/danhsach">
				
					Danh sách 
				</a>@endcan
			     </li>
				 <li >@can('chiketoan.them')
				<a href="admin/chiketoan/them">
					thêm - chi phòng kế toán  
				</a>@endcan
			      </li>
			</ul>
						
  </li>		
  <li class="tran">
		@can('thuketoan.danhsach')
		<a href="" class=" exp" >
			<span>Thu- phòng kế toán </span>
			
		</a>@endcan
		
			<ul class="sub">
				<li >@can('thuketoan.danhsach')
					<a href="admin/thuketoan/danhsach">
				
					Danh sách 
				</a>@endcan
			     </li>
				 <li >@can('chiketoan.them')
				<a href="admin/thuketoan/them">
					thêm - thu phòng kế toán  
				</a>@endcan
			      </li>
			</ul>
						
  </li>		
	<li class="tran">
		@can('danhsachdungcu.danhsach')
		<a href="" class=" exp" >
			<span> Tên loại dụng cụ </span>
			
		</a>
		   @endcan
			<ul class="sub">
				<li >
					@can('danhsachdungcu.danhsach')
					<a href="admin/danhsachdungcu/danhsach">
			        Danh sách  dụng cụ 
				</a>
				@endcan
			     </li>
				 <li >@can('danhsachdungcu.them')
				<a href="admin/danhsachdungcu/them">
					Thêm  dụng cụ
				</a>@endcan
			      </li>
			</ul>
						
  </li>
 
<li class="tran">
		@can('dungcu.danhsach')
		<a href="" class=" exp" >
			<span>Chuyển dụng cụ- các ĐV </span>
			
		</a>
		   @endcan
			<ul class="sub">
				<li >
					@can('dungcu.danhsach')
					<a href="admin/dungcu/danhsach">
			        Danh sách dụng cụ 
				</a>
				@endcan
			     </li>
				 
			     
			</ul>
	</li>
	 <li class="tran">
		@can('chitietdanhsachdungcu.danhsach')
		<a href="" class=" exp" >
			<span>Danh sách chi tiết chuyển </span>
			
		</a>@endcan
		
			<ul class="sub">
				<li >@can('chitietdanhsachdungcu.danhsach')
					<a href="admin/chitietdanhsachdungcu/danhsach">
				
					Danh sách 
				</a>@endcan
			     </li>
				
			</ul>
	</li>

	<li class="tran">
		
		<a href="admin/guiemail" class="" >
			<span>Gửi email </span>
			
		</a>
			
	</li>
	<li class="tran">
		@can('guinhieu_email.danhsach')	
		<a href="admin/guinhieu_email" class="" >
			<span>Gửi email nhiều người </span>
			
		</a>
		@endcan	
	</li>
	<li><a href="admin/dangxuat">
	  <img src="public/admin_asset1/images/icons/topnav/logout.png" alt="" />
	  <span>Đăng xuất</span>
	</a>
	 </li>
</ul>
</div>
	<div class="clear"></div>
</div>
	
	
<!-- Right side -->
<div id="rightSide" >
	
	   
	
	<div class="topNav"  >
		<div class="wrapper">
			
			
			<!-- <div class="userNav">
				<ul>
					<li><a href="admin/trangchu" target="_blank">
						<img style="margin-top:7px;" src="public/admin_asset1/images/icons/light/home.png" />
						<span>Trang chủ</span>
					</a>
				   </li>
				   <li><a href="admin/user/danhsach">
						<img src="public/admin_asset1/images/icons/topnav/logout.png" alt="" />
						<span>Trở về trang 1 </span>
					</a>
				 </li>
					
					
					<li><a href="admin/dangxuat">
						<img src="public/admin_asset1/images/icons/topnav/logout.png" alt="" />
						<span>Đăng xuất</span>
					</a>
				 </li>
					
				</ul>
			</div>
			 -->
			<div class="clear"></div>
		</div>
	</div>

		
	    <!-- Main content -->
