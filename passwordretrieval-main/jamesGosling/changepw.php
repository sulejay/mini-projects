<?php
include "./conn.php";

$email = $_POST['email'];
$code = $_POST['code'];
$password = $_POST['password'];
if(isset($email)&&isset($code)&&isset($password)){
    $query1 = "SELECT `id`, `email`, `password`, `code`, `phonenumber`, `address`, `registration` FROM `student` WHERE email = '{$email}' AND code = '{$code}'";
    $result = mysqli_query($conn, $query1);
    if(mysqli_num_rows($result)<1){
        exit("check your code");
    }else{
        $id = mysqli_fetch_array($result)["id"];
        $query2 = "UPDATE `student` SET `password`='$password' WHERE id = '$id'";
        mysqli_query($conn, $query2);
        echo("done");
    }
}else{
    echo("not all fields are filled");
}
?>