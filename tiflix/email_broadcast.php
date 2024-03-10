<?php
error_reporting(0);

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'mail_server/vendor/autoload.php';
//require_once('mail_server/vendor/autoload.php');

ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);


session_start();
$uid = strip_tags($_SESSION['uid1']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$photo = strip_tags($_SESSION['photo1']);
$email = strip_tags($_SESSION['email1']);
$user_rank = strip_tags($_SESSION['user_rank1']);


 if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

//// check for PHP Mailer installation Vendor Directory
$file_p = 'mail_server/vendor/autoload.php';
  
if (file_exists($file_p)) 
{
    //echo "The file $file_p exists";
}
else 
{

echo "<script>alert('PHP-Emailer Server has not been Installed. Please see Readme File for installation or Contact Site Admin');</script>";
echo "<div style='background:red;padding:8px;color:white;border:none;'>PHP-Emailer Server has not been Installed. Please see Readme File for installation or Contact Site Admin</div>";
exit();
}


include('data6rst.php');


$res= $db->prepare("SELECT * FROM settings WHERE data_type =:data_type order by id desc");
$res->execute(array(':data_type' => 'Mail'));
$row = $res->fetch();
$count = $res->rowCount();

if($count > 0){
$smtp_email_host = $row['smtp_email_host'];
$smtp_email_username = $row['smtp_email_username'];
$smtp_email_password = $row['smtp_email_password'];
$smtp_email_port = $row['smtp_email_port'];



}else{


echo "<div style='background:red;padding:8px;color:white;border:none;'>Mail Server Configuration Settings is Empty. Please Contact Site Admin..</div>";
exit();
}



$rese= $db->prepare("SELECT * FROM settings_site");
$rese->execute(array());
$rowe = $rese->fetch();
$counte = $rese->rowCount();


$logo = $rowe['logo'];
$site_name = $rowe['title'];




$title = strip_tags($_POST['tit']);
$description = $_POST['desc'];
$category = $_POST['cat'];


if ($title == ''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Title is empty</div>";
exit();
}

 


$mt_id=rand(0000,9999);

                                       


$mail = new PHPMailer(true);


$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);


    $mail->SMTPDebug = 0;    // 0 - Disable Debugging, 2 - Responses received from the server                                  
    $mail->isSMTP();                                           
    $mail->Host       = $smtp_email_host;                   
    $mail->SMTPAuth   = true;                            
    $mail->Username   = $smtp_email_username;                
    $mail->Password   = $smtp_email_password;                       
    $mail->SMTPSecure = 'tls';                             
    //$mail->Port       = 587; 
    $mail->Port       = $smtp_email_port; 
 
    $mail->setFrom($smtp_email_username, $site_name);          
    //$mail->addAddress($email, "Dear $site_name User");
    //$mail->addAddress('receiver2@gmail.com', 'Name');
      
    $mail->isHTML(true);                                 
    $mail->Subject = "$site_name - New Video/Posts Updates...";
    $mail->Body    = "Hi Subscriber, New Video/Posts has been Published titled: <b>$title .(Category: $category)</b> <br><br> ";
    $mail->AltBody = "Hi Subscriber, New Video/Posts has been Published titled: $title .(Category: $category)";




// send post broadcast notifications to all Subscribers

$result = $db->prepare('SELECT * FROM users where userid != :userid');
$result->execute(array(':userid' => $userid));
$nosofrows = $result->rowCount();
$rowx = $result->fetchAll();

//while($row = $result->fetch()){

foreach ($rowx as $row) {

$fullname = $row['fullname'];
$email = $row['email'];

/*
try {
        $mail->addAddress($email, $fullname);
    } catch (Exception $e) {
        echo "<div style='background:green;color:white;padding:8px;border:none;'>Invalid Email Address</div><br><br>";
        continue;
    }

if (!empty($row['photo'])) {
        //Assumes the image data is stored in the DB
        $mail->addStringAttachment($photo, 'YourPhoto.jpg');
    }
*/

 try {
$mail->addAddress($email, $fullname);
        $mail->send();

echo "<div style='background:green;color:white;padding:8px;border:none;'>Notification Successfully Sent to all Subscribers Email Address.</div><br><br>";

       
    } catch (Exception $e) {
       
$ex = $mail->ErrorInfo;
echo "<div style='background:red;color:white;padding:8px;border:none;'>Mail Sending Failed.. Error: ($ex) </div>";
 
        //Reset the connection to abort sending this message
        //The loop will continue trying to send to the rest of the list
        $mail->getSMTPInstance()->reset();
    }
    //Clear all addresses and attachments for the next iteration
    $mail->clearAddresses();
    //$mail->clearAttachments();


}// close while or for each





 

}else{
echo "<div style='background:red;color:white;padding:8px;border:none;'>Direct Access Not Allowed</div>";


}






?>

<?php ob_end_flush(); ?>
