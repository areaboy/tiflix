<?php



error_reporting(0);
$smtp_email_host = $_POST['smtp_email_host'];
$smtp_email_username = $_POST['smtp_email_username'];
$smtp_email_password=  $_POST['smtp_email_password'];
$smtp_email_port=  $_POST['smtp_email_port'];
$timer = time();



session_start();
$user_rank = strip_tags($_SESSION['user_rank1']);

if($user_rank !='Admin'){
echo "<div style='background:red;color:white;padding:8px;border:none'>Only Admin Can Access this Page</div>";
exit();
}






//// check for PHP Mailer installation Vendor Directory
$file_p = 'mail_server/vendor/autoload.php';
  
if (file_exists($file_p)) 
{
    //echo "The file $file_p exists";
}
else 
{
$response = ['status' => 0, 'message' => "PHP-Emailer Server has not been Installed. Please see Readme File for installation or Contact Site Admin"];
echo json_encode($response);


//echo "<script>alert('PHP-Emailer Server has not been Installed. Please see Readme File for installation or Contact Site Admin');</script>";
//echo "<div style='background:red;padding:8px;color:white;border:none;'>PHP-Emailer Server has not been Installed. Please see Readme File for installation or Contact Site Admin</div>";
exit();
}





if ($smtp_email_host == ''){

$response = ['status' => 0, 'message' => "SMTP Mail HOst is Empty"];
echo json_encode($response);

exit();
}


if ($smtp_email_username == ''){

$response = ['status' => 0, 'message' => "SMTP Mail Username is Empty"];
echo json_encode($response);
exit();
}

if ($smtp_email_password == ''){

$response = ['status' => 0, 'message' => "SMTP Mail Password is Empty"];
echo json_encode($response);
exit();
}

include('data6rst.php');




$result_verified = $db->prepare('select * from settings where data_type=:data_type');
$result_verified->execute(array(':data_type' =>'Mail'));

$rows= $result_verified->fetch();
$norows= $result_verified->rowCount();

if($norows ==1){


//update




$update= $db->prepare('UPDATE settings SET smtp_email_host =:smtp_email_host, smtp_email_username= :smtp_email_username, smtp_email_password = :smtp_email_password, smtp_email_port = :smtp_email_port where data_type=:data_type');
$update->execute(array(
':smtp_email_host' => $smtp_email_host,
':smtp_email_username' => $smtp_email_username,
':smtp_email_password' => $smtp_email_password,
':smtp_email_port' => $smtp_email_port,
 ':data_type' =>'Mail'
));




$response = ['status' => 1, 'message' => "Mail Server Configured Successfully."];
echo json_encode($response);

exit();
} 


$statement = $db->prepare('INSERT INTO settings
(smtp_email_host,smtp_email_username,data_type,smtp_email_password,smtp_email_port)

                          values
(:smtp_email_host,:smtp_email_username,:data_type,:smtp_email_password,:smtp_email_port)');

$statement->execute(array( 
':smtp_email_host' => $smtp_email_host,
':smtp_email_username' => $smtp_email_username,		
':data_type' => 'Mail',
':smtp_email_password' => $smtp_email_password,
':smtp_email_port' => $smtp_email_port
));




$stmtx = $db->query("SELECT LAST_INSERT_ID()");
$lastInserted_Id = $stmtx->fetchColumn();



if($statement){


$response = ['status' => 1, 'message' => "Mail Server Configured Successfully"];
echo json_encode($response);

}

              else {

$response = ['status' => 0, 'message' => "Mail Server Configurations Failed. Try Again"];
echo json_encode($response);
                }

?>

<?php ob_end_flush(); ?>
