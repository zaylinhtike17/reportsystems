<?php
include("config/db_controller.php");
if(!empty($_GET["id"])) {
    $query = "DELETE FROM  user_master WHERE id=".$_GET["id"];
    $result = mysqli_query($conn,$query);
	if(!empty($result)){
		header("Location:userlist.php");
	}
}
?>