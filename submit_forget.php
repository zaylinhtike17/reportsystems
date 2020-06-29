<?php
include('db_controller.php');
$user_id=$_GET['id'];
$email=$_GET['email'];
$token=$_GET['token'];
$status=1;
$sql="INSERT INTO forget_password (email,hash_code,status,created_date,updated_date) VALUES ('$email','$token','$status',now(),now())";
mysqli_query($conn, $sql);
header("location:login.php");

?>

