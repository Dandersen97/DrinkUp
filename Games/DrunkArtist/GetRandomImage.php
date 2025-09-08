<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


$dir = "images";
$AllImages=array();

// Open a directory, and read its contents
if (is_dir($dir)){
	if ($dh = opendir($dir)){
		while (($file = readdir($dh)) !== false){
			if ($file != "." && $file != "..") {
				array_push($AllImages, $file);
			}
    }
    closedir($dh);
  }
}

$randNum = (rand(0,count($AllImages) - 1));

//echo $AllImages[$randNum];

echo file_get_contents("images/" . $AllImages[$randNum]);
?>