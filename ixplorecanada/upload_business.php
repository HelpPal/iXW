<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	$destination_path = getcwd().DIRECTORY_SEPARATOR."images/business_icon/";
	
	$files = glob($destination_path."*"); // get all file names
	foreach($files as $file){ // iterate files
		if(is_file($file))
			unlink($file); // delete file
	}
	
	$result = 0;

	$target_path = $destination_path . basename( $_FILES['myfile']['name']);

	if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
		$result = 1;
	}

	
	
    sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>   
