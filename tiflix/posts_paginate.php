<?php
error_reporting(0);
?>


<link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />

  <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->





<?php
include('data6rst.php');
$rese= $db->prepare("SELECT * FROM settings_site");
$rese->execute(array());
$rowe = $rese->fetch();
$counte = $rese->rowCount();


$logo = $rowe['logo'];
$titlex = $rowe['title'];
$descriptionx = $rowe['description'];
$site_keywords = $rowe['site_keywords'];
$header_color = $rowe['header_color'];
$footer_color = $rowe['footer_color'];
$day_pay = $rowe['day_pay'];
$month_pay = $rowe['month_pay'];
$year_pay = $rowe['year_pay'];
$site_display = $rowe['site_display'];


if($header_color==''){
$header_color = "#B931B9";
}




?>

<script>




// comment load starts




$(document).ready(function(){

 $(".comment_btn").click(function(){


 var id = this.id; 
var post_id =id;
     var total_comment = $(this).data('total_comment');
    
//$("#total_comment_"+id).html(total_comment);
$("#total_comment").html(total_comment);




if(post_id == ''){
alert('Post/Video Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-com").fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Loading Comments.</span>');

        $.ajax({
            url: 'comment_loading.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'html',
            success: function(data){


$("#result_com").html(data);
$("#loader-com").hide();

            }
        });


    });
});

// comment Loads ends





$(document).ready(function(){

 $(".follow_btn2").click(function(){


 var id = this.id; 
var post_id =id;
     var reciever_userid = $(this).data('userid');
     var reciever_fullname = $(this).data('fname');




if(reciever_userid == ''){
alert('Reciever Userid cannot be empty');
return false;
}
        // AJAX Request


$("#loader-follow2_"+id).fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Processing your Following.</span>');

        $.ajax({
            url: 'follow.php',
            type: 'post',
            data: {reciever_userid:reciever_userid, reciever_fullname:reciever_fullname, post_id:post_id},
            dataType: 'json',
            success: function(data){


var msg = data['msg'];


if(msg=='failed1'){
alert('You Cannot Follow Yourself');
$("#loader-follow2_"+id).hide();
}


if(msg=='failed'){
alert('You Already Followed This User');
$("#loader-follow2_"+id).hide();
}

if(msg=='success'){

                var follow = "<div style='background:green;color:white;padding:6px;border:none'>Following Successful.</div>";
               
$("#follow_result2_"+id).html(follow);
setTimeout(function(){ $("#follow_result2_"+id).html(''); }, 5000);	

alert('Following Successful');

$("#loader-follow2_"+id).hide();
}



            }
        });

    });
});

// following







// post share starts




$(document).ready(function(){

 $(".pshare_btn2").click(function(){



     var post_id = this.id; 
     var id = post_id;



if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-pshare2_"+id).fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Video Posts Likes.</span>');

        $.ajax({
            url: 'post_share.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='failed'){
alert('You Already Share This Post/Video');
$("#loader-pshare2_"+id).hide();
}

if(msg=='success'){

                var share = data['share'];
               
$("#share_total2_"+id).text(share);


alert('Post/Video Successfully Shared');

$("#loader-pshare2_"+id).hide();
}



            }
        });

    });
});

// post share ends





// post like starts




$(document).ready(function(){

 $(".plike_btn2").click(function(){



     var post_id = this.id; 
     var id = post_id;

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-plike2_"+id).fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Video Posts Likes.</span>');

        $.ajax({
            url: 'post_like.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='failed'){
alert('You Already Like This Post/Video');
$("#loader-plike2_"+id).hide();
}

if(msg=='success'){

                var like = data['like'];
               
$("#plike_total2_"+id).text(like);


alert('Like Sent Successfully');

$("#loader-plike2_"+id).hide();
}



            }
        });

    });
});

// post like ends







</script>

<?php

// configuration
//include('data6rst.php');
include('settings.php');

$row = 0;
if(isset($_POST['row_limit'])){
    $row = strip_tags($_POST['row_limit']);
}

$rowpage = $rowpage_video_post;

$result = $db->prepare("SELECT * FROM posts order by id desc limit :row1, :rowpage");

//$result = $db->prepare("SELECT * FROM posts limit :row1, :rowpage");
$result->bindValue(':rowpage', (int) trim($rowpage), PDO::PARAM_INT);
$result->bindValue(':row1', (int) trim($row), PDO::PARAM_INT);
//$result->bindValue(':userid', trim($owner_id), PDO::PARAM_STR);
//$result->bindValue(':project_id', trim($projectid), PDO::PARAM_INT);
$result->execute();

$count_post = $result->rowCount();


	while($row = $result->fetch()){


$id = htmlentities(htmlentities($row['id'], ENT_QUOTES, "UTF-8"));
$postid = $id;
$title = htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
$title_seo = htmlentities(htmlentities($row['title_seo'], ENT_QUOTES, "UTF-8"));
$content = htmlentities(htmlentities($row['content'], ENT_QUOTES, "UTF-8"));
$username = htmlentities(htmlentities($row['username'], ENT_QUOTES, "UTF-8"));
$fullname = htmlentities(htmlentities($row['fullname'], ENT_QUOTES, "UTF-8"));
$userphoto = htmlentities(htmlentities($row['userphoto'], ENT_QUOTES, "UTF-8"));
$created_time = htmlentities(htmlentities($row['timer2'], ENT_QUOTES, "UTF-8"));
$timer1 = htmlentities(htmlentities($row['timer1'], ENT_QUOTES, "UTF-8"));
$post_userid = htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));

$microcontent = substr($content, 0, 120)."...";
$microtitle = substr($title, 0, 80)."..";
$points = htmlentities(htmlentities($row['points'], ENT_QUOTES, "UTF-8"));
$total_comment = htmlentities(htmlentities($row['total_comments'], ENT_QUOTES, "UTF-8"));
$data_type = htmlentities(htmlentities($row['data_type'], ENT_QUOTES, "UTF-8"));
$video = htmlentities(htmlentities($row['video'], ENT_QUOTES, "UTF-8"));
$file_type = htmlentities(htmlentities($row['file_type'], ENT_QUOTES, "UTF-8"));
$t_like = htmlentities(htmlentities($row['t_like'], ENT_QUOTES, "UTF-8"));
$t_share = htmlentities(htmlentities($row['t_share'], ENT_QUOTES, "UTF-8"));
$t_view = htmlentities(htmlentities($row['t_view'], ENT_QUOTES, "UTF-8"));
$verified = htmlentities(htmlentities($row['verified'], ENT_QUOTES, "UTF-8"));


$video_category = htmlentities(htmlentities($row['video_category'], ENT_QUOTES, "UTF-8"));




if($verified =='yes'){
$vf = "<div class='social_conctacts verified'><span style='font-size:30px;color:white;' class=' fa fa-check' title='User Verified'></span></div>";
}else{

$vf='';
}






            ?>

                    <div class="post col-sm-4 well" id="post_<?php echo $id; ?>" style='display:inline-block;height:570px;'>




<h1 style='font-size:20px;color:<?php echo $header_color; ?>'>Title: <?php echo $microtitle; ?></h1>

<b style='font-size:16px;color:#800000'>Category: <?php echo $video_category; ?></b><br>

<span>

&nbsp;<span id="<?php echo $postid; ?>" style="color:#800000;font-size:26px;" title="Comments" class="fa fa-comments-o comment_btn_no" title='Comments' data-toggle='modal' data-target='#myModal_comments' id='<?php echo $postid; ?>' data-total_comment='<?php echo $total_comment; ?>'> <span style='font-size:14px;'>Comments</span>  </span>
<span style='font-size:14px;color:#800000;'>(<span id="comment_total_<?php echo $postid; ?>"><?php echo $total_comment; ?></span>)</span>

</span>

<span>

<span style="font-size:26px;color:#800000;cursor:pointer;" class="plike_btn_no fa fa-heart-o" id="<?php echo $postid; ?>" title="Like">
&nbsp;<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
<span style='font-size:14px'>(<span id="plike_total_<?php echo $postid; ?>"><?php echo $t_like; ?></span>)</span>
</span> 

<span id="loader-plike_<?php echo $postid; ?>"></span>
</span>

<br>
<span style='color:#800000;'><b> Uploaded: </b> <span data-livestamp="<?php echo $timer1;?>"></span></span> <br>

<span style='color:blue;'><b> Created By: </b> <?php echo $fullname;?></span> <br>


<button style='' class='readmore_btn btn btn-warning'><a title='Watch in Big Screen & Discuss' style='color:white;' 
href='<?php echo $site_url; ?>/watch.php?title=<?php echo $title_seo; ?>'>Watch in Big Screen, Discuss & Comments</a></button>
<br>
<br>





<video
    id='my-video_<?php echo $postid; ?>'
    class='video-js responsive_video'
    controls
    preload='auto'
    width='300'
    height='300'
    poster=''
    data-setup='{}'
title="<?php echo $title; ?>"
  >
   <source src='<?php echo $video; ?>' type='<?php echo $file_type; ?>' />
  
    <p class='vjs-no-js'>
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href='https://videojs.com/html5-video-support/' target='_blank'
        >supports HTML5 video</a
      >
    </p>
  </video>





<br>

<button style='display:none' class='readmore_btn btn btn-warning'><a title='Click to Read More' style='color:white;' 
href='reply.php?title=<?php echo $title_seo; ?>'>Read More & Reply/Comments</a></button>
</div>

 <?php

                }
            ?>






	