<?php

$con=mysqli_connect("localhost","firassle_rida","rockme/1991","firassle_rida");

if(isset($_GET["check"])){
	$q=mysqli_query($con,"select * from kensol where id=1");
	$q=mysqli_fetch_object($q);
	if($q->activated==1){
		echo "true";
	}
}

if(isset($_GET["get"])){
	$q=mysqli_query($con,"select * from kensol where id=1");
	$q=mysqli_fetch_object($q);
	echo $q->registered;

}

if(isset($_GET["add"])){
	$q=mysqli_query($con,"update kensol set registered=registered+1 where id=1");
}

mysqli_close($con);
?>