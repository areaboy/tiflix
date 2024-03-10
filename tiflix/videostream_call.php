<?php 
error_reporting(0);
include "Videostream_class.php";
include('settings.php');

session_start();
$video_url_live = $_SESSION['video_url_sess'];

//$video_url_live = $_GET['video_url'];

$video_url_stream =  $video_url_live;
$filePath = $video_url_stream; 

 
$stream = new VideoStream($filePath);
$stream->start();

