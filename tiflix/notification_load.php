<?php 
ob_start();
error_reporting(0);
include('settings.php');

 ?>
<script>
$(document).ready(function(){

$('.notify_delete_post_btn').click(function(){
// confirm start
 if(confirm("Are you sure you want to Delete This Alerts: ")){
var id = $(this).data('id');
var rid = $(this).data('rid');

//var userid_sess_data = localStorage.getItem('useridsessdata');

$(".loader-notify-delete-post_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i>&nbsp;Please Wait, Alerts is being deleted...</div>');
var datasend = {'id': id, 'rid': rid};
		$.ajax({
			
			type:'POST',
			url:'notify_delete_post.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


	if(msg == 1){
alert('Alerts Successfully Deleted');
$(".loader-notify-delete-post_"+id).hide();
$(".result-notify-delete-post_"+id).html("<div style='color:white;background:green;padding:10px;'>Alerts Successfully Deleted</div>");
setTimeout(function(){ $(".result-notify-delete-post_"+id).html(''); }, 5000);
//location.reload();

$(".rec_"+id).animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");

}


	if(msg == 0){

alert('Alerts could not be deleted. Please ensure you are connected to Internet.');
$(".loader-notify-delete-post_"+id).hide();
$(".result-notify-delete-post_"+id).html("<div style='color:white;background:red;padding:10px;'>Alerts could not be deleted. Please ensure you are connected to Internet.</div>");
setTimeout(function(){ $(".result-notify-delete-post_"+id).html(''); }, 5000);

}

}
			
});
}

// confirm ends

                });










            });





// Video streaming session initializations 3 starts

$(document).ready(function(){
$(".videostreaming_session_btn3").click(function(){
//$(document).on( 'click', '.videostreaming_session_btn3', function(){ 



     var postid = this.id; 
     var id = postid;

var video_url = $(this).data('video_url');
var title_seo = $(this).data('title_seo');
var notifyId = id;

alert(video_url);
alert(title_seo);
alert(notifyId);
return false;

if(id == ''){
alert('Video URL cannot be empty');
return false;
}
        // AJAX Request


$("#loader-videostreaming_session3_"+id).fadeIn(400).html('<br><div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Video Streaming Session is being Initialized.</div>');

        $.ajax({
            url: 'videostreaming_session2.php',
            type: 'post',
            data: {video_url:video_url, title_seo:title_seo},
            dataType: 'html',
            success: function(data){

$("#loader-videostreaming_session3_"+id).hide();
$("#result_videostreaming_session3_"+id).html(data);

            }
        });

    });
});

// Video streaming session initializations 3 ends




</script>





<style>



.post-css2{
background:#ec5574;
border:none;
color:white;
padding:6px;
border-radius:20%;
}

.post-css2:hover{
background:orange;
color:black;
}




.post-css1{
background:red;
border:none;
color:white;
padding:6px;
}

.post-css1:hover{
background:orange;
color:black;
}


.post-css{
background:navy;
border:none;
color:white;
padding:6px;
text-align:center;
}

.post-css:hover{
background:orange;
color:black;
}

.notify_content_css{
display:inline-block;border-style: dashed; border-width:2px; border-color: 
orange;color:black;background:#eeeeee;padding:10px;
}


.notify_content_css:hover{
color:black;background:#ec5574;
}
</style>




<?php

$sender_id=strip_tags($_POST['sender_id']);
$userid_sess_data = $sender_id;

//echo "(nnn:   $userid_sess_data)";

//echo "<script>alert('$userid_sess_data');</script>";

require('data6rst.php');

$result = $db->prepare('SELECT * FROM notification where reciever_id = :reciever_id order by id desc');

		$result->execute(array(
			':reciever_id' => $userid_sess_data
    ));
$nosofrows = $result->rowCount();
//echo $nosofrows;

$rec_List1 = $nosofrows;


if($rec_List1  == 0){

echo "<div style='background:red;color:white;padding:10px;border:none'>No New Contents or Comments Alerts Yet.</div>";
}


while($v1 = $result->fetch()){
//foreach($row['data'] as $v1){


$id = $v1['id'];
$post_id = $v1['id'];
$sender_userid = $v1['userid'];
$sender_fullname1 = $v1['fullname'];
$sender_photo = $v1['photo'];
$department =  $v1['user_rank'];
$rid = $v1['reciever_id'];
$status = $v1['status'];
$type  = $v1['type'];
$timing = $v1['timing'];
$title = $v1['title'];
//$microtitle = substr($title, 0, 80)."...";

$microtitle = $title;
$title_seo = $v1['title_seo'];
$title1 = $v1['title_seo'];
$video_url = $v1['video'];

// replace empty space with hyphen
$sender_fullname = str_replace(' ', '-', $sender_fullname1);

$description = $title;


?>





<div class="col-sm-12 notify_content_css rec_<?php echo $id; ?>" >


<?php 
if($type == 'post'){
?>


<div  style="color:black;padding:10px;background:#ddd" >

<img style='max-height:60px;max-width:60px;' class='img-circle' src='<?php echo $sender_photo; ?>' alt='User Image'>


<span style='font-size:20px;color:navy;' class="fa fa-edit"></span><b style='color:navy'>Video <?php echo $status;?></b>

<br><b><?php echo $sender_fullname1; ?></b> Added New Video<br>
<b>Title:</b> <?php echo $microtitle; ?><br>
<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $timing;?>"></span></span> 

<?php 
if($status == 'unread'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>


<?php 
if($status == 'read'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span><span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>

<br>

<p>




<span class='loader-videostreaming_session3_<?php echo $post_id; ?>'></span>
<span class='result_videostreaming_session3_<?php echo $post_id; ?>'></span>


<button style='' class='videostreaming_session_btn3 pull-left col-sm-5 post-css' data-notifyId='<?php echo $post_id; ?>'  data-title_seo='<?php echo $title_seo; ?>' data-video_url='<?php echo $video_url; ?>' id='<?php echo $post_id; ?>' title='Watch Video'>
Stream Video</button>

(<?php echo $video_url; ?>)
 
<a style='display:none;' href='<?php echo $site_url; ?>/watch2.php?title=<?php echo $title1; ?>&notifyId=<?php echo $id; ?>' class='pull-left col-sm-5 post-css' title='View Video'>Watch Video</a>
<button class='pull-right col-sm-6 post-css1 notify_delete_post_btn' data-id='<?php echo $id; ?>' data-rid='<?php echo $rid; ?>' title='Delete Alerts'>Delete Alerts</button>
   <div class="loader-notify-delete-post_<?php echo $id; ?>"></div>
   <div class="result-notify-delete-post_<?php echo $id; ?>"></div>
</p>
<br>
</div>
<?php
}
?>







<?php 
if($type == 'post_like'){
?>


<div  style="color:black;padding:10px;background:#ddd">

<img style='max-height:60px;max-width:60px;' class='img-circle' src='<?php echo $sender_photo; ?>' alt='User Image'>


<span style='font-size:20px;color:navy;' class="fa fa-edit"></span><b style='color:navy'>Video <?php echo $status;?></b>

<br><b><?php echo $sender_fullname1; ?></b> Liked Video Updates<br>
<b>Title:</b> <?php echo $microtitle; ?><br>
<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $timing;?>"></span></span> 

<?php 
if($status == 'unread'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>


<?php 
if($status == 'read'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span><span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>

<br>

<p>



 
<a href='<?php echo $site_url; ?>/watch2.php?title=<?php echo $title1; ?>&notifyId=<?php echo $id; ?>' class='pull-left col-sm-5 post-css' title='View Likes'>View Likes</a>
<button class='pull-right col-sm-6 post-css1 notify_delete_post_btn' data-id='<?php echo $id; ?>' data-rid='<?php echo $rid; ?>' title='Delete Alerts'>Delete Alerts</button>
   <div class="loader-notify-delete-post_<?php echo $id; ?>"></div>
   <div class="result-notify-delete-post_<?php echo $id; ?>"></div>
</p>
<br>
</div>
<?php
}
?>







<?php 
if($type == 'comment'){
?>


<div  style="color:black;padding:10px;background:#ddd">

<img style='max-height:60px;max-width:60px;' class='img-circle' src='<?php echo $sender_photo; ?>' alt='User Image'>


<span style='font-size:20px;color:navy;' class="fa fa-comments-o"></span><b style='color:navy'>Comment <?php echo $status;?></b>

<br><b><?php echo $sender_fullname1; ?></b> Commented on your Video<br>
<b>Title:</b> <?php echo $microtitle; ?><br>
<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $timing;?>"></span></span> 

<?php 
if($status == 'unread'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>


<?php 
if($status == 'read'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span><span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>

<br>

<p>
<a href='<?php echo $site_url; ?>/watch2.php?title=<?php echo $title1; ?>&notifyId=<?php echo $id; ?>' class='pull-left col-sm-5 post-css' title='View Comments'>View Comments</a>
<button class='pull-right col-sm-6 post-css1 notify_delete_post_btn' data-id='<?php echo $id; ?>' data-rid='<?php echo $rid; ?>' title='Delete Alerts'>Delete Alerts</button>
   <div class="loader-notify-delete-post_<?php echo $id; ?>"></div>
   <div class="result-notify-delete-post_<?php echo $id; ?>"></div>
</p>
<br>
</div>
<?php
}
?>





<?php 
if($type == 'comment_like'){
?>


<div  style="color:black;padding:10px;background:#ddd">

<img style='max-height:60px;max-width:60px;' class='img-circle' src='<?php echo $sender_photo; ?>' alt='User Image'>


<span style='font-size:20px;color:navy;' class="fa fa-comments-o"></span><b style='color:navy'>Likes on Comments <?php echo $status;?></b>

<br><b><?php echo $sender_fullname1; ?></b>Likes Comments<br>
<b>Title:</b> <?php echo $microtitle; ?><br>
<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $timing;?>"></span></span> 

<?php 
if($status == 'unread'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>


<?php 
if($status == 'read'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span><span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>

<br>

<p>
<a href='<?php echo $site_url; ?>/watch2.php?title=<?php echo $title1; ?>&notifyId=<?php echo $id; ?>' class='pull-left col-sm-5 post-css' title='Likes on Comments'>View Likes on Comments</a>
<button class='pull-right col-sm-6 post-css1 notify_delete_post_btn' data-id='<?php echo $id; ?>' data-rid='<?php echo $rid; ?>' title='Delete Alerts'>Delete Alerts</button>
   <div class="loader-notify-delete-post_<?php echo $id; ?>"></div>
   <div class="result-notify-delete-post_<?php echo $id; ?>"></div>
</p>
<br>
</div>
<?php
}
?>








<?php 
if($type == 'reply'){
?>


<div  style="color:black;padding:10px;background:#ddd">

<img style='max-height:60px;max-width:60px;' class='img-circle' src='<?php echo $sender_photo; ?>' alt='User Image'>


<span style='font-size:20px;color:navy;' class="fa fa-comments-o"></span><b style='color:navy'>Reply <?php echo $status;?></b>

<br><b><?php echo $sender_fullname1; ?></b>Replied Comments<br>
<b>Title:</b> <?php echo $microtitle; ?><br>
<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $timing;?>"></span></span> 

<?php 
if($status == 'unread'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>


<?php 
if($status == 'read'){
?>
<span style='font-size:20px;color:green;' class="fa fa-check"></span><span style='font-size:20px;color:green;' class="fa fa-check"></span>
<?php } ?>

<br>

<p>
<a href='<?php echo $site_url; ?>/watch2.php?title=<?php echo $title1; ?>&notifyId=<?php echo $id; ?>' class='pull-left col-sm-5 post-css' title='View Reply'>View Reply</a>
<button class='pull-right col-sm-6 post-css1 notify_delete_post_btn' data-id='<?php echo $id; ?>' data-rid='<?php echo $rid; ?>' title='Delete Alerts'>Delete Alerts</button>
   <div class="loader-notify-delete-post_<?php echo $id; ?>"></div>
   <div class="result-notify-delete-post_<?php echo $id; ?>"></div>
</p>
<br>
</div>
<?php
}
?>





</div>



<?php
}
?>

<?php
ob_flush();
?>


