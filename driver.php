<?php
include("class.driver.dao.php");
include_once("header.php");
$dao = new DAOdriver();
?>
<a href="form.driver.php">Add driver</a>
<table border="1" width="100%" cellspacing = "5" cellpadding = "5">
	<tr>
		<td>did</td>
		<td>uid</td>
		<td>name</td>
		<td>photo</td>
		<td>address</td>
		<td>email</td>
		<td>phone</td>
		<td>social_security_no</td>
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
		<td><? echo $row->did ?>	</td>
		<td><? echo $row->uid ?>	</td>
		<td><? echo $row->name ?>	</td>
		<td><? echo $row->photo ?>	</td>
		<td><? echo $row->address ?>	</td>
		<td><? echo $row->email ?>	</td>
		<td><? echo $row->phone ?>	</td>
		<td><? echo $row->social_security_no ?>	</td>
		<th><a href='form.driver.php?id=<? echo $row->did ?>'><img src="img/edit.png" /></a></th>
		<th><a href='delete.driver.php?id=<? echo $row->did ?>'><img src="img/del.png" /></a></th>
	</tr>
<?}
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="driver.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="driver.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="driver.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="driver.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
