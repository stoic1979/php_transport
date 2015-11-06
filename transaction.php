<?php
include("class.transaction.dao.php");
include_once("header.php");
$dao = new DAOtransaction();
?>
<a href="form.transaction.php">Add transaction</a>
<table border="1" width="100%" cellspacing = "5" cellpadding = "5">
	<tr>
		<td>tid</td>
		<td>uid</td>
		<td>title</td>
		<td>date</td>
		<td>type</td>
		<td>info</td>
		<td>amount</td>
		<td>sender</td>
		<td>receiver</td>
		<td>description</td>
		<td>is_paid</td>
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
$rec = $dao->getAll($limit1, $limit2);
$pages = ceil($total_recs/$rec_per_page);
if($page==1)	$prev = $page;
else	$prev=$page-1;

if($page==$pages)	$next = $page;
else	$next=$page+1;

foreach($rec as $row) {
?>
	<tr>
		<td><? echo $row->tid ?>	</td>
		<td><? echo $row->uid ?>	</td>
		<td><? echo $row->title ?>	</td>
		<td><? echo $row->date ?>	</td>
		<td><? echo $row->type ?>	</td>
		<td><? echo $row->info ?>	</td>
		<td><? echo $row->amount ?>	</td>
		<td><? echo $row->sender ?>	</td>
		<td><? echo $row->receiver ?>	</td>
		<td><? echo $row->description ?>	</td>
		<td><? echo $row->is_paid ?>	</td>
		<th><a href='form.transaction.php?id=<? echo $row->tid ?>'><img src="img/edit.png" /></a></th>
		<th><a href='delete.transaction.php?id=<? echo $row->tid ?>'><img src="img/del.png" /></a></th>
	</tr>
<?}
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
