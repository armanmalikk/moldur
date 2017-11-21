<?php
  require('header.php');
?>

          </section><!-- end header-->

            <section>
                <div class="container">
                    <div class="row">
                     <?php
                                    if(isset($_POST['delete_image'])){
                                        $moldura->delete_from_table_by_id_v2('images','image_id',$_POST['hidden_image_id']);
                                    }
                    ?>
                      <?php $query = $moldura->show_sorted_row_values('images','image_id','DESC'); ?>
                      <?php while($fetches = mysqli_fetch_assoc($query)) : ?>
                            <div class="col-sm-2">
                                <img src="data:image;base64,<?php echo $fetches['image_img']; ?>" id="fram-picture">

                        <!-------------
                              start of delete frame
                          ---------->

                               
                                <?php 
                                    if(isset($_SESSION['admin_id'])): 
                                ?>
                              <form method="POST">
                                    <input type="hidden" name="hidden_image_id" value=<?php echo $fetches['image_id']; ?> />
                                    <button type="submit" class="btn fa fa-times" name="delete_image">
                                    </button>
                              </form>
                                    <br>
                                <?php endif; ?>
                          <!------------
                              end of delete frame
                          ---------->

                              <form method="GET" action="fram_choose.php">
                                <input type="hidden" name="image_value" value="<?php echo $fetches['image_id']; ?>" />
                                <input type="submit" name="add_image_to_cart_single_frame" class="btn btn-warning btn-md" value="Use this"/>
                              </form>
                            </div>

                    <?php endwhile; ?>
                    </div>  <!-- end of row -->
                </div>    <!-- end of container -->
            </section>
            <!------------------section---------->
<?php require('footer.php'); ?>