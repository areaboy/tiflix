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
echo "<div style='background:red;padding:8px;color:white;border:none;'>Only Admin Can Mark Users as Verified..</div>";
exit();
}



include('data6rst.php');

$id=strip_tags($_POST['id']);
$post_userid=strip_tags($_POST['userid']);




$update= $db->prepare('UPDATE users set verified =:verified where userid=:userid');
$update->execute(array(':verified' => 'yes', ':userid' =>$post_userid));


$update2= $db->prepare('UPDATE posts set verified =:verified where userid=:userid');
$update2->execute(array(':verified' => 'yes', ':userid' =>$post_userid));



$update3= $db->prepare('UPDATE comments set verified =:verified where userid=:userid');
$update3->execute(array(':verified' => 'yes', ':userid' =>$post_userid));


$update4= $db->prepare('UPDATE reply set verified =:verified where userid=:userid');
$update4->execute(array(':verified' => 'yes', ':userid' =>$post_userid));




if($update4){


echo "<div style='background:green;padding:8px;color:white;border:none;'>User Verified Successfully</div>";
echo "<script>alert('User Verfied Successfully'); location.reload();</script>";
}else{


echo "<div style='background:red;padding:8px;color:white;border:none;'>User Verification Failed</div>";
echo "<script>alert('User Verification Failed');</script>";

}









?>


