<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	}

	include "mysql_connect.php";
	mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT * FROM tb_category order by id";

	$result = mysql_query($sql,$conn);
	$data = array();
	 
	while($row = mysql_fetch_array($result)){
		$row_data = array(
		'id' => $row['id'], 
		'name' => $row['name'],
		'latitude' => $row['latitude'],
		'longitude' => $row['longitude'],
		'icon' => $row['icon'],
		'allow' => $row['allow'] );
		array_push($data, $row_data);
	}
	 
	echo json_encode($data);
?>