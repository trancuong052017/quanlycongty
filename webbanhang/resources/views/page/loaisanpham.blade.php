  @extends('mater')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai_sp as $lsp)
							<li><a href="{{route('loai-san-pham',$lsp->id)}}">{{$lsp->name}}</a></li>
							@endforeach
							
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>loai san pham</h4>
							<div class="beta-products-details">
								<p class="pull-left">tong :{{count($loai_sp)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($loai_sp as $loai)
								<div class="col-sm-4">
									
									<div class="single-item">
										
										<div class="single-item-header">
											<a href="san-pham/{{$loai->id}}"><img src="public/source/image/product/{{$loai->image}}" with='270px;' height = "250px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$loai->name}}</p>
											@if($loai->promotion_price!=0)
											<p class="single-item-price">
												<span>{{$loai->promotion_price}}</span>
											</p>
											@else
											<p class="single-item-price">
												<span>{{$loai->unit_price}}</span>
											</p>
											@endif
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="san-pham/{{$loai->id}}'><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$loai->id}}"{{$loai->id}}> chi tiet<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									 
									</div>
                             
								</div>
                              @endforeach
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection