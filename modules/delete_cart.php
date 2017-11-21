<?php


if(isset($_POST['delete_cart'])) {
			// $conn = mysqli_connect('localhost','root','','moldur1');
			// $query = 'DELETE FROM carts WHERE cart_id = "'.$_POST['hidden_cart_id'].'"';
			// echo $query;
			// mysqli_query($conn, $query);
			$moldura->delete_from_table_by_id_v2('carts','cart_id',$_POST["hidden_cart_id"]);
		}

