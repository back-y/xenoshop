<?php

    $aMan = array();

    $aCat = array();

    $aPcat = array();

    //  begin this is for manufacturers //

    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aMan[(int)$sVal] = (int)$sVal;

            }

        }

    }
    

    //  finish this is for manufacturers //

    //  begin this is for categories //

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aCat[(int)$sVal] = (int)$sVal;

            }

        }

    }
    

    //  finish this is for categories //

    //  begin this is for product_categories //

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aPcat[(int)$sVal] = (int)$sVal;

            }

        }

    }
    

    //  finish this is for product_categories //

?>

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu begin-->
    <div class="panel-heading"><!-- panel-heading begin-->
    
        <h3 class="panel-title"><!-- panel-title begin-->
            
            Manufacturers

            <div class="pull-right"><!-- pull-right begin-->

                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show begin-->

                        Hide


                    </span><!-- nav-toggle hide-show finish-->
            
                </a>

            </div><!-- pull-right finish-->
        
        </h3><!-- panel-title finish-->

    </div><!-- panel-heading finish-->

<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data begin-->

    <div class="panel-body"><!-- panel-body 1 begin-->
        <div class="input-group"><!-- input-group begin-->

            <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-manufacturer" 
            data-action="filter" placeholder="Filter Manufacturer">

                <a class="input-group-addon"><!-- input-group-addon begin-->
                    
                    <i class="fa fa-search"></i>
                
                </a><!-- input-group-addon finish-->
        
        </div><!-- input-group finish-->

        </div><!-- panel-body 1 finish-->

    <div class="panel-body scroll-menu"><!-- panel-body 2 begin-->

        <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer"><!-- nav nav-pills nav-stacked category-menu begin-->


            <?php 
            
                $get_manufacturer = "select * from manufacturers where manufacturer_top='yes'";

                $run_manufacturer = mysqli_query($con,$get_manufacturer);

                while($row_manufacturer = mysqli_fetch_array($run_manufacturer)){

                    $manufacturer_id = $row_manufacturer['manufacturer_id'];

                    $manufacturer_title = $row_manufacturer['manufacturer_title'];    

                    $manufacturer_image = $row_manufacturer['manufacturer_image'];

                    if($manufacturer_image == ""){

                    }else{

                        $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";


                    }

                    echo "
                    
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>
                   
                        <a>

                            <label> 
                        
                                <input ";

                                if(isset($aMan[$manufacturer_id])){

                                    echo "checked='checked'";

                                }

                                
                              echo "  value='$manufacturer_id' type='checkbox' class='get_manufacturer' 
                                name='manufacturer'>
                                
                                <span>

                                $manufacturer_image
                                $manufacturer_title

                                </span>

                            </label> 
                        
                        </a>

                    </li>
                   
                    ";
                }
                
            
                $get_manufacturer = "select * from manufacturers where manufacturer_top='no'";

                $run_manufacturer = mysqli_query($con,$get_manufacturer);

                while($row_manufacturer = mysqli_fetch_array($run_manufacturer)){

                    $manufacturer_id = $row_manufacturer['manufacturer_id'];

                    $manufacturer_title = $row_manufacturer['manufacturer_title'];    

                    $manufacturer_image = $row_manufacturer['manufacturer_image'];

                    if($manufacturer_image == ""){

                    }else{

                        $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";


                    }

                    echo "
                    
                    <li class='checkbox checkbox-primary'>
                   
                        <a>

                        <label> 
                    
                            <input ";

                            if(isset($aMan[$manufacturer_id])){

                                echo "checked='checked'";

                            }

                            
                          echo "  value='$manufacturer_id' type='checkbox' class='get_manufacturer' 
                            name='manufacturer'>
                            
                            <span>

                            $manufacturer_image
                            $manufacturer_title

                            </span>

                        </label> 
                        
                        </a>

                    </li>
                   
                    ";
                }
                
            
            ?>

    

        </ul><!-- ul nav-pills nav-stacked category-menu finish-->
    </div><!-- panel-body 2 finish-->

    </div><!-- panel-collapse collapse-date finish-->

</div><!-- panel panel-default sidebar-menu finish-->


<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu begin-->
    <div class="panel-heading"><!-- panel-heading begin-->
    
        <h3 class="panel-title"><!-- panel-title begin-->
            
            Categories

            <div class="pull-right"><!-- pull-right begin-->

                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show begin-->

                        Hide


                    </span><!-- nav-toggle hide-show finish-->
            
                </a>

            </div><!-- pull-right finish-->
        
        </h3><!-- panel-title finish-->

    </div><!-- panel-heading finish-->

<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data begin-->

    <div class="panel-body"><!-- panel-body 1 begin-->
        <div class="input-group"><!-- input-group begin-->

            <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-cat" 
            data-action="filter" placeholder="Filter Categories">

                <a class="input-group-addon"><!-- input-group-addon begin-->
                    
                    <i class="fa fa-search"></i>
                
                </a><!-- input-group-addon finish-->
        
        </div><!-- input-group finish-->

        </div><!-- panel-body 1 finish-->

    <div class="panel-body scroll-menu"><!-- panel-body 2 begin-->

        <ul class="nav nav-pills nav-stacked category-menu" id="dev-cat"><!-- nav nav-pills nav-stacked category-menu begin-->


            <?php 
            
                $get_cat = "select * from categories where cat_top='yes'";

                $run_cat = mysqli_query($con,$get_cat);

                while($row_cat = mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['cat_id'];

                    $cat_title = $row_cat['cat_title'];    

                    $cat_image = $row_cat['cat_image'];

                    if($cat_image == ""){

                    }else{

                        $cat_image = "<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp;";


                    }

                    echo "
                    
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>
                   
                        <a>

                        <label> 
                    
                            <input ";

                            if(isset($aCat[$cat_id])){

                                echo "checked='checked'";

                            }

                            
                          echo "  value='$cat_id' type='checkbox' class='get_cat' 
                            name='cat'>
                            
                            <span>

                            $cat_image
                            $cat_title

                            </span>

                        </label> 
                        
                        </a>

                    </li>
                   
                    ";
                }
                
            
                $get_cat = "select * from categories where cat_top='no'";

                $run_cat = mysqli_query($con,$get_cat);

                while($row_cat = mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['cat_id'];

                    $cat_title = $row_cat['cat_title'];    

                    $cat_image = $row_cat['cat_image'];

                    if($cat_image == ""){

                    }else{

                        $cat_image = "<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp;";


                    }

                    echo "
                    
                    <li class='checkbox checkbox-primary'>
                   
                        <a>

                        <label> 
                    
                            <input ";

                            if(isset($aCat[$cat_id])){

                                echo "checked='checked'";

                            }

                            
                          echo "  value='$cat_id' type='checkbox' class='get_cat' 
                            name='cat'>
                            
                            <span>

                            $cat_image
                            $cat_title

                            </span>

                        </label> 
                        
                        </a>

                    </li>
                   
                    ";
                }
                
            
            ?>

    

        </ul><!-- ul nav-pills nav-stacked category-menu finish-->
    </div><!-- panel-body 2 finish-->

    </div><!-- panel-collapse collapse-data finish-->

</div><!-- panel panel-default sidebar-menu finish-->


<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu begin-->
    <div class="panel-heading"><!-- panel-heading begin-->
    
        <h3 class="panel-title"><!-- panel-title begin-->
            
            Product Categories

            <div class="pull-right"><!-- pull-right begin-->

                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show begin-->

                        Hide


                    </span><!-- nav-toggle hide-show finish-->
            
                </a>

            </div><!-- pull-right finish-->
        
        </h3><!-- panel-title finish-->

    </div><!-- panel-heading finish-->

<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data begin-->

    <div class="panel-body"><!-- panel-body 1 begin-->
        <div class="input-group"><!-- input-group begin-->

            <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-p_cat" 
            data-action="filter" placeholder="Filter Product Categories">

                <a class="input-group-addon"><!-- input-group-addon begin-->
                    
                    <i class="fa fa-search"></i>
                
                </a><!-- input-group-addon finish-->
        
        </div><!-- input-group finish-->

        </div><!-- panel-body 1 finish-->

    <div class="panel-body scroll-menu"><!-- panel-body 2 begin-->

        <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cat"><!-- nav nav-pills nav-stacked category-menu begin-->


            <?php 
            
                $get_p_cat = "select * from product_categories where p_cat_top='yes'";

                $run_p_cat = mysqli_query($con,$get_p_cat);

                while($row_p_cat = mysqli_fetch_array($run_p_cat)){

                    $p_cat_id = $row_p_cat['p_cat_id'];

                    $p_cat_title = $row_p_cat['p_cat_title'];    

                    $p_cat_image = $row_p_cat['p_cat_image'];

                    if($p_cat_image == ""){

                    }else{

                        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";


                    }

                    echo "
                    
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>
                   
                        <a>

                            <label> 
                        
                                <input ";

                                if(isset($aPcat[$p_cat_id])){

                                    echo "checked='checked'";

                                }

                                
                            echo "  value='$p_cat_id' type='checkbox' class='get_p_cat' 
                                name='p_cat'>
                                
                                <span>

                                $p_cat_image
                                $p_cat_title

                                </span>

                            </label> 
                        
                        </a>

                    </li>
                   
                    ";
                }
                
            
                $get_p_cat = "select * from product_categories where p_cat_top='no'";

                $run_p_cat = mysqli_query($con,$get_p_cat);

                while($row_p_cat = mysqli_fetch_array($run_p_cat)){

                    $p_cat_id = $row_p_cat['p_cat_id'];

                    $p_cat_title = $row_p_cat['p_cat_title'];    

                    $p_cat_image = $row_p_cat['p_cat_image'];

                    if($p_cat_image == ""){

                    }else{

                        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";


                    }

                    echo "
                    
                    <li class='checkbox checkbox-primary'>
                   
                        <a>

                            <label> 
                        
                                <input ";

                                if(isset($aPcat[$p_cat_id])){

                                    echo "checked='checked'";

                                }

                                
                            echo "  value='$p_cat_id' type='checkbox' class='get_p_cat' 
                                name='p_cat'>
                                
                                <span>

                                $p_cat_image
                                $p_cat_title

                                </span>

                            </label> 
                        
                        </a>

                    </li>
                   
                    ";
                }
                
            
            ?>

    

        </ul><!-- ul nav-pills nav-stacked category-menu finish-->
    </div><!-- panel-body 2 finish-->

    </div><!-- panel-collapse collapse-data finish-->

</div><!-- panel panel-default sidebar-menu finish-->

