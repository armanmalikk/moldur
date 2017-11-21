<?php require('header.php'); ?>
            <section>
                <div class="w3-content" style="position:relative">

                    <!-- <img class="mySlides" src="images/psd/boxing.JPG">
                    <img class="mySlides" src="images/psd/boxing_taring.JPG">
                    <img class="mySlides" src="images/psd/lemon.JPG">
                    <img class="mySlides" src="images/music.JPG"> -->

                <?php 
                    $query = $moldura->show_sorted_row_values('slider_images','slider_image_id','desc');
                    while($fetch = mysqli_fetch_assoc($query)):
                ?>
                    <img class="mySlides" src="data:image;base64,<?php echo $fetch['slider_image']; ?>">
                <?php
                    endwhile;
                ?>
                    <a class="w3-btn-floating" style="position:absolute;top:45%;left:10%" id="slide-previous">
                        <i class="fa fa-chevron-circle-left fa-3x" aria-hidden="true"></i>
                    </a>
                    <a class="w3-btn-floating" style="position:absolute;top:45%;right:10%;height:45px" id="slide-next">
                        <i class="fa fa-chevron-circle-right fa-3x" aria-hidden="true"></i>
                    </a>

                </div>


            </section>
            <!-- silder-image -->
            <section>

            <?php
            if(isset($_SESSION['user_id'])){
            if(isset($_POST['add_to_cart_frame'])){
                $cart_name = $moldura->getting_data_by_another_field('frames','frame_tag_name','frame_id',$_POST["hide_button_frame_id"]);
                $cart_image = $moldura->getting_data_by_another_field('frames','frame_img','frame_id',$_POST["hide_button_frame_id"]);
                echo "<h1> nn".$cart_name;
                $moldura->insert_into_cart('INSERT INTO carts(
                    cart_user_id,
                    cart_full_frame_id,
                    cart_single_frame_id,
                    cart_price,
                    cart_type,
                    cart_name,
                    cart_size,
                    cart_margin,cart_protection,
                    cart_landscape_portrait,
                    cart_quantity,
                    cart_zip,
                    cart_shipping_charge,
                    cart_image
                    ) VALUES(
                    "'.$_SESSION["user_id"].'",
                    "'.$_POST["hide_button_frame_id"].'",
                    0,
                    "'.$_POST["hide_button_frame_price"].'"
                    ,1,
                    "'.$cart_name.'",
                    1,
                    1,
                    1,
                    1,
                    1,
                    1,
                    1,
                    "'.$cart_image.'")');
            }
            $form_action = "";
        }else{
            $form_action = "login.php";
        }
          ?>
                <div class="container">
                    <div class="row">
                    
                      <?php
                                    if(isset($_POST['delete_full_frame'])){
                                        $moldura->delete_from_table_by_id_v2('frames','frame_id',$_POST['hidden_full_frame_id']);
                                    }
                        ?>
                    <?php 
                        $query = $moldura->show_sorted_row_values('frames','frame_id','DESC');
                        while($fetches = mysqli_fetch_assoc($query)): ?>
                            <div class="col-sm-3">
                            <form method="POST" action="<?php echo $form_action; ?>">
                                <img src="data:image;base64,<?php 
                                 echo $fetches['frame_img'];
                                ?>" id="fram-picture" class="wow fadeInDown">
                                <h4 id="<?php echo $fetches['frame_tag_name']; ?>">
                                    <b>Hello</b>
                                    <samp>
                                       <!--  <small>frame for 3 pictures</small> -->
                                    </samp>
                                </h4>
                                <h4 id="text_name">
                                    <b>$ <?php echo $fetches['frame_price']; ?></b>
                                </h4>

                                    <!-------------
                                        start of delete frame
                                    ---------->

                                <?php 
                                    if(isset($_SESSION['admin_id'])): 
                                ?>
                                    <input type="hidden" name="hidden_full_frame_id" value=<?php echo $fetches['frame_id']; ?> />
                                    <button type="submit" class="btn fa fa-times" name="delete_full_frame">
                                    </button>
                                    <br>
                                <?php endif; ?>
                                    <!------------
                                        end of delete frame
                                    ---------->

                                <input type="hidden" name="hide_button_frame_id" value="<?php echo $fetches['frame_id']; ?>"/>
                                <input type="hidden" name="hide_button_frame_price" value="<?php echo $fetches['frame_price']; ?>"/>
                                <?php if(isset($_SESSION['user_id'])) : ?>
                                <button type="submit" name="add_to_cart_frame" class="btn btn-warning btn-md">
                                    Add To Cart
                                </button> 
                                <?php else: ?>
                                    <a href="login.php">
                                    <button type="" name="add_to_cart_frame" class="btn btn-warning btn-md">
                                    Add To Cart 
                                </button> 
                                </a>
                                <?php endif; ?>
                            </form>
                            </div>
                        <?php endwhile; ?>
                    

                        
                    </div>  <!-- end of row -->
                </div>  <!-- end of container -->
            </section>  <!-- end of section -->
            <!----------  section  -------->
          <?php require('footer.php'); ?>