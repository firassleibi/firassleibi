<?php
	include("functions.php");
	if(isset($_GET['id'])){
		echo getStudents($_GET['id']);
	}else
	echo getStudents(null);
?>