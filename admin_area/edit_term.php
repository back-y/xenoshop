<?php

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";
    }else{


?>

<?php

    if(isset($_GET['edit_term'])){

        $edit_id = $_GET['edit_term'];

        $get_term = "select * from terms where term_id='$edit_id'";

        $run_term = mysqli_query($con,$get_term);

        $row_term = mysqli_fetch_array($run_term);

        $term_id = $row_term['term_id'];

        $term_title = $row_term['term_title'];

        $term_desc = $row_term['term_desc'];

        $term_link = $row_term['term_link'];
    }

?>


    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <ol class="breadcrumb"><!-- breadcrumb begin -->

                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Term

                </li><!-- active finish -->

            </ol><!-- breadcrumb finish -->

        </div><!-- col-lg-12 finish -->

    </div><!-- row finish -->

    <div class="row"><!-- row begin -->

        <div class="col-lg-12"><!-- col-lg-12 begin -->

            <div class="panel panel-default"><!-- panel panel-default begin -->

                <div class="panel-heading"><!-- panel-heading begin -->

                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-money fa-fw"></i> Edit Term

                    </h3><!-- panel-title finish -->

                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal begin -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Term Title </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input value="<?php echo $term_title; ?>" name="term_title" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Term Link </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input value="<?php echo $term_link; ?>"  name="term_link" type="text" class="form-control" required>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"> Term Desc </label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <textarea name="term_desc" cols="19" rows="6" class="form-control">
                                    
                                    <?php echo $term_desc; ?>

                                </textarea>
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->

                            <label  class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input name="update" value="Update Term" type="submit" class="btn btn-primary form-control">
                                
                            </div><!-- col-md-6 finish -->
                            
                        </div><!-- form-group finish -->

                    </form><!-- form-horizontal finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->

        </div><!-- col-lg-12 finish -->
</div><!-- row finish -->

<?php

    if(isset($_POST['update'])){

        $term_title = $_POST['term_title'];

        $term_link = $_POST['term_link'];

        $term_desc = $_POST['term_desc'];

        $update_term = "update terms set term_title='$term_title',term_link='$term_link',term_desc='$term_desc' where term_id='$term_id'";

        $run_term = mysqli_query($con,$update_term);
        
        if($run_term){

            echo "<script>alert('Your Term Has Been Updated')</script>";

            echo "<script>window.open('index.php?view_terms','_self')</script>";
        }

    }

?>

<?php } ?>

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>




   