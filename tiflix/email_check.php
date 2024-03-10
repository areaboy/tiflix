
<?php

error_reporting(0);
require('data6rst.php');
 if(isset($_POST['token']) && $_POST['token'] == '101201')
    {
$email = strip_tags($_POST['email']);
$result = $db->prepare('SELECT * FROM users where email = :email');

		$result->execute(array(
			':email' => $email
    ));
$nosofrows = $result->rowCount();
echo $nosofrows;
}

?>