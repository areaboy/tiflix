<?php

// increase script running time to avoid timeout
ini_set('max_execution_time', 600); //600 seconds = 10 minutes
// temporarly extend time limit
set_time_limit(600);


//error_reporting(0);
session_start();
include ('authenticate.php');

$user_rank = strip_tags($_SESSION['user_rank1']);

if($user_rank != 'Admin'){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Only Admin Can Delete Video..</div>";
exit();
}


$pid=strip_tags($_POST['id']);
$video_url=strip_tags($_POST['video_url']);

// get folder and filename
$parts = explode('/', $video_url);
//$result = $parts[1];

$video_foldername =  $parts[0];
$video_filename = $parts[1]; 

// fetch video from its folder
$video_url_path =  $video_url;



//https://ffmpeg.org/


$ffmpegpath = "ffmpeg.exe";

// check if file ffmpeg.exe exist

if(file_exists($ffmpegpath )){
//echo "File found";
}else{

echo "<div style='background:red;color:white;padding:6px;border:none'>File <b>$ffmpegpath</b> does not exist in the project folder</div>";
exit();

}


$input = $video_url_path;
$output = "$video_foldername/file_new.mp4";

if (video_compressing($input, $output)){
// if video compression is sucessful. remove or unlink the old video and Rename the newly compressed file back to videos original filename

unlink($video_url_path);

rename("$video_foldername/file_new.mp4",$video_url_path);

echo "<div style='background:green;color:white;padding:6px;border:none'>Videocall Compression Successfully. Redirecting in 2 sec...</div>";
echo "<div><img src='loader.gif'><br></div>";


echo "<script>
window.setTimeout(function() {
    window.reload();
}, 2000);
</script><br><br>";




}else{
echo "<div style='background:red;color:white;padding:6px;border:none'>Videocall Compression failed. Please ensure there is internet connections</div>";
}

function video_compressing($input, $output) {
global $ffmpegpath;

if(!file_exists($input)) return false;

//$command = "ffmpeg -i videobushfire.mp4 -vcodec libx264 -crf 28  videobushfire_new.mp4";

$command = "ffmpeg -i $input -vcodec libx264 -crf 28 $output";
system($command);

@exec( $command, $ret );
if(!file_exists($output)) return false;
if(filesize($output)==0) return false;
return true;
}









?>


