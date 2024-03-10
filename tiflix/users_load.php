<?php
error_reporting(0);
session_start();


$uid = strip_tags($_SESSION['uid1']);
$userid_sess = $uid;
$country_code = strip_tags($_SESSION['country_code1']);

include('settings.php');
include('data6rst.php');

// get total count
$pstmt = $db->prepare('SELECT * FROM users where status !=:status');
$pstmt->execute(array(':status' => 'Admin'));
$total_count = $pstmt->rowCount();

// ensure that they cotain only alpha numericals
if(strip_tags(isset($_POST["get_content"]))){
$get_content = strip_tags($_POST["get_content"]);
if($get_content == 'get_data'){

$sql_query = '';
$error = '';
$message='';
$response_bl = array();



$sql_query .= "SELECT * FROM users ";
if(strip_tags(isset($_POST["search"]["value"]))){

$search_value1= strip_tags($_POST["search"]["value"]);
$search_value=  htmlentities(htmlentities($search_value1, ENT_QUOTES, "UTF-8"));
//$sql_query .= 'WHERE (userid =:userid) AND  (sender_address LIKE "%'.$search_value.'%"  OR reciever_address LIKE "%'.$search_value.'%" OR harsh_address LIKE "%'.$search_value.'%" OR tfuel_amount LIKE "%'. $search_value.'%")';

$sql_query .= 'WHERE (status !=:status) AND (fullname LIKE "%'.$search_value.'%"  OR country_code LIKE "%'.$search_value.'%" OR email LIKE "%'.$search_value.'%" OR country_name LIKE "%'. $search_value.'%")';

  }

//ensure that order post is set
$start = $_POST['start'];
$length = $_POST['length'];
$draw= $_POST["draw"];
if(strip_tags(isset($_POST["order"]))){
$order_column = strip_tags($_POST['order']['0']['column']);
$order_dir = strip_tags($_POST['order']['0']['dir']);

$sql_query .= 'ORDER BY '.$order_column.' '.$order_dir.' ';
}
else{
$sql_query .= 'ORDER BY id DESC ';
}
if($length != -1){
$sql_query .= 'LIMIT ' . $start . ', ' . $length;
}

$pstmt = $db->prepare($sql_query);
$pstmt->execute(array(':status' => 'Admin'));
$rows_count = $pstmt->rowCount();

while($row = $pstmt->fetch()){
$rows1 = array();

$id = $row['id'];
$fullname = $row['fullname'];
$userid = $row['userid'];
$photo = $row['photo'];
$data = $row['data'];
$verified = $row['verified'];
$user_banned = $row['user_banned'];
$country_code = $row['country_code'];
$country_name = $row['country_name'];
$email = $row['email'];

$timing = $row['timing'];


if($user_banned=='no'){
$stat ="<span style='color:green;font-size:12px;'>Active</span><br>

<span style='' id='loader-b_$id'></span>
<span style='' id='result-b_$id'></span>

<button type='button' title='Ban Users' class='btn btn-primary btn-xs ban_btn' data-id='$id' data-fullname='$fullname' data-userid='$userid'> Ban User</button>";
}



if($user_banned=='yes'){
$stat ="<span style='color:red;font-size:12px;'>Banned</span><br>

<span style='' id='loader-ub_$id'></span>
<span style='' id='result-ub_$id'></span>

<button type='button' title='UnBan Users' class='btn btn-success btn-xs uban_btn' data-id='$id' data-fullname='$fullname' data-userid='$userid'> UnBan User</button>";

}




if($verified=='no'){
$vf ="<span style='color:red;font-size:12px;'>Not Verified</span><br>

<span style='' id='loader-v_$id'></span>
<span style='' id='result-v_$id'></span>

<button type='button' title='Verify User' class='btn btn-warning btn-xs v_btn' data-id='$id' data-fullname='$fullname' data-userid='$userid'> Verify User</button>";
}



if($verified=='yes'){
$vf ="<span style='color:green;font-size:12px;'>Verified</span><br>
<div class='social_conctacts verified'><span style='font-size:30px;color:white;' class=' fa fa-check' title='User Verified'></span></div>";
}







$image= "
<img class='' title='Image' alt='image' style='border-style: solid; border-width:3px; border-color:#ec5574; width:40px;height:40px; max-width:40px;max-height:40px;border-radius: 50%;' 
src='$photo'>"; 
 
$rows1[] = $image;            
$rows1[] = $fullname;
$rows1[] = $email;
//$rows1[] = $t_like." <span  style='color:#800000;cursor:pointer;font-size:20px;' class='fa fa-heart-o'></span>";
//$rows1[]  =$t_followers." <span  style='color:#800000;cursor:pointer;font-size:20px;' class='fa fa-user-o'></span>";
$rows1[]  =$country_code." <span  style='color:#800000;cursor:pointer;font-size:20px;' class='fa fa-flag-o'></span>";
$rows1[]  =$stat;
$rows1[]  =$vf;
$rows1[] = '<span data-livestamp="'.$timing.'"></span>';


$response_bl[] = $rows1;
}

$data = array(
"draw"    => $draw,
"recordsTotal"  => $rows_count,
"recordsFiltered" => $total_count,
"data"    => $response_bl);
}// you can close this



 //}
 
 


 echo json_encode($data);
}



?>