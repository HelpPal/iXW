<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	include "mysql_connect.php";

	$id = $_POST['id'] ;
	$name = $_POST['name'] ;
	$lat = $_POST['lat'] ;
	$long = $_POST['long'] ;
	$call = $_POST['call'] ;
	$des = $_POST['des'] ;
	$kind = $_POST['kind'] ;

	$sql = "update tb_position set name = '".$name."', latitude='".$lat."',longitude='".$long."', call_num='".$call."', description='".$des."', kind='".$kind."' where id='".$id."'" ;

	if ( mysql_query($sql,$conn) )
		echo "Position data updated." ;
	else
		echo "update ".$sql. " Faild. ".mysql_error() ;
?>