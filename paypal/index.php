<?php
	if(isset($_GET['total_price'])){
		$total = $_GET['total_price'];
		$total_products = $_GET['total_products'];
		$action = "payments.php?total_price=$total&total_products=$total_products";
	}else{
		$action = '../index.php';
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paypal Integration Test</title>
</head>
<body>
	<form class="paypal" action="<?php echo $action; ?>" method="post" id="paypal_form">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="lc" value="UK" />
		<input type="hidden" name="currency_code" value="USD" />
		<input type="hidden" name="bn" value="	" />
		<input type="hidden" name="first_name" value="Customer's First Name"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input type="hidden" name="payer_email" value="customer@example.com"  />
		<input type="hidden" name="item_number" value="123456" / >
		<input type="submit" name="submitt" value="Submit Payment"/>
	</form>
</body>
</html>

<script type="text/javascript">
		document.getElementById("paypal_form").submit();  
</script>