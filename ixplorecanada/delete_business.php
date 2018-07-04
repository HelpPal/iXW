<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	include "mysql_connect.php";
	$id = $_POST['id'] ;

	$sql = "delete FROM tb_business where id='".$id."'" ;

	if ( mysql_query($sql,$conn) )
		echo "Business data deleted." ;
	else
		echo "Faild. ".mysql_error() ;
		
	$sql = "delete FROM tb_position where client_id='".$id."'" ;
	if ( mysql_query($sql,$conn) )
		echo "Business data deleted." ;
	else
		echo "Faild. ".mysql_error() ;
?>