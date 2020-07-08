<?php
session_start();
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
$email =isset($_SESSION['email']);
include ('db_controller.php');
$uid=$_SESSION['id'];
$sql="SELECT * FROM city";
$cities=mysqli_query($conn,$sql);
?>
<?php if ($auth) {?>
<html>  
<head>  
  <title>REPORT SYSTEM</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="/js/jquery.js"></script>
  <style>  
    body  
    {  
     margin:20px;  
     padding:0;  
     background-color:#f1f1f1;  
   }  
   .box  
   {  
     width:500px;  
     padding:20px;  
     background-color:#fff;  
   }  
   .apply{
    

   }
 </style>  
</head>  
<body>     

  <div class="container box">  
   <form action="profile_details.php" method="post" enctype="multipart/form-data"> 
    <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal" style="float: right; font-size:12px; width:27%;display: inline;">Change Password</button>
    <h3 align="center" style="margin-left: 50px;">Profile Detail</h3>
    <div class="form-group">  
   	<input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']?>"> 	
     <label for="name">Name</label>  
     <input name="name" type="text" disabled="disabled" class="form-control" value="<?php echo $_SESSION['name']?>" />  
   </div>  
   <div class="form-group">  
     <label for="email">Email</label>  
     <input name="email" type="text" disabled="disabled" class="form-control" value="<?php echo $_SESSION['email']?>"/>   
   </div>  
   <div class="form-group">  
    <label for="phone">Phone No</label>
     <input type="tel" id="phone" name="phone" class="form-control" placeholder="09-XXX-XXX-XXX">   
   </div>  
    <div class="form-group">  
     <label for="city">City</label>  
      <select id="city" name="city" class="form-control">
        <option>Select City</option>
       <?php
       	foreach($cities as $city){
       		echo "<option id='".$city['id']."' name='".$city['city_name']."' value='".$city['id']."'>".$city['city_name']."</option>";
       	}
       ?>
      </select> 
    </div>
     <div class="form-group">  
     <label for="townships">Townships</label>  
      <select id="townships" name="townships" class="form-control"/>
      
      </select> 
    </div>
      <div class="form-group">  
    <label for="role">User Role</label>
     <input type="text" id="role" name="role" disabled="disabled" class="form-control"/>   
   </div> 
      <div class="form-group">  
    <label for="photo">Profile Image</label>
     <input type="file" id="photo" name="photo" class="form-control"/>   
   </div> 
   	<div class="text-danger"><?php?></div>
     <div class="form-group">  
     <input type="password" id="password" name="password" class="form-control" placeholder="type current password" required="required" />   
   </div> 
   <div class="form-group">  
     <div class="apply" style="text-align:center;margin-top: 30px;"><input type="submit" name="apply" value="Apply" class="btn btn-success" style="width: 150px; height: 40px;"></span></div>  
   </div>   
 </form>  
 <br />  
 <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
					<form method="post" action="change_password.php" class="form">
						<input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']?>">
						<div class="form-group">  
					     <label for="password">Current Password</label>  
					     <input name="oldpassword" type="password" class="form-control" id="oldtxtPassword" required="required" />   
					    </div>
					    <div class="form-group">  
					     <label for="password">Password</label>  
					     <input name="password" type="password" class="form-control" id="txtPasswordf" required="required" />   
					    </div> 
					    <div class="form-group">  
					     <label for="password">Confirm Password</label>  
					     <input name="password" type="password" class="form-control" id="txtConfirmPassword" required="required" />   
					    </div>
					    
					    <input type="submit" id="btnSubmit" name="submit" class="btn btn-success" value="Confirm" onClick="return Validate()" style="margin-left: 250px;">
					</form>
              </div>
            </div>

          </div>
</div>  
</body>  
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#city").on('change',function(){
			$("#city").val();
			var cid= $("#city").val();
			$.ajax({
				method:"POST",
				url:"data.php",
				data:{id:cid},
				dataType:"html",
				success:function(data){
					$("#townships").html(data);
				}
			});
		});
});
	function Validate() {
        var oldpassword = document.getElementById("oldtxtPassword").value;
        var password = document.getElementById("txtPasswordf").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if(oldpassword==password){
        	alert("Old and new password are same");
        	return false;
        }
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }


        return true;
    }
</script>
<?php } else {
header('location:login.php');
 } ?>