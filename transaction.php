<?php
session_start();
include("class.transaction.dao.php");
include_once("header.php");
$dao = new DAOtransaction();
?>
<center><b><u><font face ="Britannic Bold"><h1>Transaction</h1></font></u></b></center><br><br><br>
<a href="form.transaction.php" class="btn btn-info">Add transaction</a><br><br>
<table class="table table-striped">
	<tr class ="info">
		<td>#</td>
		<td>Title</td>
		<td>Date</td>
		<td>Type</td>
		<td>Info</td>
		<td>Amount</td>
		<td>Sender</td>
		<td>Receiver</td>
		<td>Description</td>
		<td>Is Paid</td>
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
if($rec) foreach($rec as $row) {
	$i++;
?>
	<tr>
	<tbody>
		<td><? echo $i ?>	</td>
		<td><? echo $row->title ?>	</td>
		<td><? echo $row->date ?>	</td>
		<td><? echo $row->type ?>	</td>
		<td><? echo $row->info ?>	</td>
		<td><? echo $row->amount ?>	</td>
		<td><? echo $row->sender ?>	</td>
		<td><? echo $row->receiver ?>	</td>
		<td><? echo $row->description ?>	</td>
		<td><? echo $row->is_paid ?>	</td>
		<th><a href='form.transaction.php?id=<? echo $row->tid ?>'><img src="img/edit.png" width = 20 height = 20/></a></th>
		<th><a href='delete.transaction.php?id=<? echo $row->tid ?>'><img src="img/del.png" width = 20 height = 20/></a></th>
	</tr>
	</tbody>
<?}
else echo "<tr><td colspan='13'><center><br><br><br><b>No Transactions are added yet.</b></center></td></tr>";
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="transaction.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="transaction.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="transaction.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="transaction.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
