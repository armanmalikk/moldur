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
	<style>
		body{
			color: aliceblue !important;	
		}
		input ,textarea {
			background: #181717;
		}
        input[type="submit"] {
    margin-top: 20px;
    width: 100px;
    border-radius: 10px;
    height: 30px;
    border: 1px solid black;
}
        input {
    border: 1px solid black;
    border-radius: 4px;
}
        textarea {
    border: 1px solid black;
}
        label {
    font-family: -webkit-pictograph;
    font-size: 20px;
    color: #ecebe7;
}
	</style>
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
	<div style="padding:20px 0px 20px 40px">
			<section>
               
			<?php 
				if(isset($_POST['logo_submitter'])){
					if(!empty($_FILES['logo_uploader'])){
						$logo_image = addslashes($_FILES['logo_uploader']['tmp_name']);
						$logo_image = file_get_contents($logo_image);
						$logo_image = base64_encode($logo_image);
						$moldura->input_general_settings('general_logo',$logo_image);
					}else{
						echo "no file chosen";
					}	//if file uploaded
				}		//if submit logo upload
			 ?>

				<form method="post" enctype = "multipart/form-data">
					<label>Upload logo</label>
					<input type="file" name="logo_uploader"/>
					<input type="submit" name="logo_submitter"/>
				</form><br>
				<?php 
				$query = $moldura->show_sorted_row_values('general','general_id','ASC');
				while($fetches = mysqli_fetch_assoc($query)) :
				?>
				<div class="col-sm-2 logo-pic" >
				<img style="width:60px;" src="data:image;base64,<?php echo $fetches['general_logo']; ?>">
				</div><br><br><br>
				<?php endwhile; ?>
                         
                         
			</section>
				<hr>
			<section>
                <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
			<?php
				if(isset($_POST['slider_image_submit'])){
					if(isset($_FILES['slider_image']['tmp_name'])){
					$slide = $_FILES['slider_image']['tmp_name'];
					$slide = addslashes($slide);
					$slide = file_get_contents($slide);
					$slide = base64_encode($slide);
						$moldura->insert_into_table("
							INSERT INTO slider_images (slider_image) VALUES('$slide')
							");
					}else{
						echo "fill the form first";
					}	//	if/else image uplaoded
				}	//	if iset submit
			?>
				<form method="post" enctype="multipart/form-data">
					<label>Upload Slider image</label>
					<input type="file" name="slider_image"/>
					<input type="submit" name="slider_image_submit"/>
				</form>
			<?php 
				$query = $moldura->show_sorted_row_values('slider_images','slider_image_id','DESC');
				while($fetches = mysqli_fetch_assoc($query)) :
			?>
			<?php if(isset($_POST['delete_slide'])){
					// $moldura->delete_from_table_by_id('slider_images',$_POST['hidden_delete_slide']);
				$moldura->delete_from_table_by_id_V2('slider_images','slider_image_id',$_POST["hidden_delete_slide"]);
				header("Refresh:0; url=general.php");
				}		//if delete_slide
			 ?>
                   
				<img style="width:100px; height:80px;margin-top:10px"  src="data:image;base64,<?php echo $fetches['slider_image']; ?>" />
                    
                         
			<form method="post">
				<input type="hidden" name="hidden_delete_slide" value="<?php echo $fetches['slider_image_id'] ?>"/>
				<input type="submit" name="delete_slide" value="Delete" style="background-color: red"/>
			</form>
			<?php endwhile; ?>
                            
                         
                         </div>
                   </div>
                </div>

			</section><!----------section------------>
				<hr>
			<section>
			<?php
				if(isset($_POST['submit_email'])){
					if(isset($_POST['email'])){
						$moldura->input_general_settings('general_email',$_POST['email']);
					}else{
						echo "fill the form up";
					}	//	if/else isset email
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Type your contact email</label>
					<input type="email" name="email" value="<?php echo $contact_email; ?>"/>
					<input type="submit" name="submit_email">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['submit_num'])){
					if(isset($_POST['phone_num'])){
						$moldura->input_general_settings('general_mobile_num',$_POST['phone_num']);
					}else{
						echo "fill the form up";
					}	//	if/else isset phn num
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Type your contact number</label>
					<input type="text" name="phone_num" value="<?php echo $contact_number; ?>"/>
					<input type="submit" name="submit_num">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['ADDRES_submit'])){
					if(isset($_POST['ADDRES'])){
						$moldura->input_general_settings('general_address',$_POST['ADDRES']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Type your ADDRES</label>
					<textarea type="text" name="ADDRES"><?php echo $admin_adress; ?></textarea>
					<input type="submit" name="ADDRES_submit">
				</form>
			</section>
				<hr>
			<section>
			
	</div>
</body>
</html>