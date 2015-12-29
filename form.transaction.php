<script type = "text/javascript" >
	function validateTransaction(){ 

		var uid =  document.forms["frmTransaction"]["uid"].value; 
		var title =  document.forms["frmTransaction"]["title"].value; 
		var date =  document.forms["frmTransaction"]["date"].value; 
		var type =  document.forms["frmTransaction"]["type"].value; 
		var info =  document.forms["frmTransaction"]["info"].value; 
		var amount =  document.forms["frmTransaction"]["amount"].value; 
		var sender =  document.forms["frmTransaction"]["sender"].value; 
		var receiver =  document.forms["frmTransaction"]["receiver"].value; 
		var description =  document.forms["frmTransaction"]["description"].value; 
		var is_paid =  document.forms["frmTransaction"]["is_paid"].value; 

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(title == null || title == ""){
			alert("title can't be empty");
			return false;
		}
		if(date == null || date == ""){
			alert("date can't be empty");
			return false;
		}
		if(type == null || type == ""){
			alert("type can't be empty");
			return false;
		}
		if(info == null || info == ""){
			alert("info can't be empty");
			return false;
		}
		if(amount == null || amount == ""){
			alert("amount can't be empty");
			return false;
		}
		if(sender == null || sender == ""){
			alert("sender can't be empty");
			return false;
		}
		if(receiver == null || receiver == ""){
			alert("receiver can't be empty");
			return false;
		}
		if(description == null || description == ""){
			alert("description can't be empty");
			return false;
		}
		if(is_paid == null || is_paid == ""){
			alert("is_paid can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.transaction.dao.php");
?>
<center>
	<h3>Add Transaction</h3>
<form name = "frmTransaction" method="POST" action="save.transaction.php"  onsubmit = "return validateTransaction();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOtransaction();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> Transaction Title </td>
				<td><input type = "text" name = "title" value= "<?=$vo->title?> "/></td>
			</tr>
			<tr>
				<td> Date </td>
				<td><input type = "text" name = "date" value= "<?=$vo->date?> "/></td>
			</tr>
			<tr>
				<td> Type </td>
				<td><input type = "text" name = "type" value= "<?=$vo->type?> "/></td>
			</tr>
			<tr>
				<td> Info </td>
				<td><input type = "text" name = "info" value= "<?=$vo->info?> "/></td>
			</tr>
			<tr>
				<td> Amount </td>
				<td><input type = "text" name = "amount" value= "<?=$vo->amount?> "/></td>
			</tr>
			<tr>
				<td> Sender </td>
				<td><input type = "text" name = "sender" value= "<?=$vo->sender?> "/></td>
			</tr>
			<tr>
				<td> Receiver </td>
				<td><input type = "text" name = "receiver" value= "<?=$vo->receiver?> "/></td>
			</tr>
			<tr>
				<td> Description </td>
				<td><input type = "text" name = "description" value= "<?=$vo->description?> "/></td>
			</tr>
			<tr>
				<td> Is Paid </td>
				<td><input type = "text" name = "is_paid" value= "<?=$vo->is_paid?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "tid" value= "<?=$vo->tid?> "/>
		<?}else{?>
			<tr>
				<td> Transaction Title </td>
				<td><input type = "text" name = "title" /></td>
			</tr>
			<tr>
				<td> Date </td>
				<td><input type = "text" name = "date" /></td>
			</tr>
			<tr>
				<td> Type </td>
				<td><input type = "text" name = "type" /></td>
			</tr>
			<tr>
				<td> Info </td>
				<td><input type = "text" name = "info" /></td>
			</tr>
			<tr>
				<td> Amount </td>
				<td><input type = "text" name = "amount" /></td>
			</tr>
			<tr>
				<td> Sender </td>
				<td><input type = "text" name = "sender" /></td>
			</tr>
			<tr>
				<td> Receiver </td>
				<td><input type = "text" name = "receiver" /></td>
			</tr>
			<tr>
				<td> Description </td>
				<td><input type = "text" name = "description" /></td>
			</tr>
			<tr>
				<td> Is Paid </td>
				<td><input type = "text" name = "is_paid" /></td>
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
