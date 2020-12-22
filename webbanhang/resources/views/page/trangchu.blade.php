
    @extends('mater')
@section('content')
<div class="rev-slider">

	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									<!-- THE FIRST SLIDE -->

									@foreach($slide as $sl)
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="public/source/image/slide/{{$sl->image}}" data-src="public/source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
						       
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
		<div class="container">
			
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
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>san pham moi</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($product_new)}} san pham</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product_new as $pro)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">giam gia</div></div>

										<div class="single-item-header">
											<a href="san-pham/{{$pro->id}}"><img src="public/source/image/product/{{$pro->image}}"height ='250px;' alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pro->name}}</p>
											<p class="single-item-price">
												@if($pro->promotion_price!=0)
												<span class="flash-del">{{$pro->unit_price}}</span>
												<span class="flash-sale">{{$pro->promotion_price}}</span>
												@else
												<p class="single-item-price">{{$pro->unit_price}}</p>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$pro->id}}">chi tiet<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									
								</div>
								@endforeach
							</div>
							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">co {{count($product_top)}} san pham</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@foreach($product_top as $pro)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="san-pham"><img src="public/source/image/product/{{$pro->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pro->name}}</p>
											<p class="single-item-price">
												<span>{{$pro->unit_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$pro->id}}">chi tiet <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						  
								
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection