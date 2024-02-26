<?php
include "./conn.php";
include "./session.php";

$email = $_POST['email'];
$password = $_POST['password'];

if(isset($email)&&isset($password)){
    $query = "SELECT `id`, `email`, `password`, `code`, `phonenumber`, `address`, `registration` FROM `student` WHERE email = '{$email}' AND password = '{$password}'";
    $results = mysqli_query($conn, $query);

    if(mysqli_num_rows($results)>0){
        $_SESSION['email'] = $email;
        exit("success");
    }else{
        exit("invalid details");
    }
}
?>