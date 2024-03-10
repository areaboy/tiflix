<?php
session_start();
unset($_SESSION["uid1"]);
unset($_SESSION["username1"]);
session_destroy();
header("Location:index.php");
?>