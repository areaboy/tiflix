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




<center><h3>
<b style='color:purple'>Amazon Bucket Accesslist Error </b></h3></center>




<br>
If you are an Admin and you encounter  Error <b>AccessControlListNotSupported</b> when uploading a File to Amazon S3. It simply means that you need to allow Storage access to your Amazon S3 Bucket Storage.<br>
Your Bucket Name is <b><?php echo $_GET['bucket']; ?></b> 


<br><br>  <h1>5 Steps to Configure and Protect your Amazon S3 Buckets & Files</h1>

 You will Need to allow Public Access to the Folder. Don't Worry, Your Amazon S3 File Cannot be Accessed by External Users or Directly from an Browsers.

Your Files wil be protected from Unauthorized Access.....<br><br>

1.)Login into <a target='_blank' href='https://aws.amazon.com/s3/'>Amazon S3 Site</a><br><br>

2.)<b>sclick S3</b>. then Click Your Bucket Eg. <b><?php echo $_GET['bucket']; ?></b>  Then Go to <b>Permission</b>  

<br>
<img src='screen.png'><br><br>




under <b>Permission</b>, Goto or Scroll Down to <b>Block public access (bucket settings)</b>, Click 
<b>Edit</b> Button  then uncheck <b> Block All Public Access</b>. This will automatically unchecked all the blocked access and there by turning it <b>off</b>.


Click on <b>Save Changes</b>. Next, <b>Confirm</b> your Settings. <br><br>



<img src='screen_access.png'><br><br>



3.) Its time to protect your Amazon S3 Files from External or Unauthorized Access. Configure your Amazon Buckets and Files and ensure that only your Site/Domain Name can 
access it.<br>

Still Under <b>Permission</b> Go to or Scroll Down  to <b>Bucket Policy</b> click <b>Edit</b> Button Next, Copy  the Following Json Code below, Edit some 
Parameters in a Text Editor Eg.  Notepad, then and Paste in the code inside <b>Bucket Policy</b>. Next Click on <b>Save Changes</b><br><br>

<pre>
<code>
{
    "Version": "2012-10-17",

    "Id": "http referer policy example",

    "Statement": [
        {
            "Sid": "Allow get requests referred by example.com and localhost.",
            "Effect": "Allow",
            "Principal": "*",
            "Action": "*",
            "Resource": "arn:aws:s3:::app-bucket-image1688213325/*",
            "Condition": {
                "StringLike": {
                    "aws:Referer": [
                        "http://localhost/*",
                        "https://example.com/*"
                    ]
                }
            }
        },
        {
            "Sid": "Explicit deny to ensure requests are allowed only from specific referer.",
            "Effect": "Deny",
            "Principal": "*",
            "Action": "s3:GetObject",
            "Resource": "arn:aws:s3:::app-bucket-image1688213325/*",
            "Condition": {
                "StringNotLike": {
                    "aws:Referer": [
                        "http://localhost/*",
                        "https://example.com/*"
                    ]
                }
            }
        }
    ]
}


</code>
</pre>


<br><br>

From the Code above, Only <b>Localhost and example.com</b> can access your Amazon S3 Buckets and Files<br>


<span style='color:red'> Before Saving the Code to <b>Bucket Policy</b></span>,<br>

A.) Change <b>http://localhost, https://example.com/</b>  to your own Site Name.<br><br>

B.) Change The Resource Value to Reflect Your Bucket Name where appropriates<br><br>
Eg. "Resource": "arn:aws:s3:::<b>app-bucket-image1688213325</b>/*"

<br><br>


<span style='color:#800000'>Note: Always remove <b>http://Localhost</b> Link in production</b></span><br><br>

<img src='screen_policy.png'><br><br>


4.) Still under <b>Permission</b>,  Goto or Scroll Down to <b>Object Ownership</b>,

 clict <b>Edit</b> Button Next, Select <b>ACLs enabled</b>. Check <b>I acknowledge that ACLs will be restored </b>box. 
Also ensure that <b>Bucket owner preferred</b> is selected by Default. Next Click on <b>Save Changes</b><br><br>


<img src='screen_ownership.png'><br><br>



5.) Still under <b>Permission</b>,  Goto or Scroll Down to <b>Cross-origin resource sharing (CORS)</b>,

 click <b>Edit</b> Button Next, Copy  the Following Json Code below, Edit some 
Parameters in a Text Editor Eg.  Notepad, then and Paste in the code inside <b>Cross-origin resource sharing (CORS)</b>. Next Click on <b>Save Changes</b><br><br>

<pre>
<code>
[
    {
        "AllowedHeaders": [
            "Authorization"
        ],
        "AllowedMethods": [
            "GET",
            "POST",
            "PUT"
        ],
        "AllowedOrigins": [
            "http://localhost",
            "https://example.com"
        ],
        "ExposeHeaders": [],
        "MaxAgeSeconds": 3000
    }
]
</code>
</pre>


From the Code above, Only <b>Localhost and example.com</b> can access your Amazon S3 Buckets and Files<br>


<span style='color:red'> Before Saving the Code to <b>Cross-origin resource sharing (CORS)</b></span>,<br>

A.) Change <b>http://localhost, https://example.com/</b>  to your own Site Name.<br><br>

<span style='color:#800000'>Note: Always remove <b>http://Localhost</b> Link in production</b></span><br><br>

You are Done. Everything will work fine Now.
 In future, Always follow the same method toconfigure your Amazon S3 Buckets<br><br>



<img src='screen_origin.png'><br><br>

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


