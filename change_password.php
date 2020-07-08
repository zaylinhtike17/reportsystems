<?php
include('db_controller.php');
$user_id=$_POST['id'];
$pass=md5($_POST['password']);
$query = "UPDATE  user_master set  password='$pass',updated_date=now() WHERE id='$user_id'";
mysqli_query($conn, $query);
header("location:successful.php");
?>