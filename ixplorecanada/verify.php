<?php 
	if(isset($_POST['submit'])){ 
		include "mysql_connect.php";
		
		$usr = mysql_real_escape_string($_POST['username']); 
		$pas = mysql_real_escape_string($_POST['password']); 
		$sql = mysql_query("SELECT * FROM tb_user  
			WHERE username='$usr' AND 
			password='$pas' 
			LIMIT 1"); 
		if(mysql_num_rows($sql) == 1){ 
			$row = mysql_fetch_array($sql); 
			session_start(); 
			$_SESSION['username'] = $row['username']; 
			$_SESSION['fname'] = $row['first_name']; 
			$_SESSION['lname'] = $row['last_name']; 
			$_SESSION['logged'] = TRUE; 
			header("Location: index.php"); // Modify to go to the page you would like 
			exit; 
		}else{ 
			header("Location: login_page.php"); 
			exit; 
		} 
	}else{    //If the form button wasn't submitted go to the index page, or login page 
		header("Location: index.php");     
		exit; 
	} 
?>