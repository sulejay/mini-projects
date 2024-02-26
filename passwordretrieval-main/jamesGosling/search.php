<?php
include "./conn.php";

$regno = $_POST['regno'];
if(isset($regno)){
    $query = "SELECT `email`, `phonenumber`, `address` FROM `student` WHERE registration = '{$regno}'";
    $result = mysqli_query($conn, $query);
   if(mysqli_num_rows($result)>0){
     $arr = mysqli_fetch_array($result);
     echo(json_encode($arr));
   }else{
    $arr["found"] ="not found";
    exit(json_encode($arr));
   }
}

?>