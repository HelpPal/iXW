<?php
	include "mysql_connect.php";
	$name = $_GET['name'] ;
	$sql = "select call_num, name, description,latitude,longitude from tb_position where name='".$name."' limit 1";
	
	$result = mysql_query($sql,$conn);
	$data = array();
	 
	$row = mysql_fetch_array($result);
	if ($row)
	{
		if ( strlen($row['call_num']) == 0 )
			$row['call_num'] = 'Not Available now' ;
		if ( strlen($row['name']) == 0 )
			$row['name'] = 'Not Available now' ;
		if ( strlen($row['description']) == 0 )
			$row['description'] = 'Not Available now' ;
		if ( strlen($row['call_num']) == 0 )
			$row['latitude'] = 'Not Available now' ;
		if ( strlen($row['latitude']) == 0 )
			$row['call_num'] = 'Not Available now' ;
		if ( strlen($row['longitude']) == 0 )
			$row['longitude'] = 'Not Available now' ;
			
		$row_data = array(
			"call_num" => $row['call_num'],
			"name" => $row['name'],
         		"description" => $row['description'],
         		"latitude" => $row['latitude'],
         		"longitude" => $row['longitude']
		);	
		array_push($data, $row_data);	
	}
	
	echo json_encode($data);
?>