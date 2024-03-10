<?php
error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$video_url = strip_tags($_POST['video_url']);
$post_title_seo = strip_tags($_POST['title_seo']);
$video_postid = strip_tags($_POST['video_postid']);

// Pass Video URL to session so that we can pass it to Videostream_call.php file for direct streaming via videostream_class.php file ...

session_start();
$_SESSION['video_url_sess'] = $video_url;
$_SESSION['video_postid'] = $video_postid;

echo "<script>
//alert('$video_url');
alert('Video Streaming Session Successful Initialized.. We will Redirect you Now....');
window.location='videostreaming_watch.php?title=$post_title_seo';
</script>";



}else{
echo "<div style='background:red;color:white;padding:8px;border:none'>Direct Access to  Video Streaming URL Session not allowed....</div>";
exit();

}

?>



