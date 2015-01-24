<?php
	ini_set('memory_limit', '256M');
	ini_set('display_errors', 'On');
	set_time_limit(0);	
	header("Content-type: image/jpeg");
	putenv('GDFONTPATH=' . realpath('.'));
	$c=explode(",",$_GET["c"]);
	foreach($c as $country){
		$country=ucfirst($country);
			$im = @imagecreatefromjpeg("pla.jpg");
		if($im){
			$font = '/BOD_B.ttf';
			$filename="img/pla/".$country.".jpg";
			$bg_color = ImageColorAllocate ($im, 255, 255, 255);
			$txt_color = ImageColorAllocate ($im, 0, 147, 221);
//			$txt_color = ImageColorAllocate ($im, 36, 62, 146);
			$size=270;
			$x=900;
			$y=1525;
			imagettftext($im, $size*2, 0, $x*2, $y*2, $txt_color,  $font, $country);
			imagejpeg($im,$filename);
		}else{
			echo "Failed to open";
		}
	}
?>