<script type = "text/javascript" >
	function validateInvoice(){ 

		var uid =  document.forms["frmInvoice"]["uid"].value; 
		var customer =  document.forms["frmInvoice"]["customer"].value; 
		var total_amt =  document.forms["frmInvoice"]["total_amt"].value; 
		var balance_due =  document.forms["frmInvoice"]["balance_due"].value; 
		var inv_date =  document.forms["frmInvoice"]["inv_date"].value; 
		var paid_date =  document.forms["frmInvoice"]["paid_date"].value; 

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(customer == null || customer == ""){
			alert("customer can't be empty");
			return false;
		}
		if(total_amt == null || total_amt == ""){
			alert("total_amt can't be empty");
			return false;
		}
		if(balance_due == null || balance_due == ""){
			alert("balance_due can't be empty");
			return false;
		}
		if(inv_date == null || inv_date == ""){
			alert("inv_date can't be empty");
			return false;
		}
		if(paid_date == null || paid_date == ""){
			alert("paid_date can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.invoice.dao.php");
?>
<center>
	<h3>Add Invoice</h3>
<form name = "frmInvoice" method="POST" action="save.invoice.php"  onsubmit = "return validateInvoice();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOinvoice();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> Customer Name </td>
				<td><input type = "text" name = "customer" value= "<?=$vo->customer?> "/></td>
			</tr>
			<tr>
				<td> Total Amount </td>
				<td><input type = "text" name = "total_amt" value= "<?=$vo->total_amt?> "/></td>
			</tr>
			<tr>
				<td> Balance Due </td>
				<td><input type = "text" name = "balance_due" value= "<?=$vo->balance_due?> "/></td>
			</tr>
			<tr>
				<td> Invoiced On </td>
				<td><input type = "text" name = "inv_date" value= "<?=$vo->inv_date?> "/></td>
			</tr>
			<tr>
				<td> Paid On </td>
				<td><input type = "text" name = "paid_date" value= "<?=$vo->paid_date?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "inv_num" value= "<?=$vo->inv_num?> "/>
		<?}else{?>
			<tr>
				<td> Customer Name </td>
				<td><input type = "text" name = "customer" /></td>
			</tr>
			<tr>
				<td> Total Amount </td>
				<td><input type = "text" name = "total_amt" /></td>
			</tr>
			<tr>
				<td> Balance Due </td>
				<td><input type = "text" name = "balance_due" /></td>
			</tr>
			<tr>
				<td> Invoiced On </td>
				<td><input type = "text" name = "inv_date" /></td>
			</tr>
			<tr>
				<td> Paid On </td>
				<td><input type = "text" name = "paid_date" /></td>
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
