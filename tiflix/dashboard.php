<?php
error_reporting(0); 
?>



<?php
session_start();
include ('authenticate.php');
include ('settings.php');

$userid_sess =  htmlentities(htmlentities($_SESSION['uid1'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8"));
$username_sess =   htmlentities(htmlentities($_SESSION['username1'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo1'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email1'], ENT_QUOTES, "UTF-8"));

$user_rank = strip_tags($_SESSION['user_rank1']);
?>



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



if($logo==''){
$logo = "logo.png";
}


if($titlex==''){
$titlex = "Ti-Flix";

}


if($descriptionx==''){
$descriptionx = "Application Powered By TIDB";
}

if($header_color==''){
$header_color = "#B931B9";
}

if($footer_color==''){
$footer_color = "black";
}

if($day_pay==''){
$day_pay = "0";
}

if($month_pay==''){
$month_pay = "0";
}


if($year_pay==''){
$year_pay = "0";
}


if($site_display==''){
$site_display= "horizontal ";
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
 <title><?php echo $titlex; ?> - Welcome <?php echo htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8")); ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?php echo $descriptionx; ?>" />

  <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
<script src="moment.js"></script>
	<script src="livestamp.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />

  <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->



<style>



.responsive_video {
    width: 700;
    height: 440;
}

@media(max-width:767px) {
    .responsive_video {
        width: 100%;
height: 440;
        // width: 400px;
         //height: 400px;
        
    }
}


.xcx1a{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
font-size:36px;
border-radius: 10%;
border: none;
//cursor: pointer;
text-align: center;
height: 150px;

}
.xcx1a:hover {
background: orange;
color:white;
}		



.t_video_css{
width:20%;
height:20%;
}

@media screen and (max-width: 600px) {
  .theta_video_css {
    width: 100%;
  }
}



.xa_css{
border-radius:15%;background:#EE1D52;padding:6px; border:none;color:white;
}


.xa_css:hover{
background:black;
color:white

}




.x_css{
border-radius:15%;background:#ddd;border-style: solid; border-width:0px; border-color: #ec5574;
}


.x_css:hover{
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



.theta_css{
background:#ec5574;border-radius:10%;padding:8px;color:white;border:none;cursor:pointer;
}


.theta_css:hover{
background:orange;
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
background-color: <?php echo $header_color; ?>;
} 
/*
.verified:hover {
background: #f44336;
-moz-transform: scale(1.1);
-webkit-transform: scale(1.1);
transform: scale(1.5);
}
*/



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
   background-color:<?php echo $header_color; ?>;

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

background: <?php echo $header_color; ?>;
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

.loadmore_css{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
//border-radius: 50%;
border: none;
cursor: pointer;

}
.loadmore_css:hover {
background: orange;
color:black;
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


h1 span {
  margin: 0px 7px;
}

p span {
  margin: 0px 7px;
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
.modal-appear-center2 {
margin-top: 10%;
//width:40%;
}



.modal_head_color{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
}


.modal_footer_color{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
}


/* footer */


  .navbar_footer {
letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
    //background-color:<?php echo $header_color; ?>;
    color:white;
    padding:20px;
    border: 0;
    font-family: comic sans ms;
  }


.footer_bgcolor{
background: <?php echo $footer_color; ?>;
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
background-color: <?php echo $header_color; ?>;
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






.category_post1{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
z-index: -999;
}
.category_post1:hover {
background: black;
color:white;
}	
</style>





    </head>
    <body>

 
</head>
<body>







<script>

// stopt all bootstrap drop down menu from closing on click inside
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});


</script>







<!--start left column all-->

    <div class="left-column-all left_shifting">

<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img title='<?php  echo $titlex; ?>-logo' alt='<?php  echo $titlex; ?>-logo' class="img-rounded imagelogo_data" src="<?php echo $logo; ?>"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">




<!--start post comments notification-->

<style>

.notify_count { color: #FFF; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: green; padding: 2px 6px;font-size:14px; }
.notify_count1 { color:#FFF; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: purple; padding: 2px 6px;font-size:14px; }

</style>




<script>

$(document).ready(function(){

var userid_sess_data = '<?php echo $userid_sess; ?>';
$("#loader-notify_alert_posts").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i></div>');
var datasend = {userid_sess_data:userid_sess_data};

//alert(userid_sess_data);
	
		$.ajax({
			
			type:'POST',
			url:'notify_alert.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

//alert(msg);

$("#loader-notify_alert_posts").hide();
$("#result-notify_alert_posts").html(msg);
//setTimeout(function(){ $('#result-notify_alert_posts').html(''); }, 5000);	


			
	
}
			
		});
		
		

});


</script>


<li>
<span style='color:white;' class="dropdown fa fa-bell">
  <a style="color:white;font-size:14px;cursor:pointer;" title='Real-Time Notification System' class="btn1 btn-default1 dropdown-toggle"  data-toggle="dropdown">
  <span class="notify_count"><span id="loader-notify_alert_posts"></span><span id="result-notify_alert_posts"></span></span>
</a>

<ul class="dropdown-menu" style='width:350px;height: 400px;overflow-y : scroll;'>
<h4 style='color:blue;'>Real-Time Notification System</h4>
<button class="btn btn-primary" id="refresh_notify" title="Refresh Notification">Refresh Notification</button>
<br>


<script>

$(document).ready(function(){


var userid_sess_data = '<?php echo $userid_sess; ?>';
var username_sess_data = '<?php echo $userid_sess; ?>';

var sender_id=userid_sess_data;
var sender_username=username_sess_data;


if(sender_id ==''){
alert('something is wrong with Senders Id');
}


else{


$("#loader-load-notify-post").fadeIn(400).html('<br><div style="color:white;background:#ec5574;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i>&nbsp;Please Wait,Loading Your Notification Alerts...</div>');
var datasend = {sender_id:sender_id, sender_username:sender_username};


	
		$.ajax({
			
			type:'POST',
			url:'notification_load.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-notify-post").hide();
$("#result-load-notify-post").html(msg);
//setTimeout(function(){ $('#result-load-notify-post(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}


});










$(document).ready(function(){

  $('#refresh_notify').click(function () {
var userid_sess_data = '<?php echo $userid_sess; ?>';
var username_sess_data = '<?php echo $userid_sess; ?>';

var sender_id=userid_sess_data;
var sender_username=username_sess_data;


if(sender_id ==''){
alert('something is wrong with Senders Id');
}


else{


$("#loader-load-notify-post").fadeIn(400).html('<br><div style="color:white;background:#ec5574;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i>&nbsp;Please Wait,Loading Your Notification Alerts...</div>');
var datasend = {sender_id:sender_id, sender_username:sender_username};


	
		$.ajax({
			
			type:'POST',
			url:'notification_load.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-notify-post").hide();
$("#result-load-notify-post").html(msg);
//setTimeout(function(){ $('#result-load-notify-post(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}





// start notify 1


var userid_sess_data = '<?php echo $userid_sess; ?>';
$("#loader-notify_alert_posts").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i></div>');
var datasend = {userid_sess_data:userid_sess_data};

//alert(userid_sess_data);
	
		$.ajax({
			
			type:'POST',
			url:'notify_alert.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

//alert(msg);

$("#loader-notify_alert_posts").hide();
$("#result-notify_alert_posts").html(msg);
//setTimeout(function(){ $('#result-notify_alert_posts').html(''); }, 5000);	


			
	
}
			
		});
		


// end notify 1


});


});


</script>



<!-- form START-->
<div id="loader-load-notify-post"></div>
<div id="result-load-notify-post"></div>


<!--form ENDS-->

<p></p>

</ul></span>
&nbsp;&nbsp;
</li>


<!--end post comments notifications-->




<li class="navgate_no">
<input type="text" class="search_btn" name="search_data" id="search_data" style='width:400px;' placeholder="Search Video By Title Name, Category, Descriptions"/>
<div id="loader_search" class=" myform_clean_search"></div>
</li>



 <li class="navgate_no">
<a title='Back to Dashboard' href="<?php echo $site_url; ?>/subscription.php" style="color:white;font-size:14px;">
<button class="category_post1">Subscribe Here</button></a></li>

             
<li class="navgate"><img style="max-height:60px;max-width:60px;" class="img-circle" width="60px" height="60px" src="<?php echo htmlentities(htmlentities($_SESSION['photo1'], ENT_QUOTES, "UTF-8")); ?>" width="80px" height="80px">



<span class="dropdown">
  <a style="color:white;font-size:14px;cursor:pointer;" title='View More Data' class="btn1 btn-default1 dropdown-toggle"  data-toggle="dropdown"><?php echo htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8")); ?>
  <span class="caret"></span></a>

<ul class="dropdown-menu col-sm-12">
<li><a title='Logout' href="<?php echo $site_url; ?>/logout.php">Logout</a></li>

</ul></span>

</li>



      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->







        <script>
$(document).ready(function(){
$(".search_btn").keyup(function() {
var search_data = $(this).val();
//var search_data = $('#search_data').val();
var ss= 'ok';
if(search_data==""){	
		}
else{
$('#loader_search').fadeIn(400).html('<br><span style="color:white"><img src="ajax-loader.gif" align="absmiddle">&nbsp;Searching..</span>');
var datasend = "search_data="+ search_data + "&ss=" + ss;
		$.ajax({
			type:'POST',
			url:'search.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
	                       //$('#search_data').val('');
                                $("#result_search").html(msg);
                                $('#loader_search').hide();
setTimeout(function(){ $("#loader_search").html(''); }, 5000);			
			}
			
		});
		
		}
		
	})
					
});
</script>






<style>
.search_btn{
min-width:100%;
height:40px;
border-radius:20%;
}

.searching_res{
position:absolute;
//position:fixed;
z-index:999;
margin-left:530px;
margin-top: -60px; 
width:400px;
}


@media screen and (max-width: 600px) {
  .searching_res{
  //width: 56%;
 //top: 2px; 
 top: 20px; 
margin-left:86px; 
  }
}

@media screen and (max-width: 700px) {
  .searching_res{ 
  //width: 56%;
top:20px;
margin-right:286px;
  }
}

.searching_res_p{
cursor: wait;
padding: 20px;
background: fuchsia;
color: white;
border-style: dashed; border-width:1px; border-color: orange;
}
.searching_res_p:hover{
background: orange;
color: black;
}


.searching_res_p1{
cursor: wait;
padding: 20px;
background: red;
color: white;
border-style: dashed; border-width:1px; border-color: orange;
}
.searching_res_p1:hover{
background: black;
color: white;
}

</style>




<div class='row'>
<br><br><br>


<span id="result_search" class='searching_res myform_clean_search'></span>
<div id="loader_searchx" class="searching_res2 myform_clean_search"></div>



<center><h4>Welcome 
<b style='color:purple'> <?php echo htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8")); ?></b></h4></center><br>
<h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;Easily Stream and Watch Videos Online.  Pay as You Go...</h4>

<?php
// Check if User Already has an Active Plan 
//include('data6rst.php');
$resz= $db->prepare('select * from subscription where userid=:userid and sub_status=:sub_status');
$resz->execute(array(':userid' =>$userid_sess, ':sub_status' => 'Active'));
$countz= $resz->rowCount();
$row= $resz->fetch();
$sub_status= $row['sub_status'];

$id_sub= $row['id'];

// convert datetime of timestamp to reaable time
$end_timestamp= $row['end_timestamp'];
$convertDate = date('M d, Y h:i:s', strtotime($end_timestamp));


if($countz ==0){
echo "<div style='background:red;padding:8px;color:white;border:none;'>&nbsp;&nbsp;&nbsp;&nbsp;You Do Not have an Active Plan. Please Subscribe...</div>";

echo "<script>alert('You Do Not have an Active Plan. We will take you to Subscription/Payment Page'); 
window.location='subscription.php';</script>";
exit();


}

?>






<script>
$(document).ready(function(){

//var countDown = new Date("Feb 8, 2023 11:56:27").getTime();
var countDown = new Date("<?php echo $convertDate; ?>").getTime();
var ts = setInterval(function() {
var count_on = new Date().getTime();
var distance = countDown - count_on;

  var d = Math.floor(distance / (1000 * 60 * 60 * 24));
  var h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var s = Math.floor((distance % (1000 * 60)) / 1000);


$('.day').html(d);
$('.hour').html(h);
$('.minute').html(m);
$('.sec').html(s);

// Checkif count down timer has expired
  if (distance < 0) {
    clearInterval(ts);

alert('Subscription Expired...');


$('.day').html('00');
$('.hour').html('00');
$('.minute').html('00');
$('.sec').html('00');

$('.exp').html("<span style='padding:4px;background:red;color:white;border:none'>Subscription Expired!!!. Subscribe Now</span>");





//Update Database starts

var id_sub  = '<?php echo $id_sub; ?>';
 if(id_sub==""){
alert('Expired Subscription Updates Id not Found');
}

else{

$("#loader-sub").fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Updating Subscription Data</div>');
var datasend = {id_sub:id_sub};


	
		$.ajax({
			
			type:'POST',
			url:'subscription_updates.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-sub").hide();
$("#result-sub").html(msg);
setTimeout(function(){ $("#result-sub").html(''); }, 5000);
	
}
			
		});
		
		}


// update database ends





    
  }
}, 1000);

});
</script>


<div align="center">
<span id="loader-sub"></span>
<span id="result-sub"></span>

<span style='color:blue;font-size:20px'>Subscription Expires on:</span>
<span class="exp"></span>:
  <h1>

    <span class="day"></span>:
    <span class="hour"></span>:
    <span class="minute"></span>:
    <span class='sec xcx1a'></span>
  </h1>
  <p style='margin: 0px 10px;'>

    <span>Days</span>
    <span>Hours</span>
    <span>Minutes</span>
    <span>Seconds</span>
  </p>
</div>














<!--Start Left-->
<div class='col-sm-2'>

<style>
.cat_css{
background-color: <?php echo $header_color; ?>;
padding: 10px;
color:white;
border-radius: 20%;
border: none;
cursor: pointer;

}
.cat_css:hover {
background: orange;
color:black;
}
</style>

<h4>Posts/Video Categories</h4>



<?php

//include('data6rst.php');


$result = $db->prepare('SELECT * FROM category order by id desc');

		$result->execute(array(
		
    ));
$nosofrows = $result->rowCount();


if($nosofrows  == 0){

echo "<div style='background:red;color:white;padding:10px;border:none'>No Posts/Video Category Added by Admin Yet. If you are an Admin. Please Add Video/Posts
 Categories from Admin Settings in the App</div>";
}




while($v1 = $result->fetch()){
$id = $v1['id'];
$category = $v1['category'];


?>
    



<p><a class='cat_css col-sm-12' href="<?php echo $site_url; ?>/video_category.php?category=<?php echo $category; ?>" title="<?php echo $category; ?>"><?php echo $category; ?></a></p><br>


<br>
<?php
}

?>


</div>

<!--End Left-->










<!--Start Center-->
<div class='col-sm-10'>






<!-- Main Post Database query starts here -->




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
background-color: #B931B9;
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
height: 30%;
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
 width: 70%;
height:70px;
}

. portfolio_img_height_width{
min-width:0%;
min-height:60px;
}


</style>



<style>
.point_count { color: #fff; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: #ec5574; padding: 2px 6px;font-size:20px; }
.point_count1 { color:#FFF; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: purple; padding: 2px 6px;font-size:20px; }


</style>


  <script>
        
        $(document).ready(function(){
            
            //$(window).scroll(function(){
 $('#loadmore_btn').click(function () {

                
                //var position = $(window).scrollTop();
                //var bottom = $(document).height() - $(window).height();



             // if( position == bottom ){


                    var row_limit = Number($('#row_limit').val());
                    var total_count = Number($('#total_count').val());
		var querytotal  = total_count;
                    var rowpage = <?php echo $rowpage_video_post; ?>;
                    row_limit = row_limit + rowpage;

					
					 if(row_limit >= querytotal){
               
                   alert('No More Content to Load');
$("#nomore_content_check").html("<div style='background:purple;color:white;padding:10px;bottom:0'>No More Content to Load <br> <center><button style='background:#3b5998;border:none;color:white;padding:10px;cursor:pointer' title='Refresh Page' class='reloadData'>Refresh Page</button></center> </div>");   
$('#loader_posts').hide();
                }

                    if(row_limit <= querytotal){
                        $('#row_limit').val(row_limit);
$("#loader_posts").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;">Please Wait. Loading Content <i class="fa fa-spinner fa-spin" style="font-size:20px"></i></div>');

                        $.ajax({
                            url: 'posts_paginate.php',
                            type: 'post',
                            data: {row_limit:row_limit},
                            success: function(response){
                                $(".post:last").after(response).show().fadeIn("slow");
$('#loader_posts').hide();
                            }
                        });
                    }
                //}

            });
        
        });









// vide streaming session initialization starts




$(document).ready(function(){

 $(".videostreaming_session_btn").click(function(){

     var postid = this.id; 
     var id = postid;
var video_postid = id;

var video_url = $(this).data('video_url');
var title_seo = $(this).data('title_seo');


if(id == ''){
alert('Video URL cannot be empty');
return false;
}
        // AJAX Request


$("#loader-videostreaming_session_"+id).fadeIn(400).html('<br><div style="color:white;background:fuchsia;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Video Streaming Session is being Initialized.</div>');

        $.ajax({
            url: 'videostreaming_session.php',
            type: 'post',
            data: {video_url:video_url, title_seo:title_seo, video_postid:video_postid},
            dataType: 'html',
            success: function(data){

$("#loader-videostreaming_session_"+id).hide();
$("#result_videostreaming_session_"+id).html(data);

            }
        });

    });
});

// Video streaming session initializations ends






// vide streaming session initialization 2 starts




$(document).ready(function(){

 //$(".videostreaming_session_btn2").click(function(){
$(document).on( 'click', '.videostreaming_session_btn2', function(){ 


     var postid = this.id; 
     var id = postid;

var video_url = $(this).data('video_url');
var title_seo = $(this).data('title_seo');


if(id == ''){
alert('Video URL cannot be empty');
return false;
}
        // AJAX Request


$("#loader-videostreaming_session2_"+id).fadeIn(400).html('<br><div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Video Streaming Session is being Initialized.</div>');

        $.ajax({
            url: 'videostreaming_session.php',
            type: 'post',
            data: {video_url:video_url, title_seo:title_seo},
            dataType: 'html',
            success: function(data){

$("#loader-videostreaming_session2_"+id).hide();
$("#result_videostreaming_session2_"+id).html(data);

            }
        });

    });
});

// Video streaming session initializations 2 ends



</script>


        <div class="content">

            <?php


		//include('data6rst.php');
            $rowpage = $rowpage_video_post;
            $limit = 0;

$res= $db->prepare("SELECT count(*) as totalcount FROM posts");
$res->execute(array());
$t_row = $res->fetch();
$totalcount = $t_row['totalcount'];

if($totalcount == 0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>No Video Content Shared Yet <b></b></div>";
//exit();
}

//$result = $db->prepare("SELECT * FROM posts WHERE video_progress=:video_progress order by id asc limit :row1, :rowpage");

$result = $db->prepare("SELECT * FROM posts order by id desc limit :row1, :rowpage");
$result->bindValue(':rowpage', (int) trim($rowpage), PDO::PARAM_INT);
$result->bindValue(':row1', (int) trim($limit), PDO::PARAM_INT);
//$result->bindValue(':userid', trim($owner_id), PDO::PARAM_STR);
//$result->bindValue(':project_id', trim($projectid), PDO::PARAM_INT);
$result->execute();

$count_post = $result->rowCount();

while($row = $result->fetch()){


$id = htmlentities(htmlentities($row['id'], ENT_QUOTES, "UTF-8"));
$postid = $id;
$title = htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
$title_seo = htmlentities(htmlentities($row['title_seo'], ENT_QUOTES, "UTF-8"));
$content = $row['content'];
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
$t_like = htmlentities(htmlentities($row['t_like'], ENT_QUOTES, "UTF-8"));
$t_share = htmlentities(htmlentities($row['t_share'], ENT_QUOTES, "UTF-8"));
$t_view = htmlentities(htmlentities($row['t_view'], ENT_QUOTES, "UTF-8"));
$verified = htmlentities(htmlentities($row['verified'], ENT_QUOTES, "UTF-8"));

$file_type = htmlentities(htmlentities($row['file_type'], ENT_QUOTES, "UTF-8"));

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
<span style='color:#800000;'><b> Uploaded Since: </b> <span data-livestamp="<?php echo $timer1;?>"></span></span> <br>

<span style='color:blue;'><b> Created By: </b> <?php echo $fullname;?></span> <br>



<span id="loader-videostreaming_session_<?php echo $postid; ?>"></span>
<span id="result_videostreaming_session_<?php echo $postid; ?>"></span>


<button style='' class='videostreaming_session_btn readmore_btn btn btn-warning' data-title_seo='<?php echo $title_seo; ?>' data-video_url='<?php echo $video; ?>' id='<?php echo $postid; ?>' title='Stream Video Live, Like, Discuss & Comments'>
Stream Video Live, Like, Discuss & Comments</button>




<button style='display:none' class='readmore_btn btn btn-warning'><a title='Stream Video Live & Discuss' style='color:white;' 
href='videostreaming_watch.php?title=<?php echo $title_seo; ?>&video_url=<?php echo $video; ?>'>new Stream Video Live, Discuss & Comments</a></button>


<button style='display:none;' class='readmore_btn btn btn-warning'><a title='Stream Video Live & Discuss' style='color:white;' 
href='videostreaming_watch.php?title=<?php echo $title_seo; ?>'>Stream Video Live, Discuss & Comments</a></button>


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

<button style='display:none;' class='readmore_btn btn btn-warning'><a title='Click to Read More' style='color:white;' 
href='reply.php?title=<?php echo $title_seo; ?>'>Read More & Reply/Comments</a></button>

                 
</div>





            <?php

                }
            ?>
<div class="col-sm-12">.</div>
<div class="col-sm-12">.</div>
<br><br><br>
<div class="col-sm-12">.</div>
<div id="loader_posts" class="loader_posts"></div>
<div id="nomore_content_check_no"></div>
            <input type="hidden" id="row_limit" value="0">
            <input type="hidden" id="total_count" value="<?php echo $totalcount; ?>">
<button id="loadmore_btn" title='Load More Video' class="loadmore_css col-sm-12">Load More Video</button>
<br><br>
<div class="col-sm-12">.</div>
<br class="col-sm-12"><br class="col-sm-12">


<!-- Main Post Database query ends here-->

</div>








</div>
<!--End Center-->





</div>
<!--Row-->












<!--form START-->









<!-- footer Section start -->

<footer class=" navbar_footer text-center footer_bgcolor">

<div class="row">
        <div class="col-sm-12">


<p class="footer_text1"><?php echo $titlex; ?></p>
<p class="footer_text2"><?php  echo $descriptionx; ?></p>
<br>

        </div>



        </div>

<br/>
  <p></p>
</footer>

<!-- footer Section ends -->


   
</body>
</html>




