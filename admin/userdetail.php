<?php
require("config/db_controller.php");
session_start();
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
$uid=$_REQUEST['id'];
$query = mysqli_query($conn,"SELECT * FROM user_master INNER JOIN profile_details as b WHERE $uid=b.user_id") ;
$rows=mysqli_fetch_assoc($query);


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
      .container {
        margin:20px 50px 10px 50px;
      }
      .main{
        background-color: white;
        margin-left: 50px;
      }
      .container div {
        float: left;
        width: auto;
        height: auto;
      }
       #box1 {
        width: 50%;
      }
      #box2 {
        
        margin-left:30px; 
        margin-top: 20px;
        width: 20%;
      }
    #box1 th,td{
        text-align:center;
      }
      #box1 button{
         margin:3px 10px 3px 10px;
      }
      .tablebody{
        margin-top:20px;width:100%;height: 20%;
        padding: 10px;
        border-spacing:10px; 
      }
         .modaltable td{
        text-align:left;
      }
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
</head>  
<body>     
<div>
  <img src="storage/images/<?php echo $rows['profile_image'] ?>" style="margin-left: 10px;"alt="" height="100" width="100"><br>
  
   <span><?php echo $rows['name']?></span>
</div>
</body>  
</html>



<?php } else {
  header('location:login.php');
} ?>

