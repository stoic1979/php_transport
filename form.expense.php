<script type = "text/javascript" >
	function validateExpense(){ 

		var uid =  document.forms["frmExpense"]["uid"].value; 
		var expense_date =  document.forms["frmExpense"]["expense_date"].value; 
		var category =  document.forms["frmExpense"]["category"].value; 
		var truck_id =  document.forms["frmExpense"]["truck_id"].value; 
		var description =  document.forms["frmExpense"]["description"].value; 
		var amount =  document.forms["frmExpense"]["amount"].value; 

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(expense_date == null || expense_date == ""){
			alert("expense_date can't be empty");
			return false;
		}
		if(category == null || category == ""){
			alert("category can't be empty");
			return false;
		}
		if(truck_id == null || truck_id == ""){
			alert("truck_id can't be empty");
			return false;
		}
		if(description == null || description == ""){
			alert("description can't be empty");
			return false;
		}
		if(amount == null || amount == ""){
			alert("amount can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.expense.dao.php");

$expense_type = $_GET["type"];
?>
<center>
	<h3>Add <?php echo $expense_type; ?></h3>
<form name = "frmExpense" method="POST" action="save.expense.php"  onsubmit = "return validateExpense();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOexpense();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> Expenditure Date </td>
				<td><input type = "text" name = "expense_date" value= "<?=$vo->expense_date?> "/></td>
			</tr>
			<tr>
				<td> Category </td>
				<td><input type = "text" name = "category" value= "<?=$vo->category?> "/></td>
			</tr>
			<tr>
				<td> Truck </td>
				<td><input type = "text" name = "truck_id" value= "<?=$vo->truck_id?> "/></td>
			</tr>
			<tr>
				<td> Description </td>
				<td><input type = "text" name = "description" value= "<?=$vo->description?> "/></td>
			</tr>
			<tr>
				<td> Amount </td>
				<td><input type = "text" name = "amount" value= "<?=$vo->amount?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "expense_type" value= "<?=$vo->expense_type?> "/>
			<input type = "hidden" name = "expense_id" value= "<?=$vo->expense_id?> "/>
		<?}else{?>
			<tr>
				<td> Expenditure Date </td>
				<td><input type = "text" name = "expense_date" /></td>
			</tr>
			<tr>
				<td> Category </td>
				<td><input type = "text" name = "category" /></td>
			</tr>
			<tr>
				<td> Truck </td>
				<td><input type = "text" name = "truck_id" /></td>
			</tr>
			<tr>
				<td> Description </td>
				<td><input type = "text" name = "description" /></td>
			</tr>
			<tr>
				<td> Amount </td>
				<td><input type = "text" name = "amount" /></td>
			</tr>
			<input type = "hidden" name = "expense_type" value= "<?php echo $expense_type; ?> "/>
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
