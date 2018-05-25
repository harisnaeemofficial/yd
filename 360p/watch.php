<?php

$video_id = $_GET['v'];
$url = "https://www.youtube.com/watch?v=".$video_id;
$type = "360p";

header("location: http://haris.com/direct.php?video={$url}&type={$type}");