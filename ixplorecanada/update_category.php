<?php
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login_page.php"); 
		exit; 
	}
	
	include "mysql_connect.php";

	$id = $_POST['txtEditId'] ;
	$name = $_POST['txtEditName'] ;
	$filename = $_FILES['editmyfile']['name'] ;

	if ( $filename != "" )
	{
		$sql = "select icon from tb_category where id ='".$id."' order by id" ;
		$result2 = mysql_query($sql,$conn);
		$prev_filename = "" ;
		
		while($row = mysql_fetch_array($result2)){
			$prev_filename = $row['icon'] ;
		}

		unlink(dirname(__FILE__) . "/images/category_icons/" . $prev_filename);
	}
	
	if ( $filename == "" )
		$sql = "update tb_category set name = '".$name."' where id='".$id."'" ;
	else
		$sql = "update tb_category set name = '".$name."', icon='".$filename."' where id='".$id."'" ;

	if ( mysql_query($sql,$conn) )
		echo "Category updated." ;
	else
		echo "update ".$sql. " Faild. ".mysql_error() ;

	$destination_path = getcwd().DIRECTORY_SEPARATOR."images/category_icons/";
	$result = 0;
	$target_path = $destination_path . basename( $_FILES['editmyfile']['name']);
	
	if(@move_uploaded_file($_FILES['editmyfile']['tmp_name'], $target_path)) {
		$result = 1;
	}

	if($filename == "")
		$result = 1 ;
	
	sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload2(<?php echo $result; ?>);</script> 