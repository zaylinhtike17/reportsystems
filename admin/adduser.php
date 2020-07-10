<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname ="reporting_system";

$dbhandle = mysqli_connect($dbhost, $dbuser, $dbpass) or die("could not connect to database");
$selected =mysqli_select_db($dbhandle,$dbname);

 $name=$_POST['name'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $role=$_POST['role'];
  $active=1;
  if($role==1){
  	$rolename="admin";
  }
  else{
  	$rolename="member";
  }
 
  $query=mysqli_query($dbhandle,"SELECT * FROM user_master WHERE name='$name' OR email='$email'");
  $row=mysqli_fetch_array($query);
  if(mysqli_num_rows($query)==1){
    if($name==$row['name']){
      echo "name exist.";
    }
    else{
      echo "email eixst.";
    }
  }
  else{
  	$sql=mysqli_query($dbhandle,"INSERT INTO user_master (name,email,password,role,role_name,active,created_date,updated_date) VALUES ('$name','$email','$password','$role','$rolename','$active',now(),now())");
  	header("location:userlist.php");
  }
?>