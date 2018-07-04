<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 
	
	include "mysql_connect.php";

	$sql = "SELECT * FROM tb_category";
	$result = mysql_query($sql,$conn);
	$data = array();
	 
	while($row = mysql_fetch_array($result)){
		$row_data = array(
		'id' => $row['id'], 
		'name' => $row['name']);
		array_push($data, $row_data);
	}
	 
	echo json_encode($data);
?>