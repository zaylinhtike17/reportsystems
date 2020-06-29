<?php
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
include("db_controller.php");
$id = $_SESSION['id'];
	$uid = $_GET['uid'];
	$date =$_POST['date'];
	$mplan =$_POST['mplan'];
	$eplan =$_POST['eplan'];
	$sql = "UPDATE  plan_report set  user_id='$id',ndate='$date', morning_plan='$mplan',evening_plan='$eplan' ,updated_date=now() WHERE uid=$uid";
	
mysqli_query($conn, $sql);
header("location: index.php"); 
?>