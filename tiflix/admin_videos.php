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
 <title><?php echo  $title; ?> - Welcome <?php echo $fullname_sess; ?> </title>
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
     <li class="navbar-brand home_click imagelogo_li_remove" ><img title='<?php  echo $title; ?>-logo' alt='<?php  echo $title; ?>-logo' class="img-rounded imagelogo_data" src="<?php echo $logo; ?>"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">



 <li class="navgate_no"><a href="<?php echo $site_url; ?>/dashboard_admin.php" title='Back to Dashboard'  style="color:white;font-size:14px;">
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
<b style='color:purple'> <?php echo $fullname_sess; ?> </b></h3>




 <li class="navgate_no"><a title='Upload New Video' data-toggle='modal' data-target='#myModal_video1' style="color:white;font-size:14px;">
<button class="category_post1">Upload New Video</button></a></li>

</center><br>



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




<script>
$(document).ready(function(){
$(document).on( 'click', '.ban_btn', function(){ 

var id = $(this).data('id');
var userid = $(this).data('userid');

// confirm start
 if(confirm("Are you sure you want to Ban this User: ")){

$("#loader-b_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="ajax-loader.gif"> &nbsp;Please Wait, User is being Banned...</div>');
var datasend = {'id': id, 'userid': userid};
		$.ajax({
			
			type:'POST',
			url:'user_ban.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-b_"+id).hide();
$("#result-b_"+id).html(msg);
setTimeout(function(){ $("#result-b_"+id).html(''); }, 5000);
//location.reload();

/*

<span style='' id='loader-b_<?php echo $id; ?>'></span>
<span style='' id='result-b_<?php echo $id; ?>'></span>
*/

}
			
});
}

// confirm ends

                });



            });



// unbann users

$(document).ready(function(){
$(document).on( 'click', '.uban_btn', function(){ 

var id = $(this).data('id');
var userid = $(this).data('userid');

// confirm start
 if(confirm("Are you sure you want to UnBan this User: ")){

$("#loader-ub_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="ajax-loader.gif"> &nbsp;Please Wait, User is being UnBanned...</div>');
var datasend = {'id': id, 'userid': userid};
		$.ajax({
			
			type:'POST',
			url:'user_uban.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-ub_"+id).hide();
$("#result-ub_"+id).html(msg);
setTimeout(function(){ $("#result-ub_"+id).html(''); }, 5000);
//location.reload();


}
			
});
}

// confirm ends

                });



            });





// Delete Videos



$(document).ready(function(){
$(document).on( 'click', '.v_btn', function(){ 

var id = $(this).data('id');
var userid = $(this).data('userid');

// confirm start
 if(confirm("Are you sure you want to Delete this Video along with Associated Comments, Reply etc: ")){

$("#loader-v_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="ajax-loader.gif"> &nbsp;Please Wait, Video is being Deleted...</div>');
var datasend = {'id': id, 'userid': userid};
		$.ajax({
			
			type:'POST',
			url:'video_delete.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-v_"+id).hide();
$("#result-v_"+id).html(msg);
setTimeout(function(){ $("#result-v_"+id).html(''); }, 5000);
//location.reload();


}
			
});
}

// confirm ends

                });



            });



// compress video

$(document).ready(function(){
$(document).on( 'click', '.compress_btn', function(){ 

var id = $(this).data('id');
var video_url = $(this).data('video_url');


// confirm start
 if(confirm("Are you sure you want to Compress this Video ")){

$("#loader-vid_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="ajax-loader.gif"> &nbsp;Please Wait, Video is being compressed...</div>');
var datasend = {'id': id, 'video_url': video_url};
		$.ajax({
			
			type:'POST',
			url:'video_compression.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-vid_"+id).hide();
$("#result-vid_"+id).html(msg);
setTimeout(function(){ $("#result-vid_"+id).html(''); }, 5000);
//location.reload();


}
			
});
}

// confirm ends

                });



            });





</script>

<style>
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

</style>

<center><h3>Manage Videos</h2><br>




<h4>Search Videos By Name, Title, Descriptions, Category etc.</h4>


<div class="container">
<div class="row">
<div class="col-sm-12 table-responsive">
<div class="alert_server_response"></div>
<div class="loader_x"></div>
<table id="backup_content" class="table table-bordered table-striped">
<thead><tr>


<th>Photo</th>
<th>Fullname</th>
<th>Video</th>
<th>Title</th>
<th>Total Likes</th>
<th>Total Comments</th>
<th>Category</th>
<th>Delete</th>
<th>Time</th>
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
   url:"videos_load.php",
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


            $(function () {
                $('#t_video_btn').click(function () {
					
				
                    var title = $('#title').val();
                    var description = $('#description').val();
                    var file_fname = $('#file_content').val();
var video_category = $('#video_category').val();
                   
// start if validate
if(file_fname==""){
alert('please Select Video to Upload');
}




else if(title==""){
alert('please Enter Video Title');
}
else if(description==""){
alert('please Enter Video Description');
}
else if(video_category==""){
alert('please Select Video Category');
}

else{

var fname=  $('#file_content').val();
var ext = fname.split('.').pop();
//alert(ext);

// add double quotes around the variables
var fileExtention_quotes = ext;
fileExtention_quotes = "'"+fileExtention_quotes+"'";

 var allowedtypes = ["ogg","OGG","mp4","MP4","WebM","webm","WEBM","Ogg", "ogv", "OGV"];
    if(allowedtypes.indexOf(ext) !== -1){
//alert('Good this is a valid video');
}else{
alert("Please Upload a Valid Video. Allowed Video Formats: ogg, mp4 or webm");
return false;
    }


          var form_data = new FormData();
          form_data.append('file_content', $('#file_content')[0].files[0]);
          form_data.append('file_fname', file_fname);
          form_data.append('title', title);
          form_data.append('description', description);
          form_data.append('video_category', video_category);

        
                    $('.upload_progress').css('width', '0');
                    $('#btn').attr('disabled', 'disabled');
					$('#loaderx').hide();
                    $('#loader').fadeIn(400).html('<br><div class="well" style="color:black"><img src="ajax-loader.gif">&nbsp; Please Wait, Your Video is being Uploaded...</div>');
                    $.ajax({
                        url: 'video_uploads.php',
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
$('#title').val('');
$('#description').val('');
}

                        }
                    });
} // end if validate




                });
            });

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




 <!-- Modal one Starts -->

<div class="container">
 
  <div class="modal fade" id="myModal_video1" role="dialog">
   <div class="full-screen modal-dialog modal-lg modal-appear-center1 modal_mobile_resize modaling_sizing">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='color:black; background:<?php echo $header_color; ?>'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Video</h4>
        </div>
        <div class="modal-body">
 <!-- Modal content starts-->

<!--start form--> 

<center><h3>Publish Video Content </h3></center>



<div class="form-group">
<label style="">Select Video: </label>
<input style="background:#c1c1c1;" class="col-sm-12 form-control" type="file" id="file_content" name="file_content" />
</div><br>




 <div class="form-group">
              <label> Video Title: </label>
              <input type="text" class="col-sm-12 form-control" id="title" name="title" placeholder="Video Title">
            </div>



 <div class="form-group">
              <label>Video Description: </label>
              <textarea class="col-sm-12 form-control" id="description" name="description"  placeholder="Video Description"></Textarea>
            </div>

<?php
include('category_query.php');
?>

 


 <div class="form-group">
   <div class="upload_progress" style="width:0%">0%</div>

                        <div id="loaderx"></div>
						<div id="loader"></div>
                        <div class="result_data"></div>
                    </div>

                    <input type="button" id="t_video_btn" class="pull-right btn btn-primary" value="Upload Video Content" />



<!--end form-->



<br>
<br>
<br>









<br>
<br>
<br>





      </div>











 <!-- Modal content ends-->
          
        </div>
        <div class="modal-footer" style='color:black; background:#ddd'>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
 <!-- Modal one ends-->

























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


