
<?php

error_reporting(0);
require('data6rst.php');
 if(isset($_POST['token']) && $_POST['token'] == '101201')
    {
$username = strip_tags($_POST['username']);
$result = $db->prepare('SELECT * FROM users where username = :username');

		$result->execute(array(
			':username' => $username
    ));

$nosofrows = $result->rowCount();
echo $nosofrows;
}

?>