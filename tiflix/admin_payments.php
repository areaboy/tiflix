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
$description = "Application Powered By TIDB";
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
 <title><?php echo $title; ?> - Welcome <?php echo $fullname_sess; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?php echo $description; ?>" />

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

background: #B931B9;
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
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img title='<?php  echo $title; ?>-logo' alt='<?php  echo $title; ?>-logo' class="img-rounded imagelogo_data" src="<?php echo $logo; ?>"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">




 <li class="navgate_no"><a href="<?php echo $site_url; ?>/dashboard_admin.php" title='Dashboard'  style="color:white;font-size:14px;">
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







<center><h4>Square Subscription Invoice  Payments Management System</h4><br>



<a style="color:white;">
<span class="category_post1xx_no">.</span></a>
</center>




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
   url:"subscription_load_admin.php",
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

<p class="footer_text1"><?php echo $title; ?></p>
<p class="footer_text2"><?php  echo $description; ?></p>
<br>

        </div>



        </div>

<br/>
  <p></p>
</footer>

<!-- footer Section ends -->




   
</body>
</html>


