<?php

session_start();
$active='Cart';
include("includes/db.php");
include("functions/functions.php");

?>


<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">

                <?php
                
                    if(!isset($_SESSION['customer_email'])){

                        echo "Welcome: Guest";
                    }else{
                        echo "Welcome:" . $_SESSION['customer_email'] . "";
                    }

                ?>

               </a>
               <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php  total_price(); ?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- menu Begin -->
                   
                   <li>
                       <a href="customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="checkout.php">My Account</a>
                   </li>
                   <li>
                       <a href="cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">

                                    

                        <?php
                        
                            if(!isset($_SESSION['customer_email'])){

                                echo "<a href='checkout.php'> Login </a>";
                            }else{
                                echo " <a href='logout.php'> Log Out </a> ";
                            }

                        ?>

                    

                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="<?php if($active== 'Home') echo "active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active== 'Shop') echo "active"; ?>">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="<?php if($active== 'Account') echo "active"; ?>">
                           
                            <?php 
                            
                                if(!isset($_SESSION['customer_email'])){

                                    echo "<a href='checkout.php'>My Account</a>";

                                }else{
                                    echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                                }

                            ?>

                       </li>
                       <li class="<?php if($active== 'Cart') echo "active"; ?>">
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li class="<?php if($active== 'Contact') echo "active"; ?>">
                           <a href="contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->


   



   <div id="content"><!-- #content begin-->
       <div class="container"><!-- container begin-->
           <div class="col-md-12"><!-- col-md-12 begin-->


           <ul class="breadcrumb"><!-- breadcrumb begin-->
               <li>
                    <a href="index.php">Home</a>
               </li>
               <li>
                   Cart
               </li>
           </ul><!-- breadcrumb finish-->

           </div><!-- col-md-12 finish-->


           <div id="cart" class="col-md-9"><!-- col-md-9 begin-->

                <div class="box"><!-- box begin-->

                    <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form begin-->

                        <h1>Shopping Cart</h1>

                        <?php
                        
                            $ip_add = getRealIpUser();

                            $select_cart  = "select * from cart where ip_add='$ip_add'";

                            $run_cart = mysqli_query($con,$select_cart);

                            $count = mysqli_num_rows($run_cart);

                        ?>

                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                        <div class="table-responsive"><!-- table-responsive begin-->

                            <table class="table"><!-- table begin-->

                                <thead><!-- thead begin-->

                                    <tr><!-- tr begin-->

                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>

                                    </tr><!-- tr finish-->


                                </thead><!-- thead finish-->

                                    <tbody><!-- tbody begin-->

                                        <?php
                                        
                                            $total = 0;

                                            while($row_cart = mysqli_fetch_array($run_cart)){

                                                $pro_id = $row_cart['p_id'];

                                                $pro_size = $row_cart['size'];

                                                $pro_qty = $row_cart['qty'];

                                                $pro_sale = $row_cart['p_price'];

                                                $get_products = "select * from products where product_id='$pro_id'";

                                                $run_products = mysqli_query($con,$get_products);

                                                while($row_products = mysqli_fetch_array($run_products)){

                                                    $product_title = $row_products['product_title'];

                                                    $product_img1 = $row_products['product_img1'];

                                                    $only_price = $row_products['product_price'];

                                                    $sub_total = $pro_sale*$pro_qty;

                                                    $_SESSION['pro_qty'] = $pro_qty;

                                                    $total += $sub_total;

                                        
                                        ?>

                                        <tr><!-- tr begin-->

                                            <td>

                                                <img class="img-responsive" src="admin_area/product_images/<?php  echo $product_img1; ?>" alt="product 3">

                                            </td>

                                            <td>

                                                <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php  echo $product_title; ?> </a>

                                            </td>

                                            <td>

                                                <input type="text" name="quantity" data-product_id="<?php echo $pro_id; ?>" 
                                                value="<?php echo $_SESSION['pro_qty'] ?>" class="quantity form-control">

                                            </td>

                                            <td>

                                               <?php echo  $pro_sale; ?> 

                                            </td>
                                            
                                            <td>

                                                 <?php  echo $pro_size; ?> 

                                            </td>

                                            <td>

                                                <input type="checkbox" name="remove[]" value=" <?php echo  $pro_id; ?> ">

                                            </td>
                                            
                                            <td>

                                                $<?php echo $sub_total; ?> 

                                            </td>

                                        </tr><!-- tr finish-->

                                    </tbody><!-- tbody finish-->

                                    <?php
                                    
                                                }
                                        }

                                    ?>

                                    <tfoot><!-- tfoot begin-->

                                        <tr><!-- tr begin-->

                                            <th colspan="5">Total</th>
                                            <th colspan="2">$<?php echo $total; ?></th>

                                        </tr><!-- tr finish-->

                                    </tfoot><!-- tfoot finish-->

                            </table><!-- table finish-->
                            
                        </div><!-- table-responsive finish-->

                        <div class="box-footer"><!-- box-footer begin-->

                            <div class="pull-left"><!-- pull-left begin-->

                                <a href="index.php" class="btn btn-default"><!-- btn btn-default begin-->


                                    <i class="fa fa-chevron-left"></i> Continue Shopping

                                </a><!-- btn btn-default finish-->

                            </div><!-- pull-left finish-->

                            <div class="pull-right"><!-- pull-right begin-->

                                <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-default begin-->


                                    <i class="fa fa-refresh"></i> Update Cart

                                </button><!-- btn btn-default finish-->

                                <a href="checkout.php" class="btn btn-primary">

                                    Proceed Checkout  <i class="fa fa-chevron-right"></i>

                                </a>

                            </div><!-- pull-right finish-->

                        </div><!-- box-footer finish-->

                    </form><!-- form finish-->

                </div><!-- box finish-->

                <?php
                
                    function update_cart(){

                        global $con;

                        if(isset($_POST['update'])){

                            foreach($_POST['remove'] as $remove_id ){

                                $delete_product = "delete from cart where p_id='$remove_id'";

                                $run_delete = mysqli_query($con,$delete_product);

                                if($run_delete){

                                    echo "<script>window.open('cart.php','_self')</script>";

                                }

                            }

                        }

                    }
                    echo @$up_cart  = update_cart();
                
                ?>

               <div id="row same-heigh-row"><!-- #row same-heigh-row begin-->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 begin-->
                       <div class="box same-height headline"><!-- box same-height headline begin-->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline finish-->
                   </div><!-- col-md-3 col-sm-6 finish-->
                   
                        <?php
                        
                            $get_products = "select * from products order by rand() LIMIT 0,3";

                            $run_products = mysqli_query($con,$get_products);

                            while($row_products = mysqli_fetch_array($run_products)){

                                $pro_id = $row_products['product_id'];
                                
                                $pro_title = $row_products['product_title'];
            
                                $pro_price = $row_products['product_price'];
            
                                $pro_sale_price = $row_products['product_sale'];
            
                                $pro_img1 = $row_products['product_img1'];
            
                                $pro_label = $row_products['product_label'];
            
                                $manufacturer_id = $row_products['manufacturer_id'];
            
                                $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
            
                                $run_manufacturer = mysqli_query($db,$get_manufacturer);
            
                                $row_manufacturer = mysqli_fetch_array($run_manufacturer);
            
                                $manufacturer_title = $row_manufacturer['manufacturer_title'];
            
                                if($pro_label == "sale"){
            
                                    $product_price = " <del> $ $pro_price </del> ";
            
                                    $product_sale_price = "/ $ $pro_sale_price ";
                                    
                                }else{
            
                                    $product_price = "  $ $pro_price  ";
            
                                    $product_sale_price = "";
                                    
            
                                }
            
                                if($pro_label==""){
            
                                }else{
            
                                    $product_label = "
                                    
                                        <a href='#' class='label $pro_label'>
                                            
                                            <div class='theLabel'> $pro_label </div>
                                            
                                            <div class='labelBackground'>  </div>
            
                                        </a>
            
                                    ";
            
                                }
            
                                echo "
                                
                                    <div class='col-md-3 col-sm-6 center-responsive'>
            
                                        <div class='product'>
            
                                            <a href='details.php?pro_id=$pro_id'>
            
                                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                            
                                            
                                            </a>
            
                                            <div class='text'>
            
                                            <center>
                                            
                                                <p class='btn btn-primary'> $manufacturer_title </p>
                                            
                                            </center>
            
                                                <h3>
                                                
                                                    <a href='details.php?pro_id=$pro_id'>
            
                                                    $pro_title
                                                    
                                                    
                                                    </a>
                                                
                                                
                                                </h3>
            
                                                <p class='price'>
            
                                                $product_price &nbsp;$product_sale_price
                                                
                                                </p>
            
                                                <p class='button'>
            
                                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
            
                                                        View Details
                                                    
                                                    
                                                    </a>
            
                                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
            
                                                        <i class='fa fa-shopping-cart'></i> Add to Cart
                                                    
                                                    
                                                    </a>
                                                    
            
                                                </p>
                                            
                                            
                                            </div>
            
                                            $product_label
            
                                        </div>
                                    
                                    
                                    </div>
            
                                
                                ";

                    }

                ?>

               </div><!-- #row same-heigh-row finish-->

           </div><!-- col-md-9 finish-->

           <div class="col-md-3"><!-- col-md-3 begin-->
           
                <div id="order-summery" class="box"><!-- box begin-->

                    <div class="box-header"><!-- box-header begin-->

                        <h3>Order Summery</h3>

                    </div><!-- box-header finish-->

                        <p class="text-muted"><!-- text-muted begin-->

                            Shopping and additional costs are calculated based on you entered

                        </p><!-- text-muted finish-->

                        <div class="table-responsive"><!-- table-responsive begin-->

                            <table class="table"><!-- table begin-->

                                <tbody><!-- tbody begin-->

                                    <tr><!-- tr begin-->

                                        <td> Order All Sub-Total </td>
                                        <th> $<?php echo $total; ?>  </th>

                                    </tr><!-- tr finish-->

                                    <tr><!-- tr begin-->
                                    
                                        <td> Shipping and Handling</td>
                                        <td> $0</td>

                                    </tr><!-- tr finish-->
                                    <tr><!-- tr begin-->
                                    
                                    <td> Tax </td>
                                    <th> $0</th>

                                    </tr><!-- tr finish-->
                                    <tr class="total"><!-- tr begin-->
                                    
                                    <td> Total</td>
                                    <th> $<?php echo $total; ?> </th>

                                    </tr><!-- tr finish-->

                                </tbody><!-- tbody begin-->

                            </table><!-- table finish-->

                        </div><!-- table-responsive finish-->

                </div><!-- box finish-->

           </div><!-- col-md-3 finish-->

           </div><!-- container finish-->
   </div><!-- #content finish-->


   <?php 
    
    include("includes/footer.php");


   ?>

    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

    <script>

        $(document).ready(function(data){

            $(document).on('keyup','.quantity',function(){

                var id = $ (this).data("product_id");

                var quantity = $(this).val();

                if(quantity != ''){

                    $.ajax({

                        url: "change.php",
                        method: "POST",
                        data:{id:id, quantity:quantity},

                        success:function(){
                            $("body").load("cart_body.php");
                        }


                    });

                }

            });

        });

    </script>
    
    
</body>