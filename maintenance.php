<?php
session_start();
include("class.expense.dao.php");
include_once("header.php");
$dao = new DAOexpense();
$expense_type = $_GET["type"];
?>
<center><b><u><font face ="Britannic Bold"><h1>Maintenance</h1></font></u></b></center><br>
<a href="form.expense.php?type=<?php echo $expense_type; ?>" class="btn btn-info">Add Maintenance</a><br>
<table class="table table-striped">
	<tr class ="info">
		<td>#</td>
		<td>Expenditure Date</td>
		<td>Category</td>
		<td>Truck</td>
		<td>Description</td>
		<td>Amount</td>
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

$rec = $dao->getAllByUser($_SESSION["uid"],$expense_type,$limit1, $limit2);
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
		<td><? echo $row->expense_date ?>	</td>
		<td><? echo $row->category ?>	</td>
		<td><? echo $row->truck_id ?>	</td>
		<td><? echo $row->description ?>	</td>
		<td><? echo $row->amount ?>	</td>
		<th><a href='form.expense.php?id=<? echo $row->expense_id ?>'><img src="img/edit.png" width = 20 height = 20/></a></th>
		<th><a href='delete.expense.php?id=<? echo $row->expense_id ?>'><img src="img/del.png" width = 20 height = 20/></a></th>
	</tr>
	<tbody>
<?}
else echo "<tr><td colspan='9'><center><br><br><br><b>No Maintenance is added yet.</b></center></td></tr>";
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="maintenance.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="maintenance.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="maintenance.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="maintenance.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
