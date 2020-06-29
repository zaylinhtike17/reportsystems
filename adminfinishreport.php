<?php
include('finishheader.php');
$auth =isset($_SESSION['auth']);
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
?>
<?php if ($auth) {?>
<?php
include("db_controller.php");
$id=$_SESSION['id'];

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$num_results_on_page = 10;
$offset = ($page-1) * $num_results_on_page;
        // Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}


$total_pages_sql = "SELECT COUNT(*) FROM finish_report WHERE fdate";
$result = mysqli_query($conn,$total_pages_sql);
$total_pages = mysqli_fetch_array($result)[0];
$total_rows = ceil($total_pages / $num_results_on_page);
$sql = "SELECT * FROM finish_report WHERE fdate ORDER BY fdate desc LIMIT $offset, $num_results_on_page";
$rows=$offset+1;
$res_data = mysqli_query($conn,$sql);
mysqli_close($conn);




?>
<html>
<head>
	<title>PHP CRUD with Search and Pagination</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>
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
						<button class="btn btn-info" style="float: right; color:"><a href="adminpanel.php" class="new" style="display: inline; text-align: center;color: white; text-decoration: none;">Go To Plan Report</a></button><br>
						<div class="card-title">
							<div class="card-body" >
								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Finish Report</h4>
											</div>
											<div class="modal-body">
												<form action="adminfinish.php" method="post">
													 <table cellpadding="50" cellspacing="50">
													<input type="hidden" name="id" id="id" hidden="<?php echo $_SESSION['id']?>">
													<tr>
														<td><label for="date">Choose Date</label></td>
														<td><input type="date" name="date" id="date" required="required"></td>
													</tr>
													<tr>
														<td><label for="eplan">Final Report</label></td>
														<td><textarea name="eplan" id="eplan" required="required" rows="3" cols="48"></textarea></td>
													</tr>
												</table>
												<button type="submit"  class="btn btn-info" style="margin-left: 170px;">Add Finish Report</button>
												</form>
											</div>
										</div>

									</div>
								</div>




							</form>
						</div>
					</div>
				</div> 
				<table cellpadding="10" cellspacing="1" border="2"  style="margin-top:20px; height: auto;width:100%;" class="tablebody">
					<thead>
						<tr>
							<th><strong>#</strong></th>
							<th><strong>User ID</strong></th>
							<th><strong>Date</strong></th>         
							<th style="width:40%;"><strong>Final Report</strong></th>
							<th><strong>Action</strong></th>
						</tr>
					</thead>
					<tbody>
					</tr>

					<?php while($row = mysqli_fetch_array($res_data)):?>

						<tr>
							<td><?php echo $rows++;?></td>
							<td><?php echo $row['user_id'];?></td>
							<td><?php echo $row['fdate'];?></td>
							<td style="width:40%;"><?php echo $row['work_done'];?></td> 
							<td>
								[<a href="admineditfinish.php?uid=<?php echo $row['uid']?>">Edit</a>][<a href="admindeletefinish.php?uid=<?php echo $row['uid']?>"onClick="return confirm('are you sure you want to delete??');">Delete</a>]</td> 
							</tr>
						<?php endwhile;?>
					</tbody>

				</table>


				<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
					
						<ul class="pagination">
							<?php if ($page > 1): ?>
								<li class="prev"><a href="adminfinishreport.php?page=<?php echo $page-1 ?>">Prev</a></li>
							<?php endif; ?>
							<?php if ($page > 3): ?>
								<li class="start"><a href="adminfinishreport.php?page=1">1</a></li>
								<li class="dots">...</li>
							<?php endif; ?>

							<?php if ($page-2 > 0): ?><li class="page"><a href="adminfinishreport.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
							<?php if ($page-1 > 0): ?><li class="page"><a href="adminfinishreport.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

							<li class="currentpage"><a href="adminfinishreport.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

							<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="adminfinishreport.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
							<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="adminfinishreport.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

							<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
								<li class="dots">...</li>
								<li class="end"><a href="adminfinishreport.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
							<?php endif; ?>

							<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
								<li class="next"><a href="adminfinishreport.php?page=<?php echo $page+1 ?>">Next</a></li>
							<?php endif; ?>
						</ul>
					
				<?php endif; ?>

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
<?php } ?>
	