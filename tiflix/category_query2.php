
<?php

//foreach($json["messages"] as $row){
include('data6rst.php');


$result = $db->prepare('SELECT * FROM category order by id desc');

		$result->execute(array(
		
    ));
$nosofrows = $result->rowCount();


if($nosofrows  == 0){

echo "<div style='background:red;color:white;padding:10px;border:none'>No Posts/Video Category Added by Admin Yet. If you are an Admin. Please Add Video/Posts
 Categories from Admin Settings in the App</div>";
}




echo '

 <div class="form-group">
              <label>Posts/Video Category: </label>
             <select name="video_category2" id="video_category2" class="col-sm-12 form-control">
    <option value="">Select Category</option>';

while($v1 = $result->fetch()){
$id = $v1['id'];
$category = $v1['category'];


?>
    <option value="<?php echo $category; ?>" ><?php echo $category; ?> </option>
   <?php
    }
    ?>
</select></div>
