<?php
  require('header.php');
?>
            <section>
                <div class="container">
                    <div class="row">
                    <?php
                                    if(isset($_POST['delete_single_frame'])){
                                        $moldura->delete_from_table_by_id_v2('single_frames','single_frame_id',$_POST['hidden_single_frame_id']);
                                    }
                                ?>
                    <?php $query =  $moldura->show_sorted_row_values('single_frames','single_frame_id','DESC'); ?>
                    <?php while($fetches = mysqli_fetch_assoc($query)): ?>
                            <div class="col-sm-3">
                                <img src="data:image;base64,<?php echo $fetches['single_frame_img'] ?>" id="fram-picture">
                                <h4 id="text_name">
                                    <b><?php echo $fetches['single_frame_tag_name']; ?></b>
                                    <samp>
                                        <!-- <small>frame for 3 pictures</small> -->
                                    </samp>
                                </h4>
                                <h4 id="text_name">
                                    <b>$ <?php echo $fetches['single_frame_price']; ?></b>
                                </h4>
                          <!-------------
                              start of delete frame
                          ---------->

                                
                                <?php 
                                    if(isset($_SESSION['admin_id'])): 
                                ?>
                              <form method="POST">
                                    <input type="hidden" name="hidden_single_frame_id" value=<?php echo $fetches['single_frame_id']; ?> />
                                    <button type="submit" class="btn fa fa-times" name="delete_single_frame">
                                    </button>
                              </form>
                                    <br>
                                <?php endif; ?>
                          <!------------
                              end of delete frame
                          ---------->
                                <!-- <input type="hidden" name= / -->
                              <form method="GET" action="fram_choose.php">
                              <input type="hidden" name="id_value" value=<?php echo $fetches['single_frame_id'] ?> />
                                <input type="submit" name="add_single_frame_to_cart_single_frame" class="btn btn-warning btn-md" value="Go For Customize"/>
                              </form>
                              
                            </div>
                        <?php endwhile; ?>
                    </div>  <!-- end of row -->
                </div>  <!-- end of container -->
            </section>
            <!------------------section------>
<?php require('footer.php'); ?>