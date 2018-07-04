<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	}

	include "mysql_connect.php";
	
	$status = $_POST['st'] ;
	$id = $_POST['id'] ;

	$sql = "Update tb_business set allow = '" . $status . "' where id='" . $id . "'" ;
	if ( mysql_query($sql,$conn) )
		echo "The Client info successfully replaced." ;
	else
		echo "Failed." ;
?>