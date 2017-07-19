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
			body{
				margin:0px;
				padding:0px;
			}
			#pic{
				position:absolute;
				top:0px;
				left:0px;
				height:980px;
				width:1450px;
			}
			#text{
				position:absolute;
				top:0px;
				left:0px;
				height:980;
				width:1450px;
				z-index:10;
				font-size:16px;
				font-family:"Times New Roman", Times, serif;

			}
			#a{
				position:absolute;
				top:0px;
				left:0px;
				height:980;
				width:1450px;
				z-index:0;
				font-size:16px;
				font-family:"Times New Roman", Times, serif;
			}
			pre{
				font-size:16px;
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
		
		
		<div id="pic">
        	<img src="zawaj.png" height="980 " width="1450px"/>
		</div>
		<div  id="a" >
        	<img id="abs" src="a.png" height="250px " width="250px" style="top: <?=rand(-30,10)+720?>px; right: <?=rand(-30,30)+1025?>px;transform:rotate(<?= rand(-50,+50) ?>deg)"/>
        </div>
        <div id="text">
        	<div id="abs" style="top: 180px; right: 495px;">
            	<?= conv($_POST['a1']);?>
            </div>
            <div id="abs" style="top: 180px; right: 825px;">
            	<?= conv($_POST['a2']);?>
            </div>
			<div id="abs" style="top: 180px; right: 1092px;">
            	<?= conv($_POST['a3']);?>
            </div>
        	<div id="abs" style="top: 312px; right: 190px">
				<?= $_POST['a4'];?>
            </div>
            <div id="abs" style="top: 330px; right: 185px">
				<?= conv($_POST['a5']);?>	
            </div>
            <div id="abs" style="top: 312px; right: 325px">
            	<?= $_POST['a6']?>
            </div>
            <div id="abs" style="top: 312px; right: 460px">
            	<?= $_POST['a7']?>
            </div>
            <div id="abs" style="top: 312px; right: 590px">
            	<?= $_POST['a8'];?>
            </div>
            <div id="abs" style="top: 330px; right: 560px">
     			<?= conv($_POST['a9']);?>
            </div>
            <div id="abs" style="top: 346px; right:545px;text-align: center; text-wrap: normal; width: 120px">
            	<?= $_POST['a10'];?>
            </div>
            <div id="abs" style="top: 312px; right: 695px">
            	<?= $_POST['a11'];?>
            </div>
            <div id="abs" style="top: 312px; right: 785px">
            	<?= $_POST['a12'];?>
            </div>
            <div id="abs" style="top: 330px; right: 885px">
            	 <?= $_POST['a13'];?>
            </div>
            <div id="abs" style="top: 330px; right: 985px">
            	<?= conv($_POST['a14']) ?>
            </div>
            <div id="abs" style="top: 330px; right: 1077px;">
				<?= conv($_POST['a15']) ?>
            </div>
			<div id="abs" style="top: 330px; right: 1177px;">
            	<?= conv($_POST['a16']) ?>
            </div>
			

        	<div id="abs" style="top: 440px; right: 190px">
				<?=$_POST['a17'];?>
            </div>
            <div id="abs" style="top: 458px; right: 185px">
				<?= conv($_POST['a18']);?>	
            </div>
            <div id="abs" style="top: 440px; right: 325px">
            	<?=$_POST['a19'];?>
            </div>
            <div id="abs" style="top: 440px; right: 460px">
            	<?=$_POST['a20'];?>
            </div>
            <div id="abs" style="top: 440px; right: 590px">
            	<?=$_POST['a21'];?>
            </div>
            <div id="abs" style="top: 458px; right: 560px">
     			<?= conv($_POST['a22']);?>
            </div>
            <div id="abs" style="top: 468px; right:545px;text-align: center; text-wrap: normal; width: 120px">
            	<?=$_POST['a23'];?>
            </div>
            <div id="abs" style="top: 440px; right: 695px">
            	<?=$_POST['a24'];?>
            </div>
            <div id="abs" style="top: 440px; right: 785px">
            	<?=$_POST['a25'];?>
            </div>
            <div id="abs" style="top: 458px; right: 885px">
            	 <?=$_POST['a26'];?>
            </div>
            <div id="abs" style="top: 458px; right: 985px">
            	<?= conv($_POST['a27']) ?>
            </div>
            <div id="abs" style="top: 458px; right: 1077px;">
				<?= conv($_POST['a28']) ?>
            </div>
			<div id="abs" style="top: 458px; right: 1177px;">
            	<?= conv($_POST['a29']) ?>
            </div>
			
			
            <div id="abs" style="top: 330px; right: 1245px">
            	<?= conv($_POST['a30']) ?>
            </div>
			<div id="abs" style="top: 345px; right: 1240px;text-align: right; text-wrap: normal; width: 100px">
            	<?=$_POST['a31'];?>
            </div>
			<div id="abs" style="top: 595px; right: 230px">
            	<?=$_POST['a32'];?>
            </div>
			<div id="abs" style="top: 705px; right: 240px">
            	<?= conv($_POST['a33'])?>
            </div>
			<div id="abs" style="top: 783px; right:250px">
            	<?= conv($_POST['a34'])?>
            </div>
			
			
		</div>
		
</body>
</html>