<?php
include ("header.php"); 
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);

?>
<?php if ($auth) {?>
<?php
include("config/db_controller.php");
$id=$_SESSION['id'];

   $page=1;
    if(isset($_GET['page'])){
      $page =$_GET['page'];
    }   
    if ($page < 1) $page = 1;
$resultsPerPage = 10;
$startResults = ($page - 1) * $resultsPerPage;

        // Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

$numberOfRows = mysqli_num_rows(mysqli_query($conn,'SELECT * FROM plan_report WHERE ndate'));
$totalPages = ceil($numberOfRows / $resultsPerPage);
$sql = "SELECT * FROM user_master as a INNER JOIN plan_report as b ON (a.id=b.user_id) ORDER BY ndate DESC LIMIT $startResults, $resultsPerPage" ;
$rows=$startResults+1;
$res_data = mysqli_query($conn,$sql);
mysqli_close($conn);
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <div class="card">

    <div class="form-group">
      <div class="table-responsive" id="dynamic_content">

        <!-- Trigger the modal with a button -->
        <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD NEW</button>
        <button type="button"  class="btn btn-info"><a href="userlist.php" style="text-align: center;color: white; text-decoration: none;">User List</a></button>
        <button class="btn btn-info" style="float: right;"><a href="adminfinishreport.php" class="new" style="display: inline; text-align: center;color: white; text-decoration: none;">Go To Finish Report</a></button><br>
        <div class="card-title">
         <div class="card-body" >
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">New Plan</h4>
                </div>
                <div class="modal-body">
                  <form action="adminadd.php" method="post">
                    <table cellpadding="50" cellspacing="50">
                     <tr>
                      <td><input type="hidden" name="uid" id="uid" value="<?php echo $_SESSION['id']?>"></td>
                    </tr>
                    <tr>
                      <td><label for="date">Choose Date</label></td>
                      <td><input type="date" name="date" id="date" required="required"></td>
                    </tr>
                    <tr>
                      <td><label for="mplan">Morning Plan</label></td>
                      <td><textarea name="mplan" id="mplan" required="required" rows="3" cols="48"></textarea></td>
                    </tr>

                    <tr>
                      <td><label for="eplan">Evening Plan</label></td>
                      <td><textarea name="eplan" id="eplan" required="required" rows="3" cols="48"></textarea></td>
                    </tr>
                  </table>
                  <br>
                  <button type="submit"  class="btn btn-info" style="margin-left: 250px;">ADD NEW Plan</button>
                </form>
              </div>
            </div>

          </div>
          
        </div>

      </form>
    </div>
  </div>
</div> 
  <table cellpadding="10" cellspacing="1" border="2"  style="margin-top:20px;width:100%;height: 20%" class="tablebody">
    <thead>
      <tr>
        <th><strong>#</strong></th>
        <th><strong>User Name</strong></th>
        <th><strong>Date</strong></th>
        <th><strong>Morning Plan Details</strong></th>          
        <th><strong>Evening Plan Details</strong></th>
        <th><strong>Action</strong></th>

      </tr>
    </thead>
    <tbody>
    </tr>

    <?php 
    foreach($res_data as $row){?>

      <tr>
        <td style="width:50px;height: 50px ;text-align:center;"><?php echo $rows++;?></td>
        <td style="width:50px;height: 50px ;text-align:center;"><?php echo $row['name'];?></td>
        <td style="width:50px;height: 50px ;text-align:center;"><?php echo $row['ndate'];?></td>
        <td style="width:35%;"><?php echo $row['morning_plan'];?></td>
        <td style="width:35%;"><?php echo $row['evening_plan'];?></td>
        <td>
          [<a href="adminedit.php?uid=<?php echo $row['uid']?>">Edit</a>][<a href="admindelete.php?uid=<?php echo $row['uid']?>"onClick="return confirm('are you sure you want to delete??');">Delete</a>]</td>

        </tr>
        <?php }
      
      ?>
    </tbody>

  </table>


  <div class="row ctr">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <?php
              echo '<li><a href="?page=1">First</a></li>';

              if($page > 1)
                echo '<li><a href="adminpanel.php?page='.($page - 1).'">&laquo;</a></li>';

              for($i = max(1, $page - 3); $i <= min($page + 3, $totalPages); $i++)
              {
                if($i == $page)
                  echo '<li><a href="#" class="active" style="background:#262424;color:white;"><strong>'.$i.'</strong></a></li>';
                else
                  echo '<li><a href="adminpanel.php?page='.$i.'">'.$i.'</a></li>';
              }

              if ($page < $totalPages)
                echo '<li><a href="adminpanel.php?page='.($page + 1).'">&raquo;</a></li>';

              echo '<li><a href="?page='.$totalPages.'">Last</a></li>';

              ?>
            </ul>  
          </nav>
        </div>

      </div>




</body>
</html>
<style type="text/css">
  .pagination{
    padding:10px;
    margin:0px 150px 0px 500px;
  }
  .modal-body tr, td {
    padding: 3px;
  }
  .btn{
    margin:10px 0px 10px 0px; 
  }
  th{
    text-align: center;
  }
</style>
<?php } else {
header('location:login.php');
 } ?>