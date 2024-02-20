<?php
    $active= 'Shop';
    include("includes/header.php");

?>


<div id="content"><!-- #content begin-->
    <div class="container"><!-- container begin-->
        <div class="col-md-12"><!-- col-md-12 begin-->


           <ul class="breadcrumb"><!-- breadcrumb begin-->
               <li>
                    <a href="index.php">Home</a>
               </li>
               <li>
                   Terms & Conditions | Refund
               </li>
           </ul><!-- breadcrumb finish-->

        </div><!-- col-md-12 finish-->

        <div class="col-md-3"><!-- col-md-3 begin-->

            <div class="box"><!-- box begin-->
                <ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked begin-->

                    <?php
                    
                        $get_terms = "select * from terms LIMIT 0,1";

                        $run_terms = mysqli_query($con,$get_terms);

                        while($row_terms = mysqli_fetch_array($run_terms)){

                            $term_title = $row_terms['term_title'];

                            $term_link = $row_terms['term_link'];

                    ?>

                    <li class="active"><!-- link.active begin-->

                        <a data-toggle="pill" href="#<?php echo $term_link; ?>">

                            <?php echo $term_title; ?>
                    
                        </a>
                    
                    </li><!-- /link.active finish-->

                    <?php } ?>

                    <?php
                    
                        $count_terms = "select * from terms";

                        $run_count_terms = mysqli_query($con,$count_terms);

                        $count = mysqli_num_rows($run_count_terms);

                        $get_terms = "select * from terms LIMIT 1,$count";

                        $run_terms = mysqli_query($con,$get_terms);

                        while($row_terms = mysqli_fetch_array($run_terms)){

                            $term_title = $row_terms['term_title'];

                            $term_link = $row_terms['term_link'];


                        
                    
                    ?>

                    <li><!-- li begin-->

                        <a data-toggle="pill" href="#<?php echo $term_link; ?>">

                            <?php echo $term_title; ?>
                    
                        </a>
                    
                    </li><!-- li finish-->

                    <?php } ?>

                </ul><!-- nav nav-pills nav-stacked finish-->
            </div><!-- box finish-->
            
        </div><!-- col-md-3 finish-->

        <div class="col-md-9"><!-- col-md-9 begin-->
            <div class="box"><!-- box begin-->
                <div class="tab-content"><!-- tab-content begin-->

                <?php
                
                    $get_terms = "select * from terms LIMIT 0,1";

                    $run_terms = mysqli_query($con,$get_terms);

                    while($row_terms = mysqli_fetch_array($run_terms)){

                        $term_title = $row_terms['term_title'];

                        $term_desc = $row_terms['term_desc'];

                        $term_link = $row_terms['term_link'];
                   
                
                ?>

                <div id="<?php echo $term_link; ?>" class="tab-pane fade in active"><!-- tab-pane fade in active begin-->

                <h1 class="tabTitle"><?php echo $term_title; ?></h1>

                <p class="tabDesc"><?php echo $term_desc; ?></p>

                </div><!-- tab-pane fade in active finish-->

                <?php } ?>

                    <?php
                    
                        $count_terms = "select * from terms";

                        $run_count_terms = mysqli_query($con,$count_terms);

                        $count = mysqli_num_rows($run_count_terms);

                        $get_terms = "select * from terms LIMIT 1,$count";

                        $run_terms = mysqli_query($con,$get_terms);

                        while($row_terms = mysqli_fetch_array($run_terms)){

                            $term_title = $row_terms['term_title'];

                            $term_desc = $row_terms['term_desc'];

                            $term_link = $row_terms['term_link'];


                        
                    
                    ?>

                    <div id="<?php echo $term_link; ?>" class="tab-pane fade in"><!-- tab-pane fade in active begin-->
    
                    <h1 class="tabTitle"><?php echo $term_title; ?></h1>
    
                    <p class="tabDesc"><?php echo $term_desc; ?></p>
    
                    </div><!-- tab-pane fade in active finish-->

                    <?php } ?>

                </div><!-- tab-content finish-->
            </div><!-- box finish-->
        </div><!-- col-md-9 finish-->
        
    </div><!-- container finish-->
</div><!-- #content finish-->


   <?php 
    
    include("includes/footer.php");


   ?>

    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>