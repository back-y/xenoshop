<?php
    $active= 'Cart';
    include("includes/header.php");

?>



   <div id="content"><!-- #content begin-->
       <div class="container"><!-- container begin-->
           <div class="col-md-12"><!-- col-md-12 begin-->
<!-- #content begin-->

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

                                                    $pro_url = $row_products['product_url'];

                                                    $sub_total = $pro_sale*$pro_qty;

                                                    $_SESSION['pro_qty'] = $pro_qty;

                                                    $total += $sub_total;

                                        
                                        ?>

                                        <tr><!-- tr begin-->

                                            <td>

                                                <img class="img-responsive" src="admin_area/product_images/<?php  echo $product_img1; ?>" alt="product 3">

                                            </td>

                                            <td>

                                                <a href="<?php echo $pro_url; ?>"> <?php  echo $product_title; ?> </a>

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

                            <div class="form-inline pull-right"><!-- form-inline begin-->
                                <div class="form-group"><!-- form-group begin-->

                                        <label> Coupon Code: </label>

                                        <input type="text" name="code" class="form-control">

                                        <input type="submit" class="btn btn-primary" value="Use Coupon" name="apply_coupon">

                                </div><!-- form-group finish-->
                            </div><!-- form-inline finish-->
                            
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
                
                    if(isset($_POST['apply_coupon'])){

                        $code = $_POST['code'];

                        if($code == ""){

                        }else{

                            $get_coupons = "select * from coupons where coupon_code='$code'";

                            $run_coupons = mysqli_query($con,$get_coupons);

                            $check_coupons = mysqli_num_rows($run_coupons);

                            if($check_coupons == "1"){

                                $row_coupons = mysqli_fetch_array($run_coupons);

                                $coupon_pro_id = $row_coupons['product_id'];

                                $coupon_price = $row_coupons['coupon_price'];

                                $coupon_limit = $row_coupons['coupon_limit'];

                                $coupon_used = $row_coupons['coupon_used'];

                                if($coupon_limit == $coupon_used){

                                    echo "<script>alert('Your coupon already expired')</script>";

                                }else{

                                    $get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add='$ip_add'";

                                    $run_cart = mysqli_query($con,$get_cart);

                                    $check_cart = mysqli_num_rows($run_cart);

                                    if($check_cart == "1"){

                                        $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";

                                        $run_used = mysqli_query($con,$add_used);

                                        $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";

                                        $run_update_cart = mysqli_query($con,$update_cart);

                                        echo "<script>alert('Your coupon has been applied')</script>";

                                        echo "<script>window.open('cart.php','_self')</script>";

                                    }else{

                                        echo "<script>alert('Your coupon didn't match with your product on your cart')</script>";

                                    }

                                }
                                
                            }else{

                                echo "<script>alert('Your coupon is not valid')</script>";

                            }
                        }

                    }

                ?>

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
</html>