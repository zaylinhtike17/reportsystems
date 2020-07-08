<?php
include 'db_controller.php';
$id = $_POST['id'];
	$pass =md5( $_POST['password']);
  	$query=mysqli_query($conn,"SELECT * FROM user_master where id='$id'");
  	$row=mysqli_fetch_assoc($query);
  	$password=$row['password'];
 	if($pass!=$password){
 		$message="Password is wrong";
 		header("location:profile.php");
 	}
 	else{

  $phone = $_POST['phone'];
  $city = $_POST['city'];  
  $township = $_POST['townships'];
  $photo = $_FILES['photo']['name'];
  $tmp = $_FILES['photo']['tmp_name'];
  $query=mysqli_query($conn,"SELECT city_name FROM city WHERE id='$city'");
  $row=mysqli_fetch_assoc($query);
  $rcity=$row['city_name'];
  if(file_exists($_FILES['photo']['name'])){
  	echo "Image is exists";
  	header("location:profile.php");
  }
  else{
  if($photo) {
    move_uploaded_file($tmp, "images/$photo");
  }
  $sql = "INSERT INTO profile_details (
    user_id, phone_no, township, city,
    profile_image
  ) VALUES (
    '$id', '$phone', '$township', '$rcity', '$photo'
  )";

  mysqli_query($conn, $sql);

  header("location: adminpanel.php");
}

}
?>