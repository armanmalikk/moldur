<?php
	session_start();
	require('../functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Payment Successful</title>
</head>
<body>
	<h1>Thank You for buying from dog_tag</h1>
	<p>You will get your product soon..</p>
	<?php
	if(isset($_GET['products'])){
		$moldura->update_any_field_with_limit('orders','order_status','Payment Done','order_user_id',$_SESSION['user_id'],'order_id','DESC',$_GET['products']);
	}
	?>
	<a href="../index.php">Back to home</a>
	<?php
	// header('Refresh: 1;url=../index.php');
	?>
</body>
</html>
