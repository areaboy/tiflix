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

$country_code = strip_tags($_SESSION['country_code1']);
$country_name = strip_tags($_SESSION['country_name1']);


if($user_rank !='Admin'){
echo "<div style='background:red;color:white;padding:8px;border:none'>Only Admin Can Access this Page</div>";
exit();
}


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
$descriptionx = "Application Powered By Esedo Fredrick";
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
 <title><?php  echo $titlex; ?> - Welcome <?php echo $fullname_sess; ?> </title>
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

.upload_progress{
padding:10px;
background:green;
color:white;
cursor:pointer;
min-width:30px;
}

#imageupload_preview
{
max-height:200px;
max-width:200px;
}


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

background: #EE1D52;
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




 <li class="navgate_no"><a data-toggle="modal" data-target="#myModal_category" title='Add Post/Video Category'  style="color:white;font-size:14px;">
<button class="category_post1">Add Posts/Video <br>Category</button></a></li>





 <li class="navgate_no"><a href="<?php echo $site_url; ?>/dashboard_admin.php" title='Back to DashBoard'  style="color:white;font-size:14px;">
<button class="category_post1">Back to Dashboard</button></a></li>


   
<li class="navgate"><img style="max-height:60px;max-width:60px;" class="img-circle" width="60px" height="60px" src="<?php echo $photo_sess; ?>" width="80px" height="80px">

<span class="dropdown">
  <a style="color:white;font-size:14px;" class="btn1 btn-default1 ">
<?php echo $fullname_sess; ?></a>
</span>

</li>


 <li class="navgate_no"><a href="<?php echo $site_url; ?>/logout.php" title='Logout'  style="color:white;font-size:14px;">
<button class="category_post1">Logout</button></a></li>

      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->














<br><br>




<center><h3>Hi!
<b style='color:purple'> <?php echo $fullname_sess; ?> </b></h3></center><br>






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






<center><h1>Application Settings</h1><br></center>




<script>






//Square Payments starts

$(document).ready(function(){
$('#square_btn').click(function () {

var square_accesstoken  = $('#square_accesstoken').val();
var square_location_id = $('#square_location_id').val();
var square_enviroment = $("input[name='enviroment']:checked").val();

//alert(square_enviroment);


 if(square_accesstoken==""){
alert('please Enter Square API Access Token');
}

else if(square_location_id==""){
alert('please Enter Square Business Location ID');
}

else if(square_enviroment==""){
alert('please Enter Square Environment');
}

else{

$("#loader_s").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your Square  Payments Data is being Updated...</div>');
var datasend = {square_accesstoken:square_accesstoken, square_location_id:square_location_id, square_enviroment:square_enviroment};
	
		$.ajax({
			
			type:'POST',
			url:'square_payments_config.php',
			data:datasend,
dataType: 'json',
                        crossDomain: true,
			cache:false,
			success:function(msg){

if(msg.status == 0){
var messagex = msg.message;
alert(messagex);

$('#result_s').html("<div style='color:white;background:red;padding:8px;border:none;'>" +messagex+ "</div>");
setTimeout(function(){ $('#result_s').html(''); }, 5000);

$('#loader_s').hide();
}


if(msg.status == 1){
var messagex = msg.message;
alert(messagex);

$('#result_s').html("<div style='color:white;background:green;padding:8px;border:none;'>" +messagex+ "</div>");
setTimeout(function(){ $('#result_s').html(''); }, 5000);

$('#square_accesstoken').val('');
$('#square_location_id').val('');

$('#loader').hide();
location.reload();


}


	
}
			
		});
		
		}

});

});

//  Square Payments ends


</script>


<h6 style='width:100%;min-width:100%'>.</h6>
<script>

function imagePreview(e) 
{
 var readImage = new FileReader();
 readImage.onload = function()
 {
  var displayImage = document.getElementById('imageupload_preview');
  displayImage.src = readImage.result;
 }
 readImage.readAsDataURL(e.target.files[0]);
}


            $(function () {
                $('#site_btn').click(function () {


	            var file_fname = $('#file_content').val();	
				
                    var title = $('#title').val();
                    var description = $('#description').val();
                    var site_keywords =$('#site_keywords').val();
                    var header_color = $('#header_color').val();
                    var footer_color = $('#footer_color').val();
var day_pay = $('#day_pay').val();
var month_pay = $('#month_pay').val();
var year_pay = $('#year_pay').val();
var site_display = $('#site_display').val();
              
// start if validate
if(file_fname==""){
alert('please Select File Logo to Upload');
}




else if(title==""){
alert('please Enter Site Name/Title');
}


else if(description==""){
alert('please Enter Site Description');
}


else if(site_keywords==""){
alert('please Enter Comma Seperated Site Keywords to boast your Google Search Engine Index');
}



else if(header_color==""){
alert('please Select Site Header Color');
}

else if(footer_color==""){
alert('please Select Site Footer Color');
}

else if(day_pay==""){
alert('please Enter Daily Subscription Payments for Your Customers(USD)');
}



 else if(isNaN(day_pay)){
	alert('Daily Subscription Payments must be number');

 }

else if(month_pay==""){
alert('please Enter Monthly Subscription Payments for Your Customers(USD)');
}



 else if(isNaN(month_pay)){
	alert('Monthily Subscription Payments must be number');

 }



else if(year_pay==""){
alert('please Enter Yearly Subscription Payments for Your Customers(USD)');
}



 else if(isNaN(year_pay)){
	alert('Yearly Subscription Payments must be number');

 }


else if(site_display==""){
alert('please Select How you want your Site Landing Page/Dashboard content to be Displayed');
}


else{

var fname=  $('#file_content').val();
var ext = fname.split('.').pop();
//alert(ext);

// add double quotes around the variables
var fileExtention_quotes = ext;
fileExtention_quotes = "'"+fileExtention_quotes+"'";

 var allowedtypes = ["PNG", "png", "gif", "GIF", "jpeg", "JPEG", "BMP", "bmp","JPG","jpg"];
    if(allowedtypes.indexOf(ext) !== -1){
//alert('Good this is a valid Image');
}else{
alert("Please Upload a Valid image. Only Images Files are allowed");
return false;
    }


          var form_data = new FormData();
          form_data.append('file_content', $('#file_content')[0].files[0]);
          form_data.append('file_fname', file_fname);
          form_data.append('title', title);
          form_data.append('description', description);
          form_data.append('site_keywords', site_keywords);
          form_data.append('header_color', header_color);
 form_data.append('footer_color', footer_color);
 form_data.append('day_pay', day_pay);
form_data.append('month_pay', month_pay);

form_data.append('year_pay', year_pay);

form_data.append('site_display', site_display);


        
                    $('.upload_progress').css('width', '0');
                    $('#btn').attr('disabled', 'disabled');
					$('#loaderx').hide();
                    $('#loader_site').fadeIn(400).html('<br><div class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Data is being  Submitted.....Uploading Site Logo Files to Amazon S3.</div>');
                    $.ajax({
                        url: 'yoursite_config.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        ache: false,
                        type: 'POST',
                        xhr: function () {
                      //var xhr = new window.XMLHttpRequest();
                            var xhr = $.ajaxSettings.xhr();
                            xhr.upload.addEventListener("progress", function (event) {
                                var upload_percent = 0;
                                var upload_position = event.loaded;
                                var upload_total  = event.total;

                                if (event.lengthComputable) {
                                    var upload_percent = upload_position / upload_total;
                                    upload_percent = parseInt(upload_percent * 100);
                                  //upload_percent = Math.ceil(upload_position / upload_total * 100);
                                    $('.upload_progress').css('width', upload_percent + '%');
                                    $('.upload_progress').text(upload_percent + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        success: function (msg) {
                                $('#box').val('');
				$('#loader_site').hide();
				$('.result_site').html(msg);
//$('.result_site').fadeIn('slow').prepend(msg);
				$('#alertdata_uploadfiles').delay(5000).fadeOut('slow');

                                //$('#save_btn').removeAttr('disabled');


//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//alert(html_stripped);

//check occurrence of word (successfully) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successfully/g) || []).length;
//alert(bcount);

if(bcount > 0){
$('#file_fname').val('');
$('#title').val('');
$('#description').val('');
}




                        }
                    });
} // end if validate




                });
            });



</script>







<!--start Site Data-->

<div class='row'>

<center><h2  style='color:#800000'>Your Site Configuration Settings</h2><br></center>




<div class='col-sm-8'>


<?php
//include('data6rst.php');
$rese= $db->prepare("SELECT * FROM settings_site");
$rese->execute(array());
$rowe = $rese->fetch();
$counte = $rese->rowCount();


$logo = $rowe['logo'];
$title = $rowe['title'];
$description = $rowe['description'];
$site_keywords = $rowe['site_keywords'];
$header_color = $rowe['header_color'];
$footer_color = $rowe['footer_color'];
$day_pay = $rowe['day_pay'];
$month_pay = $rowe['month_pay'];
$year_pay = $rowe['year_pay'];
$site_display = $rowe['site_display'];

?>


<div class="form-group">
<label style="">Select Your Site Logo Image: </label>
<input style="background:#c1c1c1;" class="col-sm-12 form-control" type="file" id="file_content" name="file_content" accept="image/*" onchange="imagePreview(event)" />
 <img id="imageupload_preview"/>
</div><br>

				

 <div class="form-group">
              <label> Site  Name/Title </label>
              <input type="text" class="col-sm-12 form-control" id="title" name="title" placeholder="Site Name/Title" value="<?php echo $title; ?>">
            </div>


 <div class="form-group">
              <label> Site Description</label>
              <textarea class="col-sm-12 form-control" id="description" placeholder="Site Description"><?php echo $description; ?></textarea>
            </div>



 <div class="form-group">
              <label>Your Site Keywords (Please Enter Comma Seperated Site Keywords to boast your Google Search Engine Index)</label>
              <textarea class="col-sm-12 form-control" id="site_keywords" placeholder="Your Site Keywords"><?php echo $site_keywords; ?></textarea>
            </div>



 <div class="form-group">
              <label> Site Header Menu Color </label>
              <input type="color" class="col-sm-12 form-control" id="header_color" placeholder="Site Header Menu Color">
            </div>



 <div class="form-group">
              <label> Site Footer  Color </label>
              <input type="color" class="col-sm-12 form-control" id="footer_color" placeholder="Site Footer Color">
            </div>



 <div class="form-group">
              <label> Your Daily Customers Subscription Price(USD) </label>
              <input type="text" class="col-sm-12 form-control" id="day_pay" placeholder="Your Daily Customers Subscription Price(USD)" value="<?php echo $day_pay; ?>">
            </div>



 <div class="form-group">
              <label> Your Monthly Customers Subscription Price(USD) </label>
              <input type="text" class="col-sm-12 form-control" id="month_pay" placeholder="Your Monthly Customers Subscription Price(USD)" value="<?php echo $month_pay; ?>">
            </div>



 <div class="form-group">
              <label> Your yearly Customers Subscription Price(USD) </label>
              <input type="text" class="col-sm-12 form-control" id="year_pay" placeholder="Your Yearly Customers Subscription Price(USD)"  value="<?php echo $year_pay; ?>">
            </div>


 <div class="form-group">
              <label> Select How You want your Site Content to Display </label>
              <select class="col-sm-12 form-control" id="site_display">
<option value='horizontal'>horizontal</option>
</select>
            </div>





 <div class="form-group">
                            <div class="upload_progress" style="width:0%">0%</div>

                     
						<div id="loader_site"></div>
                        <div class="result_site"></div>
                    

                    <input type="button" id="site_btn" class="pull-right btn btn-primary" value="Update/Edit Site Data" />


      </div>




</div>


<div class='col-sm-4'>

<?php


if($counte > 0){




echo "<h3 style='color:#800000'>Your Site Data</h3>
<div><b>Site Logo:</b><img src='$logo' style='max-width:80px; max-height:80px' title='Site Logo' alt='Site Logo'></div><br>
<div><b>Sitename/Title:</b> $title</div><br>
<div><b>Site Description:</b> $description</div><br>
<div><b>Site Google Search Engine Keywords:</b> $site_keywords</div><br>
<div><b>Site Header Menu Color:</b> $header_color</div><br>
<div><b>Site Footer Color:</b> $footer_color</div><br>
<div><b>Your Daily Customers Subscription Price:</b> $day_pay(USD)</div><br>
<div><b>Your Monthly Customers Subscription Price:</b> $month_pay(USD)</div><br>
<div><b>Your yearly Customers Subscription Price:</b> $year_pay(USD)</div><br>
<div><b>Your Site Content Display:</b> $site_display</div><br>

";



}else{


echo "<div style='background:red;padding:8px;color:white;border:none;'>Your Site Data Settings is Empty...</div>";
}




?>

</div></div>

<!--End Site Data-->





<h6 style='width:100%;min-width:100%'>.</h6>
















<center><h2 style='color:#800000'>Square Payments Settings</h2><br>






<!--start Square Payment API Data-->

<div class='row'>

<div class='col-sm-8'>


<a style='color:white;background:#800000;padding:10px;border:none;' target= "_blank" href='square_how.php' title='How to Get Square Payment Access Token'>
How to Get Square Payment Access Token</a><br><br>



<span style='color:red'>Remember that Square Payments  Access Token for <b>Sandbox Test Enviroment</b> is different from that of <b>Production Enviroment</b>.
 So know whether <b>Access Token</b>
You are configuring is for Sandbox Testing or For Production </span><br><br>


 <div class="form-group">
              <label>Select  Square Payments Enviroments: </label><br>
<input type="radio" name="enviroment" checked value="connect.squareupsandbox.com"/>Sandbox Testing<br>
<input type="radio" name="enviroment" value="connect.squareup.com"/> Production
</div>


 <div class="form-group">
              <label>Enter Square Payments API Access Token (SandBox or Production): </label>
              <input type="text" class="col-sm-12 form-control" id="square_accesstoken" name="square_accesstoken" placeholder="Square Payments API Access Token">
            </div>



 <div class="form-group">
              <label> Enter Square Business Location ID: </label>
              <input type="text" class="col-sm-12 form-control" id="square_location_id" name="square_location_id" placeholder="Enter Square Business Location ID">
            </div>






 <div class="form-group">

						<div id="loader_s"></div>
                        <div class="result_s"></div>
                    </div>

                    <input type="button" id="square_btn" class="pull-right btn btn-primary" value="Update/Edit Square Payments API Data" />

</div>





<div class='col-sm-4'>

<?php

//include('data6rst.php');
$res= $db->prepare("SELECT * FROM settings WHERE data_type =:data_type order by id desc");
$res->execute(array(':data_type' => 'Square_Payments'));
$row = $res->fetch();
$count = $res->rowCount();

if($count > 0){
$location_id = $row['square_business_location_id'];
$square_key = $row['square_accesstoken'];
$square_enviroment = $row['square_enviroment'];

$microkeys = substr($square_key, 0, 6)."...";

echo "<h3 style='color:#800000'>Square Payments API Data</h3>
<div><b>Square Payments Environments:</b> $square_enviroment</div><br>
<div><b>Square Payments Access Token:</b> $microkeys</div><br>
<div><b>Square Bussiness Location ID:</b> $location_id</div><br>



";


}else{


echo "<div style='background:red;padding:8px;color:white;border:none;'>Square Payments API Data Settings is Empty...</div>";
}




?>

</div></div>

<!--End Square Payments Data-->



<br><br><br>






</div>
<!--End Right-->

</div>
<!--Row-->




<script>





function fetch_cat(){


var category2 = 'catego';
$("#loader-category2").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Fetching Category...</div>');
var datasend = {category2:category2};


	
		$.ajax({
			
			type:'POST',
			url:'category_fetch.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-category2").hide();
$("#result-category2").html(msg);
//setTimeout(function(){ $("#result-category").html(''); }, 5000);


// clear 
$('#category').val('');		
	


	
}
			
		});

}





$(document).ready(function(){


var category2 = 'catego';
$("#loader-category2").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Fetching Category...</div>');
var datasend = {category2:category2};


	
		$.ajax({
			
			type:'POST',
			url:'category_fetch.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-category2").hide();
$("#result-category2").html(msg);
//setTimeout(function(){ $("#result-category").html(''); }, 5000);


// clear 
$('#category').val('');		
	


	
}
			
		});
});












$(document).ready(function(){
$('#category_btn').click(function () {

var category  = $('#category').val();


 if(category==""){
alert('please Enter Category');
}




else{


$("#loader-category").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Updating Category...</div>');
var datasend = {category:category};


	
		$.ajax({
			
			type:'POST',
			url:'category.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-category").hide();
$("#result-category").html(msg);
setTimeout(function(){ $("#result-category").html(''); }, 5000);


// clear 
$('#category').val('');		
fetch_cat();	


	
}
			
		});
		
		}

});

});



</script>




<!-- category Modal start -->
<div class="modal fade" id="myModal_category">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style='background: <?php echo $header_color; ?>;color:white;padding:10px;'>
        <h4 class="modal-title">Updates Posts/Video Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
Posts/Video Category Updates System.....<br><br>

Add Categories for Your Posts, Contents, Videos one after another.  Eg. <b>For Entertainments Video Streamings</b>, You can add categories like

<b>TV Shows, Movies, Documentaries, Sports etc.</b><br><br>

 <div class="form-group hide_form">
              <label>Enter Posts/Video Category: </label>
              <input type="text" class="col-sm-12 form-control" id="category" name="category" placeholder='Enter Posts/Video Category'>
            </div>
 

<br>
<div id="loader-category"></div>
<div id="result-category"></div>
<br>
                    <input type="button" id="category_btn" class="btn btn-primary" value="Add Category" />
<br>

<div id="loader-category2"></div>
<div id="result-category2"></div>



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Category Modal ends -->














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


