<?php
error_reporting(0);
session_start();

$uid = strip_tags($_SESSION['uid1']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$userphoto = strip_tags($_SESSION['photo1']);
$user_rank = strip_tags($_SESSION['user_rank1']);

$postid = strip_tags($_POST['postid']);
$comdesc = strip_tags($_POST['comdesc']);


if ($comdesc == ''){
exit();
}

include('data6rst.php');


if($comdesc != ''){



$token= md5(uniqid());
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");
$pa = 0;




// get users verification info 

$result = $db->prepare("SELECT * FROM users where userid =:userid");
$result->execute(array(':userid' => $userid));
$row = $result->fetch();
$verified = htmlentities(htmlentities($row['verified'], ENT_QUOTES, "UTF-8"));



$statement = $db->prepare('INSERT INTO comments
(postid,type,comment,timer1,timer2,userid,username,fullname,photo,comment_approve,reply_count,t_like,verified)
 
                          values
(:postid,:type,:comment,:timer1,:timer2,:userid,:username,:fullname,:photo,:comment_approve,:reply_count,:t_like,:verified)');

$statement->execute(array( 
':postid' => $postid,
':type' => '1',
':comment' => $comdesc,
':timer1' => $timer,
':timer2' => $created_time,
':userid' => $userid,
':username' => $username,
':fullname' => $fullname,
':photo' => $userphoto,
':comment_approve' => '0',
':reply_count' =>'0',
':t_like' =>'0',
':verified' =>$verified

));





$res = $db->query("SELECT LAST_INSERT_ID()");
$commentID = $res->fetchColumn();


// query table posts to get data
$result = $db->prepare('SELECT * FROM posts WHERE id =:id');
$result->execute(array(':id' => $postid));
$db_count = $result->rowCount();

if($db_count ==0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>This Post does not exist Yet.. <b></b></div>";
}
$row = $result->fetch();

$post_userid= htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
$reciever_userid = $post_userid;
$title= htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
$title_seo= htmlentities(htmlentities($row['title_seo'], ENT_QUOTES, "UTF-8"));
$t_comments= htmlentities(htmlentities($row['total_comments'], ENT_QUOTES, "UTF-8"));;
$totalcomment = $t_comments + 1;


               


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
':type' => 'comment',
':timing' => $timer,
':title' => $title,
':title_seo' => $title_seo
));




// for commenters posts updates

$pst = $db->prepare('select * from users where id=:id');
$pst->execute(array(':id' =>$userid));
$r = $pst->fetch();
//$rc = $pst->rowCount();


$counter_points=$r['points'];
$new_count = 10;
$final_count = $counter_points + $new_count;


$update= $db->prepare('UPDATE users set points =:points where id=:id');
$update->execute(array(':points' => $final_count, ':id' =>$userid));


$update3= $db->prepare('UPDATE posts set points =:points where userid=:userid');
$update3->execute(array(':points' => $final_count, ':userid' =>$userid));




// for post owners points updates

$pst2 = $db->prepare('select * from users where id=:id');
$pst2->execute(array(':id' =>$post_userid));
$r2 = $pst2->fetch();
//$rc = $pst2->rowCount();


$counter_points2=$r2['points'];
$new_count2 = 10;
$final_count2 = $counter_points2 + $new_count2;

$update1= $db->prepare('UPDATE users set points =:points where id=:id');
$update1->execute(array(':points' => $final_count2, ':id' =>$post_userid));


$update2= $db->prepare('UPDATE posts set points =:points where userid=:userid');
$update2->execute(array(':points' => $final_count2, ':userid' =>$post_userid));






// update comments conts for posts

$cct = $db->prepare('select * from posts where id=:id');
$cct->execute(array(':id' =>$postid));
$rct_row = $cct->fetch();
$totalcom = $rct_row['total_comments'];
$total_comment_post = $totalcom + 1;

$update2= $db->prepare('UPDATE posts set total_comments =:total_comments where id=:id');
$update2->execute(array(':total_comments' => $total_comment_post, ':id' =>$postid));



}


$comment_result = $db->prepare('SELECT COUNT(*) AS cntcomment FROM comments WHERE type=1 and postid=:postid');
$comment_result->execute(array(':postid' => $postid));
$comment_row = $comment_result->fetch();
$totalcomment = $comment_row['cntcomment'];
$return_arr = array("comment"=>$totalcomment,"comdesc"=>$comdesc,"comment_username"=>$username,"comment_fullname"=>$fullname,"comment_photo"=>$userphoto,"comment_time"=>$timer);

echo json_encode($return_arr);