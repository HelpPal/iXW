<?php
	error_reporting(0);
	$xml = $_REQUEST['xml'];
	if($xml!='false'){
	    header('Content-type: text/xml');
	    header('Pragma: public');
	    header('Cache-control: private');
	    header('Expires: -1');
	}
	//////////My SQL Connection
	// Create connection
	
	include "mysql_connect.php";
	
	$kind = $_REQUEST['kind'] ;
	mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT latitude, longitude, tb_position.name as address, tb_position.kind, tb_business.name as name, tb_business.icon as icon, tb_position.call_num as call_num, tb_position.description as description FROM tb_position left join tb_business on tb_business.id=tb_position.client_id where tb_business.id > 0 and tb_position.kind='".$kind."' and tb_position.allow = '1' and tb_business.allow='1' order by tb_business.id, tb_position.id";
	
	$result = mysql_query($sql);
	$id = 0 ;
	
	$xmldata = '<?xml version="1.0" encoding="UTF-8"?><result>';
	 
	while($row = mysql_fetch_array($result)){
		$xmldata .= '<pagecontent>';
		$id = $id + 1 ;
		$xmldata .= '<id>'.$id.'</id>';
		$xmldata .= '<icon>'.$row['icon'].'</icon>';
		$xmldata .= '<lat>'.$row['latitude'].'</lat>';
		$xmldata .= '<lng>'.$row['longitude'].'</lng>';
		$xmldata .= '<name>'.$row['name'].'</name>';
		$xmldata .= '<call_num>'.$row['call_num'].'</call_num>';
		$xmldata .= '<description>'.$row['description'].'</description>';
		$xmldata .= '<address>'.$row['address'].'</address>';
		$xmldata .= '<kind>'.$row['kind'].'</kind>';
		
		$xmldata .= '</pagecontent>';
	}
	 
	mysql_free_result($query);
	echo $xmldata .= '</result>';
?>