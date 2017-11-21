<?php require('header.php') ?>
			 <section>

<div id="wrap">
	<div id="accordian">
		<!-- <div class="step" id="step1">
			<div class="number">
				<span>1</span>
			</div>
			<div class="title">
				<h1>Email Address</h1>
			</div>
		</div>
		<div class="content" id="email">
			<form class="go-right">
				<div>
        <input type="email" name="email" value="" id="email-address" placeholder="Email Address" data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/><label for="email">Email Address</label>
        </div>
				<button class="login">Login</button>
			</form>
			<a class="continue" href="#">Singup</a>
		</div>
		<div class="step" id="step2">
			<div class="number">
				<span>2</span>
			</div>
			<div class="title">
				<h1>Billing Information</h1>
			</div>
		</div> -->
		<div class="content" id="address">
			<?php require_once('modules/add_to_cart_form.php'); ?>
</div>
			
<style>
	#option{
	height: 54px;
	width: 389px;

	}

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

 <script src="js/hover.js"></script>
</body>
</php>
