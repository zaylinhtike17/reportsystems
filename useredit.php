<?php
include ("header.php"); 
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
?>
<?php if ($auth) {?>
<?php
include("config/db_controller.php");

	$id = $_SESSION['id'];
	$uid = $_GET['id'];
	$result = mysqli_query($conn, "SELECT * FROM user_master WHERE id='$uid'");
	$row = mysqli_fetch_assoc($result);
	$active=$row['active'];
if(!empty($_POST["submit"])) {
	$name =$_POST['name'];
	$email =$_POST['email'];
	$rolename=$_POST['rolename'];

	if($rolename=='Admin'){
		$role=1;
	}
	else{
		$role=2;
	}
		$sql = "UPDATE  user_master set  name='$name', email='$email',role='$role',role_name='$rolename',active='$active',updated_date=now() WHERE id='$uid'";
	
mysqli_query($conn, $sql);
header("location: userlist.php"); 
	
}
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
      }

/* Firefox */
      input[type=number] {
      -moz-appearance: textfield;
      }
</style>
<body>
	<div class="container">
	<form action="" method="post">
		<table align="center" style="width:40% ;height:50%; margin-top:50px; margin-left: 350px;" >

			<input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']?>">
			<input type="hidden" name="userid" id="userid" value="<?php echo $row['id']?>">
			 <tr>
	                <td><label for="name">Name</label></td>
	                <td><input type="text" name="name" id="name" value="<?php echo $row['name']?>"></td>
	              </tr>
	              <tr>
	                <td><label for="email">Email</label></td>
	                <td><input type="email" name="email" id="email" value="<?php echo $row['email']?>"></td>
	              </tr>
	              <tr>
                	<td>
                	  <label for="rolename">Role</label></td>
                	  <td>
                	  <select id="rolename" name="rolename">
                      <option<?php if ($row['role_name']=='admin') echo ' selected="selected"'?>>admin</option>
                      <option<?php if ($row['role_name']=='member') echo ' selected="selected"'?>>member</option>
                	</td>
	              </tr>  
		</table>
	<br>
	<button type="submit" name="submit"  class="btn btn-info" style="margin-left: 570px;" value="Update Now">Update Plan</button>	
	</form>
</div>
</body>
</html>
<?php } else {
header('location:login.php');
 } ?>