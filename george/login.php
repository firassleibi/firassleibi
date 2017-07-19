<?php
	include("functions.php");
	if(isset($_GET['username'])&&isset($_GET['password'])){
		$username=$_GET['username'];
		$password=$_GET['password'];
		echo login($username,$password);
		
	}
	else{
		header("location: /");
	}
?>