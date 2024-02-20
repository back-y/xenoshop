<div id="footer"><!--#footer begin-->
    <div class="container"><!--container begin-->
        <div class="row"><!--row begin-->
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->

            <h4>Pages</h4>

                <ul><!--ul begin-->
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="checkout.php">My Account</a></li>
                </ul><!--ul finish-->

                <hr>
                    <h4>User Section</h4>

                <ul><!--ul begin-->

                
                           
                <?php 
                            
                            if(!isset($_SESSION['customer_email'])){

                                echo "<a href='checkout.php'>Login</a>";

                            }else{
                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }

                        ?>

                    
                    <li><a href="customer_register.php">Register</a></li>
                    <li><a href="terms.php">Terms & Conditions</a></li>

                </ul><!--ul finish-->

                <hr class="hidden-md hidden-lg hidden-sm">

            </div><!--col-sm-6 col-md-3 finish-->

            <div class="col-sm-6 col-sm-3"><!--col-sm-6 col-md-3 begin-->


            <h4>Top Products Categories</h4>

            <ul><!--ul begin-->

                <?php

                    $get_p_cats = "select * from product_categories";

                    $run_p_cats = mysqli_query($con,$get_p_cats);

                    while($row_p_cats = mysqli_fetch_array($run_p_cats)){

                        $p_cat_id = $row_p_cats['p_cat_id'];

                        $p_cat_title = $row_p_cats['p_cat_title'];

                        echo "
                        
                            <li>
                            
                                <a href='shop.php?p_cat=$p_cat_id'>
                                
                                    $p_cat_title

                                
                                </a>
                            
                            </li>
                        
                        ";

                    }
                
                ?>

            </ul><!--ul finish-->

            <hr class="hidden-md hidden-lg">


            </div><!--col-sm-6 col-md-3 finish-->

            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->

            <h4>Find Us</h4>

            <p><!--p begin-->

            <strong>Xeno Media inc.</strong>
            <br/>Cibubur
            <br/>Ciracas
            <br/>+2519-7303-3007
            <br/>bereketgezha99@gmail.com
            <br/><strong>MrBereket</strong>

            </p><!--p finish-->

            <a href="contact.php">Check Our Contact Page</a>
            
            <hr class="hidden-md hidden-lg">

            </div><!--col-sm-6 col-md-3 finish-->

            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->

             <h4>Get The News</h4>

              <p class="text-muted">Don't miss our latest update products!</p>

                <form action="https://feedburner.google.com/fb/a/mailverify" method="post" targe="popupwindow"
                    onsubmit="window.open('https://feedburner.google.com/fb/a/mailverfy?uri=M-devMedia','popupwindow',
                    'scrollbars=yes,width=550,height=520');return true" method="post"><!--form begin-->

                    <div class="input-group"><!--input-group begin-->


                    <input type="text" class="form-control" name="email">
                    <input type="hidden" value="M-devMedia" name="uri"/><input type="hidden" name="loc" value="en_US"/>
                    
                    <span class="input-group-btn"><!--input-group-btn begin-->


                    <input type="submit" value="subscribe" class="btn btn-default">


                    </span><!--input-group-btn finish-->


                    </div><!--input-group finish-->
                </form><!--form finish-->

                <hr>

                <h4>Keep In Touch</h4>

                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>

            </div><!--col-sm-6 col-md-3 finish-->
            
        </div><!--row finish-->
    </div><!--container finish-->
</div><!--#footer finish-->

<div id="copyright"><!--#copyright being-->
    <div class="container"><!--container being-->
        <div class="col-md-6"><!--col-md-6 being-->


        <?php echo "<p>&copy; 2020-" . date("Y") . " Xenoshop.com All Rights Reserved</p>"; ?> 

        </div><!--col-md-6 finish-->
        <div class="col-md-6"><!--col-md-6 being-->


        <p class="pull-right"> Theme by: <a href="#">MrBereket</a></p>

        </div><!--col-md-6 finish-->
    </div><!--container finish-->
</div><!--#copyright finish-->