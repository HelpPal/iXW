<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	include "mysql_connect.php";
	$id = $_POST['id'] ;

	$sql = "delete FROM tb_user where id='".$id."'" ;

	if ( mysql_query($sql,$conn) )
		echo "User data deleted." ;
	else
		echo "Faild. ".mysql_error() ;
?>