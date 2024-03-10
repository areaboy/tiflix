<?php
error_reporting(0);
session_start();

$uid = strip_tags($_SESSION['uid1']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$userphoto = strip_tags($_SESSION['photo1']);
$user_rank = strip_tags($_SESSION['user_rank1']);

$comment_id = strip_tags($_POST['comment_id']);
$reply = strip_tags($_POST['reply']);


if ($reply == ''){
exit();
}

include('data6rst.php');


if($reply != ''){



$token= md5(uniqid());
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");
$pa = 0;



$statement = $db->prepare('INSERT INTO reply
(commentid,type,reply,timer1,timer2,userid,username,fullname,photo,reply_approve)
 
                          values
(:commentid,:type,:reply,:timer1,:timer2,:userid,:username,:fullname,:photo,:reply_approve)');

$statement->execute(array( 
':commentid' => $comment_id,
':type' => '1',
':reply' => $reply,
':timer1' => $timer,
':timer2' => $created_time,
':userid' => $userid,
':username' => $username,
':fullname' => $fullname,
':photo' => $userphoto,
':reply_approve' => '0'

));





$res = $db->query("SELECT LAST_INSERT_ID()");
$commentID = $res->fetchColumn();


// query table comments to get data
$result = $db->prepare('SELECT * FROM comments WHERE id =:id');
$result->execute(array(':id' => $comment_id));
$db_count = $result->rowCount();

if($db_count ==0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>This Comments does not exist Yet.. <b></b></div>";
}
$row = $result->fetch();


$t_reply= htmlentities(htmlentities($row['reply_count'], ENT_QUOTES, "UTF-8"));
$postid= htmlentities(htmlentities($row['postid'], ENT_QUOTES, "UTF-8"));
$totalreply = $t_reply + 1;
$post_userid= htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
$reciever_userid = $post_userid;



// query table posts to get data
$resultx = $db->prepare('SELECT * FROM posts WHERE id =:id');
$resultx->execute(array(':id' => $postid));
$db_countx = $resultx->rowCount();

if($db_countx ==0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>This Post does not exist Yet.. <b></b></div>";
}
$rowx = $resultx->fetch();


$title= htmlentities(htmlentities($rowx['title'], ENT_QUOTES, "UTF-8"));
$title_seo= htmlentities(htmlentities($rowx['title_seo'], ENT_QUOTES, "UTF-8"));





               


// insert into notification post table



$statement2 = $db->prepare('INSERT INTO notification
(post_id,userid,fullname,photo,user_rank,reciever_id,status,type,timing,title,title_seo)
                        values
(:post_id,:userid,:fullname,:photo,:user_rank,:reciever_id,:status,:type,:timing,:title,:title_seo)');
$statement2->execute(array( 

':post_id' => $postid,
':userid' => $userid,
':fullname' => $fullname,
':photo' => $userphoto,
':user_rank' => 'Member',
':reciever_id' => $reciever_userid,
':status' => 'unread',
':type' => 'reply',
':timing' => $timer,
':title' => $title,
':title_seo' => $title_seo
));


/*
CREATE TABLE `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentid` int(11) NOT NULL,
  `type` int(10) NOT NULL,
  `reply` text DEFAULT NULL,
  `timer1` varchar(100) DEFAULT NULL,
  `timer2` varchar(100) DEFAULT NULL,
  `userid` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `reply_approve` int(3) DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
*/




// update reply conts for comments

$cct = $db->prepare('select * from comments where id=:id');
$cct->execute(array(':id' =>$comment_id));
$rct_row = $cct->fetch();
$totalrep = $rct_row['reply_count'];
$total_comment_reply = $totalrep + 1;

$update2= $db->prepare('UPDATE comments set reply_count =:reply_count where id=:id');
$update2->execute(array(':reply_count' => $total_comment_reply, ':id' =>$comment_id));



}


$reply_result = $db->prepare('SELECT COUNT(*) AS cntcomment FROM reply WHERE type=1 and commentid=:commentid');
$reply_result->execute(array(':commentid' => $comment_id));
$reply_row = $reply_result->fetch();
$totalreply = $reply_row['cntcomment'];
$return_arr = array("reply"=>$totalreply,"reply_text"=>$reply,"reply_username"=>$username,"reply_fullname"=>$fullname,"reply_photo"=>$userphoto,"reply_time"=>$timer);

echo json_encode($return_arr);