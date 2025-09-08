<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


$dir = "packages";
$res="";
$loopCount = 0;

// Open a directory, and read its contents
if (is_dir($dir)){
	if ($dh = opendir($dir)){
		$res = "{\"Packages\":[";
		while (($file = readdir($dh)) !== false){
			if ($file != "." && $file != "..") {
				if ($loopCount > 0){
					$res = $res . ",";
				}
				$res = $res . "{\"name\":\"" . $file . "\"}";
				$loopCount += 1;
			}
    }
		$res = $res . "]}";
    closedir($dh);
  }
}

echo $res;
//$randNum = (rand(0,count($AllImages) - 1));

//echo $AllImages[$randNum];

//echo $AllImages;
?>