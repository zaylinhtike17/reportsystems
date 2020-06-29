<?php
include("db_controller.php");

if($_POST)
{
	$email = $_POST['email'];
	$query=mysqli_query($conn, "select * from user_master where email='{$email}'");
	$count = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	$token=bin2hex(random_bytes(8));
	
	if($count>0){
		require 'PHPMailer-master/PHPMailerAutoload.php';
		$mail = new PHPMailer();

  //Enable SMTP debugging.
		$mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
		$mail->isSMTP();
  //Set SMTP host name
		$mail->Host = "smtp.gmail.com";

  //Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = TRUE;
  //Provide username and password
		$mail->Username = "capital.zaylinhtike@gmail.com";
		$mail->Password = "zaylinhtike123";
  //If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
  //Set TCP port to connect to

		$mail->From = "capital.zaylinhtike@gmail.com";
		$mail->FromName = "zay";

		$mail->addAddress($row["email"]);

		$mail->isHTML(true);

		$mail->Subject = "test mail";
		$mail->Body = "<form method='post'><a href='localhost/reportsystems/reset.php?user_id=".$row['id']."&token=".$token."'>Click To Reset password</a></form>";
		$mail->AltBody = "This is the plain text version of the email content";
		$mail->send();

		header("location:passmessage.php");
		if(!$mail->send){
			echo "Mail Error - >".$mail->ErrorInfo;
		}
	}
	else{
		$message="Email Not Found";
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
			width:500px;  
			padding:20px;  
			background-color:#fff;  
		}  
	</style>  
</head>  
<body>     

	<div class="container box">  
		<form action="" method="post" id="frmLogin"> 
			<h3 align="center">Recover your password</h3><br />
			<p>
				Please enter your email address youu used to sign up in report system and we will assit you in recovering your password
			</p>
			<div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div>  
			<div class="form-group">  
				<input name="email" type="email"class="form-control" placeholder="example@gmail.com" />  
			</div>    
			<div class="form-group" align="center">  
				<div><input type="submit" value="submit" class="btn btn-success"></span></div>  
			</div>   
		</form>  
		<br />  
	</div>  
</body>  
</html>
