<?php
	include("functions.php");
	if(isset($_GET['id'])){
		echo getSections($_GET['id']);
	}
	else
	echo getSections(null);
?>