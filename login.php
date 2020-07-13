<?php
include("config/db_controller.php");
 session_start();
if(isset($_POST['login'])){
  if(!empty($_POST["member_email"]) && !empty($_POST["member_password"])){
    $email = $_POST['member_email'];
    $password = md5($_POST['member_password']);
    $query ="SELECT * FROM user_master WHERE email='$email' and password='$password'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    if (mysqli_num_rows($result) == 1){
      $_SESSION['auth']=true;
      if($row['role']==1 && $row['active']==1){
       if(isset($_POST['remember'])){
        setcookie('member_login',$email,time()+10*365*24*60*60);
        setcookie('member_password',md5($password),time()+10*365*24*60*60);
        $_SESSION["admin_email"] = $email;
      }

      else  
      {  
        if(isset($_COOKIE["member_login"]))   
        {  
         setcookie ("member_login","");  
       }  
       if(isset($_COOKIE["member_password"]))   
       {  
         setcookie ("member_password","");  
       }

     }
     session_start();
     $_SESSION['email']=$email;
     $_SESSION['id']=$row['id'];
     $_SESSION['name']=$row['name'];
     
     header("location:admin/index.php");
   }
   elseif ($row['role']==2 && $row['active']==1) {
     if(isset($_POST['remember'])){
      setcookie('email',$email,time()+10*365*24*60*60);
      setcookie('password',md5($password),time()+10*365*24*60*60);
      $_SESSION["admin_name"] = $email;

    }
    else  
    {  
      if(isset($_COOKIE["member_login"]))   
      {  
       setcookie ("member_login","");  
     }  
     if(isset($_COOKIE["member_password"]))   
     {  
       setcookie ("member_password","");  
     }

   }
   session_start();
   $_SESSION['email']=$emil;
   $_SESSION['id']=$row['id'];
   $_SESSION['name']=$row['name'];
   header("location:index.php");
 }
 else{
  $message = "You are not allowed to login!";
}
}

else{  

  $sql = "SELECT * FROM user_master WHERE email = '" . $email . "'";  

  $res = mysqli_query($conn,$sql);  

  $row= mysqli_fetch_array($res); 

  $emails = $row["email"];

  $pass = $row["password"];

  $pass =md5($pass);

  if ($email != $emails) {

    $message = " Username is wrong!"; 

  }else if($password != $pass){

   $message = "Password is wrong!";  

 }

} 

}else{

  $message = "Both Fields are required ";

}

}
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
     width:300px;  
     padding:20px;  
     background-color:#fff;  
   }  
 </style>  
</head>  
<body>     

  <div class="container box">  
   <form action="" method="post" id="frmLogin"> 
    <h3 align="center">Login</h3><br />
    <div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div>  
    <div class="form-group">  
     <label for="login">Email</label>  
     <input name="member_email" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="form-control" />  
   </div>  
   <div class="form-group">  
     <label for="password">Password</label>  
     <input name="member_password" type="password"class="form-control" />   
   </div>  
   <div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label><br>
     <a href="forget-password.php" name="forgetpassword" style="color: blue; font-size: 14px; text-decoration:none; ">Forget Password</a> <br> 
   </div>  
   <div class="form-group">  
     <div><input type="submit" name="login" value="Login" class="btn btn-success"></span></div>  
   </div>   
 </form>  
 <br />  
</div>  
</body>  
</html>