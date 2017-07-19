<?php
	$error=false;
	if(!isset($_POST['name'])||!isset($_POST['email'])||!isset($_POST['text_area'])||!isset($_POST['radio_selected'])||!isset($_POST['check_boxs'])){
		$error=true;
	}
	else{
		include("include/db.php");
		//Backend Validation
		$name = $_POST["name"];
		$email = $_POST["email"];
		$text_area = $_POST["text_area"];
		$radio_selected = $_POST["radio_selected"];
		$check_boxs = $_POST["check_boxs"];
		if (!preg_match("/^[a-zA-Z]*$/",$name)) {
		  $error = true; 
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $error = true;
		}
		if(count(explode(' ' , $check_boxs))!=3){
		  $error = true;
		}
		if(strlen($text_area)<200||strlen($text_area)>400){
		  $error = true;
		}
		
		if(!$error){
			
			$ok=mysqli_query($con,"insert into queries set name='$name', email='$email', text_area='$text_area',radio_selected='$radio_selected',check_boxs='$check_boxs'");
			if($ok){
				// Send Mail
				$to = "me@kotovs.com";
				$subject = "Form Submission";
				$txt = "name: ".htmlspecialchars($name, ENT_QUOTES, 'UTF-8')."\n";
				$txt .= "email: ".htmlspecialchars($email, ENT_QUOTES, 'UTF-8')."\n";
				$txt .= "text area: ".htmlspecialchars($text_area, ENT_QUOTES, 'UTF-8')."\n";
				$txt .= "radio_selected: ".htmlspecialchars($radio_selected, ENT_QUOTES, 'UTF-8')."\n";
				$txt .= "check_boxs: ".htmlspecialchars($check_boxs, ENT_QUOTES, 'UTF-8')."\n";
				$headers = "From: webmaster@firassleibi.com";
				$sent=mail($to,$subject,$txt,$headers);
				if($sent)
					echo "Form Submitted";
			}
			else{
				$error = true;
			}
			
		}
		
	}
	if($error){
		echo $error;
	}
  
?>