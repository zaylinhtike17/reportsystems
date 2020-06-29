<?php
include('finishheader.php');
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
?>
<?php if ($auth) {?>
<?php
include("db_controller.php");

$id = $_SESSION['id'];
$uid = $_GET['uid'];
$result = mysqli_query($conn, "SELECT * FROM finish_report WHERE uid=$uid");
$row = mysqli_fetch_assoc($result);
if(!empty($_POST["submit"])) {
	$id = $_SESSION['id'];
	$uid = $_GET['uid'];
	$date =$_POST['date'];
	$eplan =$_POST['eplan'];
	$sql = "UPDATE  finish_report set  user_id='$id',fdate='$date',work_done='$eplan' ,updated_date=now() WHERE uid=$uid";
	
	mysqli_query($conn, $sql);
	header("location: finishreport.php"); 
}
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<form action="" method="post">
	<table align="center" style="width:50% ;height:40%; margin-top:50px; margin-left: 300px;" >

		<tr>
			<td><label for="id">User ID</label></td>
			<td><input type="number" name="id" id="id" hidden="hidden"><?php echo $_SESSION['id']?></td>
		</tr>
		<tr>
			<td><label for="userid">ID</label></td>
			<td><input type="number" name="userid" id="userid" hidden="hidden"><?php echo $row['uid']?></td></td>
		</tr>
		<tr>
			<td><label for="date">Choose Date</label></td>
			<td><input type="date" name="date" id="date" value="<?php echo $row['fdate']?>"></td>
		</tr>
		<tr>
			<td><label for="eplan">Finish Report</label></td>
			<td><textarea name="eplan" id="eplan" rows="3" cols="45"><?php echo $row['work_done']?></textarea></td>
		</tr>
		
</table>
			<button type="submit" name="submit"  class="btn btn-info" style="margin-left: 470px;" value="Update Now">Update Plan</button>	
	</form>
</div>
</body>
</html>
<?php } else {?>
	<html>  
<head>  
  <title>REPORT SYSTEM</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <style>  
    body  
    {  
     margin:150px;  
     padding:0;  
     background-color:#f1f1f1;  
   }  
   .box  
   {  
     width:500px;  
     padding:20px;  
     background-color:#fff;  
   }  
 </style>  
</head>  
<body>     

  <div class="container box">  
   <form action="login.php" method="post" id="frmLogin"> 
    <h3 align="center">Login</h3><br />
    <div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div>  
    <div class="form-group">  
     <label for="login">Username</label>  
     <input name="member_name" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="form-control" />  
   </div>  
   <div class="form-group">  
     <label for="password">Password</label>  
     <input name="member_password" type="password"class="form-control" />   
   </div>  
   <div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label>  
   </div>  
   <div class="form-group">  
     <div><input type="submit" name="login" value="Login" class="btn btn-success"></span></div>  
   </div>   
 </form>  
 <br />  
</div>  
</body>  
</html>
<?php } ?>