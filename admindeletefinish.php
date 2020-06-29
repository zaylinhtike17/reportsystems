<?php
include("db_controller.php");
if(!empty($_GET["uid"])) {
    $query = "DELETE FROM finish_report WHERE uid=".$_GET["uid"];
    $result = mysqli_query($conn,$query);
	if(!empty($result)){
		header("Location:adminfinishreport.php");
	}
}
?>