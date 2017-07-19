<?php
	$date=$_GET['date'];
	$num=$_GET['num'];
	for($i=0;$i<9;$i++){
		$n[$i]=$num+$i;
	}
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
			#pic{
				position:absolute;
				top:0px;
				left:0px;
				height:1175px;
				width:800px;
			}
			#text{
				position:absolute;
				top:0px;
				left:0px;
				height:1175px;
				width:800px;
				z-index:10;
				font-size:17pt;
				font-family:Aparajita;
			}
			#abs{
				position:absolute;

			}
		#abs2 {				position:absolute;
}
#abs3 {				position:absolute;
}
#abs4 {				position:absolute;
}
#abs5 {				position:absolute;
}
#abs6 {position:absolute;
}
#abs7 {position:absolute;
}
#abs8 {position:absolute;
}
#abs9 {				position:absolute;
}
#abs10 {position:absolute;
}
#abs11 {position:absolute;
}
#abs12 {position:absolute;
}
#abs13 {position:absolute;
}
#abs14 {position:absolute;
}
#abs15 {position:absolute;
}
#abs16 {position:absolute;
}
#abs17 {position:absolute;
}
#abs18 {position:absolute;
}
</style>
</head>

<body>

	<script>
		window.onload = function () {
			window.print();
		};
	</script> 
	
		<div id="pic">
        	<img src="kensol.png" height="1175px " width="800px"/>
		</div>
        <div id="text">
          <div id="abs" style="top: 246px; right: 266px; font-weight: bold"> <?=$date?> </div>
          <div id="abs2" style="top: 248px; right: 688px; font-weight: bold"> <?=$date?> </div>
          <div id="abs3" style="top: 528px; right: 266px; font-weight: bold"> <?=$date?> </div>
          <div id="abs4" style="top: 813px; right: 266px; font-weight: bold"> <?=$date?> </div>
          <div id="abs5" style="top: 529px; right: 687px; font-weight: bold"> <?=$date?> </div>
          <div id="abs6" style="top: 814px; right: 687px; font-weight: bold"> <?=$date?> </div>
          <div id="abs7" style="top: 1090px; right: 688px; font-weight: bold"> <?=$date?> </div>
          <div id="abs8" style="top: 1091px; right: 266px; font-weight: bold"> <?=$date?> </div>
          <div id="abs9" style="top: 813px; right: 63px; font-weight: bold;"><?=$n[4]?></div>
          <div id="abs10" style="top: 529px; right: 484px; font-weight: bold;"><?=$n[3]?></div>
          <div id="abs11" style="top: 527px; right: 62px; font-weight: bold;"><?=$n[2]?></div>
          <div id="abs12" style="top: 248px; right: 483px; font-weight: bold;"><?=$n[1]?></div>
          <div id="abs13" style="top: 245px; right: 63px; font-weight: bold;"><?=$n[0]?></div>
          <div id="abs15" style="top: 1090px; right: 63px; font-weight: bold;"><?=$n[6]?></div>
          <div id="abs16" style="top: 812px; right: 484px; font-weight: bold;"><?=$n[5]?></div>
          <div id="abs14" style="top: 1089px; right: 481px; font-weight: bold;"><?=$n[7]?></div>
        </div>
</body>
</html>