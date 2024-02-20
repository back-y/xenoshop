
<?php

    session_start();
    $active='Cart';
    include("includes/db.php");
    include("functions/functions.php");

?>


<?php

        $product_id = $_GET['pro_id'];

        $get_product = "select * from products where product_url='$product_id'";

        $run_product = mysqli_query($con,$get_product);

        $check_product = mysqli_num_rows($run_product);

        if($check_product == 0){

            echo "<script>window.open('index.php','_self')</script>";

        }else{

        $row_products = mysqli_fetch_array($run_product);

        $p_cat_id = $row_products['p_cat_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_sale_price = $row_products['product_sale'];

        $pro_desc = $row_products['product_desc'];
    
        $pro_features = $row_products['product_features'];
    
        $pro_video = $row_products['product_video'];

        $pro_img1 = $row_products['product_img1'];

        $pro_img2 = $row_products['product_img2'];

        $pro_img3 = $row_products['product_img3'];
    
        $pro_label = $row_products['product_label'];
    
        if($pro_label==""){

        }else{

            $product_label = "
            
                <a href='#' class='label $pro_label'>
                    
                    <div class='theLabel'> $pro_label </div>
                    
                    <div class='labelBackground'>  </div>

                </a>

            ";

        }

        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

        $run_p_cat = mysqli_query($con,$get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xenoshop.com: Manufacturers, Suppliers, Exporters & Importers from the world's largest online B2B marketplace</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    
    <link rel="shortcut icon" href="images/icon.png">
</head>
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
                   Shop
               </li>

               <li>
                   <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
               </li>
               <li><?php echo $pro_title; ?></li>

           </ul><!-- breadcrumb finish-->

           </div><!-- col-md-12 finish-->

           <div class="col-md-12"><!-- col-md-12 begin-->
               <div id="productMain" class="row"><!-- row begin-->
                   <div class="col-sm-6"><!-- col-sm-6 begin-->
                       <div id="mainImage"><!-- #mainImage begin-->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide begin-->
                               <ol class="carousel-indicators"><!-- carousel-indicators begin-->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators finish-->


                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product-2"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product-3"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product-4"></center>
                                   </div>
                               </div>

                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control begin-->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control finish-->

                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control begin-->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>

                               </a><!-- right carousel-control finish-->

                           </div><!-- carousel slide finish-->
                       </div><!-- #mainImage finish-->

                            <?php echo $product_label; ?>

                   </div><!-- col-sm-6 finish-->


                   <div class="col-sm-6"><!-- col-sm-6 begin-->
                       <div class="box"><!-- box begin-->
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>

                           <form class="form-horizontal" method="post"><!-- form-horizontal begin-->
                               <div class="form-group"><!-- form-group begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>


                                   <div class="col-md-7"><!-- col-md-7 begin-->
                                       <select name="product_qty" id="" class="form-control"><!-- select begin-->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                       </select><!-- select finish-->
                                   </div><!-- col-md-7 finish-->



                                </div><!-- form-group finish -->


                                <div class="form-group"><!-- form-group begin-->

                                    <label class="col-md-5 control-label">Product Size</label>

                                    <div class="col-md-7"><!-- col-md-7 begin-->
                                        <select name="product_size" class="form-control" required oninput="setCustomValidity('')" 
                                        oninvalid="setCustomValidity('Must pick 1 size for the product')"><!-- form-control begin-->

                                           <option value="" disabled selected>Select a Size</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>

                                        </select><!-- form-control finish-->
                                    </div><!-- col-md-7 finish-->

                                </div><!-- form-group finish-->


                                 <?php
                                 
                                        if($pro_label == "sale"){

                                            echo "

                                                <p class='price'>

                                                PRICE: <del> $$pro_price</del><br/>

                                                SALE: $  $pro_sale_price

                                                </p>

                                            ";
                                            
                                        }else{

                                            echo "

                                                <p class='price'>

                                                PRICE: $ $pro_price

                                                </p>

                                            ";
                                            

                                        }

                                 ?>

                                <p class="text-center buttons"><button type="submit" name="add_cart" class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>


                           </form><!-- form-horizontal finish-->

                           <?php
                           
                           if(isset($_POST['add_cart'])){
                    
                            $ip_add = getRealIpUser();

                            $pro_id = $row_products['product_id'];
        
                            $p_id = $pro_id;
        
                            $product_qty = $_POST['product_qty'];
        
                            $product_size = $_POST['product_size'];
                    
                            $pro_url = $row_products['product_url'];
        
                            $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
                            $run_check = mysqli_query($con,$check_product);
        
                            if(mysqli_num_rows($run_check) > 0){
        
                                echo "<script>alert('This Product has already added in cart')</script>";
                                echo "<script>window.open('$pro_url','_self')</script>";
        
                            }else{
        
                                    $get_price = "select * from products where product_id='$p_id'";
        
                                    $run_price = mysqli_query($con,$get_price);
        
                                    $row_price = mysqli_fetch_array($run_price);
        
                                    $pro_price = $row_price['product_price'];
        
                                    $pro_sale = $row_price['product_sale'];
        
                                    $pro_label = $row_price['product_label'];
        
                                    if($pro_label == "sale"){
        
                                        $product_price = $pro_sale;
        
                                    }else{
        
                                        $product_price = $pro_price;
        
                                    }
        
                                    $query = "insert into cart (p_id,ip_add,qty,p_price,size) value 
                                    ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";
        
                                    $run_query = mysqli_query($con,$query);
        
                                    
                                    echo "<script>window.open('$pro_url','_self')</script>";
        
        
                            }
        
                        }
                           
                           ?>

                       </div><!-- box finish-->


                       <div class="row" id="thumbs"><!-- row begin-->

                            <div class="col-xs-4"><!-- col-xs-4 begin-->
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><!-- thumb begin-->
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product-2" class="img-responsive">
                                </a><!-- thumb finish-->
                            </div><!-- col-xs-4 finish-->

                            <div class="col-xs-4"><!-- col-xs-4 begin-->
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><!-- thumb begin-->
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product-3" class="img-responsive">
                                </a><!-- thumb finish-->
                            </div><!-- col-xs-4 finish-->

                            <div class="col-xs-4"><!-- col-xs-4 begin-->
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><!-- thumb begin-->
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product-4" class="img-responsive">
                                </a><!-- thumb finish-->
                            </div><!-- col-xs-4 finish-->



                       </div><!-- row finish-->

                   </div><!-- col-sm-6 finish-->

               </div><!-- row finish-->


               <div class="box" id="details"><!-- box begin-->

                    <!-- Tab Button start -->

                    <a data-toggle="tab" href="#descriptions" class="btn btn-primary tab">

                        Product Descriptions

                    </a>
                    <a data-toggle="tab" href="#features" class="btn btn-primary tab">

                        Product Features

                    </a>
                    <a data-toggle="tab" href="#videos" class="btn btn-primary tab">

                        Product Videos

                    </a>

                    <!-- Tab Button end -->

                    <hr style="margin-top:25px;">


                    <!-- Tab contents start -->

                    <div class="tab-content"> <!-- tab-content begin -->

                        <div class="tab-pane fade in active" id="descriptions"><!-- tab-panel fade in active begin -->
                        
                            <p class="product_descriptions">

                                <?php echo $pro_desc; ?>

                            </p>

                        </div><!-- tab-panel fade in active finish -->

                        <div class="tab-pane fade in" id="features"><!-- tab-panel fade in active begin -->
                        
                            <p class="product_features">

                                 <?php echo $pro_features; ?>

                            </p>

                        </div><!-- tab-panel fade in active finish -->

                        <div class="tab-pane fade in" id="videos"><!-- tab-panel fade in active begin -->
                        
                            <p class="product_videos">

                                 <?php echo $pro_video; ?>

                            </p>

                        </div><!-- tab-panel fade in active finish -->
                        
                    </div><!-- tab-content finish -->


                    <!-- Tab contents end -->



               </div><!-- box finish-->

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
    
                            $pro_url = $row_products['product_url'];
        
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
        
                                        <a href='$pro_url'>
        
                                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                        
                                        
                                        </a>
        
                                        <div class='text'>
        
                                        <center>
                                        
                                            <p class='btn btn-primary'> $manufacturer_title </p>
                                        
                                        </center>
        
                                            <h3>
                                            
                                                <a href='$pro_url'>
        
                                                $pro_title
                                                
                                                
                                                </a>
                                            
                                            
                                            </h3>
        
                                            <p class='price'>
        
                                            $product_price &nbsp;$product_sale_price
                                            
                                            </p>
        
                                            <p class='button'>
        
                                                <a class='btn btn-default' href='$pro_url'>
        
                                                    View Details
                                                
                                                
                                                </a>
        
                                                <a class='btn btn-primary' href='$pro_url'>
        
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


           </div><!-- col-md-12 finish-->

       </div><!-- container finish-->
   </div><!-- #content finish-->


   <?php 
    
    include("includes/footer.php");


   ?>

    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>

<?php } ?>