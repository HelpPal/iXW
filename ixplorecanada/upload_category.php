<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	$destination_path = getcwd().DIRECTORY_SEPARATOR."images/category_icons/";

	$result = 0;

	$target_path = $destination_path . basename( $_FILES['myfile']['name']);

	if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
		$result = 1;
	}

	include "mysql_connect.php";

	$name = $_POST['txtName'] ;
	$sql = "insert into tb_category(name, icon) values ('".$name."','".$_FILES['myfile']['name']."')";
	
	if ( mysql_query($sql,$conn) )
		echo $name." added to database successfully." ;
	else
		echo "Faild. ".mysql_error() ;
   
   sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>   
