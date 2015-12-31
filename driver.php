<?php
session_start();
include("class.driver.dao.php");
include_once("header.php");
$dao = new DAOdriver();
?>
<center><b><u><font face ="Britannic Bold"><h1>Driver</h1></font></u></b></center><br><br><br>
<a href="form.driver.php" class="btn btn-info">Add driver</a><br><br>
<table class="table table-striped">
	<tr class ="info">
		<td>#</td>
		<td>Name</td>
		<td>Photo</td>
		<td>Address</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Social Security No</td>
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
	<tbody>
	<tr>
		<td><? echo $i ?>	</td>
		<td><? echo $row->name ?>	</td>
		<td><? echo $row->photo ?>	</td>
		<td><? echo $row->address ?>	</td>
		<td><? echo $row->email ?>	</td>
		<td><? echo $row->phone ?>	</td>
		<td><? echo $row->social_security_no ?>	</td>
		<th><a href='form.driver.php?id=<? echo $row->did ?>'><img src="img/edit.png" /></a></th>
		<th><a href='delete.driver.php?id=<? echo $row->did ?>'><img src="img/del.png" /></a></th>
	</tr>
	</tbody>
<?}
else echo "<tr><td colspan='8'><center><br><br><br><b>No Drivers are added yet.</b></center></td></tr>";
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
