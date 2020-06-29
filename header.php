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
        <h4 style="display: inline; margin-left: 40px;">Plan Report Form</h4><br>
        <label class="label" for="uname" style="font-size: 20px; color: blue; margin:10px 1px 10px 30px;">Profile:</label>
        <span style="font-size: 20px; color: blue;text-align:left;"><?php echo $_SESSION['name']?></span>
        
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
<?php }?>