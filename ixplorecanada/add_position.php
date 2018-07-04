<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	include "mysql_connect.php";

	$id				= $_POST['id'] ;
	$name          = $_POST['name'] ;
	$lat          = $_POST['lat'] ;
	$long          = $_POST['long'] ;
	$kind			= $_POST['kind'] ;
	$call			= $_POST['call'] ;
	$des			 = $_POST['description'] ;
	mysql_query('SET CHARACTER SET utf8');

	$query = "INSERT INTO tb_position(client_id, kind, name, latitude, longitude, call_num, description) values ('".$id."','".$kind."','".$name."','".$lat."','".$long."','".$call."','".$des."')";

	if ( mysql_query($query,$conn) )
		echo $name."'s position added to database successfully." ;
	else
		echo "Faild. ".mysql_error() ;
?>

