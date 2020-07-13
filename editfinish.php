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

<?php } else {
header('location:login.php');
 } ?>