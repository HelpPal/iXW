<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: login_page.php"); 
    exit; 
} 
echo 'Welcome, '.$_SESSION['username']; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
      <title>iXplore Canada</title>
      <link href="css/style1.css" rel="stylesheet" type="text/css" />
	  <link href="css/style.css" rel="stylesheet" type="text/css" />
	  <script src="./js/jquery-1.10.2.js"></script>
   </head>

   <script language="javascript" type="text/javascript">
	<!--
	function startUpload(){
		  document.getElementById('f1_upload_process').style.display = '';
		  document.getElementById('f1_upload_form').style.display = 'none';
		  return true;
	}

	function stopUpload(success){
		  if (success == 1){
				alert("The file was uploaded successfully!");
		  }
		  else {
			    alert("There was an error during file upload!");
		  }
		  //document.getElementById('f1_upload_process').style.display = 'none';
		  //document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
		  //document.getElementById('f1_upload_form').style.display = '';
		  location.reload();
		  return true;   
	}
	//-->
	</script>   

   <body>
      <div id="container">
         <div id="header">
            <h1>iXplore Canada</h1>
         </div>
         <div id="sub_header"></div>
         <div id="main_content_top"></div>
         <div id="main_content">
            <div class="content">
               <h2>Business Icon</h2>
			   <div id="inline_content">
					
			   </div>
               <div>
					<form action="upload_business.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
							<p id="f1_upload_process" style="display:none">Loading...<br/><img src="images/loader.gif" /><br/></p>
							<p align="center">
								<label>Current Icon  
									<img id="currentIcon" />
								</label>
							</p>
							<p id="f1_upload_form" align="center"><br/>							
								<label>File:  
									<input name="myfile" type="file" size="30" accept="image/*" />
								</label>
								<label>
									<input type="submit" name="submitBtn" class="sbtn" value="Add" />
								</label>
							</p>
							
							<script>
							$(document).ready(function(){
							  $.get('get_business_icon.php', function(data) {
							    $("#currentIcon").attr("src","images/business_icon/" + data);
							    $("#currentIcon").attr('height','30');
							    $("#currentIcon").attr('width','30');								    
							  });
							});
							</script>
						<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
					 </form>
               </div>
            </div>
            <div class="menu">
               <div class="menu_title">Main menu</div>
               <ul>
                  <li><a href="index.php" class="menu_link">Home</a></li>
                  <li><a href="index.php" class="menu_link">Manage Client</a></li>
				  <li><a href="category.php" class="menu_link">Manage Category</a></li>
				  <li><a href="business_icon.php" class="menu_link">Business Icon</a></li>
				  <li><a href="admin.php" class="menu_link">Admin</a></li>
               </ul>
               
            </div>
            <div id="clear"></div>
         </div>
         <div id="main_content_bottom"></div>
         <div id="footer"><strong>Copyright &copy;2014 I Canada World Apps</strong></div>
      </div>
   </body>
</html>