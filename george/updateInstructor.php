<?php
	include("db.php");
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$gender=$_GET['gender'];
	$phone=$_GET['phone'];
	$address=$_GET['address'];
	$id=$_GET['id'];
	mysqli_query($con,"update instructor set first_name='$fname',last_name='$lname',gender='$gender',address='$address',phone='$phone' where instructor_id=$id");
	
?>