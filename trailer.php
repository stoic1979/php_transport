<?php
session_start();
include("class.trailer.dao.php");
include_once("header.php");
$dao = new DAOtrailer();
?>
<a href="form.trailer.php" class="btn btn-info">Add trailer</a>
<table class="table table-striped">
	<tr class ="info">
		<td>#</td>
		<td>Make</td>
		<td>Year Model</td>
		<td>Year First Sold</td>
		<td>Vlf Class</td>
		<td>Vehicle Type</td>
		<td>License Type</td>
		<td>License Number</td>
		<td>Model Body Type</td>
		<td>MP</td>
		<td>MO</td>
		<td>AX</td>
		<td>WC</td>
		<td>Unladen G Cgw</td>
		<td>Vehicle Id Num</td>
		<td>Vehicle Use Type</td>
		<td>Date Issued</td>
		<td>Cc Alco</td>
		<td>Date Fee Recieved</td>
		<td>Picture</td>
		<td>Registered Owner</td>
		<td>Amount Due</td>
		<td>Amount Recieved</td>
		<td>Amount Paid</td>
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
if ($rec) foreach($rec as $row) {
	$i++;
?>
	<tr>
	<tbody>
		<td><? echo $i ?>	</td>
		<td><? echo $row->make ?>	</td>
		<td><? echo $row->yr_model ?>	</td>
		<td><? echo $row->yr_first_sold ?>	</td>
		<td><? echo $row->vlf_class ?>	</td>
		<td><? echo $row->type_veh ?>	</td>
		<td><? echo $row->type_lic ?>	</td>
		<td><? echo $row->license_num ?>	</td>
		<td><? echo $row->body_type_model ?>	</td>
		<td><? echo $row->mp ?>	</td>
		<td><? echo $row->mo ?>	</td>
		<td><? echo $row->ax ?>	</td>
		<td><? echo $row->wc ?>	</td>
		<td><? echo $row->unladen_g_cgw ?>	</td>
		<td><? echo $row->vehicle_id_num ?>	</td>
		<td><? echo $row->type_vehicle_use ?>	</td>
		<td><? echo $row->date_issued ?>	</td>
		<td><? echo $row->cc_alco ?>	</td>
		<td><? echo $row->dt_fee_recvd ?>	</td>
		<td><? echo $row->pic ?>	</td>
		<td><? echo $row->registered_owner ?>	</td>
		<td><? echo $row->amount_due ?>	</td>
		<td><? echo $row->amount_recvd ?>	</td>
		<td><? echo $row->amount_paid ?>	</td>
		<th><a href='form.trailer.php?id=<? echo $row->trailer_id ?>'><img src="img/edit.png" /></a></th>
		<th><a href='delete.trailer.php?id=<? echo $row->trailer_id ?>'><img src="img/del.png" /></a></th>
	</tr>
	</tbody>
<?}
else echo "<tr><td colspan='15'><center><br><br><br><b>No Trailers are added yet.</b></center></td></tr>";
?>
</table>
<?
if($page != 1){
?>&nbsp;&nbsp;<a href="trailer.php?page=<?=$prev?>" style="margin-right:20px">Prev</a>
<?}
for ($p =1; $p<=$pages ; $p++){
 ?>&nbsp;&nbsp;<a href="trailer.php?page=<?=$p?>"><?=$p."/".$pages?></a>
<?
}
if($page != $pages){
?><a href="trailer.php?page=<?=$next?>" style="margin-left:20px">Next</a>
<a href="trailer.php?page=<?=$pages?>"style="margin-left:12px">Last</a><br />
<?}
?>
<?php
include("footer.php");
?>
