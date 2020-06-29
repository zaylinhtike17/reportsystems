<?php
session_start();
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);    
?>
 <?php if ($auth) {?>
<html>
<head>
  <title>PHP CRUD with Search and Pagination</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<h2 align="center">Reporting system</h2><br>
  <div class="conatiner">
        <h4 style="display: inline; margin:40px">Finish Report Form</h4><br>
        <label class="label" for="uname" style="font-size: 20px; color: blue; margin:10px 1px 10px 30px;"> Profile:</label>
        <span style="font-size: 25px; color: blue;text-align:left;"><?php echo $_SESSION['name']?></span>
        <a href="logout.php" class="new" style="text-align: center; float: right;font-size: 15px; margin:10px 50px 10px 5px;">LOG OUT</a>
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