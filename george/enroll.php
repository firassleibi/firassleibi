<?php
	include("db.php");
	$student_id=$_GET['student_id'];
	$section_id=$_GET['section_id'];
	mysqli_query($con,"insert into enrollment set student_id=$student_id ,section_id=$section_id");
?>