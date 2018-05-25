<?php

require "initialization/init.php";

$type = $_GET['type'];
$video_link = $_GET['video'];

switch ($type){
	
	case'720p';
	$format = 22;
	break;
	case '360p';
	$format = 18;
	break;
	
default:
	$_SESSION['message']= "Not a Valid Type";
	header("location: index.php");
	die();
	break;
}


//Validation

$video_id = $abstractor->checkValidYouTubeLink($video_link);
if(!$video_id){
	
	$_SESSION['message']= " Not a Valid Youtube URL";
	header("location: index.php");
	die();
	
}


$url = $processor->getURL($video_link, $format);

$title = $processor->getTitle($video_link);

$url = $abstractor->URLTweaker($url);
if(!$url){
	
	$_SESSION['message'] = "Cannot Fetch the requested data";
	header("location : index.php");
	die();
}

echo $twig->render('direct/direct.twig' , ['url' => $url , 'title' => $title]);
die();


