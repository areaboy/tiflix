<?php

error_reporting(0);
$square_accesstoken = $_POST['square_accesstoken'];
$square_location_id = $_POST['square_location_id'];
$enviroment =  $_POST['square_enviroment'];
$timer = time();



session_start();
//include ('authenticate.php');

$user_rank = strip_tags($_SESSION['user_rank1']);

if($user_rank !='Admin'){
echo "<div style='background:red;color:white;padding:8px;border:none'>Only Admin Can Access this Page</div>";
exit();
}





if ($square_accesstoken == ''){

$response = ['status' => 0, 'message' => "Square Access Token is Empty"];
echo json_encode($response);

exit();
}


if ($square_location_id == ''){

$response = ['status' => 0, 'message' => "Square Business Location Id is Empty"];
echo json_encode($response);
exit();
}

if ($enviroment == ''){

$response = ['status' => 0, 'message' => "Square Payment Enviroment is Empty"];
echo json_encode($response);
exit();
}

include('data6rst.php');




$result_verified = $db->prepare('select * from settings where data_type=:data_type');
$result_verified->execute(array(':data_type' =>'Square_Payments'));

$rows= $result_verified->fetch();
$norows= $result_verified->rowCount();

if($norows ==1){


//update

$update= $db->prepare('UPDATE settings SET square_accesstoken =:square_accesstoken,square_business_location_id = :square_business_location_id,square_enviroment = :square_enviroment where data_type=:data_type');
$update->execute(array(
':square_accesstoken' => $square_accesstoken,
':square_business_location_id' => $square_location_id,
':square_enviroment' => $enviroment,
 ':data_type' =>'Square_Payments'
));




$response = ['status' => 1, 'message' => "Square Payments Data Successfully Added"];
echo json_encode($response);

exit();
} 





$statement = $db->prepare('INSERT INTO settings
(square_accesstoken,square_business_location_id,data_type,square_enviroment)

                          values
(:square_accesstoken,:square_business_location_id,:data_type,:square_enviroment)');

$statement->execute(array( 
':square_accesstoken' => $square_accesstoken,
':square_business_location_id' => $square_location_id,		
':data_type' => 'Square_Payments',
':square_enviroment' => $enviroment
));




$stmtx = $db->query("SELECT LAST_INSERT_ID()");
$lastInserted_Id = $stmtx->fetchColumn();



if($statement){


$response = ['status' => 1, 'message' => "Square Payments Data Successfully Added"];
echo json_encode($response);

}

              else {

$response = ['status' => 0, 'message' => "Square Payments Data Updates Failed. Try Again"];
echo json_encode($response);
                }

?>

<?php ob_end_flush(); ?>
