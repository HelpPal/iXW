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
      <meta http-equiv="Content-Type" content="text/html;  charset=utf8" />
      <title>iXplore Canada</title>
      <link href="css/style1.css" rel="stylesheet" type="text/css" />
	  <link href="css/style.css" rel="stylesheet" type="text/css" />
	  <script src="./js/jquery-1.10.2.js"></script>
   </head>

   <body>
      <div id="container">
         <div id="header">
            <h1>iXplore Canada</h1>
         </div>
         <div id="sub_header"></div>
         <div id="main_content_top"></div>
         <div id="main_content">
            <div class="content">
               <h2>Manage User</h2>
			   <div id="inline_content">
					
			   </div>
               <div>
				  <table id="gradient-style">
                     <thead>
                        <tr>
                           <th scope="col" width="5%">No</th>
                           <th scope="col" width="20%">UserName</th>  
						   <th scope="col" width="20%">Password</th>  
						   <th scope="col" width="20%">First Name</th>  
						   <th scope="col" width="20%">Last Name</th>  
						   <th scope="col"></th> 
						   <th scope="col"></th> 
                        </tr>
                     </thead>
					 <tfoot>
						<tr id="newTr" style="display:none">
							<td colspan="7">
								<label>User Name </label><input type="text" size="10" id="txtName">
								<label>Password </label><input type="password" size="10" id="txtPass">
								<label>First Name </label><input type="text" size="10" id="txtFirstName">
								<label>Last Name </label><input type="text" size="10" id="txtLastName">
								<input type="button" onClick="AddNewUser()" id="btnAdd" value="Add NewUser">
							 </form>
							</td>

							<script language="javascript">
								function AddNewUser(object)
								{
									if (window.XMLHttpRequest) 
									{
										self.XMLHttp = new XMLHttpRequest();
									}
									else if (window.ActiveXObject) 
									{
										self.XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
									}

									self.XMLHttp.open("POST", "add_user.php");
									self.XMLHttp.onreadystatechange = handlerFunction;
									self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									self.XMLHttp.send("name=" + document.getElementById("txtName").value + "&pass=" + document.getElementById("txtPass").value + "&fname=" + document.getElementById("txtFirstName").value + "&lname=" + document.getElementById("txtLastName").value );
								}

								function deleteUser(object)
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

										self.XMLHttp.open("POST", "delete_user.php");
										self.XMLHttp.onreadystatechange = handlerFunction;
										self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										self.XMLHttp.send("id="+object.parentNode.parentNode.cells[0].innerHTML);
									}
								}
							</script>
						</tr>
						<tr id="editTr" style="display:none">
							<td colspan="7">
								<input type="hidden" id="txtEditId">
								<label>User Name </label><input type="text" size="10" id="txtEditName">
								<label>Password </label><input type="password" size="10" id="txtEditPass">
								<label>First Name </label><input type="text" size="10" id="txtEditFirstName">
								<label>Last Name </label><input type="text" size="10" id="txtEditLastName">
								<input type="button" onClick="updateUser()" id="btnAdd" value="Update">
							</td>
							<script language="javascript">
								function updateUser()
								{
									var str = "" ;
									str = "Do you want to update " + document.getElementById("txtEditName").value + "'s information?" ;
									
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

										self.XMLHttp.open("POST", "update_user.php");
										self.XMLHttp.onreadystatechange = handlerFunction;
										self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										self.XMLHttp.send("id=" + document.getElementById("txtEditId").value + "&name=" + document.getElementById("txtEditName").value + "&pass=" + document.getElementById("txtEditPass").value + "&fname=" + document.getElementById("txtEditFirstName").value + "&lname=" + document.getElementById("txtEditLastName").value );
									}
									else
									{
										if (object.checked)
											object.checked = false ;
										else
											object.checked = true ;
									}
								}

								function editNewUser(object)
								{
									document.getElementById("editTr").style.display = "" ;
									document.getElementById('newTr').style.display="none";
									document.getElementById("txtEditId").value = object.parentNode.parentNode.cells[0].innerHTML ;
									document.getElementById("txtEditName").value = object.parentNode.parentNode.cells[1].innerHTML ;
									document.getElementById("txtEditPass").value = object.parentNode.parentNode.cells[2].innerHTML ;
									document.getElementById("txtEditFirstName").value = object.parentNode.parentNode.cells[3].innerHTML ;
									document.getElementById("txtEditLastName").value = object.parentNode.parentNode.cells[4].innerHTML ;
								}
							</script>
						</tr>
						<tr>
							<td colspan="7"><a style='cursor: pointer;' onClick="document.getElementById('newTr').style.display='';document.getElementById('editTr').style.display='none';">New User</a></td>
						</tr>
					 </tfoot>
                     <tbody id="tablebody">
                     </tbody>
					 <script type="text/javascript">
						 $(document).ready(function(){
							var url = 'search_user.php';
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.password+"</td><td>"+data.fname+"</td><td>"+data.lname+"</td><td><a style='cursor:pointer;' onClick='editNewUser(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteUser(this)'>Delete</a></td></tr>");
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