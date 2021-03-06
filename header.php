<?php 
    session_start();
    require('functions.php');
    if(isset($_SESSION['user_id'])){
        $user_name = $moldura->getting_data_by_another_field('users','user_first_name','user_id',$_SESSION['user_id']);
        define("user_name",$user_name);
    }
    
?>
    <head>
        <title>Welcome to Moldur Express</title>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="php,CSS,XML,JavaScript">
        <meta name="author" content="Hege Refsnes">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSynGTe5RpwVIy0z0d3kb_M3_U-Q-jC74"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/mediaqueries.css">
        <link rel="stylesheet" href="style/animate.css">
        <link rel="stylesheet" href="styles/font-awesome.min.css">
        <link rel="stylesheet" href="styles/slick.css">
        <link rel="stylesheet" href="style/owl.carousel.css">
        <link rel="stylesheet" href="style/reset.css">
        <link rel="stylesheet" href="style/add_to_card.css">
        <link rel="stylesheet" href="style/card.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
        <script src="js/style.js"></script>

        <script src="js/kopa.js"></script>
        <script src="js/wow.min.js"></script>
    </head>
    <body>
        <div class="mother_wallpaper">
            <section id="main_log" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-sm-7">
                                <img src="images/amazon-logo.png" id="logo" class="wow bounceInDown">
                            </div>
                            <div class="col-sm-2">
                                <i class="fa fa-phone" aria-hidden="true" id="phone-number">&nbsp; &nbsp; <?php echo contact_number; ?></i>
                                <br>
                                <i class="fa fa-envelope" aria-hidden="true" id="phone-number1">&nbsp; &nbsp; 
                                <?php echo contact_email; ?></i>
                                <br>
                                <!-- <i class="fa fa-whatsapp" aria-hidden="true" id="phone-number1">
                                (11)2365-6937</i> -->
                            </div>
                            <div class="shopping-cart-wrapper col-sm-3">
                                <div class="col-sm-12" id="boss">
                                    <img src="images/shopping_cart.png" id="shopping">
                                    <h6 id="shopping-text">Cart</h6>
                                    </br>
                                <?php if(isset($_SESSION['user_id'])) :?>

                                    <h5><i><b> <?php echo user_name; ?></h5>
                                    <a href="log_out.php">Log Out</a>
                                <?php else: ?>

                                    <a href="login.php">Log in / Register</a>
                                <?php endif; ?>
                                </div>
                                <!----col-sm-4-------->
                                <style>
                             .potrait-frame-cart{
                               height:100px;
                               width:97px;
                               position: absolute;
                               z-index: 10;
                             }
                             .potraitImg-cart {
                          object-fit: cover;
                          height: 100px;
                          width: 95px;
                         }
                            </style><!-------style-------->
                                <div class="container">
                                    <div class="shopping-cart">
                                        <div class="shopping-cart-header">
                                            <i class="fa fa-shopping-cart cart-icon"></i>
                <?php
                    $total_price = 0;
                    $total_products = 0;
                    $query = $moldura->show_sorted_value_of_user('carts','cart_user_id',$_SESSION['user_id'],'cart_id','desc');
                    while( $fetch = mysqli_fetch_assoc($query) ){
                        $total_price = $fetch['cart_price'] + $total_price;
                        $total_products = $total_products + 1;
                    }
                ?>
                                            <span class="badge"><?php echo $total_products; ?></span>
                                            <div class="shopping-cart-total">
                                                <span class="lighter-text">Total:</span>
                                                <span class="main-color-text">$<?php echo $total_price; ?></span>
                                            </div>
                                        </div>
                                        <!--end shopping-cart-header -->

                                        <ul class="shopping-cart-items">

                                        <?php 
                                        $count = 0;
                                        $query = $moldura->show_sorted_value_of_user('carts','cart_user_id',$_SESSION['user_id'],'cart_id','DESC');
                                        while($fetches = mysqli_fetch_assoc($query) ) :
                                        ?>
                                        <?php if($fetches['cart_type'] == 2 && $count <= 1) : ?>
                                            <li class="clearfix">
                                            <?php
                                               $single_frame_img =  $moldura->getting_data_by_another_field('single_frames','single_frame_img','single_frame_id',$fetches['cart_single_frame_id']);     
                                             ?>

                                                 <img src="data:image;base64,<?php echo $single_frame_img; ?>" class="potrait-frame-cart" alt="" />
                                                    <img src="data:image;base64,<?php echo $fetches['cart_image']; ?>" class="potraitImg-cart noborder main-img" alt=""/>   
                                                <span class="item-name"><?php echo $fetches['cart_name']; ?></span>
                                                <span class="item-price"><?php echo $fetches['cart_price']; ?></span>
                                                <!-- <span class="item-quantity">Quantity: 01</span> -->
                                            </li>
                                           
                                        <?php elseif($fetches['cart_type'] == 1 && $count <= 1) : ?>
                                            <?php $cart_frame_imgae = $moldura->getting_data_by_another_field('single_frames','single_frame_img','single_frame_id',$fetches['cart_single_frame_id']);
                                            ?>
                                           <li class="clearfix">
                                                 
                                                    <img src="data:image;base64,<?php echo $fetches['cart_image']; ?>" class="potraitImg-cart noborder main-img" alt=""/>   
                                                <span class="item-name"><?php echo $fetches['cart_name']; ?></span>
                                                <span class="item-price"><?php echo $fetches['cart_price']; ?></span>
                                                <!-- <span class="item-quantity">Quantity: 01</span> -->
                                            </li> 
                                        <?php endif; ?>

                                        <?php
                                            $count++;
                                         endwhile; ?>
                                                                                    </ul>

                                        <a href="cart.php" class="button">Checkout</a>
                                    </div>      <!--end shopping-cart -->
                                </div>      <!---------------end container ------------------>

                            </div>
                        </div>
                    </div>
                </div>

                <section class="fixed-menu">
                    <ul class="topnav" id="myTopnav">
                        <li>
                            <a class="active" href="index.php" id="home">Home</a>
                        </li>
                        <li>
                            <a href="gallery.php">Galeria</a>
                        </li>
                        <li>
                            <a href="fram_choose.php">Quadros</a>
                        </li>
                        <li>
                            <a href="picture.php">Temas</a>
                        </li>

                        <li>
                            <a href="about.php">Sobre</a>
                        </li>
                        <li>
                        <?php if(isset($_SESSION['user_id'])) :?>
                            <a href="cart.php">Cart</a>
                        <?php else: ?>
                            <a href="login.php">Login</a>
                        <?php endif; ?>
                        </li>
                        <li class="icon">
                            <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
                        </li>
                    </ul>
                </section>

            </section><!-- end header-->