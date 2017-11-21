<?php
	// require('functions.php');
	
	$moldura->create_table('admins','
	admin_id INT(4) NOT NULL  AUTO_INCREMENT,	
	admin_name varchar(30) NOT NULL,
	admin_pass varchar(30) NOT NULL,
	admin_email varchar(254) NOT NULL,
	PRIMARY KEY(admin_id)
		');

$moldura->create_table('carts','
	cart_id INT(5) NOT NULL AUTO_INCREMENT,
	cart_user_id INT(4) NOT NULL,
	cart_single_frame_id INT(2) NOT NULL,
	cart_price INT(6) NOT NULL,
	cart_image LONGBLOB NOT NULL,
	cart_size VARCHAR(10) NOT NULL,
	cart_margin INT(2) NOT NULL,
	cart_protection INT(2) NOT NULL,
	cart_landscape_portrait INT(2) NOT NULL,
	cart_type INT(1) NOT NULL,
	cart_name VARCHAR(30) NOT NULL,
	cart_full_frame_id INT(4) NOT NULL,
	cart_quantity INT(3) NOT NULL,
	cart_zip INT(10) NOT NULL,
	cart_shipping_charge INT(10) NOT NULL,
	PRIMARY KEY(cart_id)
	');

$moldura->create_table('comments','
	comment_id INT(4) NOT NULL AUTO_INCREMENT,
	comment_email VARCHAR(254) NOT NULL,
	comment_name VARCHAR(20) NOT NULL,
	comment VARCHAR(1000) NOT NULL,
	PRIMARY KEY(comment_id)		
	');

$moldura->create_table('frames','
	frame_id INT(4) NOT NULL AUTO_INCREMENT,
	frame_tag_name VARCHAR(20) NOT NULL,
	frame_price INT(6) NOT NULL,
	frame_des VARCHAR(400) NOT NULL,
	frame_img longblob NOT NULL,
	PRIMARY KEY(frame_id)
	');

$moldura->create_table('images','
		image_id INT(4) NOT NULL AUTO_INCREMENT,
	image_tag_name VARCHAR(20) NOT NULL,
	image_des VARCHAR(400) NOT NULL,
	image_img longblob NOT NULL,
	PRIMARY KEY(image_id)
	');

$moldura->create_table('orders','
		order_id INT(4) NOT NULL AUTO_INCREMENT,
	order_user_id INT(4) NOT NULL,
	order_single_frame_id INT(4) NOT NULL,
	order_full_frame_id INT(4) NOT NULL,
	order_price INT(6) NOT NULL,
	order_image LONGBLOB NOT NULL,
	order_size  VARCHAR(30) NOT NULL,
	order_margin INT(2) NOT NULL,
	order_protection INT(2) NOT NULL,
	order_landscape_portrait INT(2) NOT NULL,
	order_user_email VARCHAR(254) NOT NULL,
	telephone INT(20) NOT NULL,
	order_user_zip INT(10) NOT NULL,
	order_user_address VARCHAR(100) NOT NULL,

	order_type INT(1) NOT NULL,
	order_time INT(15) NOT NULL,
	order_status VARCHAR(20) NOT NULL,
	order_cart_id INT(7) NOT NULL,
	order_user_first_name VARCHAR(20) NOT NULL,
	order_user_last_name VARCHAR(20) NOT NULL,
	order_user_state VARCHAR(20) NOT NULL,
	order_user_city VARCHAR(20) NOT NULL,
	order_quantity INT(3) NOT NULL,
	order_shipping_charge INT(10) NOT NULL,

	PRIMARY KEY(order_id)
	');

$moldura->create_table('PRODUCTS','
	product_id INT(4) NOT NULL,
	product_user_id INT(4) NOT NULL,
	product_frame_id INT(4) NOT NULL,
	product_image_id INT(4) NOT NULL,
	product_price INT(6) NOT NULL,
	PRIMARY KEY(product_id)
	');

$moldura->create_table('single_frames','
	single_frame_id INT(4) NOT NULL AUTO_INCREMENT,
	single_frame_tag_name VARCHAR(10) NOT NULL,
	single_frame_price INT(6) NOT NULL,
	single_frame_des VARCHAR(400) NOT NULL,
	single_frame_img longblob NOT NULL,
	single_frame_edge_img longblob NOT NULL,
	PRIMARY KEY(single_frame_id)
	');





$moldura->create_table('users','
	user_id INT(4) NOT NULL AUTO_INCREMENT,
	user_first_name VARCHAR(20) NOT NULL,
	user_last_name VARCHAR(20) NOT NULL,
	user_pass VARCHAR(8) NOT NULL,
	user_email varchar(254) NOT NULL,
	PRIMARY KEY(user_id)
	');

$moldura->create_table('ZIPs','
	Zip_id INT(5) NOT NULL,
	Zip_place VARCHAR(30) NOT NULL,
	Zip_price INT(6) NOT NULL,
	Zip_distance INT(10) NOT NULL,
	PRIMARY KEY(zip_id)
	');
 

$moldura->create_table('general',
			'general_id INT(10) NOT NULL AUTO_INCREMENT,
			general_logo LONGBLOB NOT NULL,
			general_address VARCHAR(100) NOT NULL,
			general_mobile_num INT(15) NOT NULL,
			general_email VARCHAR(254) NOT NULL,
			PRIMARY KEY(general_id)'
			);

$moldura->create_table('slider_images',
			'slider_image_id INT(1) NOT NULL AUTO_INCREMENT,
			slider_image LONGBLOB NOT NULL,
			PRIMARY KEY(slider_image_id)'
			);






	$query = $moldura->show_sorted_row_values('general','general_id','DESC');
	$fetches = mysqli_fetch_assoc($query);
	if(!$fetches){
	$moldura->insert_into_table('
			INSERT INTO general (general_logo,general_address,general_mobile_num,general_email) VALUES ("demo","demo","61750","demo");
		');
	}












