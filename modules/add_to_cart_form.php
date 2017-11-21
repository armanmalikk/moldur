<?php 
		$total_shipping_charge = 0;
	$query = $moldura->show_sorted_value_of_user('carts','cart_user_id',$_SESSION['user_id'],'cart_id','DESC');
		while($fetches = mysqli_fetch_assoc($query)){
			$total_shipping_charge = $total_shipping_charge + $_GET['shipping_charge'];
		}
?>





		<form class="go-right" method="POST" action="add_to_card.php?shipping_charge=<?php echo $_GET['shipping_charge']; ?>">
				<div>
					<input type="name" name="first_name" value="" id="first_name" placeholder="John" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your First Name" required />
					<label for="first_name">First Name</label>
        		</div></br>

				<div>
					<input type="name" name="last_name" value="" id="last_name" placeholder="Smith" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your Last Name"/>
					<label for="last_name">Last Name</label>
				</div></br>
				<div>
					<input type="phone" name="telephone" value="" id="telephone" placeholder="(555)-867-5309" data-trigger="change" data-validation-minlength="1" data-type="number" data-required="true" data-error-message="Enter Your Telephone Number"/>
					<label for="telephone">Telephone</label>
				</div></br>

				<div>
					<input type="text" name="state" value="" id="company" placeholder="state" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="false"/>
					<label for="Company">State</label>
				</div></br>

				<div>
					<input type="text" name="email" value="" id="company" placeholder="email" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="false"/>
					<label for="email">Email</label>
				</div></br>

				<div>
					<input type="text" name="address" value="" id="address" placeholder="123 Main Street" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Billing Address"/>
					<label for="Address">Address</label>
				</div></br>

				<div>
					<input type="text" name="city" value="" id="city" placeholder="Everytown" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Billing City"/>
					<label for="city">City</label>
				</div></br>
				<input type="text" name="zip" placeholder="zip" />
			<!-- <div> -->
					<!-- <input type="text" name="zip" value="" id="zip" placeholder="12345" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Billing Zip Code"/> -->
					<!-- <select class="selectpicker" data-live-search="true" id="option" placeholder="Select Zip Code">
					<option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
					<option data-tokens="mustard">Burger, Shake and a Smile</option>
					<option data-tokens="frosting">Sugar, Spice and all things nice</option>
					</select>
					<label for="zip">Zip Code</label>
				</div></br>-->
		</div>


		
		<section id="totall-line">
		   <div class="container">
				<div class="row">
		           <div class="col-sm-12">
					   <div class="totals">
						   <img src="images/line.png" id="balck-line">
						   <?php
						   		$subtotal = 0;
						   		$query = $moldura->show_sorted_value_of_user('carts','cart_user_id',$_SESSION['user_id'],'cart_id','DESC');
						   		while($fetches = mysqli_fetch_assoc($query)){
						   			$subtotal =   $subtotal + $fetches['cart_price'];
						   		}
						    ?>
					<span class="subtitle">Subtotal <span id="sub_price"><?php echo $subtotal; ?></span></span>
					<!-- <span class="subtitle">Tax <span id="sub_tax">$2.00</span></span>
					<span class="subtitle">Shipping <span id="sub_ship">$4.00</span></span> -->
					<span class="subtitle">Shipping Charge <span id="sub_ship"><?php echo $total_shipping_charge; ?></span></span>
				</div>
				<?php 	$subtotal = $subtotal + $total_shipping_charge; ?>

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
								<input type="submit" name="addres_submit" class="big_button" id="complete" value="Complete Order"/>
							</div>
						</div>
			       </div>
			   </div>
			</div>
		</section><!-----------------------section---------------->
	</form>				

	<?php
	if(isset($_POST['addres_submit'])){
		$total_price = 0;
		$total_products = 0;
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$telephone = $_POST['telephone'];
		$state = $_POST['state'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$zip = $_POST['zip'];
		$status = 'pending';
		$time = strtotime('0 years');

		$query = $moldura->show_sorted_value_of_user('carts','cart_user_id',$_SESSION['user_id'],'cart_id','DESC');
		while($fetches = mysqli_fetch_assoc($query) ) :

			$total_price = $fetches['cart_price'] + $total_price;
			$total_products = 1 + $total_products;

			$cart_id =  $fetches['cart_id'];
			$cart_user_id =  $fetches['cart_user_id'];
			$cart_single_frame_id = $fetches['cart_single_frame_id'];
			$cart_full_frame_id =  $fetches['cart_full_frame_id'];
			$cart_price =  $fetches['cart_price'];
			// $cart_image = $fetches['cart_image'];
			$cart_image = 'ati';
			$cart_size = $fetches['cart_size'];
			$cart_margin = $fetches['cart_margin'];
			$cart_protection =  $fetches['cart_protection'];
			$cart_landscape_portrait = $fetches['cart_landscape_portrait'];
			$cart_type = $fetches['cart_type'];
			$cart_quantity =   $fetches['cart_quantity'];
			// $cart_name =
			
			$moldura->delete_from_table_by_id_v2('carts','cart_id',$cart_id);
			$moldura->insert_into_table("
				  INSERT INTO orders 
				(	order_cart_id,
					order_user_id,
					order_single_frame_id,
					order_full_frame_id,
					order_price,
					order_image,
					order_size,
					order_margin,
					order_protection,
					order_landscape_portrait,
					order_type,
					order_time,
					order_quantity,
					order_user_first_name,
					order_user_last_name,
					telephone,
					order_user_state,
					order_user_email,
					order_user_address,
					order_user_city,
					order_user_zip,
					order_status
				) values (
					'$cart_id',
					'$cart_user_id',
					'$cart_single_frame_id',
					'$cart_full_frame_id',
					'$cart_price',
					'$cart_image',
					'$cart_size',
					'$cart_margin',
					'$cart_protection',
					'$cart_landscape_portrait',
					'$cart_type',
					'$time',
					'$cart_quantity',
					'$first_name',
					'$last_name',
					'$telephone',
					'$state',
					'$email',
					'$address',
					'$city',
					'$zip',
					'$status'
				)
			");

		endwhile;
		// $subtotal = $subtotal + $total_shipping_charge;
		header("Location:paypal/index.php?total_price=$subtotal&total_products=$total_products");
	}	//if address_submit set