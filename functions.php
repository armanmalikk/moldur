<?php 
	ob_start();
 require_once('classes.php');
	$moldura = new MolduraExpress_ruff('localhost','root','');
	$moldura -> create_database('moldur1');
        
 	// $moldura = new MolduraExpress_ruff('localhost','moldu461_salman','salman');
 	// $moldura -> create_database('moldu461_v7');
 	
 	
 	require_once('auto_create_table.php');
// 	error_reporting(0); 
    // $query = $moldura->auto_create_admin();
    $query = $moldura->show_sorted_row_values('general','general_id','DESC');
	while($fetches = mysqli_fetch_assoc($query)){
	$contact_email = $fetches['general_email'];
	$contact_number = $fetches['general_mobile_num'];
	$admin_adress = $fetches['general_address'];
}
	define("contact_email",$contact_email);
	define("contact_number",$contact_number);
	define("admin_address",$admin_adress);
	// paypal/payment.php  change localhost
	// paypal/successful.php  change localhost
	// paypal/cancel.php  change localhost
	// shipping_charge.php change localhost

	// fram_choose.php, login.php, shipping_charge.php pages header different.

?>