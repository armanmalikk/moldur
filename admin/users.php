<?php
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
	<section>
	  <div class="container">
		  <div class="row">
		     <div class="col-sm-12">
			      <table style="width:100%">
					  <tr class="upload-text">
						<th>User ID</th>
						<th>User name</th>
						<th>User E-mail</th>
					  </tr>
					 <?php
					 if(isset($_POST['delete_user'])){
					 	$moldura->delete_from_table_by_id_v2('users','user_id',$_POST['hidden_delete_user']);
					 }
					 $query = $moldura->show_sorted_row_values('users','user_id','DESC');
					 while($fetches = mysqli_fetch_assoc($query)) :
					 ?>
					  <tr class="upload-text">
						<td>1100<?php echo $fetches['user_id']; ?></td>
						<td><?php echo $fetches['user_last_name'].'<p>'.$fetches['user_first_name'].'</p>'; ?></td>
						<td><?php echo $fetches['user_email']; ?></td>
						<td>
							<form method="POST"/>
								<input type="hidden" name="hidden_delete_user" value="<?php echo $fetches['user_id']; ?>"/>
								<input style="background-color:red" type="submit" name="delete_user" value="Delete" />
							</form>
						</td>
					  </tr>
					<?php endwhile; ?>
                   </table>
			 </div>
		  </div>
	  </div>
	</section>

</body>
</html>