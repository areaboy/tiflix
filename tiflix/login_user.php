<?php
error_reporting(0);
$email = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);
if ($email == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Email is Empty.</div>";
exit();
}
if ($password == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Password is Empty..</div>";
exit();
}



include('data6rst.php');



// check if user has verified his email
/*
$result_verified = $db->prepare('select email, data from users where email=:email');
$result_verified->execute(array(':email' =>$email));
while ($rowv = $result_verified->fetch()) {
$user_verified=htmlentities($rowv['data'], ENT_QUOTES, "UTF-8");

if($user_verified == 'no'){
echo "<div class='alert alert-danger' id='alerts_login'><font color=red>Error: Please Signup first or Verify link sent to your email inbox or spam box</font></div>";
exit();
}
}
*/

// check if user has been banned
$result_banned = $db->prepare('select * from users where email=:email');
$result_banned->execute(array(':email' =>$email));
while ($rowb = $result_banned->fetch()) {

$user_banned=htmlentities($rowb['user_banned'], ENT_QUOTES, "UTF-8");
if($user_banned == 'yes'){
echo "<div class='alert alert-danger' id='alerts_login'><font color=red>You have been banned from accessing this site. Contact Site Admin</font></div>";
exit();
}
}


$result = $db->prepare('SELECT * FROM users where email = :email');

		$result->execute(array(
			':email' => $email

    ));

$count = $result->rowCount();

$row = $result->fetch();

if( $count == 1 ) {



$password = strip_tags($_POST['password']);

//start hashed passwordless Security verify
if(password_verify($password,$row["password"])){
            //echo "Password verified and ok";



$userid = $row['id'];
$fullname = $row['fullname'];



// initialize session if things where ok

session_start();
session_regenerate_id();
$timer = time();

// initialize session

$_SESSION['user_session1'] = $timer;
$_SESSION['uid1'] = $row['userid'];
$_SESSION['fullname1'] = $row['fullname'];
$_SESSION['username1'] = $row['id'];
$_SESSION['email1'] = $row['email'];
$_SESSION['photo1'] = $row['photo'];
$_SESSION['user_rank1'] = $row['status'];
$_SESSION['user_banned1'] = $row['user_banned'];

$_SESSION['usern1'] = $row['status'];
$_SESSION['points1'] = $row['points'];
$_SESSION['created_time1'] = $row['created_time'];
$_SESSION['country_code1'] = $row['country_code'];
$_SESSION['country_name1'] = $row['country_name'];



$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");
$mt = microtime(true);
$mdx = md5($mt);
$mdx2 = md5($ipaddress);
$mdx3 = $mdx.$mdx2;
$uidx = uniqid();
$userid = $uidx.$timer.$mdx;

$uniq = sha1($uidx);

$token1 = $userid.$mdx3;
$token2 = $mt_id2.$uniq;

$_SESSION['token1'] = $row['token1'];
$_SESSION['token2'] = $row['token2'];

// update database with Token
$update= $db->prepare('UPDATE users set token1 =:token1, token2 =:token2 where email=:email');
$update->execute(array(':token1' => $token1, ':token2' => $token2, ':email' =>$email));





echo "<div style='background:green;padding:8px;color:white;border:none;'>Login sucessful <img src='ajax-loader.gif'></div>";
echo "<script>window.location='dashboard.php'</script>";




}
else{

echo "<div style='background:red;padding:8px;color:white;border:none;'>Password does not match..</div>";

}



}
else {

echo "<div style='background:red;padding:8px;color:white;border:none;'>User with this Email/Username does not Exist</div>";
}








?>

<?php ob_end_flush(); ?>
