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



$price = strip_tags($_POST['amount']);
$payment_type = strip_tags($_POST['type']);
$userid = $userid_sess;
$fullname = $fullname_sess;
$email = $email_sess;


$plan = $payment_type;

if($plan == 'day'){
$sub_type = 'Daily Plan';
$pl = 1;
}


if($plan == 'month'){
$sub_type = 'Monthly Plan';
$pl = 30;
}


if($plan == 'year'){
$sub_type = 'Yearly Plan';
$pl = 365;

}



$now = date("Y-m-d H:m:s");
$start_timestamp = $now;


//$end_day = date('d.m.Y H:i:s', strtotime('+1 days'));
//$end_day = date("Y-m-d H:i:s", strtotime("+{$pl} days"));
//$end_timestamp = $end_day;


$hour_convert = $pl * 24 + 8;
$day_convert = $pl;

$new_hour = date("Y-m-d H:i:s", strtotime("+{$hour_convert} hours"));
$end_timestamp = $new_hour;

$timer = time();



// Check if User Already has an Active Plan 

$resz= $db->prepare('select * from subscription where userid=:userid and sub_status=:sub_status');
$resz->execute(array(':userid' =>$userid_sess, ':sub_status' => 'Active'));
$countz= $resz->rowCount();
$roz= $resz->fetch();
if($countz ==1){
echo "<div style='background:#800000;padding:8px;color:white;border:none;'>You Already have an Active Plan, Wait until the Plan Expires...</div>";
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


echo "<div style='background:red;padding:8px;color:white;border:none;'>Square Payments API Data Settings is Empty.. Please Contact Site Admin.</div>";
exit();
}




if($square_accesstoken ==''){
echo "<div  style='background:red;color:white;padding:10px;border:none;'>Please Ask Admin to Set Square Access Token at <b>settings</b> Dashboard</div><br>";
exit();
}


$timer =time();
$title = 'Subscriptions Payments';
$currency ='USD';
//$due_date = date("Y-m-d");

$dtx = date('Y-m-d', strtotime('+1 days'));
$due_date = $dtx;


$values = explode(" ",$fullname);
$given_name = $values[0];
$family_name = $values[1];




//Create Square Customer

$data_param= '
{
    "given_name": "'.$given_name.'",
    "family_name": "'.$family_name.'",
    "email_address": "'.$email.'",
    "idempotency_key": "'.$timer.'"
  }';




$url ="https://$square_enviroment/v2/customers";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Square-Version: 2022-06-16', 'Content-Type: application/json', "Authorization: Bearer $square_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
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
$id = $json['customer']['id'];
$customer_id =$id;

if($id ==''){

echo "<script>alert('Customer Creation Failed');</script>";
echo "<div id='alertdata' style='background:red;color:white;padding:10px;border:none;'>Square Payments Customer Creation Failed</div>";
exit();

}





// create Square Order

$data_param= '{
    "order": {
      "location_id": "'.$square_business_location_id.'",
      "line_items": [
        {
          "name": "'.$title.'",
          "base_price_money": {
            "currency":  "'.$currency.'",
            "amount": '.$price.'
          },
          "quantity": "1"
        }
      ]
    },
    "idempotency_key": "'.$timer.'"
  }';



$url ="https://$square_enviroment/v2/orders";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Square-Version: 2022-06-16', 'Content-Type: application/json', "Authorization: Bearer $square_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
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
$order_id = $json['order']['id'];
$status = $json['order']['state'];
$version = $json['order']['version'];



if($order_id ==''){


echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Order Creation Failed. Error: $output  </div><br>";
exit();

}




if($order_id !=''){
echo "<div style='background:green;color:white;padding:10px;border:none'>Order Created Successful</div><br>";
}



// Create Invoice

$timer =time();


 //  "scheduled_at": "2023-06-03T04:02:03.861Z",

$data_param='{
    "invoice": {
      "accepted_payment_methods": {
        "card": true,
        "square_gift_card": true
      },
      "delivery_method": "EMAIL",
      "store_payment_method_enabled": true,
   
      "payment_requests": [
        {
          "request_type": "BALANCE",
          "due_date": "'.$due_date.'"
        }
      ],
      "description": "'.$title.'",
      "invoice_number": "'.$timer.'",
      "primary_recipient": {
        "customer_id": "'.$customer_id.'"
      },
      "location_id": "'.$location_id.'",
      "order_id": "'.$order_id.'"
    }
  }';




$url ="https://$square_enviroment/v2/invoices";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Square-Version: 2022-06-16', 'Content-Type: application/json', "Authorization: Bearer $square_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
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
//$invoice_status = $json['invoice']['status'];
$version = $json['invoice']['version'];
$location_id = $json['invoice']['location_id'];
$invoice_number = $json['invoice']['invoice_number'];
//$invoice_url = $json['invoice']['public_url'];
$description = $json['invoice']['description'];
$created_at = $json['invoice']['created_at'];
$order_id = $json['invoice']['order_id'];
$amount = $json['invoice']['payment_requests']['computed_amount_money']['amount'];
$currency = $json['invoice']['payment_requests']['computed_amount_money']['currency'];


if($invoice_id ==''){


echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Invoice Creation Failed. Error: $output  </div><br>";
exit();

}




if($invoice_id !=''){
echo "<div style='background:green;color:white;padding:10px;border:none'>Invoice Created Successful</div><br>";

}




// Publish Invoice


//$version= trim($_POST['version']);
//$invoice_id= trim($_POST['invoice_id']);

$data_param='{
    "version":  '.$version.',
    "idempotency_key":  "'.$timer.'"
  }';

$url ="https://$square_enviroment/v2/invoices/$invoice_id/publish";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Square-Version: 2022-06-16', 'Content-Type: application/json', "Authorization: Bearer $square_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 


$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch)) {
    //echo $error_msg = curl_error($ch);
}

curl_close($ch); 

$json = json_decode($output, true);
$invoice_id = $json['invoice']['id'];
//$status = $json['invoice']['status'];

$invoice_url = $json['invoice']['public_url'];
$invoice_status = $json['invoice']['status'];

if($invoice_id ==''){


echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Invoice Publishing Failed. Error: $output  </div><br>";
exit();

}


if($invoice_id !=''){
// Update Database here.


$statement = $db->prepare('INSERT INTO subscription

(userid,fullname,photo,sub_type,sub_plan,hour_convert,day_convert,start_timestamp,end_timestamp,sender_address,invoice_id,invoice_amount,invoice_url,invoice_status,status,timing,sub_status,sub_value,watch_video_count)
 
                          values
(:userid,:fullname,:photo,:sub_type,:sub_plan,:hour_convert,:day_convert,:start_timestamp,:end_timestamp,:sender_address,:invoice_id,:invoice_amount,:invoice_url,:invoice_status,:status,:timing,:sub_status,:sub_value,:watch_video_count)');


$statement->execute(array( 
':userid' => $userid_sess,
':fullname' => $fullname_sess,
':photo' => $photo_sess,
':sub_type' => $sub_type,
':sub_plan' => $plan,
':hour_convert' => $hour_convert,
':day_convert' => $day_convert,
':start_timestamp' => $start_timestamp,
':end_timestamp' => $end_timestamp,
':sender_address' => 'Square Invoice Payments',
':invoice_id' => $invoice_id,
':invoice_amount' => $price,
':invoice_url' => $invoice_url,
':invoice_status' => $invoice_status,
':status' => 'Pending',
':timing' => $timer,
':sub_status' => 'Pending Invoice Payments',
':sub_value' =>'0',
':watch_video_count' => '0',
));


//':sub_status' => 'Expired',


if($statement){
echo "<div style='background:green;color:white;padding:10px;border:none'>Invoice Successfully Published and sent to your Mail</div><br>";
echo  "<script>alert('Invoice Successfully Published and sent to your Mail'); location.reload();</script>";

}


}



}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Page Access not Allowed...</div>";

}


?>