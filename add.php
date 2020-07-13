<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname ="reporting_system";

$dbhandle = mysqli_connect($dbhost, $dbuser, $dbpass) or die("could not connect to database");
$selected =mysqli_select_db($dbhandle,$dbname);
session_start();

$id =$_SESSION['id'];
$date =$_POST['date'];
$mplan =$_POST['mplan'];
$eplan =$_POST['eplan'];
$sql = "INSERT INTO plan_report (user_id, ndate,morning_plan,evening_plan,created_date,updated_date) VALUES ('$id','$date','$mplan','$eplan',now(),now())";
mysqli_query($dbhandle, $sql);
header("location: index.php");
?>

