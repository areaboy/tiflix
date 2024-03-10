

<script>
$(document).on('click', function(e) {
    var div_content = $(".containerxxx");
    if (!$(e.target).closest(div_content).length) {
        div_content.hide();
    }
});


/*
or via javascript

document.addEventListener('mouseup', function(e) {
    var div_content = document.getElementById('containerxxx');
    if (!div_content.contains(e.target)) {
        div_content.style.display = 'none';
    }
});
*/
</script>





<?php
error_reporting(0);
include('data6rst.php');
include('settings.php');
if($_POST)
{

$search1 =strip_tags($_POST['search_data']);
$search =htmlentities(htmlentities($search1, ENT_QUOTES, "UTF-8"));

$ss=strip_tags($_POST['ss']);
$percent = substr_count($search,"%");

if($percent >0){
echo "<div id='alerts_search' class='alerts alert-danger'>Please Remove Percent Symbol</div>";
exit();
}



//echo "<br><br><div class='search_hide_btn1 btn btn-sm btn-warning'>close Search</div>";


echo "<br><br>";
$result = $db->prepare("SELECT * FROM posts where title like :title OR content like :content OR video_category like :video_category");
$result->execute(array(
':title' => '%'.$search.'%',
':content' => '%'.$search.'%',
':video_category' => '%'.$search.'%'
));


$count = $result->rowCount();



/*
if (strlen($search)< 2) {
    //echo "less than 2";
echo "<div class='searching_res_p search_hide'>Enter Data to Search More<br>

<span class='search_hide_btn1 btn btn-sm btn-warning pull-right'>close</span>
</div>";
}
*/

if ($count > 0)
{

 // while starts here
while ($row = $result->fetch()) 
    {
$userid = htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
$title = htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
$content = htmlentities(htmlentities($row['content'], ENT_QUOTES, "UTF-8"));
$video_category = htmlentities(htmlentities($row['video_category'], ENT_QUOTES, "UTF-8"));
$title_seo = htmlentities(htmlentities($row['title_seo'], ENT_QUOTES, "UTF-8"));
$postid = htmlentities(htmlentities($row['id'], ENT_QUOTES, "UTF-8"));
$video= htmlentities(htmlentities($row['video'], ENT_QUOTES, "UTF-8"));

        echo "
<div class='searching_res_p containerxxx' style='cursor:pointer;'>

<span style='font-size:16px; color:white'><b>Video Title: $title</b></span><br>
<span style='font-size:14px; color:white'>Category: $video_category</span><br>
<span style='display:none' class='search_hide_btn1 btn btn-sm btn-warning pull-right'>close</span>




<span id='loader-videostreaming_session2_$postid'></span>
<span id='result_videostreaming_session2_$postid'></span>


<button style='' class='videostreaming_session_btn2 readmore_btn btn btn-warning' data-title_seo='$title_seo' data-video_url='$video' id='$postid' title='Stream Video Live, Like, Discuss & Comments'>
Stream Video Live, Like, Discuss & Comments</button>


</div>";


    }       

// while ends here


}else{


echo "<div  id='alerts_search' class='alerts alert-danger searching_res_p1 search_hide'>Searched Content not Found
<span style='display:none' class='search_hide_btn1 btn btn-sm btn-warning pull-right'>close</span>
</div>";

}





}
?>














