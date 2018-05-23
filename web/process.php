<?php 

if(isset($_FILES, $_FILES['files'])){
	$path = "./files/";
	$files = $_FILES['files'];
	$num = count($files['name']);
	$response = true;

	for($i=0;$i<$num;$i++){
		if($files['errors'][$i] == 0){
			$filename = md5(uniqid());
			$filename = $filename . '.'. pathinfo($files['name'][$i], PATHINFO_EXTENSION);
			$moveTo = $path . $filename;
			$result = move_uploaded_file($files['tmp_name'][$i], $moveTo);
			if(!$result) $response = false;
		}
	}

	echo ($response) ? 'Success' : 'Failed';

	die('<meta http-equiv="refresh" content="2;index.php">');
}


