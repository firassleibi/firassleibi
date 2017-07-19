<?php
	header("location:  http://shjf.live/?app=true"); die();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
	<button onClick="openQR()">Press Here to Read Barcode</button><br/>
    <button onClick="callNumber('0524219541')">Call Number</button>
    <div id="code"></div>
</body>
<script>
function openQR(){
            if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
				window.location = 'sharjahhaj://app?greeting=hello'
			}
			else{
				app.openQR();
			}
			
}
function setCode(code){
	document.getElementById("code").innerHTML=code;
}

function callNumber(number){
			number = "tel://" + number;
            if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
				window.location = 'openmobile://app?'+number;
			}
			else{
				app.callNumber(number);
			}
			
}

</script>
</html>

