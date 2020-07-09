<?php
session_start();
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
include ('config/db_controller.php');
$uid=$_SESSION['id'];
$sql=mysqli_query($conn,"SELECT * FROM user_master as a INNER JOIN profile_details as b WHERE (a.id=b.user_id)");
$row=mysqli_fetch_assoc($sql);
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
        width: auto;
        height: auto;
       
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
    </style>  
</head>  
<body>     
<div>
  <img src="storage/images/<?php echo $row['profile_image'] ?>" style="margin-left: 10px;"alt="" height="100" width="100"><br>
  <label for="name">Name</label>
   <span><?php echo $row['name']?></span>
</div>
</body>  
</html>



<?php } else {
  header('location:login.php');
} ?>