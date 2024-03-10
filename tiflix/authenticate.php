

<?php
	
//set session
if(!isset($_SESSION['uid1']) || (trim($_SESSION['uid1']) == '')) {
//$username=strip_tags($_GET['username']);
		header("location: index.php");
		exit();
	}


?>