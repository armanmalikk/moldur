<?php 
// Database variables

//while at moldur.com
	// $host = "quasar"; //database location
	// $user = "ruff"; //database username
	// $pass = "rotorway"; //database password
	// $db_name = "Moldur"; //database name

// //while at localhost
	$host = "localhost"; //database location
	$user = "root"; //database username
	$pass = ""; //database password
	$db_name = "dog_tag"; //database name

// PayPal settings

$paypal_email = 'tagmaster@dogxtar.com';								//paypal email
$item_name = 'Moldur';


//while at dogxtar.com
	// 	if(isset($_GET['total_price'])){
	// 	$total_number_of_products = $_GET['total_products'];
	// 	$item_amount = $_GET['total_price'];
	// 	$return_url = 'ati/paypal/payment-successful.php?products='.$total_number_of_products;	//success
	// 	$cancel_url = 'ati/paypal/payment-cancelled.php';					//cancel
	// 	$notify_url = 'ati/paypal/payments.php';					//redirect page
	// }


//while at localhost
	if(isset($_GET['total_price'])){
		$total_number_of_products = $_GET['total_products'];
		$item_amount = $_GET['total_price'];
		$return_url = 'localhost/moldur/paypal/payment-successful.php?products='.$total_number_of_products;	//success
		$cancel_url = 'localhost/moldur/paypal/payment-cancelled.php';					//cancel
		$notify_url = 'localhost/paypal/payments.php';					//redirect page
	}




$item_id = "11342443";
// $item_id = $_GET['id'];

// Include Functions
include("functions.php");

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
	$querystring = '';
	
	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";
	
	// Append amount& currency (£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	
	//loop for posted values and append to querystring
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	// Append paypal return ADDRESes
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	// Append querystring with custom field
	//$querystring .= "&custom=".USERID;
	
	// Redirect to paypal IPN
	header('location:https://www.paypal.com/cgi-bin/webscr'.$querystring);
	exit();
} else {
	//Database Connection
	$link = mysql_connect($host, $user, $pass);
	mysql_select_db($db_name);
	
	// Response from Paypal

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$req .= "&$key=$value";
	}
	
	// assign posted variables to local variables
	$data['item_name']			= $_POST['item_name'];
	$data['item_number'] 		= $_POST['item_number'];
	$data['payment_status'] 	= $_POST['payment_status'];
	$data['payment_amount'] 	= $_POST['mc_gross'];
	$data['payment_currency']	= $_POST['mc_currency'];
	$data['txn_id']				= $_POST['txn_id'];
	$data['receiver_email'] 	= $_POST['receiver_email'];
	$data['payer_email'] 		= $_POST['payer_email'];
	$data['custom'] 			= $_POST['custom'];
		
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	
	$fp = fsockopen ('http://paypal.com', 443, $errno, $errstr, 30);
	
	if (!$fp) {
		// HTTP ERROR
		
	} else {
		fputs($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp($res, "VERIFIED") == 0) {
				
				// Used for debugging
				// mail('user@domain.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));
						
				// Validate payment (Check unique txnid & correct price)
				$valid_txnid = check_txnid($data['txn_id']);
				$valid_price = check_price($data['payment_amount'], $data['item_number']);
				// PAYMENT VALIDATED & VERIFIED!
				if ($valid_txnid && $valid_price) {
					
					$orderid = updatePayments($data);
					
					if ($orderid) {
						// Payment has been made & successfully inserted into the Database
					} else {
						// Error inserting into DB
						// E-mail admin or alert user
						// mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));
					}
				} else {
					// Payment made but data has been changed
					// E-mail admin or alert user
				}
			
			} else if (strcmp ($res, "INVALID") == 0) {
			
				// PAYMENT INVALID & INVESTIGATE MANUALY!
				// E-mail admin or alert user
				
				// Used for debugging
				//@mail("user@domain.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
			}
		}
	fclose ($fp);
	}
}
?>
