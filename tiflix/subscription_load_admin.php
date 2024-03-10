<?php
//error_reporting(0);
session_start();


$uid = strip_tags($_SESSION['uid1']);
$userid_sess = $uid;
$country_code = strip_tags($_SESSION['country_code1']);

$user_rank = strip_tags($_SESSION['user_rank1']);

if($user_rank !='Admin'){
echo "<div style='background:red;color:white;padding:8px;border:none'>Only Admin Can Access this Page</div>";
exit();
}

include('settings.php');
include('data6rst.php');

// get total count
$pstmt = $db->prepare('SELECT * FROM subscription');
$pstmt->execute(array());
$total_count = $pstmt->rowCount();

// ensure that they cotain only alpha numericals
if(strip_tags(isset($_POST["get_content"]))){
$get_content = strip_tags($_POST["get_content"]);
if($get_content == 'get_data'){

$sql_query = '';
$error = '';
$message='';
$response_bl = array();



$sql_query .= "SELECT * FROM subscription ";
if(strip_tags(isset($_POST["search"]["value"]))){

$search_value1= strip_tags($_POST["search"]["value"]);
$search_value=  htmlentities(htmlentities($search_value1, ENT_QUOTES, "UTF-8"));

$sql_query .= 'WHERE (status =:status) AND  (invoice_id LIKE "%'.$search_value.'%"  OR invoice_amount LIKE "%'.$search_value.'%" OR invoice_url LIKE "%'.$search_value.'%" OR invoice_status LIKE "%'. $search_value.'%")';

  }



//ensure that order post is set
$start = $_POST['start'];
$length = $_POST['length'];
$draw= $_POST["draw"];
if(strip_tags(isset($_POST["order"]))){
$order_column = strip_tags($_POST['order']['0']['column']);
$order_dir = strip_tags($_POST['order']['0']['dir']);

$sql_query .= 'ORDER BY '.$order_column.' '.$order_dir.' ';
}
else{
$sql_query .= 'ORDER BY id DESC ';
}
if($length != -1){
$sql_query .= 'LIMIT ' . $start . ', ' . $length;
}

$pstmt = $db->prepare($sql_query);
$pstmt->execute(array(':status' =>'Paid'));
$rows_count = $pstmt->rowCount();

while($row = $pstmt->fetch()){
$rows1 = array();
$id = $row['id'];
$fullname = $row['fullname'];
$userid = $row['userid'];
$photo = $row['photo'];
$sub_type = $row['sub_type'];
$sub_plan = $row['sub_plan'];
$hour_convert = $row['hour_convert'];
$day_convert = $row['day_convert'];
$start_timestamp = $row['start_timestamp'];
$end_timestamp = $row['end_timestamp'];
$sender_address = $row['sender_address'];
$invoice_id = $row['invoice_id'];
$invoice_amount = $row['invoice_amount'];
$invoice_url = $row['invoice_url'];
$invoice_status = $row['invoice_status'];
$status = $row['status'];
$timing = $row['timing'];
$sub_status = $row['sub_status'];
$sub_value = $row['sub_value'];
$watch_video_count = $row['watch_video_count'];

$stat = $status;

if($stat=='Pending'){
$stat1 ="<span style='background:#800000;color:white;padding:6px;border:none'>$status</span>";
}


if($stat=='Paid'){
$stat1 ="<span style='background:green;color:white;padding:6px;border:none'>$status</span>";
}



if($stat=='Expired'){
$stat1 ="<span style='background:red;color:white;padding:6px;border:none'>$status</span>";
}




if($sub_status=='Active'){
$sub_stat ="<span style='color:green'><b>$sub_status</b></span>";

$invoice_status1 ="<span style='color:green'><b>Invoice Paid</b></span>";
$linking ="<a target='_blank' style='background:green;padding:4px;color:white;border:none' href='$invoice_url' title='Download Paid Invoice' >Download <br>Paid Invoice</a>";
$confirm_pay ="";

}



if($sub_status=='Expired'){
$sub_stat ="<span style='color:#800000'><b>$sub_status</b></span>";

$linking='';
$confirm_pay='';

}



if($sub_status=='Pending Invoice Payments'){
$sub_stat ="<span style='color:#800000'><b>$sub_status</b></span>";

$invoice_status1 ="<span style='color:red'><b>Invoice Unpaid</b></span>";
$linking ="1.) <a target='_blank' style='background:blue;padding:4px;color:white;border:none' href='$invoice_url' title='Pay Invoice' >Pay Invoice</a>";

$confirm_pay ="2.) 
<span style='' id='loader-ivy_$id'></span>
<span style='' id='result-ivy_$id'></span>
<button style='background:purple;padding:4px;color:white;border:none' data-sid='$id' data-inv_invoiceid='$invoice_id' class='confirm_btn' title='Confirm Payments' >Confirm Payments</button>
";

}




/*

if($invoice_status=='PAID'){
$invoice_status1 ="<span style='color:green'><b>Invoice Paid</b></span>";
$linking ="<a target='_blank' style='background:green;padding:4px;color:white;border:none' href='$invoice_url' title='Download Paid Invoice' >Download <br>Paid Invoice</a>";
$confirm_pay ="";
}


if($invoice_status=='UNPAID'){
$invoice_status1 ="<span style='color:red'><b>Invoice Unpaid</b></span>";
$linking ="1.) <a target='_blank' style='background:blue;padding:4px;color:white;border:none' href='$invoice_url' title='Pay Invoice' >Pay Invoice</a>";

$confirm_pay ="2.) 
<span style='' id='loader-ivy_$id'></span>
<span style='' id='result-ivy_$id'></span>
<button style='background:purple;padding:4px;color:white;border:none' data-sid='$id' data-inv_invoiceid='$invoice_id' class='confirm_btn' title='Confirm Payments' >Confirm Payments</button>
";
}
*/

$user_info= "<div>

<button type='button' 'View Payments Info' class='btn btn-info btn-xs btn_call' data-toggle='modal' data-target='#myModal_info'
data-id='$id'
data-fullname='$fullname'
data-userid='$userid'
data-sub_type='$sub_type'
data-sub_plan='$sub_plan'
data-hour_convert='$hour_convert'
data-day_convert='$day_convert'
data-sender_address='$sender_address'
data-invoice_id='$invoice_id'
data-invoice_amount='$invoice_amount'
data-invoice_url='$invoice_url'
data-invoice_status='$invoice_status'
data-status='$status'
data-sub_status='$sub_status'
data-sub_value='$sub_value'
data-timing1='$timing'
> View Payment<br> Info</button>

</div>";






$image= "
<img class='' style='border-style: solid; border-width:3px; border-color:#ec5574; width:40px;height:40px; max-width:40px;max-height:40px;border-radius: 50%;' 
src='$photo'>

";  
$rows1[] = $image;            
$rows1[] = $fullname;
$rows1[] = $invoice_id;
$rows1[] = $invoice_amount.'(USD)';
$rows1[] = $sub_type;
$rows1[] = $sub_stat."<br> $linking"."<br><br>$confirm_pay";


$rows1[]  =$stat1;

$rows1[] = $user_info;
$rows1[] = '<span data-livestamp="'.$timing.'"></span>';


$response_bl[] = $rows1;
}

$data = array(
"draw"    => $draw,
"recordsTotal"  => $rows_count,
"recordsFiltered" => $total_count,
"data"    => $response_bl);
}// you can close this



 //}
 
 


 echo json_encode($data);
}



?>