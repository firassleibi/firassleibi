<?php
	include("functions.php");
	if(isset($_GET['id'])&&isset($_GET['listtype'])){
		$id=$_GET['id'];
		$listtype=$_GET['listtype'];
		echo getDetails($id,$listtype);
		
	}
	else{
		header("location: /");
	}
?>