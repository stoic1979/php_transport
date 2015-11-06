<script type = "text/javascript" >
	function validateUser(){ 

		var username =  document.forms["frmUser"]["username"].value; 
		var password =  document.forms["frmUser"]["password"].value; 
		var full_name =  document.forms["frmUser"]["full_name"].value; 
		var email =  document.forms["frmUser"]["email"].value; 
		var phone =  document.forms["frmUser"]["phone"].value; 
		var address =  document.forms["frmUser"]["address"].value; 
		var creation_date =  document.forms["frmUser"]["creation_date"].value; 
		var is_active =  document.forms["frmUser"]["is_active"].value; 

		if(username == null || username == ""){
			alert("username can't be empty");
			return false;
		}
		if(password == null || password == ""){
			alert("password can't be empty");
			return false;
		}
		if(full_name == null || full_name == ""){
			alert("full_name can't be empty");
			return false;
		}
		if(email == null || email == ""){
			alert("email can't be empty");
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
		if(creation_date == null || creation_date == ""){
			alert("creation_date can't be empty");
			return false;
		}
		if(is_active == null || is_active == ""){
			alert("is_active can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.user.dao.php");
?>
<form name = "frmUser" method="POST" action="save.user.php"  onsubmit = "return validateUser();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOuser();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> username </td>
				<td><input type = "text" name = "username" value= "<?=$vo->username?> "/></td>
			</tr>
			<tr>
				<td> password </td>
				<td><input type = "text" name = "password" value= "<?=$vo->password?> "/></td>
			</tr>
			<tr>
				<td> full_name </td>
				<td><input type = "text" name = "full_name" value= "<?=$vo->full_name?> "/></td>
			</tr>
			<tr>
				<td> email </td>
				<td><input type = "text" name = "email" value= "<?=$vo->email?> "/></td>
			</tr>
			<tr>
				<td> phone </td>
				<td><input type = "text" name = "phone" value= "<?=$vo->phone?> "/></td>
			</tr>
			<tr>
				<td> address </td>
				<td><input type = "text" name = "address" value= "<?=$vo->address?> "/></td>
			</tr>
			<tr>
				<td> creation_date </td>
				<td><input type = "text" name = "creation_date" value= "<?=$vo->creation_date?> "/></td>
			</tr>
			<tr>
				<td> is_active </td>
				<td><input type = "text" name = "is_active" value= "<?=$vo->is_active?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "uid" value= "<?=$vo->uid?> "/>
		<?}else{?>
			<tr>
				<td> username </td>
				<td><input type = "text" name = "username" /></td>
			</tr>
			<tr>
				<td> password </td>
				<td><input type = "text" name = "password" /></td>
			</tr>
			<tr>
				<td> full_name </td>
				<td><input type = "text" name = "full_name" /></td>
			</tr>
			<tr>
				<td> email </td>
				<td><input type = "text" name = "email" /></td>
			</tr>
			<tr>
				<td> phone </td>
				<td><input type = "text" name = "phone" /></td>
			</tr>
			<tr>
				<td> address </td>
				<td><input type = "text" name = "address" /></td>
			</tr>
			<tr>
				<td> creation_date </td>
				<td><input type = "text" name = "creation_date" /></td>
			</tr>
			<tr>
				<td> is_active </td>
				<td><input type = "text" name = "is_active" /></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "ADD"  /></th>
			</tr>
		<?}?>
	</table>
</form>
<?
include("footer.php");
?>
