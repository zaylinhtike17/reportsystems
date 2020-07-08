<?php
session_start();
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);    
$email =isset($_SESSION['email']);    
include ('db_controller.php');
$uid=$_SESSION['id'];
$sql=mysqli_query($conn,"SELECT * FROM profile_details WHERE user_id='$uid'");
$row=mysqli_fetch_assoc($sql);
?>
<?php if ($auth) {?>
<html>
<head>
  <title>Report System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<h2 align="center">Reporting system</h2><br>
  <div class="conatiner">
        <h4 style="display: inline; margin-left: 40px;">Plan Report Form</h4><br>
        <label class="label" for="uname" style="font-size: 20px; color: blue; margin:10px 1px 10px 30px;">Profile:</label>
        <a href="profile.php" style="font-size: 20px; color: blue;text-align:left;"><?php echo $_SESSION['name']?> <img src="images/<?php echo $row['profile_image'] ?>" style="margin-left: 10px;"alt="" height="20" width="20"></a></span>
      
        <a href="logout.php" class="new" style="text-align: center; float: right;font-size: 15px; margin:10px 40px 10px 0px;">LOG OUT</a>
        <hr style="background-color:black;height: 3px;">

      </div>
    </div>
  </div>
</div>    
</div>
</body>
</html>
<style type="text/css">
  .modal-body tr, td {
    padding: 3px;
  }
  label{
    margin:10px 30px 10px 30px;
  }
</style>
<?php } else {
header('location:login.php');
 } ?>