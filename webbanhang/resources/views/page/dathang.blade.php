  @extends('mater')
@section('content')
<div class="container">
		<div id="content">
			
			<form action="dathang" method="post" class="beta-form-checkout">
				 <input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="hoten">Họ tên*</label>
							<input type="text" name ="hoten" placeholder="Họ tên" required>
						</div>
						<!-- <div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>
 -->
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="diachi" placeholder="địa chỉ " required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" name ="dienthoai" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea name ="ghichu"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
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
											
										
									
									</div>
									@endforeach 
							     <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Cart::subtotal()}}</span>vnd</div>
									<div class="clearfix"></div>

									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="hinhthuc" value="tiền mặt" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="hinhthuc" value="chuyển khoản" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><div class="formSubmit">
                         <input type="submit" class="redB" value="Đặt hàng ">
                          </div>
                       </div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection