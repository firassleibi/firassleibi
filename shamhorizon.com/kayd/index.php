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
				height:756px;
				width:545px;
			}
			#text{
				position:absolute;
				top:0px;
				left:0px;
				height:900px;
				width:652px;
				z-index:10;
				font-size:15px;
			}
			#abs{
				position:absolute;

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
        	<img src="images/kayd.png" height="756" width="545"/>
		</div>
        <div id="text">
        	<div id="abs" style="top:140px;right:270px;font-weight:bold">
            	<?= $result['a1'] ?>
            </div>
            <div id="abs" style="top:140px;right:526px;font-weight:bold">
            	<?= $result['a2'] ?>
            </div>
        	<div id="abs" style="top:175px;right:250px">
            	<?= $result['a3'] ?>
            </div>
            <div id="abs" style="top:175px;right:505px">
				<?= conv($result['a4']);
				?>	
            </div>
            <div id="abs" style="top:208px;right:250px">
            	<?= $result['a6'] ?>
            </div>
            <div id="abs" style="top:208px;right:505px">
            	<?= $result['a7'] ?>
            </div>
            <div id="abs" style="top:243px;right:250px">
            	<?= $result['a8'] ?>
            </div>
            <div id="abs" style="top:243px;right:505px">
     			<?= conv($result['a9']);?>
            </div>
            <div id="abs" style="top:278px;right:250px">
            	<?= $result['a10'] ?>
            </div>
            <div id="abs" style="top:278px;right:505px">
            	<?= $result['a11'] ?>
            </div>
            <div id="abs" style="top:311px;right:250px">
            	<?= $result['a12'] ?>
            </div>
            <div id="abs" style="top:311px;right:505px">
            	<?= $result['a13'] ?>
            </div>
            <div id="abs" style="top:346px;right:270px">
            	<?= conv($result['a14']);?>
            </div>
            
            <div id="abs" style="top:377px;right:270px;">
            	<?= conv($result['a15']); ?>
            </div>
			<div id="abs" style="top:377px;right:417px;text-align:right;text-wrap:normal;width:180px">
            	<?= $result['a16'] ?>
            </div>
            <div id="abs" style="top:468px;right:220px">
            	<?= $result['a17'] ?>
            </div>
            <div id="abs" style="top:562px;right:290px">
            	<?= $result['a18'] ?>
            </div>
        </div>
</body>
</html>