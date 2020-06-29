<?php
include('db_controller.php');
$user_id=$_POST['id'];
$email=$_POST['email'];
$token=$_POST['token'];
$status=1;
$sql="INSERT INTO forget_password (user_id,email,hash_code,status,created_date,updated_date) VALUES ('$user_id','$email','$token','$status',now(),now())";
  mysqli_query($conn, $sql);
?>
<?php
include('db_controller.php');
$user_id=$_POST['id'];
$pass=md5($_POST['password']);
$query = "UPDATE  user_master set  password='$pass',updated_date=now() WHERE id='$user_id'";
mysqli_query($conn, $query);
header("location:login.php");

?>
