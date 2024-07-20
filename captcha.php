<?php
//require_once("config/globalAdmData.php");
session_start();
$ranStr = md5(microtime());
$ranStr = substr($ranStr, 0, 6);
$_SESSION['chd']['user']['cap_code'] = $ranStr;
$newImage = imagecreatefromjpeg("assets/images/cap_bg.jpg");
$txtColor = imagecolorallocate($newImage, 0, 0, 0);
$font = './arial.ttf';
imagettftext($newImage,20,0,7,28,$txtColor,$font,$ranStr);
//imagestring($newImage, 50,50, 5, $ranStr, $txtColor);
imagestring($im, $size, 0, 2, 2, ImageColorAllocate($im, 23, 85, 160), $fontfile, $rand[0]." ".$rand[1]." ".$rand[2]." ");
header("Content-type: image/jpeg");
imagejpeg($newImage);

?> 