<?php
error_reporting(0);
session_start();
include ('authenticate.php');

$uid = strip_tags($_SESSION['uid1']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$photo = strip_tags($_SESSION['photo1']);
$email = strip_tags($_SESSION['email1']);
$user_rank = strip_tags($_SESSION['user_rank1']);

if($user_rank != 'Admin'){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Only Admin Can Ban Users</div>";
exit();
}

/*
if($user_rank == 'Admin'){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Admin Cannot Bann Yourself</div>";
exit();
}
*/

include('data6rst.php');

$id=strip_tags($_POST['id']);
$post_userid=strip_tags($_POST['userid']);




$update= $db->prepare('UPDATE users set user_banned =:user_banned where userid=:userid AND id=:id');
$update->execute(array(':user_banned' => 'yes', ':userid' =>$post_userid, ':id' =>$id));


if($update){


echo "<div style='background:green;padding:8px;color:white;border:none;'>User Banned Successfully</div>";
echo "<script>alert('User Banned Successfully'); location.reload();</script>";
}else{


echo "<div style='background:red;padding:8px;color:white;border:none;'>User Banning Failed</div>";
echo "<script>alert('User Banning Failed');</script>";

}









?>


