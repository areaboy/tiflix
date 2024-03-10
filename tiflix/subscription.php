<?php
//error_reporting(0);
session_start();
include ('authenticate.php');
include ('settings.php');

$userid_sess =  htmlentities(htmlentities($_SESSION['uid1'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8"));
$username_sess =   htmlentities(htmlentities($_SESSION['username1'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo1'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email1'], ENT_QUOTES, "UTF-8"));

$user_rank = strip_tags($_SESSION['user_rank1']);

$country_code = strip_tags($_SESSION['country_code1']);
$country_name = strip_tags($_SESSION['country_name1']);
$wallet_sess = strip_tags($_SESSION['wallet1']);
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
 <title><?php echo $titlex; ?> -  Welcome <?php echo $fullname_sess; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
<meta name="description" content="<?php echo $descriptionx; ?>" />

  <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
<script src="moment.js"></script>
	<script src="livestamp.js"></script>
<script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="dataTables.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">







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

background:<?php echo $header_color; ?>;
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
background-color: <?php echo $header_color; ?>;
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



h1 span {
  margin: 0px 7px;
}

p span {
  margin: 0px 7px;
}



.category_post1{
background-color:<?php echo $header_color; ?>;
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



.category_post1x{
background-color: purple;
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



.category_post1xx{
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


.modal-dialog{
   
   margin-top: 110px;
} 





.xcx{
background-color: #ddd;
padding: 6px;
color:black;
font-size:14px;
border-radius: 10%;
border: none;
cursor: pointer;
text-align: center;

}
.xcx:hover {
background: orange;
color:white;
}	



.seeking_css2{
background: <?php echo $header_color; ?>;
color:white;
padding:6px;
cursor:pointer;
border:none;
border-radius:10%;
font-size:16px;
}

.seeking_css2:hover{
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



 <li class="navgate_no"><a href="dashboard.php" title='Dashboard'  style="color:white;font-size:14px;">
<button class="category_post1">Go Back To Dashboard</button></a></li>

   
<li class="navgate"><img style="max-height:60px;max-width:60px;" class="img-circle" width="60px" height="60px" src="<?php echo $photo_sess; ?>" width="80px" height="80px">

<span class="dropdown">
  <a style="color:white;font-size:14px;" class="btn1 btn-default1 ">
<?php echo $fullname_sess; ?></a>
</span>

</li>


 <li class="navgate_no"><a href="logout.php" title='Logout'  style="color:white;font-size:14px;">
<button class="category_post1">Logout</button></a></li>

      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->














<br><br>




<center><h3>Hi!
<b style='color:purple'> <?php echo $fullname_sess; ?> </b></h3></center>






        <div class="content">






<style>
.xcx1{
background-color: #ccc;
padding: 6px;
color:black;
font-size:14px;
border-radius: 10%;
border: none;
//cursor: pointer;
text-align: center;
height: 150px;

}
.xcx1:hover {
background: orange;
color:white;
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
</style>

<!--Start Left-->
<div class='col-sm-0'>

</div>

<!--End Left-->










<!--Start Right-->
<div class='col-sm-12x'>






<style>

.status_css{
color:red;
fontsize:16px;
}

.status_css2{
color:green;
fontsize:16px;
}

.status_css3{
color:#800000;
fontsize:16px;
}
</style>







<center><h3>Choose Subscriptions & Payments Plan</h3><br>


<a>
<span class="">.</span></a>
</center>

<br>


<style>
.xcx1{
background-color: #ccc;
padding: 6px;
color:black;
font-size:14px;
border-radius: 10%;
border: none;
//cursor: pointer;
text-align: center;
height: 240px;

}
.xcx1:hover {
background: #ddd;
color:black;
}	
</style>
<div class='row'>



<?php


if($counte > 0){


}else{

echo "<div style='background:red;padding:8px;color:white;border:none;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Site Data Settings is Empty. Please Contact Admin..</div>";

}




?>




<script>

$(document).ready(function(){
$(document).on( 'click', '.sub_btn', function(){ 

var amount = $(this).data('amount');
var id = amount;
var type = $(this).data('type');

$("#loader-ux_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="ajax-loader.gif"> &nbsp;Please Wait, Square Payments Invoice is being Generated...</div>');
var datasend = {'amount': amount, 'type': type};
		$.ajax({
			
			type:'POST',
			url:'square_invoice.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-ux_"+id).hide();
$("#result-ux_"+id).html(msg);
//setTimeout(function(){ $("#result-ux_"+id).html(''); }, 5000);
//location.reload();


}
			
});


                });



            });









// confirm invoice payments

$(document).ready(function(){
$(document).on( 'click', '.confirm_btn', function(){ 

var id = $(this).data('sid');
var invoiceid = $(this).data('inv_invoiceid');


$("#loader-ivy_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="ajax-loader.gif"> &nbsp;Confirming Payments...</div>');
var datasend = {'id': id, 'invoiceid': invoiceid};
		$.ajax({
			
			type:'POST',
			url:'square_invoice_check.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-ivy_"+id).hide();
$("#result-ivy_"+id).html(msg);
//setTimeout(function(){ $("#result-ivy_"+id).html(''); }, 5000);
//location.reload();


}
			
});


                });



            });




</script>




<div class='col-sm-4 xcx1'>
<center>
<b style='font-size:30px;color:<?php echo $header_color; ?>'>
 <?php echo $title; ?> Day</b></center><br>

Watch Online Video Streaming For a Day <br>
   <b style='font-size:20px'>
  <?php echo $day_pay; ?>(USD)/ Per Day</b></center><br>
<br>
<span style='' id='loader-ux_<?php echo $day_pay; ?>'></span>
<span style='' id='result-ux_<?php echo $day_pay; ?>'></span>
<center><a title='Pay Now'  style="color:white;font-size:14px;">
<button class="category_post1 sub_btn" data-amount='<?php echo $day_pay; ?>' data-type='day'>Pay Subcription Now</button></a> </center>
<br>
</div>



<div class='col-sm-4 xcx1'>
<center>
<b style='font-size:30px;color:<?php echo $header_color; ?>'>
 <?php echo $title; ?> Month</b></center> <br>
Watch Online Video Streaming For Month(30 Days)<br>
   <b style='font-size:20px'>
 <?php echo $month_pay; ?>(USD)/ Per Month</b></center><br>

<br>

<span style='' id='loader-ux_<?php echo $month_pay; ?>'></span>
<span style='' id='result-ux_<?php echo $month_pay; ?>'></span>
<center><a title='Pay Now'  style="color:white;font-size:14px;">
<button class="category_post1 sub_btn" data-amount='<?php echo $month_pay; ?>' data-type='month' >Pay Subcription Now</button></a> </center>
<br>
</div>



<div class='col-sm-4 xcx1'>
<center>
<b style='font-size:30px;color:<?php echo $header_color; ?>'>
 <?php echo $title; ?> Year</b></center> <br>Watch Online Video Streaming For a Year (365 Days)<br>
   <b style='font-size:20px'>
 <?php echo $year_pay; ?>(USD)/ Per Year</b></center><br>
<br>

<span style='' id='loader-ux_<?php echo $year_pay; ?>'></span>
<span style='' id='result-ux_<?php echo $year_pay; ?>'></span>
<center><a title='Pay Now' style="color:white;font-size:14px;">
<button class="category_post1 sub_btn"  data-amount='<?php echo $year_pay; ?>' data-type='year'>Pay Subcription Now</button></a> </center>
<br>
</div>


</div>






<?php
// Check if User Already has an Active Plan 
//include('data6rst.php');
$resz= $db->prepare('select * from subscription where userid=:userid and sub_status=:sub_status');
$resz->execute(array(':userid' =>$userid_sess, ':sub_status' => 'Active'));
$countz= $resz->rowCount();
$row= $resz->fetch();
$end_timestamp= $row['end_timestamp'];
$id_sub= $row['id'];

// convert datetime of timestamp to reaable time
$convertDate = date('M d, Y h:i:s', strtotime($end_timestamp));


if($countz ==1){
//echo "<div style='background:red;padding:8px;color:white;border:none;'>You Already have an Active Plan, Wait until the Plan Expires...</div>";



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
<?php
}else{
?>


<script>
$(document).ready(function(){


alert('Subscription Expired...');


$('.day').html('00');
$('.hour').html('00');
$('.minute').html('00');
$('.sec').html('00');

$('.exp').html("<span style='padding:4px;background:red;color:white;border:none'>Subscription Expired!!!. Subscribe Now</span>");
});
</script>

<?php
}
?>


<div align="center">
<span id="loader-sub"></span>
<span id="result-sub"></span>

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



<div class="container">
<div class="row">
<div class="col-sm-12 table-responsive">
<div class="alert_server_response"></div>
<div class="loader_x"></div>
<table id="backup_content" class="table table-bordered table-striped">
<thead><tr>


<a  style='float:right;' class="category_post1" data-toggle="modal" data-target="#myModal_cards" title='Square Sandbox Payments  Testing Credit Card Info'>
Square Sandbox Payments  Testing Credit Card Info</a><br><br>


<th>Photo</th>
<th>Fullname</th>
<th>Square Payments Invoice Id</th>
<th>Amount<br>(USD)</th>
<th>Plan</th>
<th>Subscription</th>
<th> Payments Status</th>
<th>Payment Info</th>
<th>Time Created</th>
</tr></thead>
</table>
</div>
</div>
</div>





<span class="loader_res"></span>



<script>
$(document).ready(function(){

var get_content = 'get_data';
if(get_content==""){
alert('There is an Issue with Cotent Database Retrieval');
}
else{
$('.loader_res').fadeIn(400).html('<br><div style="background:#eee; width:100%;height:30%;text-align:center"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Data is being Loaded</div>');
		
 var data_initialize = $('#backup_content').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"subscription_load.php",
   type:"POST",
   data:{get_content:get_content}
  },
  "columnDefs":[
   {
    "orderable":false,
   },
  ],
  "pageLength": 5
 });

if(data_initialize !=''){
$('.loader_res').hide();
}

}

 

//$('#contentModal').modal('hide');
//data_initialize.ajax.reload();

 
});


</script>







</div>
<!--End Right-->

</div>
<!--Row-->








<script>
$(document).ready(function(){
//$('.btn_call').click(function(){
$(document).on( 'click', '.btn_call', function(){ 



var id = $(this).data('id');
var fullname = $(this).data('fullname');
var userid = $(this).data('userid');
var sub_type = $(this).data('sub_type');
var sub_plan = $(this).data('sub_plan');
var sender_address = $(this).data('sender_address');
var invoice_id = $(this).data('invoice_id');
var invoice_amount = $(this).data('invoice_amount');
var invoice_url = $(this).data('invoice_url');
var invoice_status = $(this).data('invoice_status');
var status = $(this).data('status');
var sub_status = $(this).data('sub_status');
var sub_value = $(this).data('sub_value');


var stat ='';

if(status=='Paid'){
var sub_stat ="<span style='color:green'><b>Subscription Paid</b></span>";
}


if(sub_status=='Active'){
var sub_stat ="<span style='color:green'><b>Subscription Activated</b></span>";
}

if(sub_status=='Expired'){
var sub_stat ="<span style='color:red'><b>Subscription Expired</b></span>";
}


if(sub_status=='Pending Invoice Payments'){
var sub_stat ="<span style='color:red'><b>Subscription Pending Invoice Payments</b></span>";
}




if(invoice_status=='PAID'){
var invoice_status1 ="<span style='color:green'><b>Invoice Paid</b></span>";

 var linking ="<a target='_blank' style='background:green;padding:4px;color:white;border:none' href=" + invoice_url +">Download Paid Invoice</a>";

}


if(invoice_status=='UNPAID'){
var invoice_status1 ="<span style='color:red'><b>Invoice Unpaid</b></span>";

 var linking ="<a target='_blank' style='background:blue;padding:4px;color:white;border:none' href=" + invoice_url +">View and Pay Invoice</a>";

}





$('.p_id').html(id);
$('.p_fullname').html(fullname);
$('.p_sub_type').html(sub_type);
$('.p_sub_plan').html(sub_plan);
$('.p_sender_address').html(sender_address);
$('.p_invoice_id').html(invoice_id);
$('.p_invoice_amount').html(invoice_amount);
$('.p_invoice_url').html(invoice_url);
$('.p_invoice_status').html(invoice_status1);
$('.p_status').html(status);
$('.p_sub_status').html(sub_status);
$('.p_sub_value').html(sub_value);
$('.p_stat').html(stat);
$('.p_sub_stat').html(sub_stat);
$('.p_id_value').val(id).value;

$('.p_linking').html(linking);



});

});


// clear Modal div content on modal closef closed
$(document).ready(function(){

$("#myModal_carto").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_empty').empty(); 
$('#qty').val(''); 
});



});


</script>



 <!--Payment info starts -->
  <div class="modal fade" id="myModal_info" role="dialog">

   <div class="full-screen modal-dialog modal-lg modal-appear-center1 modal_mobile_resize modaling_sizing">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_head_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Payment Info </h4>
        </div>
        <div class="modal-body">
<div class='row'>




<div class='well col-sm-12'>

<h3>Subscription Square  Payments Details</h3>

<b>Full Name: </b><span class='p_fullname'></span><br>
<b>Plan: </b><span class='p_sub_type'></span><br>
<b>Days Available: </b><span class='p_sub_plan'></span><br>
<b>square Payments Invoice Id: </b><span class='p_invoice_id'></span><br>
<b>Square Payments Amount: </b><span class='p_invoice_amount'></span>(USD)<br>
<b>Square Payments Status: </b><span class='p_invoice_status'></span><br>
<b>Invoice  Payments/Download URL: </b><span class='p_invoice_url'></span><br><span class='p_linking'></span><br>

<b>Subscription Status: </b><span class='p_sub_stat'></span><br>



</div>

</div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <!-- payment info Modal ends -->
















 <!--Square Cards Starts -->
  <div class="modal fade" id="myModal_cards" role="dialog">

   <div class="full-screen modal-dialog modal-lg modal-appear-center1 modal_mobile_resize modaling_sizing">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_head_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Square Sandbox Testing Credit Card Info</h4>
        </div>
        <div class="modal-body">




<div class='row'>




<div class='well col-sm-12'>

<h2> Square Sandbox Testing Credit Card Info.</h2>

<h3>Visa Card</h3>


<b>Card No:</b> 4111 1111 1111 1111	<br>
<b>Exp. Date:</b> 09/24 <br>
<b>CVV:</b> 111 <br>
<b>Zip Code:</b> Zip Code can be any Zip Code you want Eg. <b>434221</b> <br><br>


<h3>Master Card</h3>

<b>Card No:</b> 5105 1051 0510 5100	<br>
<b>Exp. Date:</b> 09/24 <br>
<b>CVV:</b> 111 <br>
<b>Zip Code:</b> Zip Code can be any Zip Code you want Eg. <b>434221</b> <br><br>




</div>

</div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <!-- square cards ends -->


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


