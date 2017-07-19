<?php
	include("db.php");
	$id=$_GET['id'];
	$query=mysqli_query($con,"select * from section where section_id=$id");
	while($row=mysqli_fetch_assoc($query)){
		$l[]=$row;
	}
	echo json_encode($l);
?>