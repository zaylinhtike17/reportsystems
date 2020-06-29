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
$eplan =$_POST['eplan'];
$sql = "INSERT INTO finish_report (user_id, fdate,work_done,created_date,updated_date) VALUES ('$id','$date','$eplan',now(),now())";
mysqli_query($dbhandle, $sql);
header("location: adminfinishreport.php");
?>

