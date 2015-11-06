<?php
include("class.customer.dao.php");
include_once("header.php");
$dao = new DAOcustomer();
?>
<a href="form.customer.php">Add customer</a>
<table border="1" width="100%" cellspacing = "5" cellpadding = "5">
	<tr>
		<td>cust_id</td>
		<td>uid</td>
		<td>name</td>
		<td>firm_name</td>
		<td>address</td>
		<td>phone</td>
		<td>email</td>
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
		<td><? echo $row->cust_id ?>	</td>
		<td><? echo $row->uid ?>	</td>
		<td><? echo $row->name ?>	</td>
		<td><? echo $row->firm_name ?>	</td>
		<td><? echo $row->address ?>	</td>
		<td><? echo $row->phone ?>	</td>
		<td><? echo $row->email ?>	</td>
		<th><a href='form.customer.php?id=<? echo $row->cust_id ?>'><img src="img/edit.png" /></a></th>
		<th><a href='delete.customer.php?id=<? echo $row->cust_id ?>'><img src="img/del.png" /></a></th>
	</tr>
<?}
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="customer.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="customer.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="customer.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="customer.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
