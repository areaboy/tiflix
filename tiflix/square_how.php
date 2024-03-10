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
echo $titlex = $rowe['title'];
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
 <title> <?php echo $titlex; ?> </title>
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
background: #800000;
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




 <li class="navgate_no"><a href="dashboard_admin.php" title='Dashboard'  style="color:white;font-size:14px;">
<button class="category_post1">Back to Dashboard</button></a></li>

   

 <li class="navgate_no"><a href="logout.php" title='Logout'  style="color:white;font-size:14px;">
<button class="category_post1">Logout</button></a></li>

      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->














<br><br>


  <h1>How to get Square Access  Token and Business Location Id</h1>



1.) Signup and Login into Square Developers Portal <a target='_blank' href='https://developer.squareup.com/'>
https://developer.squareup.com/</a><br><br>

2.)Next, Click on <b>plus sign</b>  as indicated by the Arrow to create your App by entering App name <b>Eg. E-Pay, Tiflix etc.</b>. 
 Then click on the App you just created via <b>Open</b> Button to get your Access token.


<br><br>
<img src='square_token.png'><br><br>
<br>



<b>Sandbox Access Token</b> is for application testing
while <b>Production Access Token</b> is for Production or Real-life payments

<h2>Sandbox Access Token Sample</h2>

<br><br>
<img src='square_sandbox.png'><br><br>



<h2>Production Access Token Sample</h2>

<br><br>
<img src='square_production.png'><br><br>


3)  To get Your App <b>Square Business location</b>, still on you app <b>Settings</b> page  or click on the App Name you just created via <b>Open</b> Button

Scroll down On that page, on the <b>left-hand nav</b>, you should see <b>Locations</b> which has your location ids (see screenshot below). Just Copy any  1 Location
 Id to be used.  Thats all<br><br>

<img src='square3.png'>

<br><br><br>


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


