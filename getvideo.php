<?php

require "initialization/init.php";

$url = $_GET['url'];

// Validating Link

$check = $abstractor->checkValidYouTubeLink($url);
if($check === false ){

	$_SESSION['message'] = "Not a Valid YouTube Link";
	header("location: index.php");
}

//Processing Video to fetch data

$video_info = $processor->getJSON($url);

$refined_video_info = $abstractor->refineVideoJSON($video_info);

$formatsAllowed = $config->get('formatsToShow.video');
$formats = [];
foreach($formatsAllowed as $format_id){
	
	if (isset($refined_video_info['files'][$format_id])){
		$formats[] = $refined_video_info['files'][$format_id];
	}
}

echo $twig->render("video/getvideo.twig" , ['video' => $refined_video_info, 'formats' => $formats]);



