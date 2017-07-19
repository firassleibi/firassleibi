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
				height:1000px;
				width:1450px;
			}
			#text{
				position:absolute;
				top:0px;
				left:0px;
				height:1000px;
				width:1450px;
				z-index:10;
				font-size:16px;
				font-family:"Times New Roman", Times, serif;

			}
			#a{
				position:absolute;
				top:0px;
				left:0px;
				height:1000px;
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
        	<img src="wilade.png" height="1000px " width="1450px"/>
		</div>
		<div  id="a" >
        	<img id="abs" src="a.png" height="250px " width="250px" style="top: <?=rand(-30,10)+720?>px; right: <?=rand(-30,30)+1025?>px;transform:rotate(<?= rand(-50,+50) ?>deg)"/>
        </div>
        <div id="text">
        	<div id="abs" style="top: 289px; right: 675px;">
            	<?= conv($_POST['a1']);?>
            </div>
            <div id="abs" style="top: 289px; right: 982px;">
            	<?= conv($_POST['a2']);?>
            </div>
        	<div id="abs" style="top: 468px; right: 130px">
				<?= $_POST['a3']?>
            </div>
            <div id="abs" style="top: 490px; right: 120px">
				<?= conv($_POST['a4']);?>	
            </div>
            <div id="abs" style="top: 468px; right: 265px">
            	<?= $_POST['a5']?>
            </div>
            <div id="abs" style="top: 490px; right: 240px">
            	<?= conv($_POST['a6'])?>
            </div>
            <div id="abs" style="top: 468px; right: 390px">
            	<?= $_POST['a7']?>
            </div>
            <div id="abs" style="top: 490px; right: 362px">
     			<?= conv($_POST['a8']);?>
            </div>
            <div id="abs" style="top: 468px; right: 518px">
            	<?= $_POST['a9']?>
            </div>
            <div id="abs" style="top: 468px; right: 610px">
            	<?= conv($_POST['a10']) ?>
            </div>
            <div id="abs" style="top: 490px; right: 610px;text-align: center; text-wrap: normal; width: 100px">
            	<?=$_POST['a11']?>
            </div>
            <div id="abs" style="top: 468px; right: 770px">
            	 <?= $_POST['a12']?>
            </div>
            <div id="abs" style="top: 490px; right: 885px">
            	<?= conv($_POST['a13'])?>
            </div>
            <div id="abs" style="top: 490px; right: 1012px;">
				<?= $_POST['a14']?>
            </div>
			<div id="abs" style="top: 490px; right: 1125px;">
            	<?= conv($_POST['a15']) ?>
            </div>
            <div id="abs" style="top: 490px; right: 1265px">
            	<?= conv($_POST['a16']) ?>
            </div>
			<div id="abs" style="top: 614px; right: 190px">
            	<?= $_POST['a17']?>
            </div>
			<div id="abs" style="top: 702px; right: 195px">
            	<?= conv($_POST['a18'])?>
            </div>
			<div id="abs" style="top: 772px; right: 207px">
            	<?= conv($_POST['a19'])?>
            </div>
			
		</div>
		
</body>
</html>