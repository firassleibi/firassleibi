<?
	$File = "upload/".$_GET['file'];
	header("Content-Disposition: attachment; filename=\"" . basename($File) . "\"");
	header("Content-Type: application/force-download");
	header("Content-Length: " . filesize($File));
	header("Connection: close");

?>