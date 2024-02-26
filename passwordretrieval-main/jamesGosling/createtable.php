<?php
include "./conn.php";


$query = "CREATE TABLE student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255),
    code VARCHAR(255),
    phonenumber VARCHAR(255),
    address VARCHAR(255),
    registration VARCHAR(255)
)";

if(mysqli_query($conn, $query)){
	echo("Created table");
}
?>