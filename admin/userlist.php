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
        margin:20px 50px 10px 50px;
      }
      .main{
        background-color: white;
        margin-left: 50px;
      }
      .main button{
        margin-left: 20px;
      }
    
       #box1 {
        width: 50%;
        margin: 0px;
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
    
<div class="main">
  <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD NEW</button>
  <!-- Trigger the modal with a button -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

              <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New User</h4>
        </div>
          <form action="adduser.php" method="post">
            <div class="modal-body">
            <table class="modaltable" align="center">
              <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" id="name" required="required"></td>
              </tr>
              <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" required="required"></td>
              </tr>
              <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" required="required"></td>
              </tr>
              <tr>
                <td><label for="role">Role</label></td>
                <td> <select id="role" name="role" class="form-control">
                      <option>Select Role</option><br>
                      <option value="1">Admin</option>
                      <option value="2">Member</option>
                </td>
              </tr>  
            </table>
            <br>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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
          <td><?php echo $row['name'];?></a></td>
          <td><?php echo $row['role_name'];?></td>
          <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaledit" value="<?php echo $row['id']?>">Edit</a></button><button class="btn btn-danger"><a href="userdelete.php?id=<?php echo $row['id']?>" onClick="return confirm('are you sure you want to delete??');">Delete</a></button><input type="button" onClick="getPage(<?php echo $row['id']; ?>);" value="Detail" class="btn btn-success" /></td>

          </tr>
        <?php }

        ?>
      </tbody>

    </table>
      </div>
      <div class="modal fade" id="myModaledit" role="dialog">
    <div class="modal-dialog">

              <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New User</h4>
        </div>
          <form action="adduser.php" method="post">
            <div class="modal-body">
            <table class="modaltable" align="center">
              <?php 
              $id=$_GET['id'];
              echo $id;
              ?>
              <input type="hidden" name="userid" id="userid">
                <tr> 
            </table>
            <br>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Add User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
      <div id="box2">
       
      </div>
      
    </div>
</html>
<script type="text/javascript">
 function getPage(id) {
  jQuery.ajax({
    url: "userdetail.php",
    data:'id='+id,
    type: "POST",
    success:function(data){$('#box2').html(data);}
  });
}
getPage(1);

</script>
<?php } else {
  header('location:login.php');
} ?>