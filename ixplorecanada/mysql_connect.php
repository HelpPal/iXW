<?php
	$conn = mysql_connect('localhost','suzaid','1HHGPC3MJPD4');
	
	if(!$conn){
		die('Mysql connection error '.mysql_error());
	}

	$db = mysql_select_db('suzaid_xplor_db',$conn);
	if(!$db){
		die('Database selection failed '.mysql_error());
	}
	
	mysql_query('SET CHARACTER SET utf8');
?>