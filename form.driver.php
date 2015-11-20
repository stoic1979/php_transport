<script type = "text/javascript" >
	function validateDriver(){ 

		var uid =  document.forms["frmDriver"]["uid"].value; 
		var name =  document.forms["frmDriver"]["name"].value; 
		var photo =  document.forms["frmDriver"]["photo"].value; 
		var address =  document.forms["frmDriver"]["address"].value; 
		var email =  document.forms["frmDriver"]["email"].value; 
		var phone =  document.forms["frmDriver"]["phone"].value; 
		var social_security_no =  document.forms["frmDriver"]["social_security_no"].value; 

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(name == null || name == ""){
			alert("name can't be empty");
			return false;
		}
		if(photo == null || photo == ""){
			alert("photo can't be empty");
			return false;
		}
		if(address == null || address == ""){
			alert("address can't be empty");
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
		if(social_security_no == null || social_security_no == ""){
			alert("social_security_no can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.driver.dao.php");
?>
<center>
<form name = "frmDriver" method="POST" action="save.driver.php"  onsubmit = "return validateDriver();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOdriver();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> uid </td>
				<td><input type = "text" name = "uid" value= "<?=$vo->uid?> "/></td>
			</tr>
			<tr>
				<td> name </td>
				<td><input type = "text" name = "name" value= "<?=$vo->name?> "/></td>
			</tr>
			<tr>
				<td> photo </td>
				<td><input type = "text" name = "photo" value= "<?=$vo->photo?> "/></td>
			</tr>
			<tr>
				<td> address </td>
				<td><input type = "text" name = "address" value= "<?=$vo->address?> "/></td>
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
				<td> social_security_no </td>
				<td><input type = "text" name = "social_security_no" value= "<?=$vo->social_security_no?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "did" value= "<?=$vo->did?> "/>
		<?}else{?>
			<tr>
				<td> uid </td>
				<td><input type = "text" name = "uid" /></td>
			</tr>
			<tr>
				<td> name </td>
				<td><input type = "text" name = "name" /></td>
			</tr>
			<tr>
				<td> photo </td>
				<td><input type = "text" name = "photo" /></td>
			</tr>
			<tr>
				<td> address </td>
				<td><input type = "text" name = "address" /></td>
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
				<td> social_security_no </td>
				<td><input type = "text" name = "social_security_no" /></td>
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
