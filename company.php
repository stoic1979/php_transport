<?php
include("class.company.dao.php");
include_once("header.php");
$dao = new DAOcompany();
?>

<a href="form.company.php" class="btn btn-success" role="button">Add Company</a> <br><br>
<table class="table">
    <thead>
	<tr class="success">
		<td>Comp_id</td>
		<td>Uid</td>
		<td>Title</td>
		<td>Phone</td>
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
$rec = $dao->getAll($limit1, $limit2);
$pages = ceil($total_recs/$rec_per_page);
if($page==1)	$prev = $page;
else	$prev=$page-1;

if($page==$pages)	$next = $page;
else	$next=$page+1;

foreach($rec as $row) {
?>
	<tbody>
	<tr class="danger">
		<td><? echo $row->comp_id ?>	</td>
		<td><? echo $row->uid ?>	</td>
		<td><? echo $row->title ?>	</td>
		<td><? echo $row->phone ?>	</td>
		<td><? echo $row->address ?>	</td>
		<th><a href='form.company.php?id=<? echo $row->comp_id ?>'><img src="img/edit.png" /></a></th>
		<th><a href='delete.company.php?id=<? echo $row->comp_id ?>'><img src="img/del.png" /></a></th>
	</tr>
	</tbody>
<?}
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
