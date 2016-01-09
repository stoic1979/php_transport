<?php
session_start();
include("class.company.dao.php");
include_once("header.php");
$dao = new DAOcompany();
?>
<center><b><u><font face ="Britannic Bold"><h1>Company</h1></font></u></b></center><br><br><br>
<a href="form.company.php" class="btn btn-success" role="button">Add Company</a> <br><br>
<table class="table table-striped">
    <thead>
	<tr class ="info">
		<td>#</td>
		<td>Title</td>
		<td>Phone</td>
		<td>Fax</td>
		<td>Email</td>
		<td>City</td>
		<td>State</td>
		<td>Pin Code</td>
		<td>Country</td>
		<td>Address</td>
		<td><b>Edit</b></td>
		<td><b>Delete</b></td>
	</tr>
    </thead>

<?php
$rec_per_page = 10;
if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 1;
$limit1 = ($page-1)*$rec_per_page;
$limit2 = ($page)*$rec_per_page;
$total_recs = $dao->getCount();
$rec = $dao->getAllByUser($_SESSION["uid"], $limit1, $limit2);
$pages = ceil($total_recs/$rec_per_page);
if($page==1)	$prev = $page;
else	$prev=$page-1;

if($page==$pages)	$next = $page;
else	$next=$page+1;

$i = 0;
if ($rec) foreach($rec as $row) {
	$i++;
?>
	<tbody>
	<tr>
		<td><? echo $i; ?>	</td>
		<td><? echo $row->title ?>	</td>
		<td><? echo $row->phone ?>	</td>
		<td><? echo $row->fax ?>	</td>
		<td><? echo $row->email ?>	</td>
		<td><? echo $row->city ?>	</td>
		<td><? echo $row->state ?>	</td>
		<td><? echo $row->pin_code ?>	</td>
		<td><? echo $row->country ?>	</td>
		<td><? echo $row->address ?>	</td>
		<th><a href='form.company.php?id=<? echo $row->comp_id ?>'><img src="img/edit.png" width = 20 height = 20/></a></th>
		<th><a href='delete.company.php?id=<? echo $row->comp_id ?>'><img src="img/del.png" width = 20 height = 20/></a></th>
	</tr>
	</tbody>
<?}
else echo "<tr><td colspan='10'><center><br><br><br><b>No Companies are added yet.</b></center></td></tr>";
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="company.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="company.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="company.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="company.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
