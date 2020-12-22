
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<base href='{{asset("")}}'>
	<link rel="stylesheet" href="public/source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="public/source/assets/dest/css/style.css">
	<link rel="stylesheet" href="public/source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="public/source/assets/dest/css/huong-style.css">
	<script src="public/source/assets/dest/js/jquery.js"></script>
	<script src="public/source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="public/source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="public/source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="public/source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="public/source/assets/dest/vendors/dug/dug.js"></script>
	<script src="public/source/assets/dest/js/scripts.min.js"></script>
	<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="public/source/assets/dest/js/waypoints.min.js"></script>
	<script src="public/source/assets/dest/js/wow.min.js"></script>
	
	<script src="public/source/assets/dest/js/jquery-3.1.1.min.js"></script>
	<!--customjs-->
	<script src="public/source/assets/dest/js/custom2.js"></script>
</head>
<body>
	<div id="ajax">
		<input type="hidden" id="_token" value="{{ csrf_token() }}">
@include('header')
	
	<div class="header-body">
			<div class="container beta-relative">
				
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					
					<div class="beta-comp">
						<div class="cart update_cart_url" data-url="{{route('update_cart')}}">
							
							
							@if(count($cart)==0)
							<div class="beta-select"><i class="fa fa-shopping-cart"></i>
								
							 Giỏ hàng (Trống) <i class="fa fa-chevron-down"></i></div>
							@endif
								<div class="cart-item">
									

									@foreach($cart as $ca)
									<div class="media">
										<img src="public/source/image/product/{{$ca->options->image}}"height='100px;' alt="">
										
											<span class="cart-item-title">{{$ca->name}}</span>
											<span class="cart-item-options">
												so luong
									<select class="wc-select" name="qty" id='qty_{{$ca->id}}'>
									
									@if($ca->qty)
									<option value ='{{$ca->qty}}'checked=''>{{$ca->qty}}</option>
									@endif
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								   </select>	
											</span>
											<span class="cart-item-amount">gia <span>{{number_format($ca->price)}}</span></span>
											<span class="cart-item-amount">thanh tien <span>{{number_format($ca->price*$ca->qty)}}</span></span>
											<a href="xoa_giohang/{{$ca->rowId}}">
											<span class="cart-item-amount">xoa </span>
										    </a>
										
									<input type="hidden" value="{{$ca->rowId}}" id="rowid_{{$ca->id}}"/>	
									</div>
							
							<script>
						$(document).ready(function() {    
							
							 $('#qty_{{$ca->id}}').change(function(){
					         var qty=$(this).val();
					         //alert(qty);
					        var rowid =$('#rowid_{{$ca->id}}').val();
					        //alert(rowid);
					     var url_update=$('.update_cart_url').data('url');
					      var _token = $('input#_token').val(); 
					           $.ajax({
						      type: 'post',
						      url: url_update,
						      data: { 
						      _token:_token,
						        qty: qty, 
						        rowid: rowid,
						         
						      },
						      success:function(giatri) {
						      	
                               $('#ajax').html(giatri);
                               
                               },
						      error: function () {
						        alert("error");
						      }
						   });
					         
					        });
						})
						</script>
					
                                 @endforeach
								
                                 @if(count($cart)>0)
								<div class="cart-caption">
									
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Cart::subtotal()}}</span>vnd</div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="dathang" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								@endif
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>

			</div> <!-- .container -->
		</div>
		</div> 
		
	
	

</body>
</html>

	<!--customjs-->
						