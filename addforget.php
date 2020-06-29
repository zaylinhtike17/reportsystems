<?php
include('db_controller.php');

$token=$_POST['token'];
$user_id=$_POST['id'];
$email=$_POST['email'];
$pass=md5($_POST['password']);
$status=1;
$sql = "UPDATE  user_master set  password='$pass',updated_date=now() WHERE id='$user_id'";
mysqli_query($conn, $sql);
header("location:login.php");
?>