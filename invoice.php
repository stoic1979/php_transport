<?php
session_start();
include("class.invoice.dao.php");
include_once("header.php");
$dao = new DAOinvoice();
?>
<center><b><u><font face ="Britannic Bold"><h1>Invoice</h1></font></u></b></center><br>
<a href="form.invoice.php" class="btn btn-info">Add Invoice</a><br>
<table class="table table-striped">
	<tr class ="info">
		<td>#</td>
		<td>Customer Name</td>
		<td>Total Amount</td>
		<td>Balance Due</td>
		<td>Invoiced On</td>
		<td>Paid On</td>
		<td><b>Make Payment</b></td>
		<td><b>Edit</b></td>
		<td><b>Delete</b></td>
	</tr>

<?php
$rec_per_page = 10;
if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 1;
$limit1 = ($page-1)*$rec_per_page;
$limit2 = ($page)*$rec_per_page;
$total_recs = $dao->getCount();
$rec = $dao->getAllByUser($_SESSION["uid"],$limit1, $limit2);
$pages = ceil($total_recs/$rec_per_page);
if($page==1)	$prev = $page;
else	$prev=$page-1;

if($page==$pages)	$next = $page;
else	$next=$page+1;
$i = 0;
if($rec)foreach($rec as $row) {
	$i++;
?>
	<tbody>
	<tr>
		<td><? echo $i ?>	</td>
		<td><? echo $row->customer ?>	</td>
		<td><? echo $row->total_amt ?>	</td>
		<td><? echo $row->balance_due ?>	</td>
		<td><? echo $row->inv_date ?>	</td>
		<td><? echo $row->paid_date ?>	</td>
		<th> Pay Now	</th>
		<th><a href='form.invoice.php?id=<? echo $row->inv_num ?>'><img src="img/edit.png" width = 20 height = 20/></a></th>
		<th><a href='delete.invoice.php?id=<? echo $row->inv_num ?>'><img src="img/del.png" width = 20 height = 20/></a></th>
	</tr>
	<tbody>
<?}
else echo "<tr><td colspan='9'><center><br><br><br><b>No Invoices are added yet.</b></center></td></tr>";
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="invoice.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="invoice.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="invoice.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="invoice.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
