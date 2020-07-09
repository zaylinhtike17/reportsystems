<?php
include ("header.php"); 
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
include("config/db_controller.php");
$sql=mysqli_query($conn,"SELECT * FROM user_master");

?>
<?php if ($auth) {?>
 <!DOCTYPE html>
<html>
  <head>
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
         margin:0px 10px 0px 10px;
      }
      .tablebody{
        margin-top:20px;width:100%;height: 20%;
        padding: 10px;
        border-spacing:10px; 
      }
    </style>
  </head>
  <body>
    
    <div class="container main">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Add User
      </button>
    </div>
    <div class="container">
      <div id="box1">
      <table border="1" class="tablebody">
      <thead>
        <tr>
          <th><strong>No.</strong></th>
          <th><strong>User ID</strong></th>
          <th><strong>Name</strong></th>
          <th><strong>Role Name</strong></th>
          <th><strong>Action</strong></th>

        </tr>
      </thead>
      <tbody>
      </tr>

      <?php
      $i=1; 
      foreach($sql as $row){?>

        <tr>
          <td><?php echo $i++?></td>
          <td><?php echo $row['id'];?></td>
          <td><a href="userdetail.php"><?php echo $row['name'];?></a></td>
          <td><?php echo $row['role_name'];?></td>
          <td>
            <button tyoe="button" class="btn btn-info"><a href="adminedit.php?uid=<?php echo $row['uid']?>">Edit</a></button><button class="btn btn-danger"><a href="admindelete.php?uid=<?php echo $row['uid']?>"onClick="return confirm('are you sure you want to delete??');">Delete</a></button><button tyoe="button" class="btn btn-success" id="edit">Detail</a></button></td>

          </tr>
        <?php }

        ?>
      </tbody>

    </table>
      </div>
      <div id="box2">
       
      </div>
      
    </div>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $("#edit").on('click',function(){
      $("#box2").load("userdetail.php");
    });
  });
</script>
<?php } else {
  header('location:login.php');
} ?>