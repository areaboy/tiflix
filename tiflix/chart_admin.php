<?php
error_reporting(0);
session_start();

$uid = strip_tags($_SESSION['uid1']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$photo = strip_tags($_SESSION['photo1']);
$email = strip_tags($_SESSION['email1']);
$user_rank = strip_tags($_SESSION['user_rank1']);

$userid_clean = strip_tags($userid);


if($user_rank !='Admin'){
echo "<div style='background:red;color:white;padding:8px;border:none'>Only Admin Can Access this Page</div>";
exit();
}


ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);




include('data6rst.php');
$obj = (object) array('role' => 'style', 'type' => 'string');
$data[] = array('Your Social Data', '-', $obj);


$res_cz= $db->prepare("SELECT  sum(t_like) as totalcount_l  FROM posts");
$res_cz->execute(array());
$c_rowz = $res_cz->fetch();
$likes_total = $c_rowz['totalcount_l'];



$res_c= $db->prepare("SELECT count(*) as totalcount_comments FROM comments");
$res_c->execute(array());
$c_row = $res_c->fetch();
$count_c = $c_row['totalcount_comments'];



$res_r= $db->prepare("SELECT count(*) as totalcount_reply FROM reply");
$res_r->execute(array());
$r_row = $res_r->fetch();
$count_r = $r_row['totalcount_reply'];



$res= $db->prepare("SELECT count(*) as totalcount_posts FROM posts");
$res->execute(array());
while($row = $res->fetch()){

$posts_total = $row['totalcount_posts'];
$comments_total = $count_c;
$reply_total =$count_r;

$data[] = array('Video/Posts',(int)$posts_total, 'purple');
$data[] = array('Comments',(int)$comments_total, 'gold');
$data[] = array('Replies',(int)$reply_total, 'navy');
$data[] = array('Likes',(int)$likes_total, 'green');
//$data[] = array('Followers',(int)$followers_total, 'orange');
//$data[] = array('Following',(int)$following_total, 'fuchsia');


}


echo json_encode($data);
