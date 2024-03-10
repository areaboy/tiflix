<?php
//error_reporting(0);
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
echo "<div style='background:red;padding:8px;color:white;border:none;'>Only Admin Can Delete Video..</div>";
exit();
}



include('data6rst.php');

$pid=strip_tags($_POST['id']);
$post_userid=strip_tags($_POST['userid']);


// get comment id via post id 

$result= $db->prepare('SELECT * from comments where postid=:postid');
$result->execute(array(':postid' =>$pid));
$count_post = $result->rowCount();
$row = $result->fetch();
$commentid = htmlentities(htmlentities($row['id'], ENT_QUOTES, "UTF-8"));



$del= $db->prepare('DELETE from posts where id=:id');
$del->execute(array(':id' =>$pid));


$del2= $db->prepare('DELETE from comments where postid=:postid');
$del2->execute(array(':postid' =>$pid));



$del3= $db->prepare('DELETE from reply where commentid=:commentid');
$del3->execute(array(':commentid' =>$commentid));


if($del3){


echo "<div style='background:green;padding:8px;color:white;border:none;'>Video Deleted Successfully</div>";
echo "<script>alert('Video Deleted Successfully'); location.reload();</script>";
}else{


echo "<div style='background:red;padding:8px;color:white;border:none;'>Video Deleting Failed</div>";
echo "<script>alert('Video Deleting Failed');</script>";

}









?>


