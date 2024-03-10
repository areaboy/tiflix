<?php
error_reporting(0);
session_start();
include ('authenticate.php');
include('settings.php');
include('data6rst.php');

$uid = strip_tags($_SESSION['uid1']);
$userid_sess = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$photo = strip_tags($_SESSION['photo1']);
$email = strip_tags($_SESSION['email1']);
$user_rank = strip_tags($_SESSION['user_rank1']);



$id_sub = strip_tags($_POST['id_sub']);


$update= $db->prepare('UPDATE subscription set sub_status =:sub_status, status = :status where userid=:userid AND id=:id');
$update->execute(array(
':sub_status' => 'Expired', 
':status' => 'Expired', 
':userid' => $userid_sess, 
':id' =>$id_sub
));


if($update){
echo "<div style='background:green;padding:8px;color:white;border:none;'>Update Successful.</div>";
echo "<script>
//location.reload();
window.location='subscription.php';</script>";


}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Updates Failed.</div>";

}


?>