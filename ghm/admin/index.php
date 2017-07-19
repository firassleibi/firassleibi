<?php
	$loggedin=false;
	if(isset($_POST['submit'])){
		if($_POST['password']=="123456"){
			$loggedin=true;
			include("../include/db.php");
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GHM Admin Panel</title>
</head>

<body>
	<? if(!$loggedin){ ?>
	<form method="POST">
        <input placeholder="Enter Password" name="password" type="password" required/>
        <input name="submit" type="submit" value="login"/>
    </form>
    <? } else{?>
    	<h1>Queries Table</h1>
    	<table border="1" cellpadding="5">
        	<thead>
            	<th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>textarea</th>
                <th>radio choice</th>
                <th>Check choice</th>
            </thead>
            <?
				$queries_q=mysqli_query($con,"select * from queries");
				while($row =  mysqli_fetch_object($queries_q)){ ?>
                <tr>
                    <td><?= htmlspecialchars($row->id, ENT_QUOTES, 'UTF-8')?></td>
                    <td><?= htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8')?></td>
                    <td><?= htmlspecialchars($row->email, ENT_QUOTES, 'UTF-8')?></td>
                    <td><?= htmlspecialchars($row->text_area, ENT_QUOTES, 'UTF-8')?></td>
                    <td><?= htmlspecialchars($row->radio_selected, ENT_QUOTES, 'UTF-8')?></td>
                    <td><?= htmlspecialchars($row->check_boxs, ENT_QUOTES, 'UTF-8')?></td>
                </tr>
                
			<?	}
			?>
        </table>
    	
    <? } ?>
</body>
</html>