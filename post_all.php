<?php 
 //var_dump($_POST);
  include_once "db/connect.php";

  // if ($args == '' ){
    
  // $category_id = 1;
	// }
?>



                                
                                <div class="span8 page-content">
                              

                                              
<?php
include_once "functions/functions.php";

 $category_id = $_GET['categoryid'];
 if (isset($_GET['pageno'])) {
                                                
	$pageno = $_GET['pageno'];
} else {
	$pageno = 1;
}
$no_of_records_per_page = 4;
$offset = ($pageno-1) * $no_of_records_per_page;


$db_conn = dbconnect(DBHOST, DBDB, DBUSER, DBPW);
$total_pages_sql = "SELECT COUNT(*) FROM post_master pm where pm.category_id =$category_id order by pm.post_date DESC";
$result = mysqli_query($db_conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
	getpaginateAllPostsByCategoryID($category_id,$offset,$no_of_records_per_page) ;
	
	
	 ?>
	<div id="pagination">
                                              
                                                
                                                
    
                                                        <a href="category_post2.php?categoryid=1&pageno=1" class="btn">First</a>
                                                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "category_post2.php?categoryid=1&pageno=".($pageno - 1); } ?>" class="<?php if($pageno <= 1){ echo 'disabled'; } ?> btn" >Prev</a>
                                                        
                                                        <a  href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "category_post2.php?categoryid=1&pageno=".($pageno + 1); } ?>" class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> btn">Next »</a>
                                                        <a href="#?pageno=<?php echo $total_pages; ?>"  class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> btn">Last »</a>  
                                                </div>

       
 
         
 </div>
 
 


 <?php



?>

<?php 
function formPostSave($category_id ){
	
	$error_formAdd_msg = validate_formAdd_fields();
	if (count($error_formAdd_msg) > 0){
					display_error($error_formAdd_msg);
					// if error stay on page 2 with user data 
					//form_next($_POST['notes'], strtolower(pathinfo($_FILES['pic']['name'])));
					formPostAdd($category_id,$_POST['txtheading'], $_POST['txtContents']);
	}
	else{
			//if page 2 validation success , upload image and save data to db .
	save_data($category_id);
	// if save success  show summary page

	//formDisplayPosts($category_id);
//display_success();
	}
}


?>
<?php
function save_data($category_id){

    
	$db_conn = dbconnect(DBHOST, DBDB, DBUSER, DBPW);
$qry = "INSERT INTO post_master (member_id,category_id , location_id,post_heading,contents,post_date, 
          approved_by,approved_date,post_active,post_inactive_date,post_viewer_action_id,comments) 
         values(".$_SESSION['userid'].", '".$category_id."',1,'".$_POST['txtheading']."',
         '".$_POST['txtContents']."', current_timestamp,1,current_timestamp,'Y',current_timestamp,1,'test');";
	
//.$_SESSION['id']
//$db_conn->query($qry);
    
    if($db_conn->query($qry)!==true){
        echo $db_conn->error;
    }
    
//get PK from table
$post_id  = mysqli_insert_id($db_conn);   

return $post_id;

}
?>


<?php 
  // validate page 1
function validate_formAdd_fields(){
    $error_msg = array();
     echo "tst from validation";
    //Name validation
	if (!isset($_POST['txtheading'])){
		$error_msg[] = " Heading field not defined";
	} else if (isset($_POST['txtheading'])){
		$heading = trim($_POST['txtheading']);
		if (empty($heading)){
			$error_msg[] = "The  Heading field is empty";
		} else {
			if (strlen($heading) >  100){
				$error_msg[] = "The  heading field contains too many characters";
			}
		}
    }
    
    if (!isset($_POST['txtContents'])){
			$error_msg[] = " Notes field not defined";
		} else if (isset($_POST['txtContents'])){
			$txtContents = trim($_POST['txtContents']);
			if (empty($txtContents)){
				$error_msg[] = "The  Contents field is empty";
			} else {
				if (strlen($txtContents) >  65535){
					$error_msg[] = "The   Contents field contains too many characters";
				}
			}
			}
    
    
/*	if (count($error_msg) == 0){
       // if no error store session 
        store_form1_session( $name, $age);         
	} */
	return $error_msg;
} ?>

<?php function display_error($error_msg){
	echo "<p>\n";
	foreach($error_msg as $v){
		echo $v."<br>\n";
	}
	echo "</p>\n";
} ?>
