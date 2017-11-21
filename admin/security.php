<?php 
	session_start();
	require('../functions.php');

if(empty($_SESSION['admin_id'])) :
?>

	<?php 
	if(isset($_POST['admin_log_in_submit'])){
		if($moldura->email_existance('admins','admin_email',$_POST['admin_email'])){
				if(($moldura->finding_email_pass('admins','admin_pass','admin_email',$_POST['admin_email'])) == $_POST['admin_pass']){
		$_SESSION['admin_id'] = $moldura->getting_data_by_another_field('admins','admin_id','admin_email',$_POST['admin_email']);
		header("Location: ../admin");

				}else{
				echo "<p id='show-email'>pass word didn't matches</p>";
				}   //if/else for password matches
			}else{
			echo "<p id='show-email'>E-mail doesn't exist</p>";
		}   //if/else email exist
	}   //isset log-in submit
?>



									<form action="" method="POST">
										<ul class="form-list">
						 					<li>
												<label class="email-tag">Email ADDRES</label>
												<div class="input-box">
													<input type="text" name="admin_email" value="" class="email-fild" title="Email ADDRES">
												</div>
											</li><!-------------------------ul---------------------->
											<li>
												<label for="pass" class="email-tag">Password</label>
												<div class="input-box">
													<input type="password" name="admin_pass"  class="password-fild" title="Password">
												</div>
												<!-- <h5>Forgot Your Password?</h5> -->
												<button type="submit" name="admin_log_in_submit" title="Create an Account" class="create-button"><span><span class="create-button-text">login</span></span></button>
											</li><!-------------------------ul---------------------->
	                                     </ul><!-------------------------ul---------------------->
                                     <form>

<?php
 endif;
 ?>




<?php 
$number_of_admin = 0;
 $query = $moldura->show_sorted_row_values('admins','admin_id','DESC');
 while($fetches = mysqli_fetch_assoc($query)){
 	$number_of_admin++;
 }
 if($number_of_admin <= 0 ): ?>
 	<form method="POST">
 <input name="admin_user_name" placeholder="name" /><br/>
 <input name="admin_user_pass" placeholder="password" /><br/>
 <input name="admin_user_email" placeholder="email" /><br/>
 <input type="submit" name="submit_admin_reg" />
 	</form>
 	<?php 
 	if(isset($_POST['submit_admin_reg'])){
 	if(isset($_POST['admin_user_name']) && isset($_POST['admin_user_pass']) && isset($_POST['admin_user_email'])){
 	$moldura->insert_into_table('
 			INSERT INTO admins (admin_name,admin_pass,admin_email) VALUES("'.$_POST["admin_user_name"].'","'.$_POST["admin_user_pass"].'","'.$_POST["admin_user_email"].'");
 		');
 }
 header("Refresh:0");
}
 	?>

 <?php endif; ?>