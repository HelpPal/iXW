<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 
	
	include "mysql_connect.php";
	$id = $_REQUEST['id'] ;
	mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT * FROM tb_business where id='".$id."' order by id limit 1";
	
	$result = mysql_query($sql,$conn);
	$data = array();
	 
	$row = mysql_fetch_array($result);
	
	$row_data = array(
		'name' => $row['name']);
	array_push($data, $row_data);
	 
	echo json_encode($data);
?>