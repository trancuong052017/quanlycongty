


	
	
	
                           
							
		<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					
					<div class="col-sm-12">
						<div class="beta-products-list">
						

							<div class="row">
							@foreach($jidlo as $loai)
								<div class="col-sm-3">
									
									<div class="single-item">
										
										<div class="single-item-header">
											<a href="san-pham/{{$loai->id}}"><img src="public/image/jidlo/{{$loai->image}}" with='290px;' height = "250px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo $loai->name ?></p>
											
											<p class="single-item-price">
												<span>144</span>
											</p>
											
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="public/image/jidlo/{{$loai->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="san-pham/{{$loai->id}}"> VÍCE INFORMACÍ<i class="fa fa-chevron-right"></i></a>
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
		</div>
		
							</div>
	                     

					

					
							
					
	

	