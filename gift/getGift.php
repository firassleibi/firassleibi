<?php
	include("include/db.php");
	$gift=mysqli_query($con,"select * from gifts where downloads<max_downloads");
	$array=array();
	while($row=mysqli_fetch_assoc($gift)){
		$array[]=$row;
	}
	$random=rand(1 , mysqli_num_rows($gift) );
	echo json_encode($array[$random-1]);
	mysqli_query($con,"update gifts set downloads=downloads+1 where id=".$array[$random-1]["id"]);
?>