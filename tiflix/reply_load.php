<?php
error_reporting(0); 
ob_start();
?>


<?php

error_reporting(0);
include('data6rst.php');

$comment_id= strip_tags($_POST['comment_id']);

$commentsData = $db->prepare('SELECT * FROM reply WHERE commentid=:commentid order by id desc');
$commentsData->execute(array(':commentid' => $comment_id));
while ($rowComment= $commentsData->fetch()) {

$commentid = htmlentities(htmlentities($rowComment['id'], ENT_QUOTES, "UTF-8"));

$comment = htmlentities(htmlentities($rowComment['reply'], ENT_QUOTES, "UTF-8"));
$comment_userid = htmlentities(htmlentities($rowComment['userid'], ENT_QUOTES, "UTF-8"));
$comment_username = htmlentities(htmlentities($rowComment['username'], ENT_QUOTES, "UTF-8"));
$comment_fullname = htmlentities(htmlentities($rowComment['fullname'], ENT_QUOTES, "UTF-8"));
$comment_photo = htmlentities(htmlentities($rowComment['photo'], ENT_QUOTES, "UTF-8"));
$comment_timer1 = htmlentities(htmlentities($rowComment['timer1'], ENT_QUOTES, "UTF-8"));



?>


 <div class="" style='width:60%;max-width:60%;background:white;border-radius:20%;border-style: solid; border-width:2px; border-color: #ddd;width:100%;'>

                        
                            

<div class='pull-left1'>
<a>
<img class='' style='border-style: solid; border-width:3px; border-color:#ddd; width:20px;height:20px; max-width:20px;max-height:20px;border-radius: 50%;' 
src='<?php echo $comment_photo; ?>'></a><br>
<b style='color:#ec5574;font-size:12px;' >Name: <?php echo $comment_fullname; ?>  </b><br>
</div>


<b style='font-size:12px;text-align:left;'>Reply: <?php echo $comment; ?></b><br>

<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $comment_timer1;?>"></span></span> <br>



           
</div>

<?php

                }
            ?>










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














