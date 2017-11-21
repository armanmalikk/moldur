   <?php
            if(isset($_POST['submit_comment'])){
                $moldura->insert_into_table("
                  INSERT INTO COMMENTS (comment_email,comment_name,comment) VALUES ('".$_POST['email_of_commenter']."','".$_POST['name_of_commenter']."','".$_POST['comment_of_commenter']."')
                ");
            }
            ?>
            <section>
              <div id="contact-map" style="height:400px;"></div>
            </section>
            <section id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                          <h4>Address</h4>
                          <p class="address">
                            <?php echo admin_address; ?>
                          </p>
                          <p>
                            
                          </p>
                        </div>
                        <div class="col-sm-6">
                          <h4>Contact Us</h4>
                          <form method="POST">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email_of_commenter" class="form-control" id="exampleInputEmail1" placeholder="Email" required />
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Name</label>
                              <input type="name" name="name_of_commenter" class="form-control" id="exampleInputPassword1" placeholder="name">
                            </div>
                             <div class="form-group">
                              <label for="exampleInputcomment">Comment</label>
                              <input type="comment" name="comment_of_commenter" class="form-control" id="exampleInputcomment" placeholder="comment" required />
                            </div>
                            <button type="submit" name="submit_comment" class="btn btn-default">Submit</button>
                          </form>
                        </div>
                    </div>
                </div>
            </section>
            <!------------------footer------------>
        </div>

        <script src="js/main.js"></script>
    </body>
</html>
