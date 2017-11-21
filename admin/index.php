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
	<div>
	<?php 
		if(isset($_GET['id_num_of_product']) && isset($_GET['product_type'])){
			$action_1= $_GET['id_num_of_product'];
			$action_2= $_GET['product_type'];
		}else{
			$action_1="";
			$action_2="";
		}
	?>
        <style>
            img{
                margin: 20px;
            }
            .submit-arman{
    padding: 3px 100px;
    border-radius: 7px;
    margin: 20px;
    font-weight: 700;
    font-size: 18px;
}
            .chose {
    color: white;
    margin: 20px;
    font-family: serif;
    font-size: 22px;
    margin-top: 60px;           
}
        </style>
		<form method="GET" action="index.php?id_num_of_product=<?php echo $action_1; ?>&product_type=<?php echo $action_2; ?>">
			<label class="chose">Chose Type</label>
			<select name="product_type">
				<option value="frames">Full Frame</option>
				<option value="images">Image</option>
				<option value="single_frames">Single Frame</option>
			</select></br>
			<label class="chose">Type ID number</label>
			<input type="text" name="id_num_of_product"/><br>
			<input type="submit" name="submit_query" class="submit-arman"/>
		</form>


		<?php
			if(isset($_GET['id_num_of_product'])){
				if($_GET['product_type'] == "frames"){
					$query = $moldura->show_particular_value('frames','frame_id',$_GET['id_num_of_product']);
					while($fetch = mysqli_fetch_assoc($query)){
						echo "<img width='220px' height='325px' src='data:image;base64,".$fetch["frame_img"]."'/>";
						// echo "<img src=data:image;base64,'".$fetch["frame_img"]."'/>";
					}
				}

				if($_GET['product_type'] == "images"){
					$query = $moldura->show_particular_value('images','image_id',$_GET['id_num_of_product']);
					while($fetch = mysqli_fetch_assoc($query)){
						echo "<img width='220px' height='325px'  src='data:image;base64,".$fetch["image_img"]."'/>";
						echo "<br>";


						// echo "<img src=data:image;base64,'".$fetch["image_img"]."'/>";
					}
				}

				if($_GET['product_type'] == "single_frames"){
					$query = $moldura->show_particular_value('single_frames','single_frame_id',$_GET['id_num_of_product']);
					while($fetch = mysqli_fetch_assoc($query)){
						echo "<img  width='220px' height='325px' src='data:image;base64,".$fetch["single_frame_img"]."'/>";
						// echo "<img src=data:image;base64,'".$fetch["single_frame_img"]."'/>";
					}
				}
			}	//end if(isset($_GET['id_num_of_product'])){
		?>
	</div>
</body>
</php>