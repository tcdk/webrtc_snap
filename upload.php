<?php
	// requires php5



	define('UPLOAD_DIR', 'images/');
	$img = $_POST['imgData'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	if (sizeof($data) < 5000000) {


    	$f = UPLOAD_DIR . uniqid() . '.png';  
    	$success = file_put_contents($f, $data);
    	$f2 = $f . '.txt';  
    	$success = file_put_contents($f2, $_SERVER['HTTP_USER_AGENT']) ;
		print $success ? $f : 'Unable to save the file.';
	}
?>