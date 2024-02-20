<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";
    }else{


?>


    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <ol class="breadcrumb"><!-- breadcrumb begin -->

                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Create Term

                </li><!-- active finish -->

            </ol><!-- breadcrumb finish -->

        </div><!-- col-lg-12 finish -->

    </div><!-- row finish -->

    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <div class="panel panel-default"><!-- panel panel-default begin -->

                <div class="panel-heading"><!-- panel-heading begin -->

                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-money fa-fw"></i> Create Term

                    </h3><!-- panel-title finish -->

                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal begin -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Term Title </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="term_title" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Term Link </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="term_link" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Term Desc </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <textarea name="term_desc" cols="19" rows="6" class="form-control"></textarea>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="submit" value="Create Term" type="submit" class="btn btn-primary form-control">
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                    </form><!-- form-horizontal finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->

        </div><!-- col-lg-12 finish -->
</div><!-- row finish -->

<?php

    if(isset($_POST['submit'])){

        $term_title = $_POST['term_title'];

        $term_link = $_POST['term_link'];

        $term_desc = $_POST['term_desc'];

        $insert_term = "insert into terms (term_title,term_link,term_desc) values ('$term_title','$term_link','$term_desc')";

        $run_term = mysqli_query($con,$insert_term);

        if($run_term){

            echo "<script>alert('Your Term Has Been Created Successfully')</script>";

            echo "<script>window.open('index.php?view_terms','_self')</script>";
        }
    }

?>

    <?php } ?>

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
