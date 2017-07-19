<?php
	include("db.php");
	$hours=$_GET['hours'];
	$title=$_GET['title'];
	$id=$_GET['id'];
	
	mysqli_query($con,"update course set hours='$hours',title='$title' where course_id=$id");
	
?>