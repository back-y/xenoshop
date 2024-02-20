<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";
    }else{


?>



    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <ol class="breadcrumb"><!-- breadcrumb begin -->

                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Insert User

                </li><!-- active finish -->

            </ol><!-- breadcrumb finish -->

        </div><!-- col-lg-12 finish -->

    </div><!-- row finish -->

    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <div class="panel panel-default"><!-- panel panel-default begin -->

                <div class="panel-heading"><!-- panel-heading begin -->

                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-money fa-fw"></i> Insert User

                    </h3><!-- panel-title finish -->

                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal begin -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Username </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="admin_name" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> E-mail </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="admin_email" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Password </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="admin_pass" type="password" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Country </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="admin_country" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Contact </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="admin_contact" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Job </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="admin_job" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Image </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="admin_image" type="file" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> About</label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <textarea name="admin_about" class="form-control" cols="30" rows="10"></textarea>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="submit" value="Insert User" type="submit" class="btn btn-primary form-control">
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                    </form><!-- form-horizontal finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->

        </div><!-- col-lg-12 finish -->

    </div><!-- row finish -->


</body>
</html>

<?php

    if(isset($_POST['submit'])){

        $user_name = $_POST['admin_name'];

        $user_email = $_POST['admin_email'];

        $user_pass= $_POST['admin_pass'];

        $user_country = $_POST['admin_country'];

        $user_contact = $_POST['admin_contact'];

        $user_job = $_POST['admin_job'];

        $user_about = $_POST['admin_about'];

        $user_image = $_FILES['admin_image']['name'];

        $temp_admin_image = $_FILES['admin_image']['tmp_name'];

        move_uploaded_file($temp_admin_image,"admin_images/$user_image");

        $insert_user = "insert into admins (admin_name,admin_email,admin_pass,admin_country,admin_contact,
        admin_job,admin_image,admin_about) 
        values ('$user_name','$user_email','$user_pass','$user_country','$user_contact','$user_job','$user_image','$user_about')";

            $run_user = mysqli_query($con,$insert_user);

            if($run_user){

                echo "<script>alert('New user has been inserted to your admin successfully')</script>";

                echo "<script>window.open('index.php?view_users','_self')</script>";

            }
    }

?>


<?php } ?>