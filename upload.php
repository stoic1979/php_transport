<?php
session_start();
include("class.upload.dao.php");
include_once("header.php");
$dao = new DAOupload();
?>
<a href="form.upload.php" class="btn btn-info">Add upload</a><br><br>
<table class="table table-striped">
	<tr class ="info">
		<td>#</td>
		<td>Title</td>
		<td>Type</td>
		<td>Date</td>
		<td>Image</td>
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
		<td><? echo $row->title ?>	</td>
		<td><? echo $row->type ?>	</td>
		<td><? echo $row->date ?>	</td>
		<td><? echo $row->img ?>	</td>
		<th><a href='form.upload.php?id=<? echo $row->upload_id ?>'><img src="img/edit.png" /></a></th>
		<th><a href='delete.upload.php?id=<? echo $row->upload_id ?>'><img src="img/del.png" /></a></th>
	</tr>
	</tbody>
<?}
else echo "<tr><td colspan='6'><center><br><br><br><b>No Uploads are added yet.</b></center></td></tr>";
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="upload.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="upload.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="upload.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="upload.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
