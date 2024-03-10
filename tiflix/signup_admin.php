<?php
error_reporting(0);
include('data6rst.php');



// start users registrations.


if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$email = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);
$fullname = strip_tags($_POST['fullname']);
$status = strip_tags($_POST['status']);


//hash password before sending it to database...
$options = array("cost"=>4);
$hashpass = password_hash($password,PASSWORD_BCRYPT,$options);

//$hashpass = password_hash($password, PASSWORD_DEFAULT, array("cost" => 10));


if ($email == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Email is empty</div>";
exit();
}



//insert into database

$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");
$mt = microtime(true);
$mdx = md5($mt);
$uidx = uniqid();
$userid = $uidx.$timer.$mdx;
$mt_id=rand(0000,9999);
$mt_id1=rand(0000,8888);

$mt_id2  = $mt_id1.$mt_id;



// check if user with this username already exits
$result_verified = $db->prepare('select * from users where email=:email');
$result_verified->execute(array(':email' =>$email));

 $rows= $result_verified->fetch();
$norows= $result_verified->rowCount();

if($norows ==1){
echo "<div style='background:red;padding:8px;color:white;border:none;'>This Email Address already exist</div>";
exit();
}


$country = strip_tags($_POST['country']);
$parts = explode("_",$country); 
$c_code = $parts[0];
$c_name = $parts[1];

$statement = $db->prepare('INSERT INTO users

(email,fullname,password,created_time,timing,status,photo,userid,points,verified,code,t_like,country_code,country_name)
 
                          values
(:email,:fullname,:password,:created_time,:timing,:status,:photo,:userid,:points,:verified,:code,:t_like,:country_code,:country_name)');

$statement->execute(array( 

':email' => $email,
':fullname' => $fullname,
':password' => $hashpass,		
':created_time' => $created_time,
':timing' => $timer,
':status' =>$status,
':photo' =>'admin.png',
':userid' =>$userid,
':points' =>'0',
':verified' =>'no',
':code' => $mt_id2,
':t_like' =>'0',
':country_code' => $c_code,
':country_name' => $c_name

));



if($statement){
echo  "<script>alert('Account Successfully Created. You can Login Now');</script>";
echo "<div style='background:green;padding:8px;color:white;border:none;'>Account Successfully Created. You can Login Now...</div>";
echo "<script>
$('#myModal_signup').modal('hide');
$('#myModal_login').modal('show');
</script>
";

}

              else {
echo "<div style='background:red;padding:8px;color:white;border:none;'>Account Creation Failed. Ensure there is internet connections...</div>";
                }

}


?>



