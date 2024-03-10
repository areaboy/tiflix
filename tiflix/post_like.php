<?php
//error_reporting(0);
session_start();

$uid = strip_tags($_SESSION['uid1']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$userphoto = strip_tags($_SESSION['photo1']);
$user_rank = strip_tags($_SESSION['user_rank1']);

$post_id = strip_tags($_POST['post_id']);
$postid  = $post_id;
$like = '1';


if ($post_id == ''){
exit();
}

include('data6rst.php');


if($post_id != ''){



$token= md5(uniqid());
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");
$pa = 0;


/*
//check if User has already like the post

$resu = $db->prepare('SELECT * FROM post_like WHERE  postid=:postid and userid=:userid');
$resu->execute(array(':postid' => $post_id, ':userid' => $userid));
$rowpu = $resu->fetch();
$c_count= $resu->rowCount();
if($c_count == '1'){

$return_arr = array("msg"=>"failed");
echo json_encode($return_arr);
exit();
}
*/

$statement = $db->prepare('INSERT INTO post_like
(postid,type,like_count,timer1,timer2,userid,username,fullname,photo)
 
                          values
(:postid,:type,:like_count,:timer1,:timer2,:userid,:username,:fullname,:photo)');

$statement->execute(array( 
':postid' => $post_id,
':type' => '1',
':like_count' => $like,
':timer1' => $timer,
':timer2' => $created_time,
':userid' => $userid,
':username' => $username,
':fullname' => $fullname,
':photo' => $userphoto

));










//$res = $db->query("SELECT LAST_INSERT_ID()");
//$commentID = $res->fetchColumn();


// query table comments to get data
$result = $db->prepare('SELECT * FROM posts WHERE id =:id');
$result->execute(array(':id' => $post_id));
$db_count = $result->rowCount();

if($db_count ==0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>This post does not exist Yet.. <b></b></div>";
}
$row = $result->fetch();


$t_like= htmlentities(htmlentities($row['t_like'], ENT_QUOTES, "UTF-8"));
$postid= htmlentities(htmlentities($row['id'], ENT_QUOTES, "UTF-8"));
$totallike = $t_like + 1;
$post_userid= htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
$reciever_userid = $post_userid;
$title= htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
$title_seo= htmlentities(htmlentities($row['title_seo'], ENT_QUOTES, "UTF-8"));






// update Users Likes


$pst = $db->prepare('select * from users where userid=:userid');
$pst->execute(array(':userid' =>$post_userid));
$r = $pst->fetch();
//$rc = $pst->rowCount();


$counter_points=$r['t_like'];
$new_count = 1;
$final_count = $counter_points + $new_count;


$update= $db->prepare('UPDATE users set t_like =:t_like where userid=:userid');
$update->execute(array(':t_like' => $final_count, ':userid' =>$post_userid));





               


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
':type' => 'post_like',
':timing' => $timer,
':title' => $title,
':title_seo' => $title_seo
));






// update like conts for posts

$cct = $db->prepare('select * from posts where id=:id');
$cct->execute(array(':id' =>$post_id));
$rct_row = $cct->fetch();
$totallikes = $rct_row['t_like'];
$total_l = $totallikes + 1;

$update2= $db->prepare('UPDATE posts set t_like =:t_like where id=:id');
$update2->execute(array(':t_like' => $total_l, ':id' =>$post_id));



}

//$resultp = $db->prepare('SELECT COUNT(*) AS cnt FROM post_like WHERE postid=:postid');
$resultp = $db->prepare('SELECT COUNT(*) AS cnt FROM post_like WHERE  postid=:postid');
$resultp->execute(array(':postid' => $post_id));
$rowp = $resultp->fetch();
$totalliking = $rowp['cnt'];


$return_arr = array("like"=>$totalliking, "msg"=>"success");
echo json_encode($return_arr);