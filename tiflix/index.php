<?php 
//error_reporting(0);
include('settings.php');


//check if Site Url is Empty in the settings.php file

if($site_url == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Contact Admin to Set the Site URL to point to main application folder by editing

<b>(settings.php)</b> File</div>";
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
$title = $rowe['title'];
$description = $rowe['description'];
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


if($title==''){
$title = "Ti-Flix";
}


if($description==''){
$description = "A Pay as You Go Video Compression and Streaming Payments Services that allow users to Pay and Watch Online Videos 
Powered by FFMPEG Video Converter, video Streaming Classes, Videojs P2p Video Javascript Player and Square Payment API System";
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
 <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $description; ?>" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>




<style>


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

/* navigation */


.left-column-all {
    overflow-x: hidden;
    position: fixed;
    z-index: 9999;
    width:50vw;
    height: 100vh;
    background: url(home1.png) center no-repeat <?php echo $header_color; ?>;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -ms-background-size: cover;
    -o-background-size: cover;

/*
    margin-top: 0px;
    margin-left: 0px;
    */
}



@media screen and (max-width: 1440px) {
.left-column-all {
width:100vw;
width:100vh;

}

}
	
.right-column-all {
 margin-left:40vw;
/*
margin-left:47vw;
*/
}

@media screen and (max-width: 800px) {
.left-column-all {
    width: 100vw;
    position: inherit;
    background-position: inherit;
}

.right-column-all {
    margin-top: 0px;
margin-left: 0px;

}
}




/*ensure that category button does not jam about us or event section when on mobile start here. you can remove it if you
like. this will make product contain maximum of 8 categories button*/
@media screen and (max-width: 768px) {
.left-column-all {
   padding-bottom:700px;
}
}

@media screen and (max-width: 600px) {
.left-column-all {
   padding-bottom:700px;

}
}

/*ensure that category button does not jam about us or product section when on mobile ends here.*/




.section_padding {
padding: 60px 40px;
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
   background-color: <?php echo $header_color; ?>;

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
background:fuchsia;
color:white;

}





/* home starts */
  
.home_image {	
width:100%;
/*
height:500px;
max-height:500px;
*/
height:100vh;
max-height:100vh;
       
        
}

.home_content_head {
        color: white;
        font-size:40px;
        font-weight:bold;
	font-family:comic sans ms; 
width:40vw;
margin-left:-110px;
  
}

.home_content_text {
        color: white;
        font-size:20px;
        font-weight:bold;
	box-sizing: border-box;
      //position: relative;
        
}

.home{
background:#ec5574;
}

.home:hover{
box-shadow: inset 0 0 0 25px <?php echo $header_color; ?>;

}


.home_text_transparent_home {
border-style: solid; border-width:1px; border-color: orange;
  width: 100%;
  padding: 90px;
  position: absolute;
  bottom: 0px;
  background: rgba( 0, 0, 0, 0.50);

  color: white;
  height:100%;
text-align: center;

}



@media screen and (max-width: 768px) {
  .home_text_transparent_home{

  width: 100%;
  padding: 20px;
  }
}



@media screen and (max-width: 600px) {
  .home_content_home{
  width: 100%;
  padding: 20px  
  }
}













.marquee_button{
background-color: <?php echo $header_color; ?>;
padding: 6px;
color:white;
font-size:14px;
//border-radius: 50%;
transform: skew(15deg);
border: none;
cursor: pointer;
text-align: center;



}
.marquee_button:hover {
background: black;
color:white;
}


.marquee_image{ 
width:60px;height:60px;
border-radius: 50%;
border-style: solid; border-width:2px; border-color: <?php echo $header_color; ?>;
}






/* footer */


  .navbar_footer {
letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
    //background-color:fuchsia;
    color:white;
    padding:20px;
    border: 0;
    font-family: comic sans ms;
  }


.footer_bgcolor{
background: <?php  echo $footer_color; ?>;
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


.footer_text3{
color:grey;
font-size:24px;
border:none;
cursor:pointer;
}

.footer_text1:hover{
color:grey;
}


.footer_text2:hover{
color:orange;
}


.footer_text3:hover{
color:orange;
}

.footer_dashedline{
 border-top: 1px dashed white;
}


.contact_info{

background: fuchsia;
color:white;
cursor: pointer;
padding:16px;
border-radius: 10%;

}
.contact_info:hover{
background: orange;
color:black;

}


.contact_info_dashedline{
  border-bottom: 5px dashed <?php echo $header_color; ?>;

}


.left_shifting{

width:40%;
}

@media screen and (max-width: 768px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}


}



@media screen and (max-width: 600px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}

}

.modaling_sizing{
width:59%;
}


@media screen and (max-width: 768px) {
.modaling_sizing {
width:99%;

}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center;
}


}

@media screen and (max-width: 600px) {
.modaling_sizing {
width:99%;
}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center; 
}



}

.category_post{
background-color: <?php echo $header_color; ?>;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	



.category_post2{
background-color: <?php echo $header_color; ?>;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	

.modal-dialog{
   
   margin-top: 80px;
} 

</style>



 
</head>
<body>























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
     <li class="navbar-brand home_click imagelogo_li_remove" ><img title='<?php  echo $title; ?>-logo' alt='<?php  echo $title; ?>-logo' class="img-rounded imagelogo_data" src="<?php echo $logo; ?>"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">



      <ul class="nav navbar-nav navbar-right">





      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->







<script>



//admin  signup starts

$(document).ready(function(){
$('#signup_btn').click(function () {

var username  = $('#username_s').val();
var password = $('#password_s').val();
var fullname = $('#fullname_s').val();
var phone_no = '0';
var status = 'Admin';

                   var country = $('#country2').val();

var account = 'account';
//alert(status);


 if(fullname==""){
alert('please Enter Fullname');
}


 else if(phone_no==""){
alert('please Enter Phone No');
}


 else if(username==""){
alert('please Enter Email');
}

else if(password==""){
alert('please Enter Password');
}

else if(status==undefined){
alert('please Pick Your Status');
}



else if(country ==''){
alert('Please Select Country..');
}

else{


$("#loader-signup").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your data is being Created...</div>');
var datasend = {username:username, password:password, fullname:fullname, phone_no:phone_no, status:status, account:account, country:country};


	
		$.ajax({
			
			type:'POST',
			url:'signup_admin.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-signup").hide();
$("#result-signup").html(msg);
setTimeout(function(){ $("#result-signup").html(''); }, 5000);


// clear all customers Data
//$('#emailxy').val('');		
//$('#passwordxy').val('');	


	
}
			
		});
		
		}

});

});

// admin  signup ends


//admin login starts

$(document).ready(function(){
$('#login_btn').click(function () {

var username  = $('#username').val();
var password = $('#password').val();



 if(username==""){
alert('please Enter Email');
}

else if(password==""){
alert('please Enter Password');
}




else{


$("#loader-login").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your are being login as Admin...</div>');
var datasend = {username:username, password:password};


	
		$.ajax({
			
			type:'POST',
			url:'login_admin.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-login").hide();
$("#result-login").html(msg);
setTimeout(function(){ $("#result-login").html(''); }, 5000);


// clear all customers Data
//$('#emailxy').val('');		
//$('#passwordxy').val('');	


	
}
			
		});
		
		}

});

});



    
</script>







<!-- Admin signup Modal start -->



<div id="myModal_signup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"  style='background: <?php echo $header_color; ?>;color:white;padding:10px;'>
        <h4 class="modal-title">Admin Signup System</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
Admin Signup System....<br><br>



<div id="loader-token"></div>
<div id="result-token"></div>



 <div class="form-group">
              <label> Fullname: </label>
              <input type="text" class="col-sm-12 form-control" id="fullname_s" name="fullname_s" >
            </div>


 


 <div class="form-group">
              <label>Email: </label>
              <input type="text" class="col-sm-12 form-control" id="username_s" name="username_s"  value="admin@gmail.com">
            </div>
 
 <div class="form-group">
              <label>Password: </label>
              <input type="password" class="col-sm-12 form-control" id="password_s" name="password_s"  value="admin">
            </div>




<?php 
include('countries_list_new2.php');
?>


<br>
<div id="loader-signup"></div>
<div id="result-signup"></div>


                    <input type="button" id="signup_btn" class="btn btn-primary" value="Signup Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Admin signup Modal ends -->


<!-- Admin login Modal start -->
<div class="modal fade" id="myModal_login">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style='background: <?php echo $header_color; ?>;color:white;padding:10px;'>
        <h4 class="modal-title">Admin Login System</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
Admin Login System.....<br><br>

 <div class="form-group">
              <label>Email: </label>
              <input type="text" class="col-sm-12 form-control" id="username" name="username"  value="admin@gmail.com">
            </div>
 
 <div class="form-group">
              <label>Password: </label>
              <input type="password" class="col-sm-12 form-control" id="password" name="password"  value="123">
            </div>

<br>
<div id="loader-login"></div>
<div id="result-login"></div>


                    <input type="button" id="login_btn" class="btn btn-primary" value="Login Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!--  Admin login Modal ends -->










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
                $('#save_btn').click(function () {
					
				
                    var email = $('#email_u').val();
                    var password = $('#password_u').val();
                    var confirm_password =$('#confirm-password_u').val();
                    var fullname = $('#fullname_u').val();
                    var file_fname = $('#file_content').val();
                    var user_rank = 'User';

var account = 'account';
                   var country = $('#country').val();

                    //preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");


if(password != confirm_password){
alert('Password Does not Match');
return false;
}

// start if validate
if(file_fname==""){
alert('please Select File to Upload');
}




else if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}


else if(password==""){
alert('please Enter Password');
}


else if(fullname==""){
alert('please Enter Your Fullname');
}



else if(country==""){
alert('please Select Country');
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
          form_data.append('email', email);
          form_data.append('fullname', fullname);
          form_data.append('password', password);
          form_data.append('user_rank', user_rank);
 form_data.append('account', account);
 form_data.append('country', country);

        
                    $('.upload_progress').css('width', '0');
                    $('#btn').attr('disabled', 'disabled');
					$('#loaderx').hide();
                    $('#loader').fadeIn(400).html('<br><div class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Data is being  Submitted.Uploading Files to Amazon S3.</div>');
                    $.ajax({
                        url: 'signup_user.php',
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
				$('#loader').hide();
				$('.result_data').fadeIn('slow').prepend(msg);
				$('#alertdata_uploadfiles').delay(5000).fadeOut('slow');
                                $('#alerts_reg').delay(5000).fadeOut('slow');
                                $('#alertdata_uploadfiles2').delay(20000).fadeOut('slow');
                                $('#save_btn').removeAttr('disabled');


//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//alert(html_stripped);

//check occurrence of word (successfully) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successfully/g) || []).length;
//alert(bcount);

if(bcount > 0){
$('#file_fname').val('');
$('#email').val('');
$('#fullname').val('');
$('#password').val('');
$('#confirm-password').val('');
}




                        }
                    });
} // end if validate




                });
            });







//login starts

$(document).ready(function(){
$('#login_btn_user').click(function () {

var username  = $('#username_u1').val();
var password = $('#password_u1').val();



 if(username==""){
alert('please Enter Email');
}

else if(password==""){
alert('please Enter Password');
}




else{


$("#loader-login_user").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your are being login as User...</div>');
var datasend = {username:username, password:password};


	
		$.ajax({
			
			type:'POST',
			url:'login_user.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-login_user").hide();
$("#result-login_user").html(msg);
setTimeout(function(){ $("#result-login_user").html(''); }, 5000);


// clear all customers Data
//$('#emailxy').val('');		
//$('#passwordxy').val('');	


	
}
			
		});
		
		}

});

});

//  login ends







</script>

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
</style>
<!-- Users signup Modal start -->



<div id="myModal_signup_users" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"  style='background: <?php echo $header_color; ?>;color:white;padding:10px;'>
        <h4 class="modal-title">Users Signup System</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
Users Signup System....<br><br>


<div class="form-group">
<label style="">Select Profile Photo: </label>
<input style="background:#c1c1c1;" class="col-sm-12 form-control" type="file" id="file_content" name="file_content" accept="image/*" onchange="imagePreview(event)" />
 <img id="imageupload_preview"/>
</div><br>





 <div class="form-group">
              <label> Fullname: </label>
              <input type="text" class="col-sm-12 form-control" id="fullname_u" name="fullname_u" placeholder="Fullname">
            </div>



 <div class="form-group">
              <label>Email: </label>
              <input type="text" class="col-sm-12 form-control" id="email_u" name="email_u"  placeholder="Email">
            </div>
 


 <div class="form-group">
              <label style="" for="psw">
<span class="fa fa-eye"></span> Password</label>
              <input type="password" class="col-sm-12 form-control" id="password_u" name="password_u" placeholder="Enter password">
            </div><br>

 <div class="form-group">
              <label style="" for="psw">
<span class="fa fa-eye"></span> Confirm Password</label>
              <input type="password" class="col-sm-12 form-control" id="confirm-password_u" name="confirm-password_u" placeholder=" Confirm Password">
            </div><br>





<?php 
include('countries_list_new.php');
?>

 <div class="form-group">
                            <div class="upload_progress" style="width:0%">0%</div>

                        <div id="loaderx"></div>
						<div id="loader"></div>
                        <div class="result_data"></div>
                    </div>

                    <input type="button" id="save_btn" class="pull-right btn btn-primary" value="Signup" />


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Users signup Modal ends -->



<!-- users login Modal start -->
<div class="modal fade" id="myModal_login_users">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style='background: <?php echo $header_color; ?>;color:white;padding:10px;'>
        <h4 class="modal-title">Users Login System</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
Users Login System.....<br><br>

 <div class="form-group">
              <label>Email: </label>
              <input type="text" class="col-sm-12 form-control" id="username_u1" name="username_u1" value='user1@gmail.com'>
            </div>
 
 <div class="form-group">
              <label>Password: </label>
              <input type="password" class="col-sm-12 form-control" id="password_u1" name="password_u1" value='123'>
            </div>

<br>
<div id="loader-login_user"></div>
<div id="result-login_user"></div>


                    <input type="button" id="login_btn_user" class="btn btn-primary" value="Login Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Users login Modal ends -->




<div class="home_text_transparent_home" >
<div class="home_resize_padding"> 


<p class="home_content_head pull-left"><?php echo $title; ?></p>
<marquee> <p class=""><button class="contact_click marquee_button"><img class="marquee_image" src="home1.png" /><?php echo $title; ?></button> </p></marquee>

                      

<style>


.dropdown_color:hover{
background: black;
color:white;

}
</style>


  <p class="home_content_text">Admin Access Only</p><br>

<p>

<a  class="category_post" data-toggle="modal" data-target="#myModal_signup">Admin Signup</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a  class="category_post" data-toggle="modal" data-target="#myModal_login">Admin Login</a>

</p>


<br> 






  <p class="home_content_text">Users/Subscribers Access Only</p><br>

<p>

<a  class="category_post2" data-toggle="modal" data-target="#myModal_signup_users">Users Signup</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a  class="category_post2" data-toggle="modal" data-target="#myModal_login_users">Users Login</a><br><br><br>


</p>


<br> 



     
</div> 
</div>


    </div>
<!--end left column all-->









<!--start right column all-->
    <div class="right-column-all">




















<!-- about Section start-->
<div  class="about section_padding aboutus_bgcolor" style=''>


  <h2 class="text-center"><span class="contact_name_color">About <?php echo $title; ?></span></h2>
<p class="footer_text3"><?php echo $description; ?> </p><br><br>
<img style="width:100%;min-width:100%;max-width:100%;height:400px;" src="home2.png">

<style>
.hh{
color:#800000;
}

.hh:hover{
color:black;
}
</style>
  <h2 style='display:none' class="text-center"><span class="contact_name_color hh">Powered by Esedo Fredrick</span></h2>


</div>




<!-- about Section ends-->









<style>
.xcx1{
background-color: #ccc;
padding: 2px;
color:black;
font-size:14px;
border-radius: 10%;
border: none;
//cursor: pointer;
text-align: center;

}
.xcx1:hover {
background: orange;
color:white;
}	
</style>





<!-- footer Section start -->

<footer class=" navbar_footer text-center footer_bgcolor">

<div class="row">

        <div class="col-sm-12">

<p class="footer_text1"><?php echo $title; ?></p>
<p class="footer_text2"><?php  echo $description; ?></p>
<br>



        </div>

 
</div>



</div>

<div class="footer_text1">
<p class="footer_text1"></p>
</div>


<div class="footer_dashedline"></div>

 </footer>

<!-- footer Section ends -->
	




<div>
  <!--end right column all-->    







   
</body>
</html>























