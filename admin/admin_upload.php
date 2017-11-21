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
		<style>
			a, p, h3, label{
				color:white;
			}
		</style>
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

					<!------------------
				 start of Upload Full frame
					-------------------->

<?php 
if(isset($_POST['frame_submit'])){
	if(!empty($_POST['frame_tag_name']) && !empty($_POST['frame_price']) && !empty($_POST['frame_des']) && !empty($_FILES['frame_img']['tmp_name']) ){
		$image = $_FILES['frame_img']['tmp_name'];
		$image = file_get_contents($image);
		$image = base64_encode($image);
		$moldura->insert_into_table('INSERT INTO frames(frame_tag_name,frame_price,frame_des,frame_img)VALUES("'.$_POST["frame_tag_name"].'",
		"'.$_POST["frame_price"].'",
		"'.$_POST["frame_des"].'","'.$image.'")');
	}else{
		echo "</br>Can't keep fields blank";
	}	//end of if/else if all filled setted
}		//isset($_POST['frame_submit'])
?>

<h3>Upload Full frame</h3>

		<form method="POST" action="" enctype = "multipart/form-data">
			<label>Frame tag name</label></br>
			<input type="text" name="frame_tag_name" value=""/></br>
			<label>Frame price</label></br>
			<input type="text" name="frame_price" value=""/></br>
			<label>Frame description</label></br>
			<input type="text" name="frame_des" value=""/></br>
			<label>Frame image</label></br>
			<input type="file" name="frame_img" value=""/></br></br>
			<input type="submit" name="frame_submit"/>
		</form>
	
					   <!------------------
				    end of Upload Full frame
					    -------------------->
<hr>
					     <!------------------
				    	start of upload image
					    -------------------->
	<?php 
		if(isset($_POST['image_submit'])){
			if(!empty($_POST['image_tag_name']) && !empty($_POST['image_des']) && !empty($_FILES['image_img']['tmp_name']) ){
				$image = $_FILES['image_img']['tmp_name'];
				$image = file_get_contents($image);
				$image = base64_encode($image);
				$moldura->insert_into_table('INSERT INTO images(image_tag_name,image_des,image_img)VALUES(
				"'.$_POST["image_tag_name"].'","'.$_POST["image_des"].'","'.$image.'")'
				);
				echo $_FILES["image_img"]["size"];
			}else{
				echo "Can't keep fields blank";
			}	//end of if/else fields not empty
		}		// end of if image submit
	?>
<h3>Upload Image</h3>
	<form method="POST" action="" enctype = "multipart/form-data">
		<label>Image tag name</label><br>
		<input type="text" name="image_tag_name" value="" /><br>
		<label>Image description</label><br>
		<input type="text" name="image_des" value="" /><br>
		<label>image</label><br>
		<input type="file" name="image_img" value="" /><br></br>

		<input type="submit" name="image_submit"/>
	</form>
					   <!------------------
				    	end of Upload image
					    -------------------->
<hr>
						 <!------------------
					start of upload single fram
						-------------------->
	<?php 
		if(isset($_POST['sin_frame_submit'])){
			if(!empty($_POST['sin_frame_tag_name']) && !empty($_POST['sin_frame_price']) && !empty($_POST['sin_frame_des']) && !empty($_FILES['sin_frame_img']['tmp_name'])){
				$image = $_FILES['sin_frame_img']['tmp_name'];
				$image = file_get_contents($image);
				$image = base64_encode($image);

				$edge_image = $_FILES['sin_frame_edge_img']['tmp_name'];
				$edge_image = file_get_contents($edge_image);
				$edge_image = base64_encode($edge_image);

				$moldura->insert_into_table('INSERT INTO single_frames(single_frame_tag_name,single_frame_price,single_frame_des,single_frame_img,single_frame_edge_img)VALUES(
				"'.$_POST["sin_frame_tag_name"].'",
				"'.$_POST["sin_frame_price"].'",
				"'.$_POST["sin_frame_des"].'","'.$image.'","'.$edge_image.'")'
				);
			}else{
				echo "Can't keep fileds blank";
			}	// end of if/else for !empty fields
		}		//isset $_post['submit'];
	?>

<h3>Upload single frame</h3>
	<form method="POST" action="" enctype = "multipart/form-data">
		<label>Single Frame Tag Name</label><br>
		<input type="text" name="sin_frame_tag_name" value=""/><br>
		<label>Single Frame Price</label><br>
		<input type="text" name="sin_frame_price" value=""/><br>
		<label>Single Frame Description</label><br>
		<input type="text" name="sin_frame_des" value=""/><br>
		<label>Single Frame Image</label><br>
		<input type="file" name="sin_frame_img" value=""/><br></br>
		<label>Single Frame EDGE Image</label><br>
		<input type="file" name="sin_frame_edge_img" value="" required/><br></br>
		<input type="submit" name="sin_frame_submit"/>
	</form>
					 <!------------------
					end of upload single frame
						-------------------->

