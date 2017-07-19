<?php
	include("db.php");
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$username=$_GET['username'];
	$password=$_GET['password'];
	$year=$_GET['year'];
	$gender=$_GET['gender'];
	$phone=$_GET['phone'];
	$address=$_GET['address'];
	
	mysqli_query($con,"insert into student set first_name='$fname',last_name='$lname',username='$username',password='$password',reg_year='$year',gender='$gender',addres='$address',phone='$phone'");
	
?>