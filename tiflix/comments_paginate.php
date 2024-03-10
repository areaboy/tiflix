
<?php
error_reporting(0); 
ob_start();
include('settings.php');
?>

<style>

.follow_css { 
color: #fff; display: block; float: right; border-radius: 12px;  background: #EE1D52; padding:6px;font-size:14px;
cursor:pointer;
 }

.follow_css:hover{
background:orange;
color:black;
}

.comment_css{
background:#ddd;border-radius:0%;border-style: solid; border-width:0px; border-color: #ec5574;
}


.comment_css:hover{
background:#c1c1c1;
color:black;

}



.social_conctacts {
font-weight: bold;
font-family: comic sans ms;
border-radius: 50%;

height: 40px;
width: 40px;
border: none;
color: white;
padding: 4px 14px;
font-size: 18px;
cursor: pointer;
text-align: center;
margin: auto;
float:left;

}
.verified {
background-color: #EE1D52;
} 
/*
.verified:hover {
background: #f44336;
-moz-transform: scale(1.1);
-webkit-transform: scale(1.1);
transform: scale(1.5);
}
*/



.img_container_portfolio {
width:auto;
  position: relative;
}

.img_overlay_portfolio {
overflow: hidden;
transition: all 0.6s ease;
width: 0px; 
top: 10px;
position: absolute;
//background: rgba(0, 0, 0, 0.58);
background: #ddd;
height: 50%;
//transform: skew(-12deg);
}



.img_text_portfolio {
padding: 16px;
color: white;
font-size: 18px;
position: absolute;
-o-transition: all 0.5s;         /* Opera */
-ms-transition: all 0.5s;        /* IE 9 */
transition: all 0.5s;
-webkit-transition: all 0.5s;  /* Safari and Chrome */
-moz-transition: all 0.5s;      /* firefox */
/*
transition: all 1s ease; 
*/
}

.img_container_portfolio:hover .img_overlay_portfolio {
 width: 40%;
height:70px;
}

. portfolio_img_height_width{
min-width:0%;
min-height:60px;
}


</style>


<script src="jquery.min.js"></script>
<script>
/*

$(document).ready(function(){

//comment
 $(".comments").click(function(){
     var postid = this.id; 
     var type = 1;
var comment_type=1;
var comdesc = $('#comdesc').val();

if(comdesc == ''){
alert('comment cannot be empty');
return false;
}
        // AJAX Request


$("#loader-comments").fadeIn(400).html('<br><div style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Comments.</div>');

        $.ajax({
            url: 'comment.php',
            type: 'post',
            data: {postid:postid,comdesc:comdesc},
            dataType: 'json',
            success: function(data){

                var comment = data['comment'];
                var comdesc = data['comdesc'];
                var comment_username = data['comment_username'];
                 var comment_fullname = data['comment_fullname'];
 var comment_photo = data['comment_photo'];
 var comment_time = data['comment_time'];
//$("#comment_total").text(comment);
$("#comment_total_"+postid).text(comment);
  var comment_json = "<div class='comment_css' style=''>" +
                   
 "<img style='border-style: solid; border-width:3px; border-color:#ec5574; width:40px;height:40px; max-width:40px;max-height:40px;border-radius: 50%;' src='uploads/" + comment_photo +"' /><br>" +
      "<b style='font-size:14px;text-align:left;'>Name</b>: " + comment_fullname + "<br>" +              
                    "<b style='font-size:12px;text-align:left;'>Comment: </b>" + comdesc + "<br>" +
"<span><b> <span class='fa fa-calendar'></span>Time:</b> <span data-livestamp='" + comment_time + "'></span></span>"+
                    "</div>";
$("#commentsubmissionResult").append(comment_json)
alert('Comment Added Successfully');

$('#comdesc').val('');

$("#loader-comments").hide();

            }
        });

    });

});

*/

// Reply




$(document).ready(function(){

 $(".reply_btn").click(function(){



     var comment_id = this.id; 
     var id = comment_id;
//var reply = $('#reply').val();
var reply = $("#reply_"+id).val();




if(reply == ''){
alert('Reply cannot be empty');
return false;
}
        // AJAX Request


$("#loader-reply_"+id).fadeIn(400).html('<br><div style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Reply.</div>');

        $.ajax({
            url: 'reply_comment.php',
            type: 'post',
            data: {comment_id:comment_id,reply:reply},
            dataType: 'json',
            success: function(data){

                var reply = data['reply'];
                var reply_text = data['reply_text'];
                var reply_username = data['reply_username'];
                 var reply_fullname = data['reply_fullname'];
 var reply_photo = data['reply_photo'];
 var reply_time = data['reply_time'];
//$("#reply_total").text(reply);
$("#reply_total_"+id).text(reply);
  var reply_json = "<div style='width:60%;max-width:60%;background:white;border-radius:20%;border-style: solid; border-width:2px; border-color: #ddd;width:100%;'>" +
                   
 "<img style='border-style: solid; border-width:3px; border-color:#ddd; width:20px;height:20px; max-width:20px;max-height:20px;border-radius: 50%;' src=" + reply_photo +" /><br>" +
      "<b style='font-size:12px;text-align:left;'>Name</b>: " + reply_fullname + "<br>" +              
                    "<b style='font-size:12px;text-align:left;'>Reply: </b>" + reply_text + "<br>" +
"<span><b> <span class='fa fa-calendar'></span>Time:</b> <span data-livestamp='" + reply_time + "'></span></span>"+
                    "</div>";
//$("#replysubmissionResult").append(reply_json);
$("#replysubmissionResult_"+id).append(reply_json);

alert('Reply Added Successfully');

//$('#reply').val('');
$("#reply_"+id).val('');

$("#loader-reply_"+id).hide();

            }
        });

    });
});





//LoadReply

$(document).ready(function(){

 $(".reply_load_btn").click(function(){



     var comment_id = this.id; 
     var id = comment_id;
//var reply = $("#reply_"+id).val();


if(id == ''){
alert('Comment Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-reply1_"+id).fadeIn(400).html('<br><div style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Loading Reply.</div>');

        $.ajax({
            url: 'reply_load.php',
            type: 'post',
            data: {comment_id:comment_id},
            dataType: 'html',
            success: function(data){

$("#replysubmissionResult1_"+id).html(data);

//alert('Reply Loaded Successfully');


$("#loader-reply1_"+id).hide();

            }
        });

    });
});









// post like starts




$(document).ready(function(){

 $(".plike_btn").click(function(){



     var post_id = this.id; 
     var id = post_id;

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-plike_"+id).fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Video Posts Likes.</span>');

        $.ajax({
            url: 'post_like.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='failed'){
alert('You Already Like This Post/Video');
$("#loader-plike_"+id).hide();
}

if(msg=='success'){

                var like = data['like'];
               
$("#plike_total_"+id).text(like);


alert('Like Sent Successfully');

$("#loader-plike_"+id).hide();
}



            }
        });

    });
});

// post like ends







// comment like starts




$(document).ready(function(){

 $(".clike_btn").click(function(){

var post_id = $(this).data('post_id');

     var comment_id = this.id; 
     var id = comment_id;



if(id == ''){
alert('Comment Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-clike_"+id).fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Comments Likes.</span>');

        $.ajax({
            url: 'comment_like.php',
            type: 'post',
            data: {comment_id:comment_id, post_id:post_id},
            dataType: 'json',
            success: function(data){
var msg = data['msg'];
if(msg=='failed'){
alert('You Already Like This Comment');
$("#loader-clike_"+id).hide();
}

if(msg=='success'){

                var like = data['like'];
               
$("#clike_total_"+id).text(like);


alert('Like Sent Successfully');

$("#loader-clike_"+id).hide();
}



            }
        });

    });
});

// comments like ends







// post share starts




$(document).ready(function(){

 $(".pshare_btn").click(function(){



     var post_id = this.id; 
     var id = post_id;



if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-pshare_"+id).fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Video Posts Likes.</span>');

        $.ajax({
            url: 'post_share.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='failed'){
alert('You Already Share This Post/Video');
$("#loader-pshare_"+id).hide();
}

if(msg=='success'){

                var share = data['share'];
               
$("#share_total_"+id).text(share);


alert('Post/Video Successfully Shared');

$("#loader-pshare_"+id).hide();
}



            }
        });

    });
});

// post share ends












</script>

<?php
session_start();
include ('authenticate.php');
$userid_sess =  htmlentities(htmlentities($_SESSION['uid1'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8"));
$username_sess =   htmlentities(htmlentities($_SESSION['username1'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo1'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email1'], ENT_QUOTES, "UTF-8"));

$user_rank = strip_tags($_SESSION['user_rank1']);
?>






<style>
.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}
  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color:#800000;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }


.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}

.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: #800000;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:purple;
color:white;

}



.invite_btn{
background-color: purple;
padding: 6px;
color:white;
font-size:14px;
//border-radius: 50%;
border: none;
cursor: pointer;
text-align: center;
}
.invite_btn:hover {
background: black;
color:white;
}


.course_btn{
background-color: red;
padding: 6px;
color:white;
font-size:14px;
//border-radius: 50%;
border: none;
cursor: pointer;
text-align: center;
}
.course_btn:hover {
background: black;
color:white;
}


.creator_imagelogo_data{
 width:60px;
 height:60px;
}

/* make modal appear at center of the page */
.modal-appear-center {
margin-top: 25%;
//width:40%;
}


/* make modal appear at center of the page */
.modal-appear-center1 {
margin-top: 15%;
//width:40%;
}


.modal_head_color{
background-color: #800000;
padding: 6px;
color:white;
}


.modal_footer_color{
background-color: #800000;
padding: 6px;
color:white;
}


/* footer */


  .navbar_footer {
letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
    //background-color:#800000;
    color:white;
    padding:20px;
    border: 0;
    font-family: comic sans ms;
  }


.footer_bgcolor{
background: black;
}

.footer_text1{
color:white;
font-size:20px;
border:none;
cursor:pointer;
}

.footer_text2{
color:grey;
font-size:14px;
border:none;
cursor:pointer;
}

.footer_text1:hover{
color:grey;
}


.footer_text2:hover{
color:orange;
}


.footer_dashedline{
 border-top: 1px dashed white;
}








.e_search_form{
width: 38vw;
height:60px;
padding:10px;
cursor:pointer;
border:none;
border-radius:15%;
color:black;
font-size:16px;
background:white;

//transform: skew(-22deg);
margin-left:-90px;

}

.e_search_form:hover{

border-style: solid; border-width:4px; border-color: #824c4e;
background: #dddddd;
color: black;
}



@media screen and (max-width: 768px) {
  .e_search_form{

  width: 100%;
  padding: 20px;
margin-left:0px;
  }
}



@media screen and (max-width: 600px) {
  .e_search_form{
  width: 100%;
  padding: 20px 
margin-left:0px; 
  }
}





.readmore_btn{
background-color: #800000;
padding: 6px;
color:white;
font-size:14px;
border-radius: 10%;
border: none;
cursor: pointer;
text-align: center;
//width:100%;
z-index: -999;
}
.readmore_btn:hover {
background: black;
color:white;
}	




.reply_btn{
background-color: #800000;
padding: 2px;
color:white;
font-size:12px;
border-radius: 10%;
border: none;
cursor: pointer;
text-align: center;
//width:100%;
z-index: -999;
}
.reply_btn:hover {
background: black;
color:white;
}	



</style>











<!-- Main Post Database query starts here -->





<style>
.point_count { color: #fff; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: #ec5574; padding: 2px 6px;font-size:20px; }
.point_count1 { color:#FFF; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: purple; padding: 2px 6px;font-size:20px; }


</style>


        <div class="content">

            
<!--comment starts-->
<?php

include('data6rst.php');

$row = 0;
if(isset($_POST['row_limit'])){
    $row = strip_tags($_POST['row_limit']);
    $post_id= strip_tags($_POST['post_id']);
$postid=$post_id;
}

 $rowpage = $rowpage_video_post_comment;

//$rowpage = 2;
         


$commentsData = $db->prepare("SELECT * FROM comments WHERE postid=:postid order by id desc limit :row1, :rowpage");
$commentsData->bindValue(':postid', trim($postid), PDO::PARAM_STR);
$commentsData->bindValue(':rowpage', (int) trim($rowpage), PDO::PARAM_INT);
$commentsData->bindValue(':row1', (int) trim($row), PDO::PARAM_INT);
$commentsData->execute();

$totalcount_comment = $commentsData->rowCount();

if($totalcount_comment == 0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>No Comments on this Video Post Yet <b></b></div>";
//exit();
}

while ($rowComment= $commentsData->fetch()) {

$commentid = htmlentities(htmlentities($rowComment['id'], ENT_QUOTES, "UTF-8"));
$pid = htmlentities(htmlentities($rowComment['postid'], ENT_QUOTES, "UTF-8"));

$comment = htmlentities(htmlentities($rowComment['comment'], ENT_QUOTES, "UTF-8"));
$comment_userid = htmlentities(htmlentities($rowComment['userid'], ENT_QUOTES, "UTF-8"));
$comment_username = htmlentities(htmlentities($rowComment['username'], ENT_QUOTES, "UTF-8"));
$comment_fullname = htmlentities(htmlentities($rowComment['fullname'], ENT_QUOTES, "UTF-8"));
$comment_photo = htmlentities(htmlentities($rowComment['photo'], ENT_QUOTES, "UTF-8"));
$comment_timer1 = htmlentities(htmlentities($rowComment['timer1'], ENT_QUOTES, "UTF-8"));
$reply_count = htmlentities(htmlentities($rowComment['reply_count'], ENT_QUOTES, "UTF-8"));
$t_like =  htmlentities(htmlentities($rowComment['t_like'], ENT_QUOTES, "UTF-8"));
?>


<!--comment div starts-->

              


                

 <div class="postx comment_css" style=""  id="postx_<?php echo $id; ?>">        
                            

<div class='pull-left1'>
<a title='Click to access users Profile page' style='color:white;' href='profile.php?id=<?php echo $comment_userid; ?>'>
<img class='' style='border-style: solid; border-width:3px; border-color:#ec5574; width:40px;height:40px; max-width:40px;max-height:40px;border-radius: 50%;' 
src='<?php echo $comment_photo; ?>'></a><br>
<b style='color:#ec5574;font-size:14px;' >Name: <?php echo $comment_fullname; ?>  </b><br>
</div>


<b style='font-size:12px;text-align:left;'>Comment: <?php echo $comment; ?></b><br>

<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $comment_timer1;?>"></span></span> <br>

(<span id="reply_total_<?php echo $commentid; ?>"><?php echo $reply_count; ?></span>)
<span style='color:#800000;cursor:pointer'  id="<?php echo $commentid; ?>" data-toggle="collapse" data-target="#demo_<?php echo $commentid; ?>" title='Reply' class='reply_load_btn'>Reply<span class="caret"></span>




&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<span style="font-size:20px;color:#800000;cursor:pointer;" class="clike_btn fa fa-heart-o" id="<?php echo $commentid; ?>" data-post_id='<?php echo $postid; ?>' title="Like">
&nbsp;<span id="<?php echo $commentid; ?>"  style="color:#800000;cursor:pointer;" /></span>
<span style='font-size:14'>(<span id="clike_total_<?php echo $commentid; ?>"><?php echo $t_like; ?></span>)</span>
</span> 

<span id="loader-clike_<?php echo $commentid; ?>"></span>


</div>




<div id="demo_<?php echo $commentid; ?>" class="well collapse">



 <textarea style='height:30px;' id="reply_<?php echo $commentid; ?>" col class="reply_<?php echo $commentid; ?> col-sm-12 form-control" style="color:black;"  placeholder="Enter Reply"></textarea>

<br>

<button  id="<?php echo $commentid; ?>" class="pull-right reply_btn">Reply Now</button>

<div id="loader-reply_<?php echo $commentid; ?>"></div>
<div id="loader-reply1_<?php echo $commentid; ?>"></div>

<div id="replysubmissionResult_<?php echo $commentid; ?>"></div>

<div id="replysubmissionResult1_<?php echo $commentid; ?>"></div>



</div> 

<br>



           
</div>
<!--comment div ends-->

<?php
// close while in comments
                }
            ?>


<!--comment ends-->





<!-- Main Post Database query ends here-->

</div>







</div>
<!--End Right-->

</div>
<!--Row-->








<style>

.title_css{
//background: green;
color:green;
cursor:pointer;
font-size:18px;

}


.title_css:hover{
//background: purple;
color:purple;

}



.seeking_css{
background: #800000;
color:white;
padding:6px;
cursor:pointer;
border:none;
border-radius:10%;
font-size:16px;
}

.seeking_css:hover{
background: black;
color:white;

}



.offering_css{
background: green;
color:white;
padding:10px;
cursor:pointer;
border:none;
border-radius:25%;
font-size:16px;
}

.offering_css:hover{
background: black;
color:white;

}



.cat_css{
background: #ec5574;
color:white;
padding:10px;
cursor:pointer;
border:none;
border-radius:25%;
font-size:16px;
}

.cat_css:hover{
background: black;
color:white;

}



</style>



<!--form START-->




<?php 
ob_flush();
?>
