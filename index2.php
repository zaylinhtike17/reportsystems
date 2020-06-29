 <?php
    $auth =isset($_SESSION['auth']);
    include("header.php");
    $auth =isset($_SESSION['auth']);
    $name =isset($_SESSION['name']);
    $id =isset($_SESSION['id']);
?>

<?php if ($auth) {?>
<!DOCTYPE html>
<html>
    <head>
        <title>Report System</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="index.php" method="post">
            <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD NEW</button>
        <button class="btn btn-info" style="float: right; color:"><a href="adminfinishreport.php" class="new" style="display: inline; text-align: center;color: white; text-decoration: none;">Go To Finish Report</a></button><br>
        </form>
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
                      <td><label for="uid">User ID</label></td>
                      <td><input type="number" name="uid" id="uid" hidden="hidden"><?php echo $_SESSION['id']?></td>
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
          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
      </div>
    </body>
</html>
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      load_data(page);
    });

  });
</script>
<?php } else {?>
<h1>Login</h1>
<form action="login.php" method="post">
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="login">
    <button><a href="register.php" style="text-decoration: none;">Register</a></button>
</form> 
<?php } ?>