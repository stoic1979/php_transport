<?php
session_start();
?>
<script type = "text/javascript" >
	function validateCompany(){ 

		var uid =  document.forms["frmCompany"]["uid"].value; 
		var title =  document.forms["frmCompany"]["title"].value; 
		var phone =  document.forms["frmCompany"]["phone"].value; 
		var address =  document.forms["frmCompany"]["address"].value; 

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(title == null || title == ""){
			alert("title can't be empty");
			return false;
		}
		if(phone == null || phone == ""){
			alert("phone can't be empty");
			return false;
		}
		if(address == null || address == ""){
			alert("address can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.company.dao.php");
?>
<center>
	<h3>Add Company</h3>
<form name = "frmCompany" method="POST" action="save.company.php"  onsubmit = "return validateCompany();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOcompany();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> Title </td>
				<td><input type = "text" name = "title" value= "<?=$vo->title?> "/></td>
			</tr>
			<tr>
				<td> Phone </td>
				<td><input type = "text" name = "phone" value= "<?=$vo->phone?> "/></td>
			</tr>
			<tr>
				<td> Address </td>
				<td><input type = "text" name = "address" value= "<?=$vo->address?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "comp_id" value= "<?=$vo->comp_id?> "/>
		<?}else{?>
			<tr>
				<td> Title </td>
				<td><input type = "text" name = "title" /></td>
			</tr>
			<tr>
				<td> Phone </td>
				<td><input type = "text" name = "phone" /></td>
			</tr>
			<tr>
				<td> Address </td>
				<td><input type = "text" name = "address" /></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" class="btn btn-info" value= "ADD"  /></th>
			</tr>
		<?}?>
	</table>
</form>
<center>
<?
include("footer.php");
?>
