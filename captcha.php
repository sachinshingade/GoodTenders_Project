<?php
session_start();
$possible = '0123456789';
$text = '';
$i = 0;
while($i < 4) { 
$text.=substr($possible, mt_rand(0,strlen($possible)-1), 1);
	$i++;
}

$_SESSION["vercode"] = $text;
$height = 43;
$width = 130;
  
$image_p = imagecreate($width, $height);

$black = imagecolorallocate($image_p, 0, 0, 0);
$white = imagecolorallocate($image_p, 255, 255, 255);

imagestring($image_p, 10, 50, 10, $text, $white); 
imagejpeg($image_p, null, 80);

?>


