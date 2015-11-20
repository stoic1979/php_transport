<script type = "text/javascript" >
	function validateCustomer(){ 

		var uid =  document.forms["frmCustomer"]["uid"].value; 
		var name =  document.forms["frmCustomer"]["name"].value; 
		var firm_name =  document.forms["frmCustomer"]["firm_name"].value; 
		var address =  document.forms["frmCustomer"]["address"].value; 
		var phone =  document.forms["frmCustomer"]["phone"].value; 
		var email =  document.forms["frmCustomer"]["email"].value; 

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(name == null || name == ""){
			alert("name can't be empty");
			return false;
		}
		if(firm_name == null || firm_name == ""){
			alert("firm_name can't be empty");
			return false;
		}
		if(address == null || address == ""){
			alert("address can't be empty");
			return false;
		}
		if(phone == null || phone == ""){
			alert("phone can't be empty");
			return false;
		}
		if(email == null || email == ""){
			alert("email can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.customer.dao.php");
?>
<center>
<form name = "frmCustomer" method="POST" action="save.customer.php"  onsubmit = "return validateCustomer();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOcustomer();
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
				<td> firm_name </td>
				<td><input type = "text" name = "firm_name" value= "<?=$vo->firm_name?> "/></td>
			</tr>
			<tr>
				<td> address </td>
				<td><input type = "text" name = "address" value= "<?=$vo->address?> "/></td>
			</tr>
			<tr>
				<td> phone </td>
				<td><input type = "text" name = "phone" value= "<?=$vo->phone?> "/></td>
			</tr>
			<tr>
				<td> email </td>
				<td><input type = "text" name = "email" value= "<?=$vo->email?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "cust_id" value= "<?=$vo->cust_id?> "/>
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
				<td> firm_name </td>
				<td><input type = "text" name = "firm_name" /></td>
			</tr>
			<tr>
				<td> address </td>
				<td><input type = "text" name = "address" /></td>
			</tr>
			<tr>
				<td> phone </td>
				<td><input type = "text" name = "phone" /></td>
			</tr>
			<tr>
				<td> email </td>
				<td><input type = "text" name = "email" /></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" class="btn btn-info" value= "ADD"  /></th>
			</tr>
		<?}?>
	</table>
</form>
</center>
<?
include("footer.php");
?>
