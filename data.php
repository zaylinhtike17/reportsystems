<?php
	include 'db_controller.php';
	
	if(isset($_POST['id'])){
		$cid=$_POST['id'];
		$sql =mysqli_query($conn,"SELECT * FROM township WHERE city_id='$cid'");
		while($row=mysqli_fetch_array($sql)){
			$id=$row['id'];
			$name=$row['township_name'];
			echo "<option value'$id'>$name</option>";
		}
	}
?>