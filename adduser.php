<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname ="reporting_system";

$dbhandle = mysqli_connect($dbhost, $dbuser, $dbpass) or die("could not connect to database");
$selected =mysqli_select_db($dbhandle,$dbname);
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$role=$_POST['role'];
	$rolename=$_POST['rolename'];
	$active=$_POST['active'];

	$query=mysqli_query($dbhandle,"SELECT * FROM user_master WHERE name='$name' OR email='$email'");
	$row=mysqli_fetch_array($query);
	if(mysqli_num_rows($query)>=1){
		if($name==$row['name']){
			$error= "name exist.";
		}
	}
}
?>