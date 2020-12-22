 @extends('mater')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Product</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<form action="shoping_cart" method="POST" enctype="multipart/form-data">
                         <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
                          <input type ='hidden' name='id' value = '{{$sanpham->id}}'/>


						<div class="col-sm-4">
							<img src="public/source/image/product/{{$sanpham->image}}" alt="" height="250px;">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
						<p class="single-item-title">{{$sanpham->name}}</p>
		<input type='text'name="price" value='{{$sanpham->unit_price}}'/>
								
								
									
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>so luong:</p>
							<div class="single-item-options">
								
								
								<select class="wc-select" name="qty">
									
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

				 <div class="formSubmit">
                        <input type="submit" class="redB" value="dat hang">
                </div>	
		 </form>	
				</div>
				
			</div>
		</div> <!-- #content -->
	</div> 
	@endsection