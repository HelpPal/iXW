<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	} 

	include "mysql_connect.php";
	$id = $_POST['id'] ;

	$sql = "select icon from tb_category where id ='".$id."'" ;
	$result = mysql_query($sql,$conn);
	$filename = "" ;
	
	while($row = mysql_fetch_array($result)){
		$filename = $row['icon'] ;
	}

	unlink(dirname(__FILE__) . "/images/category_icons/" . $filename);

	$sql = "delete FROM tb_category where id='".$id."'" ;

	if ( mysql_query($sql,$conn) )
		echo "Category data deleted." ;
	else
		echo "Faild. ".mysql_error() ;

	
?>