<?php
error_reporting(0);

?>



<script>
$(document).ready(function(){

$('.del_btn').click(function(){
// confirm start
 if(confirm("Are you sure you want to Delete This Category: ")){
var id = $(this).data('id');

$(".loader-del_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="loader.gif">&nbsp;&nbsp;Please Wait, Category is being deleted...</div>');
var datasend = {'id': id};
		$.ajax({
			
			type:'POST',
			url:'category_delete.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


	if(msg == 1){
alert('Category Successfully Deleted');
$(".loader-del_"+id).hide();
$(".result-del_"+id).html("<div style='color:white;background:green;padding:10px;'>Category Successfully Deleted</div>");
setTimeout(function(){ $(".result-del_"+id).html(''); }, 5000);
//location.reload();

$(".rec2_"+id).animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");

}


	if(msg == 0){

alert('category could not be deleted. Please ensure you are connected to Internet.');
$(".loader-del_"+id).hide();
$(".result-del_"+id).html("<div style='color:white;background:red;padding:10px;'>category could not be deleted. Please ensure you are connected to Internet.</div>");
setTimeout(function(){ $(".result-del_"+id).html(''); }, 5000);

}

}
			
});
}

// confirm ends

                });

            });




</script>

<?php
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {


 $category2 = strip_tags($_POST['category2']);


if ($category2 == ''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Posts/Video Category Fetching Issues</div>";
exit();
}

include('data6rst.php');


$result = $db->prepare('SELECT * FROM category order by id desc');

		$result->execute(array(
		
    ));
$nosofrows = $result->rowCount();

$rec_List1 = $nosofrows;


if($rec_List1  == 0){

echo "<div style='background:red;color:white;padding:10px;border:none'>No Posts/Video Category Added by Admin Yet. If you are an Admin. Please Add Video/Posts
 Categories from Admin Settings in the App</div>";
}


while($v1 = $result->fetch()){
$id = $v1['id'];
$category = $v1['category'];

echo "<div class='col-sm-12 notify_content_css rec2_$id' >


<div  style='color:black;padding:10px;background:#ddd' >

<b>Category:</b> $category&nbsp;&nbsp;&nbsp;
   <span class='loader-del_$id'></span>
   <span class='result-del_$id'></span>

<button class='pull-right col-sm-6 btn btn-danger del_btn' data-id='$id' title='Delete'>Delete</button>
<br>
</div>

</div>";


}

 
}else{
echo "<div style='background:red;color:white;padding:8px;border:none;'>Direct Access Not Allowed</div>";


}






?>

<?php ob_end_flush(); ?>
