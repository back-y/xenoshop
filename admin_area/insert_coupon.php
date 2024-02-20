<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";
    }else{


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Insert Coupons </title>
<body>


    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <ol class="breadcrumb"><!-- breadcrumb begin -->

                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Coupons

                </li><!-- active finish -->

            </ol><!-- breadcrumb finish -->

        </div><!-- col-lg-12 finish -->

    </div><!-- row finish -->

    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <div class="panel panel-default"><!-- panel panel-default begin -->

                <div class="panel-heading"><!-- panel-heading begin -->

                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-money fa-fw"></i> Insert Coupons

                    </h3><!-- panel-title finish -->

                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->

                    <form method="post" class="form-horizontal"><!-- form-horizontal begin -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Coupon Title </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="coupon_title" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Coupon Price </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="coupon_price" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Coupon Limit </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="coupon_limit" type="number" class="form-control" value="1">
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Sale Product </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <select name="product_id" class="form-control" required>

                                    <option selected disabled >Select Product For Coupon</option>
                                    
                                    <?php
                                    
                                        $get_p = "select * from products";

                                        $run_p = mysqli_query($con,$get_p);

                                        while($row_p = mysqli_fetch_array($run_p)){

                                            $p_id = $row_p['product_id'];

                                            $p_title = $row_p['product_title'];

                                            echo "<option value='$p_id'>$p_title</option>";

                                        }
                                    
                                    ?>

                                </select>
                            
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Coupon Code</label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="coupon_code" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="submit" value="Create Coupon" type="submit" class="btn btn-primary form-control">
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                    </form><!-- form-horizontal finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->

        </div><!-- col-lg-12 finish -->

    </div><!-- row finish -->

    <?php
    
        if(isset($_POST['submit'])){
            
            $coupon_title = $_POST['coupon_title'];
            
            $coupon_price = $_POST['coupon_price'];
            
            $coupon_code = $_POST['coupon_code'];
            
            $coupon_limit = $_POST['coupon_limit'];
            
            $coupon_pro_id = $_POST['product_id'];

            $coupon_used = 0;

            $get_coupons = "select * from coupons where product_id='$coupon_pro_id' or coupon_code='$coupon_code'";

            $run_coupons = mysqli_query($con,$get_coupons);

            $check_coupons = mysqli_num_rows($run_coupons);

            if($check_coupons == 1){

                echo "<script>alert('Coupon code / product already added. Choose another coupon code / product')</script>";

            }else{

                $insert_coupon = "insert into coupons (product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used)values
                ('$coupon_pro_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";

                $run_coupon = mysqli_query($con,$insert_coupon);

                if($run_coupon){

                    echo "<script>alert('Your coupon has been created')</script>";

                    echo "<script>window.open('index.php?view_coupons','_self')</script>";

                }

            }

        }
    
    ?>


<?php } ?>