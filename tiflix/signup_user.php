<?php
error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

include('settings.php');
include('data6rst.php');

$file_content = strip_tags($_POST['file_fname']);
//$username1 = strip_tags($_POST['username']);
//$username = str_replace(' ', '', $username1);


$password = strip_tags($_POST['password']);
$fullname = strip_tags($_POST['fullname']);
$email = strip_tags($_POST['email']);
$status = strip_tags($_POST['user_rank']);
$country = strip_tags($_POST['country']);



$mt_id=rand(0000,9999);
$mt_id1=rand(0000,8888);

$mt_id2  = $mt_id1.$mt_id;

$dt2=date("Y-m-d H:i:s");
$ipaddress = strip_tags($_SERVER['REMOTE_ADDR']);


	
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$mt = microtime(true);
$mdx = md5($mt);
$uidx = uniqid();
$userid = $uidx.$timer.$mdx;



// check if user with this email already exits
$result_verified = $db->prepare('select * from users where email=:email');
$result_verified->execute(array(':email' =>$email));

 $rows= $result_verified->fetch();
$norows= $result_verified->rowCount();

if($norows ==1){
echo "<div style='background:red;padding:8px;color:white;border:none;'>These Email Address already exist</div>";
exit();
}	 




if ($file_content == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Files Upload is empty</font></div>";
exit();
}


if ($password == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>password is empty</font></div>";
exit();
}

if ($fullname == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>fullname Name is empty</font></div>";
exit();
}

if ($email == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Email Address is empty</font></div>";
exit();
}

$em= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$em){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Email Address is Invalid</font></div>";
exit();
}

$ip= filter_var($ipaddress, FILTER_VALIDATE_IP);
if (!$ip){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>IP Address is Invalid</font></div>";
exit();
}

$filename_string = strip_tags($_FILES['file_content']['name']);
// thus check files extension names before major validations

$allowed_formats = array("PNG", "png", "gif", "GIF", "jpeg", "JPEG", "BMP", "bmp","JPG","jpg");
$exts = explode(".",$filename_string);
$ext = end($exts);

if (!in_array($ext, $allowed_formats)) { 
echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>File Formats not allowed. Only Images are allowed.<br></div>";
exit();
}




$upload_path = "uploads/";


$fsize = $_FILES['file_content']['size']; 
$ftmp = $_FILES['file_content']['tmp_name'];

if ($fsize > 50 * 1024 * 1024) { // allow file of less than 5 mb
echo "<div id='alertdata' class='alerts alert-danger'>File greater than 50 mb not allowed<br></div>";
exit();
}



$allowed_types=array(

'application/json',
'application/octet-stream',
'text/plain',
'image/gif',

    'image/jpeg',

    'image/png',

'image/jpg',



'image/GIF',

    'image/JPEG',

    'image/PNG',

'image/JPG'

);






if ( ! ( in_array($_FILES["file_content"]["type"], $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Only Images are allowed bro..<br><br></div>";

exit();

}




//validate image using file info  method
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file_content']['tmp_name']);


if ( ! ( in_array($mime, $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Only Images are allowed...<br></div>";

exit();

}
finfo_close($finfo);



$mt_id=rand(0000,9999);
$mt_id1=rand(0000,8888);

$mt_id2  = $mt_id1.$mt_id;
$mt = microtime(true);
$mdx = md5($mt);
$mdx2 = md5($ipaddress);
$mdx3 = $mdx.$mdx2;
$uidx = uniqid();
$userid = $uidx.$timer.$mdx;
$username = $timer;

$uniq = sha1($uidx);

$token1 = $userid.$mdx3;
$token2 = $mt_id2.$uniq;

//insert into database
$final_filename =$mt_id2.$uidx.$mt.$filename_string;


//hash password before sending it to database...
$options = array("cost"=>4);
$hashpass = password_hash($password,PASSWORD_BCRYPT,$options);



$final_filename2 ="uploads/$final_filename";


$parts = explode("_",$country); 
$c_code = $parts[0];
$c_name = $parts[1];


if (move_uploaded_file($ftmp, $upload_path . $final_filename)) {
//if (move_uploaded_file($ftmp, $upload_path . $filecontent_name.'.'.$ext)) {



include('data6rst.php');


$statement = $db->prepare('INSERT INTO users
(email,fullname,password,created_time,timing,status,photo,userid,verified,code,data,user_banned,points,t_like,country_code,country_name,token1,token2)
                          values
(:email,:fullname,:password,:created_time,:timing,:status,:photo,:userid,:verified,:code,:data,:user_banned,:points,:t_like,:country_code,:country_name,:token1,:token2)');

$statement->execute(array( 
':email' => $email,
':fullname' => $fullname,
':password' => $hashpass,		
':created_time' => $created_time,
':timing' => $timer,
':status' =>$status,
':photo' =>$final_filename2,
':userid' =>$userid,
':verified' =>'no',
':code' => $mt_id2,
':data' => 'no',
':user_banned' =>'no',
':points' =>'0',
':t_like' =>'0',
':country_code' => $c_code,
':country_name' => $c_name,
':token1' => $token1,
':token2' => $token2
));


$stmtx = $db->query("SELECT LAST_INSERT_ID()");
$lastInserted_Id = $stmtx->fetchColumn();

if($statement){
echo  "<script>alert('Account Successfully Created. You can Login Now');</script>";
echo "<div style='background:green;padding:8px;color:white;border:none;'>Account Successfully Created. You can Login Now...</div>";
echo "<script>
$('#myModal_signup_users').modal('hide');
$('#myModal_login_users').modal('show');
</script>
";

}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Account Creation Failed...</div>";
}


}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>File Upload Failed Failed...</div>";
}



}


?>



