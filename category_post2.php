  <!-- Start of Header -->
  
  <?php include_once "includes/header.inc.php"?>
                <!-- End of Header -->

                <!-- Start of Search Wrapper -->
                <?php include_once "includes/searchwrapper.inc.php"?>
                
                <!-- End of Search Wrapper -->
                <!-- Start of Page Container -->
                <form  id = "ParentForm" name ="ParentForm" method ="POST" Action ="#">
                <input type="hidden" id="hdnFormAction" name="hdnFormAction" value=""/>
                                <input type="hidden" id="hdnArgs" name="hdnArgs" value=""/>
                <div class="page-container">
                <?php
                   $c_id = $_GET['categoryid'];
                ?>
                        <div  id ="dvContainer" name ="dvContainer" class="container">
                                <div class="row">
                                   
                                   <?php
                                       include_once "db/connect.php";
                                      //var_dump($_POST) ;
                                        //echo  $_POST['hdnFormAction'];
                                        
                                      if  (isset($_POST['hdnFormAction']) )
                                      {
                                       
                                          $args = $_POST['hdnArgs'];
                                           redirectPage($_POST['hdnFormAction'], $args)     ;
                                         // include_once $_POST['hdnFormAction']  ;
                                      }
                                      else {

                                        include_once "category_home2.php" ;
                                            
                                   ?>
                                     
                                      <?php } ?>
                                      <!-- end of page content -->


                                        <!-- start of sidebar -->
                                                      
                                         <!-- End of sidebar -->

                                         <aside class="span4 page-sidebar">

<section class="widget">
        <div class="support-widget">
                <h3 class="title"><a href = 'contact.php'>Support</a></h3>
                <p class="intro">Need more support? If you did not found an answer, contact us for further help.</p>
        </div>
</section>





<?php if(isset($threads) || $threads > 3){ ?>
 <section class="widget">
        <h3 class="title">Recent Comments</h3>
        <ul id="recentcomments">
           <?php for($n = 1; $n <3; $n++){ ?>
                <li class="recentcomments"><a href="#" rel="external nofollow" class="url"><?php echo @$threads[$n]['first_name']." ". @$threads[$n]['last_name'] ;?></a>: <a href="#"><?php echo @$threads[$n]['thread_data'] ;?></a></li>
            <?php } ?>
        </ul>
 </section>
<?php } ?>

</aside>
<!-- end of sidebar -->
                                </div>
                                 
                                <div class  = "container" style = "margin-bottom:10px;">
            
            <?php  formPostAdd('','',''); ?>
          </div>
                                       
                        </div>
                </div>
                </form>
                <!-- End of Page Container -->
                 <!-- Start of Footer -->
               
                 <?php include_once "includes/footer.inc.php"?>

<!-- End of Footer -->

<?php 
 
function formPost_Delete($post_id)
{
  echo $post_id;
	$db_conn = dbconnect(DBHOST, DBDB, DBUSER, DBPW);

	$qry_post = "UPDATE post_master SET post_active = 'D' WHERE post_master_id =".$post_id.";" ;
	$rs = $db_conn->query($qry_post);
        // showQueryErrors($db_conn,$qry_post);
	
	dbdisconnect($db_conn);
	return $rs;

}

function formPost_Archive($post_id)
{
	$db_conn = dbconnect(DBHOST, DBDB, DBUSER, DBPW);

	$qry_post = "UPDATE post_master SET post_active = 'A' WHERE post_master_id =".$post_id.";" ;
	$rs = $db_conn->query($qry_post);
        // showQueryErrors($db_conn,$qry_post);
	
	dbdisconnect($db_conn);
	return $rs;

}

    
   function  redirectPage($new_page, $args)     
   {
           //echo 'test from redirect';
        switch ($new_page) {
                case "post_all.php":
                    switch ($args){
                            case 'btnViewAll' :
                                 loadPage($new_page,'');
                                 $_SESSION['user_type']  ='mbr';
                                 if ($_SESSION['user_type'] =='mbr') { 
                                    //formPostAdd('','','');
                                 }
                                 break;
                           
                            case 'btn_new_post' :
                                 loadPage($new_page,'');
                                 //formPostAdd('','','');
                                 break;

                           case 'btn_post_save' :
                                 $category_id = $_GET['categoryid'];
                                 loadPage($new_page,'');
                                 //formPostAdd($category_id,$_POST['txtheading'], $_POST['txtContents']);
                               // formPostAdd($category_id,'','');
                                 formPostSave($category_id );
                                 echo '<script type="text/javascript">', 'document.getElementById("hdnArgs").value = "btnViewAll" ;',     '</script>';
                                 echo '<script type="text/javascript">', 'document.getElementById("hdnFormAction").value ="post_all.php" ;',     '</script>';
                                 echo '<script type="text/javascript">', 'document.ParentForm.submit();',     '</script>';
                                 
                                 break;
                              //delete button postback   
                            case fnmatch('D*',$args): 
                              echo "D";
                              formPost_Delete(ltrim($args,'D'));
                              loadPage($new_page,'');
                                 //formPostAdd('','','');
                                 break;

                                  //Archive button postback   
                            case fnmatch('A*',$args): 
                            echo "A";
                            formPost_Archive(ltrim($args,'A'));
                            loadPage($new_page,'');
                               //formPostAdd('','','');
                               break;
                            // when passing with id 
                            default:
                            loadPage($new_page, $args);  

                    }
                   break; 
                case "post_master.php":
                      loadPage($new_page, $args); 
                    break;
                case "category_home.php":
                      loadPage($new_page, $args); 
                    break;
                case "green":
                    echo "Your favorite color is green!";
                    break;
                default:
                    echo "Your favorite color is neither red, blue, nor green!";
            }
     
   }

  function   loadPage($new_page, $args)
       {
              // echo 'test load page';
        include_once $new_page ;
       }

       ?>

<?php 
       function formPostAdd($category_id ,$heading ,$contents)
{      
	?>
        
	
	 <h3> New Post Entry Page </h3>
	
	 
				
	 <label for="heading">Heading</label>  
		<input type="text" class = "form-control" style = "width:80%;height:3%;"  id ="txtheading" name="txtheading" value= "<?php echo  $heading ?>"></input>
		<br>
				  
        

				 <label for="txtContents">Content</label>
		<textarea id="txtContents"  class = "form-control"  style = "width:80%;height:20%;"  name="txtContents"  ><?php echo  $contents ?></textarea>
	
				 		
				 
				 <br>
				 
				 <input type="submit" class = "btn btn-primary" id ="btn_post_save" name ="btn_post_save"  onclick ="currentPage(this,'post_all.php');"  value="Save" />
				 <input type="submit" class = "btn btn-primary" name ="Cancel" value="Cancel"/>
				 
			
	 
	<?php
    
}
?> 
<script language ="Javascript" type ="text/javascript">
 function clearform()
 {
          
        document.getElementById("hdnArgs").value = 'btnViewAll' ;
                                   document.getElementById("hdnFormAction").value ='post_all.php' ;
                            
                                  // alert(document.getElementById("hdnFormAction").value);
                                   document.ParentForm.submit();
 }
</script>