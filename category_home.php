   <!-- start of page content -->
   <div class="span8 page-content">

<!-- Basic Home Page Template -->
<div class="row separator">
        <section class="span4 articles-list">
                <h3>Featured Articles</h3>
                <ul class="articles">
                <?php 
                 
                 include_once "functions/functions.php";
                 
                 $id = $_GET['categoryid'];
               getPostsByCategoryID($id);
                
                 ?>

                </ul>
        </section>


        <section class="span4 articles-list">
                <h3>Latest Articles</h3>
                <ul class="articles">
                    <?php 
                 
                   
                   getPostsByCategoryID($id);
                  //recentposts();
                   
                    ?>
                       
                </ul>
        </section>
</div>
























</div>