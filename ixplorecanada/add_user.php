<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	include "mysql_connect.php";

	$name          = $_POST['name'] ;
	$pass          = $_POST['pass'] ;
	$fname          = $_POST['fname'] ;
	$lname          = $_POST['lname'] ;
	

	$query = "INSERT INTO tb_user(username, password, first_name, last_name) values ('".$name."','".$pass."','".$fname."','".$lname."')";

	if ( mysql_query($query,$conn) )
		echo $name."'s data added to database successfully." ;
	else
		echo "Faild. ".mysql_error() ;
?>


