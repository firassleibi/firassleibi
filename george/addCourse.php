<?php
	include("db.php");
	$hours=$_GET['hours'];
	$title=$_GET['title'];

	
	mysqli_query($con,"insert into course set hours='$hours',title='$title'");
	
?>