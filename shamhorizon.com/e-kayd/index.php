<?php

    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/function.php");
	function conv($s){
		$standard = array("0","1","2","3","4","5","6","7","8","9");
		$east_arabic = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
		$string = str_replace($standard , $east_arabic , $s);
		echo $string;
	}		
	if(isset($_GET['id'])){
        $sql = "SELECT * FROM `kayd` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
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
				height:1450px;
				width:1000px;
			}
			#text{
				position:absolute;
				top:0px;
				left:0px;
				height:1450px;
				width:1000px;
				z-index:10;
				font-size:17px;
				font-family:"Times New Roman", Times, serif;

			}
			#a{
				position:absolute;
				top:0px;
				left:0px;
				height:1450px;
				width:1000px;
				z-index:0;
				font-size:17px;
				font-family:"Times New Roman", Times, serif;
			}
			pre{
				font-size:17px;
				font-family:"Times New Roman", Times, serif;
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
#abs19 {				position:absolute;
}
</style>
</head>

<body>

	<script>
		
	</script> 
		<div  id="a" >
        	<img id="abs" src="a.png" height="250px " width="250px" style="top: <?=rand(-30,10)+1170?>px; right: <?=rand(-30,30)+550?>px;transform:rotate(<?= rand(-50,+50) ?>deg)"/>
        </div>
		
		<div id="pic">
        	<img src="e-kayd.png" height="1450px " width="1000px"/>
		</div>
        <div id="text">
        	<div id="abs" style="top: 353px; right: 484px;">
            	<?= conv($_POST['a1']);?>
            </div>
            <div id="abs" style="top: 353px; right: 713px;">
            	<?= conv($_POST['a2']);?>
            </div>
        	<div id="abs" style="top: 413px; right: 316px">
            	<?=$_POST['a3']?>
            </div>
            <div id="abs" style="top: 413px; right: 606px">
				<?= conv($_POST['a4']);?>	
            </div>
            <div id="abs" style="top: 473px; right: 315px">
            	<?=$_POST['a6']?>
            </div>
            <div id="abs" style="top: 473px; right: 605px">
            	<?=$_POST['a7']?>
            </div>
            <div id="abs" style="top: 537px; right: 313px">
            	<?=$_POST['a8']?>
            </div>
            <div id="abs" style="top: 537px; right: 603px">
     			<?= conv($_POST['a9']);?>
            </div>
            <div id="abs" style="top: 602px; right: 312px">
            	<?=$_POST['a10']?>
            </div>
            <div id="abs" style="top: 608px; right: 603px">
            	<?= $_POST['a11'] ?>
            </div>
            <div id="abs" style="top: 664px; right: 308px">
            	<?= $_POST['a12'] ?>
            </div>
            <div id="abs" style="top: 672px; right: 603px">
            	<?= conv($_POST['a13']) ?>
            </div>
            <div id="abs" style="top: 708px; right: 304px">
            	<pre><?= conv($_POST['a14']);?></pre>
            </div>
            <div id="abs" style="top: 773px; right: 317px;">
				<pre><?= conv($_POST['a15']); ?></pre>
            </div>
			<div id="abs" style="top: 867px; right: 304px">
            	إسلام
            </div>
			<div id="abs" style="top: 812px; right: 472px; text-align: right; text-wrap: normal; width: 350px">
            	<?= $_POST['a16'] ?>
            </div>
            <div id="abs" style="top: 950px; right: 267px">
            	<?= $_POST['a17'] ?>
            </div>
			
		</div>
		
</body>
</html>