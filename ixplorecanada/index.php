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
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>iXplore Canada</title>
      <link href="css/style1.css" rel="stylesheet" type="text/css" />
	  <link href="css/style.css" rel="stylesheet" type="text/css" />
	  <script src="./js/jquery-1.10.2.js"></script>
   </head>
   <body>
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

	function startUpload2(){
		  document.getElementById('f1_upload_process2').style.display = '';
		  document.getElementById('f1_upload_form2').style.display = 'none';
		  return true;
	}

	function stopUpload(success){
		  if (success == 1){
				alert("Success!");
		  }
		  else {
			    alert("Failed! There was an error during file upload!");
		  }
		  //document.getElementById('f1_upload_process').style.display = 'none';
		  //document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
		  //document.getElementById('f1_upload_form').style.display = '';
		  location.reload();
		  return true;   
	}

	function stopUpload2(success){
		  if (success == 1){
				alert("Success!");
		  }
		  else {
			    alert("Failed! There was an error during file upload!");
		  }
		  location.reload();
		  return true;   
	}
	//-->
	</script> 
	
      <div id="container">
         <div id="header">
            <h1>iXplore Canada</h1>
         </div>
         <div id="sub_header"></div>
         <div id="main_content_top"></div>
         <div id="main_content">
            <div class="content">
               <h2>Manage Clients</h2>
			   <div id="inline_content">
					<form action="">
						<input type="radio" name="flag_clients" checked="checked" value="all">All
						<input type="radio" name="flag_clients" value="allowed">Allowed
						<input type="radio" name="flag_clients" value="disallowed">Disallowed
					</form>
			   </div>

			   <script type="text/javascript">
					$("#inline_content input[name='flag_clients']").click(function(){
						$('#tablebody').empty();

						if($('input:radio[name=flag_clients]:checked').val() == "all"){
							var url = 'search_client.php?allow=2';
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									if (data.allow == '1')
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' checked onClick=setStatus(this,0," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}
									else
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' onClick=setStatus(this,1," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}									
								});
							});
						}
						else if($('input:radio[name=flag_clients]:checked').val() == "allowed"){
							var url = 'search_client.php?allow=1';
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									if (data.allow == '1')
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' checked onClick=setStatus(this,0," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}
									else
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' onClick=setStatus(this,1," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}									
								});
							});
						}
						else if($('input:radio[name=flag_clients]:checked').val() == "disallowed"){
							var url = 'search_client.php?allow=0';
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									if (data.allow == '1')
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' checked onClick=setStatus(this,0," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}
									else
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' onClick=setStatus(this,1," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}								
								});
							});
						}
					});
			   </script>

               <div>
				  <table id="gradient-style">
                     <thead>
                        <tr>
                           <th scope="col" width="5%">ID</th>
                           <th scope="col" width="20%">Name</th>
                           <th scope="col" width="25%">Email</th>
                           <th scope="col" width="26%">Phone Number</th>
                           <th scope="col" width="3%"></th>
                           <th scope="col" width="5%">Allow</th>
			   <th scope="col" width="3%"></th>
			   <th scope="col" width="3%"></th>
			   <th scope="col" width="3%"></th>
                        </tr>
                     </thead>
					 <tfoot>
						<tr id="newTr" style="display:none">
							<td colspan="9">
								<form action="add_business2.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
									<p id="f1_upload_process" style="display:none">Loading...<br/><img src="images/loader.gif" /><br/></p>
									<p id="f1_upload_form" align="center"><br/>
										<label>Name </label><input type="text" size="7" id="txtName" name="txtName">
										<label>Email </label><input type="text" size="10" id="txtEmail" name="txtEmail">
										<label>Phone Number </label><input type="text" size="10" id="txtPhone" name="txtPhone"><br/>
								
										<label>File:  
											<input name="myfile" type="file" size="30" accept="image/*" />
										</label>
										<label>
											<input type="submit" name="submitBtn" class="sbtn" value="AddNew" />
										</label>
									</p>
								 
								<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
								</form>
							</td>

							<script language="javascript">
								function deleteBusiness(object)
								{
									var str = "Do you want to delete " + object.parentNode.parentNode.cells[1].innerHTML + "'s business?" ;
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

										self.XMLHttp.open("POST", "delete_business.php");
										self.XMLHttp.onreadystatechange = handlerFunction;
										self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										self.XMLHttp.send("id="+object.parentNode.parentNode.cells[0].innerHTML);
									}
								}

								
							</script>
						</tr>
						<tr id="editTr" style="display:none">
							<td colspan="9">
								<form action="update_business.php" method="post" enctype="multipart/form-data" target="upload_target2" onsubmit="startUpload2();" >
									<p id="f1_upload_process2" style="display:none">Loading...<br/><img src="images/loader.gif" /><br/></p>
									<p id="f1_upload_form2" align="center"><br/>
										<input type="hidden" id="txtEditId" name="txtEditId">
										<label>Name </label><input type="text" size="7" id="txtEditName" name="txtEditName">
										<label>Email </label><input type="text" size="10" id="txtEditEmail" name="txtEditEmail">
										<label>Phone Number </label><input type="text" size="10" id="txtEditPhone" name="txtEditPhone"><br/>
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
								function editBusiness(object)
								{
									document.getElementById("editTr").style.display = "" ;
									document.getElementById('newTr').style.display="none";
									document.getElementById("txtEditId").value = object.parentNode.parentNode.cells[0].innerHTML ;
									document.getElementById("txtEditName").value = object.parentNode.parentNode.cells[1].innerHTML ;
									document.getElementById("txtEditEmail").value = object.parentNode.parentNode.cells[2].innerHTML ;
									document.getElementById("txtEditPhone").value = object.parentNode.parentNode.cells[3].innerHTML ;
								}
							</script>
						</tr>
						<tr>
							<td colspan="9"><a style='cursor: pointer;' onClick="document.getElementById('newTr').style.display='';document.getElementById('editTr').style.display='none'">Add New Business</a></td>
						</tr>
					 </tfoot>
                     <tbody id="tablebody">
                     </tbody>
					 <script type="text/javascript">
						 $(document).ready(function(){
							var url = 'search_client.php?allow=2';
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									if (data.allow == '1')
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' checked onClick=setStatus(this,0," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}
									else
									{
										$('#tablebody').append("<tr><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.phone_num+"</td><td><img width='30' height='30' style='width:30px;height:30px' src='images/business_icon/"+data.icon + "' alt=''></td><td id='gen_form'><input class='check-allx' type='checkbox' onClick=setStatus(this,1," + data.id + ")></td><td><a style='cursor: pointer;' onClick='goPosition(" + data.id + ")'>info</a></td><td><a style='cursor:pointer;' onClick='editBusiness(this)'>Edit</a></td><td><a style='cursor:pointer;' onClick='deleteBusiness(this)'>Delete</a></td></tr>");
									}
								});
							});
							});						  
					  </script>
					  <script language="javascript">
						var XMLHttp = false;
						var self = this;
						function goPosition(id)
						{
							window.location.href="client_position.php?id=" + id ;
						}

						function setStatus(object, nStatus, nId)
						{
							var str = "" ;
							if ( nStatus == 1 )
								str = "Do you want to allow " + (object.parentNode).parentNode.cells[1].innerHTML + "'s business?" ;
							else
								str = "Do you want to disallow " + (object.parentNode).parentNode.cells[1].innerHTML + "'s business?" ;

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

								self.XMLHttp.open("POST", "setStatus.php");
								self.XMLHttp.onreadystatechange = handlerFunction;
								self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								self.XMLHttp.send("st=" + nStatus + "&id=" + nId);
							}
							else
							{
								if (object.checked)
									object.checked = false ;
								else
									object.checked = true ;
							}
						}

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