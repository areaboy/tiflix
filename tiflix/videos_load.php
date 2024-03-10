<?php
error_reporting(0);
session_start();


$uid = strip_tags($_SESSION['uid1']);
$userid_sess = $uid;
$country_code = strip_tags($_SESSION['country_code1']);

include('settings.php');
include('data6rst.php');

// get total count
$pstmt = $db->prepare('SELECT * FROM posts');
$pstmt->execute(array());
$total_count = $pstmt->rowCount();

// ensure that they cotain only alpha numericals
if(strip_tags(isset($_POST["get_content"]))){
$get_content = strip_tags($_POST["get_content"]);
if($get_content == 'get_data'){

$sql_query = '';
$error = '';
$message='';
$response_bl = array();



$sql_query .= "SELECT * FROM posts ";
if(strip_tags(isset($_POST["search"]["value"]))){

$search_value1= strip_tags($_POST["search"]["value"]);
$search_value=  htmlentities(htmlentities($search_value1, ENT_QUOTES, "UTF-8"));
//$sql_query .= 'WHERE (userid =:userid) AND  (content LIKE "%'.$search_value.'%")';

$sql_query .= 'WHERE title LIKE "%'.$search_value.'%"  OR content LIKE "%'.$search_value.'%" OR fullname LIKE "%'.$search_value.'%" OR video_category LIKE "%'. $search_value.'%" ';

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
$pstmt->execute(array());
$rows_count = $pstmt->rowCount();

while($row = $pstmt->fetch()){
$rows1 = array();


$id = $row['id'];
$fullname = $row['fullname'];
$userid = $row['userid'];
$photo = $row['userphoto'];
$title = $row['title'];
$title_seo = $row['title_seo'];
$content = $row['content'];
$t_like = $row['t_like'];
$t_share = $row['t_share'];
$total_comments = $row['total_comments'];
$video = $row['video'];
$timing = $row['timer1'];
$ban = $row['ban'];
$video_category = $row['video_category'];
$postid =$id;
$data_type = $row['data_type'];
$file_type = $row['file_type'];

if($ban=='no'){
$stat ="<span style='color:green;font-size:12px;'>Active</span><br>

<span style='' id='loader-b_$id'></span>
<span style='' id='result-b_$id'></span>

<button disabled type='button' title='Ban Videos' class='btn btn-primary btn-xs ban_btn' data-id='$id' data-fullname='$fullname' data-userid='$userid'> Ban Video</button>";
}



if($ban=='yes'){
$stat ="<span style='color:red;font-size:12px;'>Banned</span><br>

<span style='' id='loader-ub_$id'></span>
<span style='' id='result-ub_$id'></span>

<button type='button' title='UnBan Video' class='btn btn-success btn-xs uban_btn' data-id='$id' data-fullname='$fullname' data-userid='$userid'> UnBan Video</button>";

}




$del ="

<span style='' id='loader-v_$id'></span>
<span style='' id='result-v_$id'></span>

<button type='button' title='Delete Video' class='btn btn-danger btn-xs v_btn' data-id='$id' data-fullname='$fullname' data-userid='$userid'>Delete Video</button>";


$video_compress ="

<span style='' id='loader-vid_$id'></span>
<span style='' id='result-vid_$id'></span>

<button type='button' title='Compress Video' class='btn btn-primary btn-xs compress_btn' data-id='$id' data-video_url='$video'>Compress Video</button>";




$image= "
<img class='' style='border-style: solid; border-width:3px; border-color:#ec5574; width:40px;height:40px; max-width:40px;max-height:40px;border-radius: 50%;' 
src='$photo'>

";  


$video_url_call = $video;

$t_video ="
<video
    id='my-video_$postid'
    class='video-js responsive_video'
    controls
    preload='auto'
    width='150'
    height='70'
    poster=''
    data-setup='{}'
  >
   <source src='$video_url_call' type='$file_type' />
  
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href='https://videojs.com/html5-video-support/' target='_blank'
        >supports HTML5 video</a
      >
    </p>
  </video>
";








$rows1[] = $image;            
$rows1[] = $fullname;
$rows1[] = $t_video;
$rows1[] = $title;
$rows1[] = $t_like." <span  style='color:#800000;cursor:pointer;font-size:20px;' class='fa fa-heart-o'></span>";
$rows1[]  =$total_comments." <span  style='color:#800000;cursor:pointer;font-size:20px;' class='fa fa-comments-o'></span>";
$rows1[]  =$video_category;
$rows1[]  ="$del <br> <br> $video_compress";
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