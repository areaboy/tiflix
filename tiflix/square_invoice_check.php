<?php

error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

session_start();

ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

include ('authenticate.php');
include ('settings.php');


include('data6rst.php');

$userid_sess =  htmlentities(htmlentities($_SESSION['uid1'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8"));
$username_sess =   htmlentities(htmlentities($_SESSION['username1'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo1'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email1'], ENT_QUOTES, "UTF-8"));

$email = $email_sess;



$user_rank = strip_tags($_SESSION['user_rank1']);

$country_code = strip_tags($_SESSION['country_code1']);
$country_name = strip_tags($_SESSION['country_name1']);



$id = strip_tags($_POST['id']);
$invoiceid = strip_tags($_POST['invoiceid']);
$userid = $userid_sess;


$resz= $db->prepare('select * from subscription where userid=:userid and invoice_id=:invoice_id');
$resz->execute(array(':userid' =>$userid_sess, ':invoice_id' => $invoiceid));
$countz= $resz->rowCount();
$roz= $resz->fetch();
if($countz ==1){
//echo "<div style='background:green;padding:4px;color:white;border:none;'>Payment Info Found</div>";
}else{
echo "<div style='background:red;padding:4px;color:white;border:none;'>Payments Fraud Detected. Invoice Id not Matched</div>";
exit();
}







$res= $db->prepare("SELECT * FROM settings WHERE data_type =:data_type order by id desc");
$res->execute(array(':data_type' => 'Square_Payments'));
$row = $res->fetch();
$count = $res->rowCount();

if($count > 0){
$square_business_location_id = $row['square_business_location_id'];
$square_accesstoken = $row['square_accesstoken'];
$square_enviroment = $row['square_enviroment'];
$location_id = $square_business_location_id;

}else{

echo "<div style='background:red;padding:4px;color:white;border:none;'>Square Payments API Data Settings is Empty.. Please Contact Site Admin.</div>";
exit();
}




if($square_accesstoken ==''){
echo "<div  style='background:red;color:white;padding:4px;border:none;'>Please Ask Admin to Set Square Access Token at <b>settings</b> Dashboard</div><br>";
exit();
}


$timer =time();




$url ="https://$square_enviroment/v2/invoices/$invoiceid";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Square-Version: 2022-06-16', 'Content-Type: application/json', "Authorization: Bearer $square_accesstoken"));  
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 


$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch)) {
    //echo $error_msg = curl_error($ch);
}

curl_close($ch); 




if($output ==''){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Please Ensure there is Internet Connections and Try Again</div><br>";
exit();
}


$json = json_decode($output, true);
$invoice_id = $json['invoice']['id'];
$invoice_status = $json['invoice']['status'];
//$invoice_number = $json['invoice']['invoice_number'];

if($invoice_id ==''){


echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Invoice Creation Failed. Error: $output  </div><br>";
exit();

}




if($invoice_status =='PAID'){

// Update Database here.
$update= $db->prepare('UPDATE subscription SET invoice_status = :invoice_status, status = :status, sub_status = :sub_status WHERE userid = :userid AND invoice_id = :invoice_id');


$update->execute(array( 
':invoice_status' => $invoice_status,
':status' => 'Paid',
':sub_status' => 'Active',
':userid' => $userid_sess,
':invoice_id' => $invoiceid,
));

if($update){
echo "<div style='background:green;color:white;padding:4px;border:none'>Invoice Paid</div><br>";
echo  "<script>alert('Invoice Paid($invoice_status)'); location.reload();</script>";

}
}


if($invoice_status =='UNPAID'){

echo "<div style='background:red;color:white;padding:4px;border:none'>Invoice Not Paid Yet</div><br>";
echo  "<script>alert('Invoice Not Paid Yet($invoice_status)');</script>";

}




}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Page Access not Allowed...</div>";

}


?>