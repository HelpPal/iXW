<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	}
	
	include "mysql_connect.php";
	mysql_query('SET CHARACTER SET utf8');
	$allow = $_GET['allow'] ;
	if ( $allow == '1' )
		$sql = "SELECT * FROM tb_business where allow = '1' order by id";
	else if ( $allow == '0' )
		$sql = "SELECT * FROM tb_business where allow = '0' order by id" ;
	else
		$sql = "SELECT * FROM tb_business order by id" ;

	$result = mysql_query($sql,$conn);
	$data = array();
	 
	while($row = mysql_fetch_array($result)){
		$row_data = array(
		'id' => $row['id'], 
		'name' => $row['name'],
		'email' => $row['email'],
                'icon' => $row['icon'],
		'phone_num' => $row['phone_num'],
		'allow' => $row['allow'] );
		array_push($data, $row_data);
	}
	 
	echo json_encode($data);
?>