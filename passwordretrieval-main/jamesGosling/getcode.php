<?php
include "./conn.php";

$email = $_POST['email'];
if(isset($email)){
    $code = "";
for($i = 0; $i<5; $i++){
    $number = rand(0,10);
    $code = $code."".$number;
}
$query1 = "SELECT `id`, `email`, `password`, `code`, `phonenumber`, `address`, `registration` FROM `student` WHERE email = '{$email}'";
$result = mysqli_query($conn, $query1);

if(mysqli_num_rows($result) > 0){
    $resultarr = mysqli_fetch_array($result);
    
    $id = $resultarr["id"];
    
    $query2 = "UPDATE `student` SET `code`='$code' WHERE id = '$id'";
    mysqli_query($conn, $query2);
        $to = $email;
            $subject = "Password retrieval code";
            $message = "Your retrieval code is ".$code;
            $headers = 'From: Group <jaysule119@gmail.com>' . "\r\n";
            $headers .="MIME-Version: 1.0" ."\r\n";
            $headers .="Content-type:text/html; charset= UTF-8"."\r\n";
            if(!mail($to, $subject,$message,$headers)){
                 
            }
    echo("done");
}else{
    $key = 'e86b841824ec4b7bb9a3ac1aa0ad2463';
$ch = curl_init();
curl_setopt_array($ch , [
    CURLOPT_URL=>"https://emailvalidation.abstractapi.com/v1/?api_key=$key&email=$email",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_FOLLOWLOCATION =>true,
]);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response,true);



if($data['deliverability']!="DELIVERABLE"){
    exit("Email is invalid");
}else{
$query3 = "INSERT INTO `student`( `email`, `code`) VALUES ('$email', '$code')";

mysqli_query($conn, $query3);

   $to = $email;
            $subject = "Password retrieval code";
            $message = "Your retrieval code is ".$code;
            $headers = 'From: Group <jaysule119@gmail.com>' . "\r\n";
            $headers .="MIME-Version: 1.0" ."\r\n";
            $headers .="Content-type:text/html; charset= UTF-8"."\r\n";
            if(!mail($to, $subject,$message,$headers)){
                 exit("problem");
            }
echo("done");
}

}


}
?>