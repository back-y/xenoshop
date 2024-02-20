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
                   Shop
               </li>
           </ul><!-- breadcrumb finish-->

        </div><!-- col-md-12 finish-->


           <div class="col-md-3"><!-- col-md-3 begin-->

                        
                <?php 
                    
                    include("includes/sidebar.php");


                ?>

           </div><!-- col-md-3 finish-->

           <div class="col-md-9"><!-- col-md-9 begin-->
                <div class='box'><!-- box begin-->
                     <h1>Shop</h1>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                         Magni quod iure ducimus doloribus illum maiores ab odit praesentium nulla, 
                         dolores cumque quibusdam nobis, vel ad earum aut ipsum ullam amet!
                    </p>
                </div><!-- box finish-->
                                

            <div id="products" class="row"><!-- row begin-->

            <?php getProducts(); ?>

            </div><!-- row finish-->

                <center>
                    <ul class="pagination"><!-- pagination begin-->
                    

                      <?php getPaginator(); ?>


                    </ul><!-- pagination finish-->
                </center>

            </div><!-- col-md-9 finish-->

            <div id="wait" style="position:absolute;top:40%;left:45%;padding: 200px 100px 100px 100px;"></div>
    </div><!-- container finish-->
</div><!-- #content finish-->


   <?php 
    
    include("includes/footer.php");


   ?>

    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script>

        $(document).ready(function(){
            
            // Hide and show sidebar toggle //

            $('.nav-toggle').click(function(){

                $('.panel-collapse,.collapse-data').slideToggle(700,function(){

                    if($(this).css('display')=='none'){

                        $(".hide-show").html('Show');

                    }else{

                        $(".hide-show").html('Hide');

                    }

                });

            });

            // Finnish Hide and show sidebar toggle //


            // Search Filters | by latter //

            $(function(){

                $.fn.extend({
                    
                    filterTable: function(){

                        return this.each(function(){

                            $(this).on('keyup',function(){

                                var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handle = $(target),
                                rows = handle.find('li a');

                                if(search == ''){

                                    rows.show();

                                }else{

                                    rows.each(function(){


                                        var $this = $(this);

                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : 
                                        $this.show();

                                    });

                                }

                            });

                        });

                    }

                });

                $('[data-action="filter"][id="dev-table-filter"]').filterTable();

            });

            // Finnish Search Filters | by latter //

        });

    </script>


    <script>

        $(document).ready(function(){

            // begin getProducts function //

            function getProducts(){

            // begin code for manufacturers //

                var sPath = '';

                var aInputs = $('li').find('.get_manufacturer');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs,function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'man[]=' + aKeys[i]+'&';

                    }

                }

                

            // finish code for manufacturers //

            // begin code for product categories //

                var aInputs = Array();

                var aInputs = $('li').find('.get_p_cat');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs,function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

                    }

                }

                

            // finish code for product categories //

            // begin code for categories //

                var aInputs = Array();

                var aInputs = $('li').find('.get_cat');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs,function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'cat[]=' + aKeys[i]+'&';

                    }

                }

                

                // finish code for categories //
                

                // Loader when loading begin//


                $('#wait').html('<img src="images/load.gif"');
                

                // Loader when loading finish //

                $.ajax({

                    url:"load.php",

                    method:"POST",

                    data: sPath+'sAction=getProducts',

                    success:function(data){

                        $('#products').html('');

                        $('#products').html(data);

                        $('#wait').empty();

                    }


                });

                $.ajax({

                    url:"load.php",

                    method:"POST",

                    data: sPath+'sAction=getPaginator',

                    success:function(data){

                        $('.pagination').html('');

                        $('.pagination').html(data);

                    }


                });
            }

            
            // finish getProducts function //

            $('.get_manufacturer').click(function(){

                getProducts();

            });

            $('.get_p_cat').click(function(){

                getProducts();

            });

            $('.get_cat').click(function(){

                getProducts();

            });


        });

    </script>

    
</body>
</html>