<?php include_once "functions/functions.php"?>




                <!-- Start of Page Container -->
                <div class="page-container">
                        <div class="container">
                                <div class="row">

                                        <!-- start of page content -->
                                        <div class="span8 page-content">

                                                <!-- Basic Home Page Template -->
                                                <div class="row separator">
                                                        <section class="span4 articles-list">
                                                        <?php
                                                           $search = @$_GET['s'];

                                                           if($search){?>
                                                           <h3>Posts you are looking for</h3>
                                                                <ul class="articles"> <?php
                                                                  searched_post($search);?>
                                                               </ul>
                                                                  <?php
                                                           }else{
                                                        ?>
                                                                <h3>Featured Articles</h3>
                                                                
                                                                 <ul class="articles">
                                                                <?php hotposts();
                                                           
                                                                ?>
                                                              
                                                                </ul>
                                                        </section>


                                                        <section class="span4 articles-list">
                                                                <h3>Latest Articles</h3>
                                                                <ul class="articles">
                                                                <?php recentposts();
                                                                
                                                           }?>
                                                                      
                                                                </ul>
                                                        </section>
                                                          
                                                </div>
                                        </div>
                                        <!-- end of page content -->
                                        <?php include_once "includes/sidebar.inc.php"?>   

                                        <!-- start of sidebar -->
                                       
                                        <!-- end of sidebar -->
                                </div>
                        </div>
                </div>
                <!-- End of Page Container -->