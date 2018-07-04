<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	include "mysql_connect.php";

	$id = $_POST['id'] ;
	$name = $_POST['name'] ;
	$pass = $_POST['pass'] ;
	$fname = $_POST['fname'] ;
	$lname = $_POST['lname'] ;

	$sql = "update tb_user set username = '".$name."', password='".$pass."',first_name='".$fname."',last_name='".$lname."' where id='".$id."'" ;

	if ( mysql_query($sql,$conn) )
		echo "Position data updated." ;
	else
		echo "update ".$sql. " Faild. ".mysql_error() ;
?>