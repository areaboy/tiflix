<?php
error_reporting(0);


session_start();
//include ('authenticate.php');

$user_rank = strip_tags($_SESSION['user_rank1']);

if($user_rank !='Admin'){
echo "<div style='background:red;color:white;padding:8px;border:none'>Only Admin Can Access this Page</div>";
exit();
}



 
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {


$category = strip_tags($_POST['category']);
$category_seo = str_replace(' ', '-', $category);


if ($category == ''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Posts/Video Categories is empty</div>";
exit();
}

include('data6rst.php');


$statement = $db->prepare('INSERT INTO category
(category)
                          values
(:category)');

$statement->execute(array( 
':category' => $category_seo
));



if($statement){


echo "<div style='background:green;padding:8px;color:white;border:none;'>Category Added Successfully</div>";

}else{


echo "<div style='background:red;padding:8px;color:white;border:none;'>Category Updates Failed. Ensure there is Internet Connection</div>";

}





 
}else{
echo "<div style='background:red;color:white;padding:8px;border:none;'>Direct Access Not Allowed</div>";


}






?>

<?php ob_end_flush(); ?>
