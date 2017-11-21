<?PHP 
session_start();
require('../functions.php');
 if(empty($_SESSION['admin_id'])) {
 	header("Refresh:0; url=security.php");
 }
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	    <link href="style.css" rel="stylesheet">
		<script src="js/main.js"></script>
	</head>
<body>
	
	<ul class="topnav" id="myTopnav">
    <li><a class="active" href="index.php">Home Page</a></li>
    <li><a  href="admin_upload.php">Upload Page</a></li>
    <li><a href="order.php">order page</a></li>
    <li><a href="general.php">General</a></li>
    <li><a href="message.php">Message</a></li>
    <li><a href="frame_image.php">Frames & Image</a></li>
    <li><a href="users.php">Users</a></li>  
    <li><a href="admin_log_out.php">log_out</a></li>  
    <li class="icon">
      <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
    </li>
  </ul>
	
</body>
</html>