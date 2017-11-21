<?php
	session_start();
 require('../functions.php');
	 if(empty($_SESSION['admin_id'])) {
 	header("Refresh:0; url=security.php");
 }
?>

<!DOCTYPE html>
<php>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	    <link href="style.css" rel="stylesheet">
		<script src="js/main.js"></script>
        <script src="js/order.js"></script>
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
	
	<div id="accordion" role="tablist" aria-multiselectable="true">
	  <div class="card">
	  
    <?php
				if(isset($_POST['delete_order'])){
					$moldura->delete_from_table_by_id_v2('orders','order_id',$_POST['hidden_delete_id']);
					// header("Refresh: 0; url=order.php");
				}
	?>

       <?php
	$query = $moldura->show_sorted_row_values('orders','order_id','DESC');
	while($fetches = mysqli_fetch_assoc($query)) :
	?>

		
	?>
          <section>
			    <div class="card-header" role="tab" id="headingOne">
			      <h5 class="mb-0">
			        <table  style="width:100%">
			          
								  <tr class="upload-text">
									<th>User id</th>
									<th>Single Frame</th>
									<th>Full Frame</th>
									<th>Price</th>
									<th>Frame Image</th>
									<th>Frame Size</th>

									<th>Frame Margin </th>
									<th>Frame Protection</th>
									<th>Frame Land/Port</th>
									<th>User Email</th>
									
								  </tr>
								  <tr class="upload-text">
									<td><?php echo $fetches['order_user_id'];  ?></td>
									<td><?php echo $fetches['order_single_frame_id']; ?></td>
									<td>  <?php echo $fetches['order_full_frame_id'];  ?></td>

									<td><?php echo $fetches['order_price'];  ?></td>
									<td><?php echo $fetches['order_image'];  ?></td>
									<td><?php echo $fetches['order_size'];  ?></td>
									<td><?php echo $fetches['order_margin'];  ?></td>

									<td><?php echo $fetches['order_protection'];  ?></td>
									<td><?php echo $fetches['order_landscape_portrait'];  ?></td>
									<td><?php echo $fetches['order_user_email'];  ?></td>
								  </tr>
			        </table>
			      </h5>
			    </div>

			   <div id="collapseOne" class="boss">
			      <div class="card-block">
					  <div class="container-fluid">
					    <div class="row">
						   <div class="col-sm-12" >
								<div class="col-sm-6">
									<h1>Blank</h1>							
								</div>
							    <div class="col-sm-6">
									<table style="width:100%">
										<tr class="upload-text">											
											<th>Telephone</th>
											<th>Zip</th>
											<th>Address</th>
										</tr>
										<tr class="upload-text">
											<td><?php echo $fetches['telephone'];  ?></td>
											<td><?php echo $fetches['order_user_zip'];  ?></td>
											<td>
												<?php echo $fetches['order_user_address']; ?>
											</td>
										</tr>
									</table>
							   </div>


							   <div class="col-sm-6">
				       				<table style="width:100%">
										  <tr class="upload-text">
												<th>Type of Order</th>
												<th>Order Time</th>
												<th>Name</th>
												<!-- First Name
												last name -->
												<th>State</th>
												<th>City</th>
										  </tr>
										  <tr class="upload-text">
												<td><?php echo $fetches['order_type']; ?></td>
<td>												
<?php 
echo $fetches['order_time'];
?>
</td>
												<td><?php echo $fetches['order_user_first_name']; echo $fetches['order_user_last_name']; 

												?></td>
												<td><?php echo $fetches['order_user_state'];  ?></td>
												<td><?php echo $fetches['order_user_city'] ?></td>
										  </tr>
									</table>
							   </div>



						   </div><!----------------------------first-line---------------------->
                            
						 </div>			<!-- end of row -->
					  </div>		<!-- end of container-fluid -->
			      </div> 		<!-- end of card-block -->
			    </div>		<!-- end of collapse in -->
              </section><!---------------------------section-one------------------------------>
              <?php
              	if($fetches['order_status'] == "Payment Done"){
              		$styles = 'style="background-color:green"';
              	}else{
              		$styles = 'style="background-color:grey"';
              	}
              ?>
              <div style="display: inline-flex;">
          <form method="post" action="#">
											<input <?php echo $styles; ?> type="submit" value="<?php echo $fetches['order_status']; ?>" />
										</form> 
			<?php
				// if(isset($_POST['delete_order'])){
				// 	$moldura->delete_from_table_by_id_v2('orders','order_id',$_POST['hidden_delete_id']);
				// 	// header("Refresh: 0; url=order.php");
				// }
			?>
			<form method="post" action="#">
				<input type="hidden" name="hidden_delete_id" value="<?php echo $fetches['order_id']; ?>"/>
				<input style="background-color:red; margin-left:30px" type="submit" name="delete_order" value="DELETE FROM LIST"/>
			</form>
			</div>
										<hr>
	
<?php endwhile; ?>



        
  </div>		<!-- end cart -->
</div>		<!-- end all div -->


</body>
</php>