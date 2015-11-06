<script type = "text/javascript" >
	function validateAdmin(){ 

		var username =  document.forms["frmAdmin"]["username"].value; 
		var password =  document.forms["frmAdmin"]["password"].value; 

		if(username == null || username == ""){
			alert("username can't be empty");
			return false;
		}
		if(password == null || password == ""){
			alert("password can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.admin.dao.php");
?>
<form name = "frmAdmin" method="POST" action="save.admin.php"  onsubmit = "return validateAdmin();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOadmin();
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
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "aid" value= "<?=$vo->aid?> "/>
		<?}else{?>
			<tr>
				<td> username </td>
				<td><input type = "text" name = "username" /></td>
			</tr>
			<tr>
				<td> password </td>
				<td><input type = "text" name = "password" /></td>
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
