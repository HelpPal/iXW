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
	  <style>
      #map_canvas {
        width: 700px;
        height: 400px;
      }
    </style>
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
               <h2>Manage Clients</h2>
			   <div id="inline_content">
					<form action="">
						<label>Category </label>
						<select name="category_menu" id="category_menu">
							<option value="0" selected>All</option>
						</select>
						<script type="text/javascript">
							$(document).ready(function(){
							var url = "get_category.php" ;
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									$('#category_menu').append("<option value='"+data.id+"'>"+data.name+"</option>");
									
								});
							});
							});	
						</script>
						
						<label name="lblBusiness" id="lblBusiness">Business </label>
						<script type="text/javascript">
							$(document).ready(function(){
							
							var url = "get_businessname.php?" ;
							url = url + window.location.search.substr(1);
							$.getJSON(url, function(data) {
								$('[id$=lblBusiness]').text(data[0].name);
							});
							});	
						</script>

						

						<script type="text/javascript">
							$('#category_menu').on('change', function (e) {
								var valueSelected = this.value;
								$('#tablebody').empty();
								var prmstr = window.location.search.substr(1);

								var url = 'search_position.php?&allow=2&' + prmstr + "&kind=" + valueSelected;
								$.getJSON(url, function(data) {
									$.each(data, function(index, data) {
										
										if (data.allow == '1')
									{
										$('#tablebody').append("<tr><td width='5%'>"+data.id+"</td><td width='15%'>"+data.name+"</td><td width='10%'>"+roundNumber(data.latitude)+"</td><td width='10%'>"+roundNumber(data.longitude)+"</td><td width='15%'>"+data.call+"</td><td width='35%'><textarea style='width:100%;height:100%' readonly>"+data.des+"</textarea></td><td width='10%' id='gen_form'><input class='check-allx' type='checkbox' checked " + "onClick=setStatus(this,0," + data.id + ")><br><a style='cursor:pointer;' onClick='editPosition(this)'>Edit</a><br><a style='cursor:pointer;' onClick='deletePosition(this)'>Delete</a></td></tr>");
									}
									else
									{
										$('#tablebody').append("<tr><td width='5%'>"+data.id+"</td><td width='15%'>"+data.name+"</td><td width='10%'>"+roundNumber(data.latitude)+"</td><td width='10%'>"+roundNumber(data.longitude)+"</td><td width='15%'>"+data.call+"</td><td width='35%'><textarea style='width:100%;height:100%' readonly>"+data.des+"</textarea></td><td width='10%' id='gen_form'><input class='check-allx' type='checkbox' " + "onClick=setStatus(this,1," + data.id + ")><br><a style='cursor:pointer;' onClick='editPosition(this)'>Edit</a><br><a style='cursor:pointer;' onClick='deletePosition(this)'>Delete</a></td></tr>");
									}									
									});
								});
								
							});
						</script>
					</form>
			   </div>
				<div>
				  <table id="background-image">
                     <thead>
                        <tr>
                           <th scope="col" width="5%">ID</th>
                           <th scope="col" width="15%">Name</th>
                           <th scope="col" width="10%">Latitude</th>
                           <th scope="col" width="10%">Longitude</th>
			   <th scope="col" width="15%">Call</th>
                           <th scope="col" width="35%">Description</th>
                           <th scope="col" width="10%" colspan="3">Allow</th>
                        </tr>
                     </thead>
					 <tfoot>
						<tr id="newTr" style="display:none">
							<td colspan="9">
								<table border="0" width="100%">
									<tr>
										<td width="15%"><label>Name </label></td>
										<td width="35%"><input type="text" size="25" id="txtName"></td>
										<td width="15%"><label>Call</label></td>
										<td width="35%"><input type="text" size="25" id="txtCall"></td>
									</tr>
									<tr>
										<td width="15%"><label>Latitude </label></td>
										<td width="35%"><input type="text" size="25" id="txtLat"></td>
										<td width="15%"><label>Longitude </label></td>
										<td width="35%"><input type="text" size="25" id="txtLong"></td>
									</tr>
									<tr>
										<td colspan="4">
											<label>Description </label>
											<TEXTAREA NAME="Address" ROWS=10 COLS=80 id="txtDescription" style="resize: none;"></TEXTAREA>
										</td>
									</tr>
									<tr>
										<td colspan="4" align="right">
											<input type="button" onClick="AddPosition()" id="btnAdd" value="Add Position">
										</td>
									</tr>
								</table>
								
							</td>

							<script language="javascript">
								function AddPosition(flag)
								{
									var kindElement = document.getElementById("category_menu"); 
									var kind = kindElement.options[kindElement.selectedIndex].value;
									if (kind==0)
									{
										alert("Please select kind of position.") ;
									}
									else
									{
										if (window.XMLHttpRequest) 
										{
											self.XMLHttp = new XMLHttpRequest();
										}
										else if (window.ActiveXObject) 
										{
											self.XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
										}
										var prmstr = window.location.search.substr(1);
				

										self.XMLHttp.open("POST", "add_position.php");
										self.XMLHttp.onreadystatechange = handlerFunction;
										self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										self.XMLHttp.send(prmstr+"&name="+document.getElementById("txtName").value + "&lat=" + document.getElementById("txtLat").value + "&long=" +document.getElementById("txtLong").value+"&kind="+kind+"&call="+document.getElementById("txtCall").value+"&description="+document.getElementById("txtDescription").value);
									}
								}

								function deletePosition(object)
								{
									var str = "Do you want to delete " + object.parentNode.parentNode.cells[1].innerHTML + "'s position?" ;
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

										self.XMLHttp.open("POST", "delete_position.php");
										self.XMLHttp.onreadystatechange = handlerFunction;
										self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										self.XMLHttp.send("id="+object.parentNode.parentNode.cells[0].innerHTML);
									}
								}

								
							</script>
						</tr>
						<tr id="editTr" style="display:none">
							<td colspan="9">
								<table border="0" width="100%">
									<tr>
										<td width="15%"><label>Name </label></td>
										<td width="35%"><input type="hidden" id="txtEditId"><input type="text" size="20" id="txtEditName"></td>
										<td width="15%"><label>Call</label></td>
										<td width="35%"><input type="text" size="20" id="txtEditCall"></td>
									</tr>
									<tr>
										<td width="15%"><label>Latitude </label></td>
										<td width="35%"><input type="text" size="10" id="txtEditLat"></td>
										<td width="15%"><label>Longitude </label></td>
										<td width="35%"><input type="text" size="10" id="txtEditLong"></td>
									</tr>
									<tr>
										<td colspan="4">
											<label>Description </label>
											<TEXTAREA NAME="Address" ROWS=10 COLS=80 id="txtEditDescription"></TEXTAREA>
										</td>
									</tr>
									<tr>
										<td colspan="4" align="right">
											<input type="button" onClick="updatePosition()" id="btnAdd" value="Update Position">
										</td>
									</tr>
								</table>
								
								
								
							</td>

							<script language="javascript">
								function editPosition(object)
								{
									document.getElementById("editTr").style.display = "" ;
									document.getElementById('newTr').style.display='none' ;
									document.getElementById("txtEditId").value = object.parentNode.parentNode.cells[0].innerHTML ;
									document.getElementById("txtEditName").value = object.parentNode.parentNode.cells[1].innerHTML ;
									document.getElementById("txtEditLat").value = object.parentNode.parentNode.cells[2].innerHTML ;
									document.getElementById("txtEditLong").value = object.parentNode.parentNode.cells[3].innerHTML ;
									document.getElementById("txtEditCall").value = object.parentNode.parentNode.cells[4].innerHTML ;
									document.getElementById("txtEditDescription").value = object.parentNode.parentNode.cells[5].childNodes[0].value ;
								}

								function updatePosition(flag)
								{
									if (window.XMLHttpRequest) 
									{
										self.XMLHttp = new XMLHttpRequest();
									}
									else if (window.ActiveXObject) 
									{
										self.XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
									}
									
									var kindElement = document.getElementById("category_menu"); 
									var kind = kindElement.options[kindElement.selectedIndex].value;
									
									if (kind==0)
									{
										alert("Please select kind of position.") ;
									}
									else
									{
										self.XMLHttp.open("POST", "update_position.php");
										self.XMLHttp.onreadystatechange = handlerFunction;
										self.XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										self.XMLHttp.send("id="+document.getElementById("txtEditId").value+"&name="+document.getElementById("txtEditName").value + "&lat=" + document.getElementById("txtEditLat").value + "&long=" +document.getElementById("txtEditLong").value+"&call="+document.getElementById("txtEditCall").value+"&des="+document.getElementById("txtEditDescription").value+"&kind="+kind);
									}
								}
							</script>
						</tr>
						<tr>
							<td colspan="9"><a style='cursor: pointer;' onClick="document.getElementById('newTr').style.display='';document.getElementById('editTr').style.display='none';">Add New Position</a></td>
						</tr>
					 </tfoot>
                     <tbody id="tablebody">
                     </tbody>
					 <script type="text/javascript">
					 	function roundNumber(num){
						   return Math.round(num * 100000) / 100000;
						}
						 $(document).ready(function(){
							var prmstr = window.location.search.substr(1);
							var url = "search_position.php?kind=0&allow=2&" + prmstr ;
							
							$.getJSON(url, function(data) {
								$.each(data, function(index, data) {
									if (data.allow == '1')
									{
										$('#tablebody').append("<tr><td width='5%'>"+data.id+"</td><td width='15%'>"+data.name+"</td><td width='10%'>"+roundNumber(data.latitude)+"</td><td width='10%'>"+roundNumber(data.longitude)+"</td><td width='15%'>"+data.call+"</td><td width='35%'><textarea style='width:100%;height:100%' readonly>"+data.des+"</textarea></td><td width='10%' id='gen_form'><input class='check-allx' type='checkbox' checked " + "onClick=setStatus(this,0," + data.id + ")><br><a style='cursor:pointer;' onClick='editPosition(this)'>Edit</a><br><a style='cursor:pointer;' onClick='deletePosition(this)'>Delete</a></td></tr>");
									}
									else
									{
										$('#tablebody').append("<tr><td width='5%'>"+data.id+"</td><td width='15%'>"+data.name+"</td><td width='10%'>"+roundNumber(data.latitude)+"</td><td width='10%'>"+roundNumber(data.longitude)+"</td><td width='15%'>"+data.call+"</td><td width='35%'><textarea style='width:100%;height:100%' readonly>"+data.des+"</textarea></td><td width='10%' id='gen_form'><input class='check-allx' type='checkbox' " + "onClick=setStatus(this,1," + data.id + ")><br><a style='cursor:pointer;' onClick='editPosition(this)'>Edit</a><br><a style='cursor:pointer;' onClick='deletePosition(this)'>Delete</a></td></tr>");
									}
								});
							});
							});						  
					  
						var XMLHttp = false;
						var self = this;

						function setStatus(object, nStatus, nId)
						{
							var str = "" ;
							if ( nStatus == 1 )
							{
								str = "Do you want to allow " + (object.parentNode).parentNode.cells[1].innerHTML + "?" ;
							}
							else
							{
								str = "Do you want to disallow " + (object.parentNode).parentNode.cells[1].innerHTML + "?" ;
							}

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

								self.XMLHttp.open("POST", "setPositionStatus.php");
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
							//alert(XMLHttp.responseText);
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
				  <li><a href="business_icon.php" class="menu_link">Business Icon</a></li>
				  <li><a href="admin.php" class="menu_link">Admin</a></li>
               </ul>
               
            </div>
            <div id="clear"></div>
         </div>
         <div align="center">
			<script type="text/javascript" src="js/geocode.js">// <![CDATA[</p>
			<p>// ]]&gt;</script></p>
		 </div>
         <div id="footer"><strong>Copyright &copy;2014 I Canada World Apps</strong></div>
      </div>
   </body>
</html>