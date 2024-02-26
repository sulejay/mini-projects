<?php
include "./session.php";
include "./conn.php";

if(!isset($_SESSION['email'])){
    exit ("login");
}

$email = $_SESSION['email'];
$phonenumber =  $_POST['phonenumber'];
$address = $_POST['address'];
$regnumber = $_POST['regnumber'];

$query1 = "SELECT `id`, `email`, `password`, `code`, `phonenumber`, `address`, `registration` FROM `student` WHERE email = '{$email}'";
$results = mysqli_query($conn, $query1);
$arr = mysqli_fetch_array($results);
$id = $arr["id"];

$query2 = "UPDATE `student` SET `phonenumber`='{$phonenumber}',`address`='{$address}',`registration`='{$regnumber}' WHERE id='{$id}'";
if(mysqli_query($conn, $query2)){
    echo("done");
}
?>