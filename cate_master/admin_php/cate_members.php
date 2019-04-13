<?php 
include 'conn.php';

$qry_member = "SELECT * FROM user ORDER BY user_name";

$result = $conn->query($qry_name);

while($row = mysqli_fetch_array($qry_member)){

    $mem_id = $row["user_id"];
    $mem_name = $row['user_name'];
    $mem_pswd = $row['password'];
    $mem_type = $row['user_type'];
    $created_by = $row['created_by'];
    $mem_datetime=$row['created_date'];

    $return_arr[] = array("mem_id" => $cate_id,
                    "mem_name" => $cate_name,
                    "cate_des"=>$cate_des,
                    "created_by" => $created_by,
                    "cate_datetime" => date($cate_datetime));
}

echo json_encode($return_arr);
?>