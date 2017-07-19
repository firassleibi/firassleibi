<?php

$con=mysqli_connect("localhost","firawxed_ridaa","rockme/1991","firawxed_rida");

if(isset($_POST["submit"])){
	if($_POST["submit"]=="أضرب بارك الله فيك"){
		$url = 'http://www.mofaex.gov.sy/istanbul-consulate/istanbul_system/insert.php';
		$fields = array(
		    "first_name" => $_POST["first_name"],
            "father_name" => $_POST["father_name"] ,
            "last_name" => $_POST["last_name"] ,
            "birthday" => $_POST["birthday"] ,
            "country" => $_POST["country"],
            "passport_id" => $_POST["passport_id"] ,
            "phone" =>  $_POST["phone"],
            "email" => $_POST["email"] ,
            "national_id" => $_POST["national_id"] ,
            "address_in" => $_POST["address_in"] ,
            "address_out" => $_POST["address_out"],
            "app" =>  $_POST["app"] ,
            "dayapp" => $_POST["dayapp"] ,
            "displayValue" => "" ,
            "idValue" => "" ,
            "submit" => "حجز",
            "nationality" => $_POST["nationality"]
		);
		//print_r($fields);
		   
		
		// build the urlencoded data
		
		// open connection
		$ch = curl_init();
		$time=time();
		// set the url, number of POST vars, POST data
		$file = fopen("cap/".$time.".html", 'w'); 
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS,  $fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		curl_setopt($ch, CURLOPT_FILE, $file);
		
		// execute post
		$result = curl_exec($ch);
		fclose($file);
		// close connection
		curl_close($ch);
		
		$z = file_get_contents("cap/".$time.".html");

		if (strpos($z, 'لا يمكنك') !== false) {
			echo 'true';
		}
	
		echo "تم اطلاق الصاروخ";
	
	}
	if($_POST["submit"]=="الضرب الممنهج"){
		$output = shell_exec('crontab -l');
file_put_contents('/tmp/crontab.txt', $output.'* * * * * NEW_CRON'.PHP_EOL);
echo exec('crontab /tmp/crontab.txt');
	}
}
?>
<html dir="rtl">
	<head>
    	<title>المدفع الالكتروني</title>
    	<meta charset="UTF-8">    
    </head>
    <body>
    	<img src="http://www.all4syria.info/wp-content/uploads/2013/12/140.jpg"/>
        <a href="cap/" target="_blank">عرض الضحايا</a>
    	<h1>المدفع الالكتروني</h1>
        <form method="POST">
        	<label>موعد الحجز</label>
        	<input type="text" name="dayapp"/> yyyy-mm-dd<br/>
        	<label>الاسم</label>
        	<input type="text" name="first_name"/><br/>
            <label>اسم الأب</label>
        	<input type="text" name="father_name"/><br/>
            <label>النسبة</label>
        	<input type="text" name="last_name"/><br/>
            <label>تاريخ الميلاد</label>
        	<input type="text" name="birthday"/> dd/mm/yyyy<br/>
            <label>المحافظة</label>
        	<input type="text" name="country"/><br/>
            <label>رقم الوثيقة المقدمة</label>
        	<input type="text" name="passport_id"/><br/>
            <label>رقم الهاتف</label>
        	<input type="text" name="phone"/><br/>
            <label>البريد الالكتروني</label>
        	<input type="text" name="email"/><br/>
            <label>الرقم الوطني</label>
        	<input type="text" name="national_id"/><br/>
            <label>الجنسية</label>
        	<input type="radio" name="nationality" value="سوري"/>سوري
            <input type="radio" name="nationality" value="غير سوري"/>غير سوري<br/>
            <label>العنوان داخل القطر</label>
        	<input type="text" name="address_in"/><br/>
 			<label>العنوان خارج القطر</label>
        	<input type="text" name="address_out"/><br/>
			<label>المعاملة</label>
        	<input type="text" name="app"/><br/>
            <input type="submit" name="submit" value="أضرب بارك الله فيك"/>
        	<input type="submit" name="submit" value="الضرب الممنهج"/>
       		<?php echo date('Y-m-d H:i:s');?>
  
        </form>
    </body>
</html>