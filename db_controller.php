<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "reporting_system";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die(mysqli_error());
mysqli_select_db($conn, $dbname) or die(mysqli_error());
?>
