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

	function startUpload2(){
		  document.getElementById('f1_upload_process2').style.display = '';
		  document.getElementById('f1_upload_form2').style.display = 'none';
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

	function stopUpload2(success){
		  if (success == 1){
				alert("The file was uploaded successfully!");
		  }
		  else {
			    alert("There was an error during file upload!");
		  }
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
               <h2>Manage Category</h2>
			   <div id="inline_content">
					
			   </div>
               <div>
				  <table id="gradient-style">
                     <thead>
                        <tr>
                           <th scope="col" width="20%">ID</th>
                           <th scope="col" width="60%">Name</th>  
			   <th scope="col"></th> 
			   <th scope="col"></th> 
			   <th scope="col"></th>
                        </tr>
                     </thead>
					 <tfoot>
						<tr id="newTr" style="display:none">
							<td colspan="5">
								<form action="upload_category.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
									<p id="f1_upload_process" style="display:none">Loading...<br/><img src="images/loader.gif" /><br/></p>
									<p id="f1_upload_form" align="center"><br/>
										<label>Name </label><input type="text" size="15" id="txtName" name="txtName">
										<label>File:  
											<input name="myfile" type="file" size="30" accept="image/*" />
										</label>
										<label>
											<input type="submit" name="submitBtn" class="sbtn" value="Add Category" />
										</label>
									</p>
								 
								<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
							 </form>
							</td>

							<script language="javascript">
								function deleteCategory(object)
								{
									var str = "Do you want to delete '" + object.parentNode.parentNode.cells[1].innerHTML + "'?" ;
									if (window.confirm(str))
									{
										if (window.XMLHttpRequest) 
										{
											self.XMLHttp = new XMLHttpRequest();
										}
										else if (window.ActiveXObject) 
										{
											self.XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
										}

										self.XMLHttp.open("POST", "delete_category.php");
										self.XMLHttp.onreadystatechange = handlerFunction;
										self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										self.XMLHttp.send("id="+object.parentNode.parentNode.cells[0].innerHTML);
									}
								}
							</script>
						</tr>
						<tr id="editTr" style="display:none">
							<td colspan="5">
								<form action="update_category.php" method="post" enctype="multipart/form-data" target="upload_target2" onsubmit="startUpload2();" >
									<p id="f1_upload_process2" style="display:none">Loading...<br/><img src="images/loader.gif" /><br/></p>
									<p id="f1_upload_form2" align="center"><br/>
										<input type="hidden" id="txtEditId" name="txtEditId">
										<label>Name </label><input type="text" size="15" id="txtEditName" name="txtEditName">
										<label>File:  
											<input name="editmyfile" type="file" size="30" accept="image/*" />
										</label>
										<label>
											<input type="submit" name="submitBtn2" class="sbtn" value="Update" />
										</label>
									</p>
								 
									<iframe id="upload_target2" name="upload_target2" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
								</form>
							</td>
							<script language="javascript">
								function editCategory(object)
								{
									document.getElementById("editTr").style.display = "" ;
									document.getElementById('newTr').style.display="none";
									document.getElementById("txtEditId").value = object.parentNode.parentNode.cells[0].innerHTML ;
									document.getElementById("txtEditName").value = object.parentNode.parentNode.cells[1].innerHTML ;									
								}
							</script>
						</tr>
						<tr>
							<td colspan="5"><a style='cursor: pointer;' onClick="document.getElementById('newTr').style.display='';document.getElementById('editTr').style.display='none';">New Category</a></td>
						</tr>
					 </tfoot>
                     <tbody id="tablebody">
                     </tbody>
					 <script type="text/javascript">
						 $(document).ready(function(){
							var url = 'search_category.php';
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/category_icons/"+data.icon + "' alt=''></td><td><a style='cursor:pointer;' onClick='editCategory(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteCategory(this)'>Delete</a></td></tr>");
								});
							});
							});						  
					  </script>
					  <script language="javascript">
						var XMLHttp = false;
						var self = this;
						function handlerFunction() {
						  if (XMLHttp.readyState == 4) {
							alert(XMLHttp.responseText);
							location.reload();
						  }
						}
					  </script>
                  </table>
               </div>
            </div>
            <div class="menu">
               <div class="menu_title">Main menu</div>
               <ul>
                  <li><a href="index.php" class="menu_link">Home</a></li>
                  <li><a href="index.php" class="menu_link">Manage Client</a></li>
				  <li><a href="category.php" class="menu_link">Manage Category</a></li>
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