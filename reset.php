<?php
include ('db_controller.php');
if($_GET['token'] && $_GET['user_id'])
{
  $token=$_GET['token'];
  $user_id=$_GET['user_id'];
  $select=mysqli_query($conn,"select * from forget_password where hash_code='$token'");
  $row=mysqli_fetch_array($select);
    if($row['status']==1 && $row['hash_code']==$token){
      ?>
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
    <p>Link is expired or invalid.</p>
    <a href="login.php" class="btn btn-success">Click here to exit</a>
  </div>  
</body>  
</html>
   <?php
    }
  else{
    ?>
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
   .form {
    text-align: left; 
   }
  
 </style>  
</head>  
<body>     

  <div class="container box">  
    <form method="post" action="submit_new.php" class="form">
    <input type="hidden" name="token" value="<?php echo $token;?>">
    <input type="hidden" name="id" value="<?php echo $user_id;?>">
    <input type="hidden" name="email" value="<?php echo $row['email'];?>">
    <div class="form-group">  
     <label for="password">Password</label>  
     <input name="password" type="password"class="form-control" required="required" />   
    </div> 
    <div class="form-group">  
     <label for="password">Password</label>  
     <input name="password" type="password"class="form-control" required="required" />   
    </div>
    <input type="submit" name="submit_password" class="btn btn-success" value="Change Password">
    </form>

</div>  
</body>  
</html>
   

    <?php
  }
 
}
?>