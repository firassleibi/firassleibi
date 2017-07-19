<?php
	include("db.php");
	$time=$_GET['time'];
	$room=$_GET['room'];
	$instructor_id=$_GET['instructor_id'];
	$course_id=$_GET['course_id'];
	mysqli_query($con,"insert into section set time='$time',room_number='$room',instructor_id=$instructor_id,course_id=$course_id");
	
?>