 <?php require('header.php') ?>
			 <section>
          <style>
									.potrait-frame-cart{
									  height:100px;
									  width:97px;
									  position: absolute;
									  z-index: 10;
									}
									.potraitImg-cart {
						object-fit: cover;
						height: 100px;
						width: 95px;
					}
							  .product_details {
					margin-top: 41px;
					font-size: 20px;
					font-weight: 600;
				        color: #9E9E9E;
				}
			  #pro-padding{
			      margin-bottom:20px;
			  }
			  #totall-line{
			      line: red;
				  width:100%;
			  }
			  #balck-line{
			      height:13px;
				  width:100%;
			  }

								</style>
<div id="wrap">
	<div id="accordian">
		
 		<div class="step" id="step5">
			<div class="number">
				<span>1</span>
			</div>
			<div class="title">
				<h1>Finalize Order</h1>
			</div>
		</div>
		<section>
		    <div class="container">
				<div class="row">	

				   <?php 
				   		$subtotal = 0;
				   		require('modules/delete_cart.php');
                        $query = $moldura->show_sorted_value_of_user('carts','cart_user_id',$_SESSION['user_id'],'cart_id','DESC');
                                        while($fetches = mysqli_fetch_assoc($query) ) :
                                        ?>
						<?php if($fetches['cart_type'] == 2 ) : ?>
							<div class="col-sm-12" id="pro-padding">
								<div class="col-sm-3">
									<?php
                                               $single_frame_img =  $moldura->getting_data_by_another_field('single_frames','single_frame_img','single_frame_id',$fetches['cart_single_frame_id']);     
                                    ?>
												<img src="data:image;base64,<?php echo $single_frame_img; ?>" class="potrait-frame-cart" alt="" />
												<img src="data:image;base64,<?php echo $fetches['cart_image']; ?>" class="potraitImg-cart noborder main-img" alt=""/>
								</div>
								<div class="col-sm-7">
									<div class="product_details">
										<div class="product_details">
											<div class="col-sm-4" style="text-align:center;">
												<span ><?php echo $fetches['cart_name']; ?></span>
											</div>
											
											<div class="col-sm-4" style="text-align:center;">
												<span ><?php echo $fetches['cart_price']; ?></span>
											</div>
											<div class="col-sm-4" style="text-align:center;">
												<form method="POST">
													<span>
														<button type="submit" class="btn" name="delete_cart">
															<i class="fa fa-times"></i>
														</button>
														<input type="hidden" name="hidden_cart_id" value="<?php echo $fetches['cart_id']; ?>" />
													</span>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php elseif($fetches['cart_type'] == 1) : ?>
							<div class="col-sm-12" id="pro-padding">
								<div class="col-sm-3">
									<?php
                                               $single_frame_img =  $moldura->getting_data_by_another_field('single_frames','single_frame_img','single_frame_id',$fetches['cart_single_frame_id']);     
                                    ?>
												<img src="data:image;base64,<?php echo $fetches['cart_image']; ?>" class="potrait-frame-cart" alt="" />
								</div>
								<div class="col-sm-7">
									<div class="product_details">
										<div class="product_details">
											<div class="col-sm-4" style="text-align:center;">
												<span ><?php echo $fetches['cart_name']; ?></span>
											</div>
											
											<div class="col-sm-4" style="text-align:center;">
												<span ><?php echo $fetches['cart_price']; ?></span>
											</div>
											<div class="col-sm-4" style="text-align:center;">
										<?php require('modules/delete_cart.php') ?>
												<form method="POST">
													<span>
														<button type="submit" class="btn" name="delete_cart">
															<i class="fa fa-times"></i>
														</button>
														<input type="hidden" name="hidden_cart_id" value="<?php echo $fetches['cart_id']; ?>" />
													</span>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>  
							<?php $subtotal = $subtotal + $fetches['cart_price']; ?>  
						<?php endwhile; ?>                         

				</div>		<!-- end of row ---------->
		    </div>
		</section>
		<section id="totall-line">
		   <div class="container">
				<div class="row">
		           <div class="col-sm-12">
					   <div class="totals">
						   <img src="images/line.png" id="balck-line">
					<span class="subtitle">Subtotal <span id="sub_price"><?php echo $subtotal; ?></span></span>
<!-- 					<span class="subtitle">Tax <span id="sub_tax">$2.00</span></span>
					<span class="subtitle">Shipping <span id="sub_ship">$4.00</span></span> -->
					<span class="subtitle">Extra <span id="sub_ship">$0</span></span>
				</div>
				<div class="final">
					<span class="title">Total <span id="calculated_total"><?php echo $subtotal; ?></span></span>
				</div>
				   </div>
			   </div>
			</div>
		</section><!-----------------------section---------------->
		<section id="totall-line">
		   <div class="container">
				<div class="row">
		           <div class="col-sm-12">
					   <div  id="reviewed">
				<div id="complete">
				<a class="big_button" id="complete" href="shipping_charge.php">Complete Order</a>
				<!-- <a class="big_button" id="complete" href="shipping">Complete Order</a> -->
				<!-- <a class="big_button" id="complete" href="add_to_card.php">Complete Order</a> -->
				</div>
</div>
			       </div>
			   </div>
			</div>
		</section><!-----------------------section---------------->
			

 <script src="js/hover.js"></script>

</body>
</php>
