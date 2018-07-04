<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	}

	include "mysql_connect.php";
	
	$id = $_REQUEST['id'] ;
	$kind = $_REQUEST['kind'] ;
	mysql_query('SET CHARACTER SET utf8');
	if ( $kind == 0 )
		$sql = "SELECT * FROM tb_position where client_id='" . $id . "' order by id";
	else
		$sql = "SELECT * FROM tb_position where client_id='" . $id . "' and kind='".$kind."'  order by id";


	$result = mysql_query($sql,$conn);
	$data = array();
	 
	while($row = mysql_fetch_array($result)){
		$row_data = array(
		'id' => $row['id'], 
		'name' => $row['name'],
		'latitude' => $row['latitude'],
		'longitude' => $row['longitude'],
		'call' => $row['call_num'],
		'des' => $row['description'],
		'allow' => $row['allow'] );
		array_push($data, $row_data);
	}
	 
	echo json_encode($data);
?>