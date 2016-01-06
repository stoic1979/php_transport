<script type = "text/javascript" >
	function validateDispatch(){ 

		var uid =  document.forms["frmDispatch"]["uid"].value; 
		var carrier =  document.forms["frmDispatch"]["carrier"].value; 
		var phone =  document.forms["frmDispatch"]["phone"].value; 
		var pieces =  document.forms["frmDispatch"]["pieces"].value; 
		var space =  document.forms["frmDispatch"]["space"].value; 
		var act_wgt =  document.forms["frmDispatch"]["act_wgt"].value; 
		var as_wgt =  document.forms["frmDispatch"]["as_wgt"].value; 
		var type =  document.forms["frmDispatch"]["type"].value; 
		var attention =  document.forms["frmDispatch"]["attention"].value; 
		var reference =  document.forms["frmDispatch"]["reference"].value; 
		var trailer_id =  document.forms["frmDispatch"]["trailer_id"].value; 
		var truck_id =  document.forms["frmDispatch"]["truck_id"].value; 
		var pay_code =  document.forms["frmDispatch"]["pay_code"].value; 
		var pay_type =  document.forms["frmDispatch"]["pay_type"].value; 
		var rate =  document.forms["frmDispatch"]["rate"].value; 
		var total =  document.forms["frmDispatch"]["total"].value; 
		

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(carrier == null || carrier == ""){
			alert("make can't be empty");
			return false;
		}
		if(phone == null || phone == ""){
			alert("yr_model can't be empty");
			return false;
		}
		if(pieces == null || pieces == ""){
			alert("yr_first_sold can't be empty");
			return false;
		}
		if(space == null || space == ""){
			alert("vlf_class can't be empty");
			return false;
		}
		if(act_wgt == null || act_wgt == ""){
			alert("type_veh can't be empty");
			return false;
		}
		if(as_wgt == null || as_wgt == ""){
			alert("type_lic can't be empty");
			return false;
		}
		if(type == null || type == ""){
			alert("license_num can't be empty");
			return false;
		}
		if(attention == null || attention == ""){
			alert("body_type_model can't be empty");
			return false;
		}
		if(reference == null || reference == ""){
			alert("mp can't be empty");
			return false;
		}
		if(trailer_id == null || trailer_id == ""){
			alert("mo can't be empty");
			return false;
		}
		if(truck_id == null || truck_id == ""){
			alert("ax can't be empty");
			return false;
		}
		if(pay_code == null || pay_code == ""){
			alert("wc can't be empty");
			return false;
		}
		if(pay_type == null || pay_type == ""){
			alert("unladen_g_cgw can't be empty");
			return false;
		}
		if(rate == null || rate == ""){
			alert("vehicle_id_num can't be empty");
			return false;
		}
		if(total == null || total == ""){
			alert("type_vehicle_use can't be empty");
			return false;
		}
		
		return true;
	}
</script>
<?php
include("header.php");
session_start();
include("class.dispatch.dao.php");
include_once ("db.php");
include("class.truck.dao.php");
include("class.trailer.dao.php");
 $dao 		= new DAOtruck();
 //$truckList = array();
 $truckList = $dao->getVehicleId($_SESSION["uid"]);
 $daoTrailer= new DAOtrailer();
 $trailerList = $daoTrailer->getVehicleId($_SESSION["uid"]);
 $count 	= count($truckList);
?>
<center>
	<h3>Add Dispatch</h3>
<form name = "frmDispatch" method="POST" action="save.dispatch.php"  onsubmit = "return validateDispatch();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOdispatch();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> Carrier </td>
				<td><input type = "text" name = "carrier" style="width:198px" value= "<?=$vo->carrier?> "/></td>
			</tr>
			<tr>
				<td> Phone </td>
				<td><input type = "text" name = "phone" style="width:198px" value= "<?=$vo->phone?> "/></td>
			</tr>
			<tr>
				<td> Pieces </td>
				<td><input type = "text" name = "pieces" style="width:198px" value= "<?=$vo->pieces?> "/></td>
			</tr>
			<tr>
				<td> Space </td>
				<td><input type = "text" name = "space" style="width:198px" value= "<?=$vo->space?> "/></td>
			</tr>
			<tr>
				<td> Actual Weight </td>
				<td><input type = "text" name = "act_wgt" style="width:198px" value= "<?=$vo->act_wgt?> "/></td>
			</tr>
			<tr>
				<td> Assumed Weight </td>
				<td><input type = "text" name = "as_wgt" style="width:198px" value= "<?=$vo->as_wgt?> "/></td>
			</tr>
			<tr>
				<td> Type </td>
				<td><input type = "text" name = "type" style="width:198px" value= "<?=$vo->type?> "/></td>
			</tr>
			<tr>
				<td> Attention </td>
				<td><input type = "text" name = "attention" style="width:198px" value= "<?=$vo->attention?> "/></td>
			</tr>
			<tr>
				<td> Reference </td>
				<td><input type = "text" name = "reference" style="width:198px" value= "<?=$vo->reference?> "/></td>
			</tr>
			<tr>
				<td> Trailer Id </td>
				<td><select name = "trailer_id" style="width:198px" value = "<?=$vo->trailer_id?>">
                    <?php
                    foreach( $trailerList as $name){ 
                        echo "<option value=\"$name\">$name</option>";}
                    ?>
                   </select>
               </td>
			</tr>
			<tr>
				<td> Truck Id </td>
				<td><select name = "truck_id" style="width:198px" value = "<?=$vo->truck_id?>">
                    <?php
                    foreach( $truckList as $name){ 
                        echo "<option value=\"$name\">$name</option>";}
                    ?>
                   </select>
                </td>
			</tr>
			<tr>
				<td> Pay Code </td>
				<td><input type = "text" name = "pay_code" style="width:198px" value= "<?=$vo->pay_code?> "/></td>
			</tr>
			<tr>
				<td> Pay Type </td>
				<td><input type = "text" name = "pay_type" style="width:198px" value= "<?=$vo->pay_type?> "/></td>
			</tr>
			<tr>
				<td> Rate </td>
				<td><input type = "text" name = "rate" style="width:198px" value= "<?=$vo->rate?> "/></td>
			</tr>
			<tr>
				<td> Total </td>
				<td><input type = "text" name = "total" style="width:198px" value= "<?=$vo->total?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "did" value= "<?=$vo->did?> "/>
		<?}else{?>
		<tr>
				<td> Carrier </td>
				<td><input type = "text" style="width:198px" name = "carrier" /></td>
			</tr>
			<tr>
				<td> Phone </td>
				<td><input type = "text" style="width:198px" name = "phone" /></td>
			</tr>
			<tr>
				<td> Pieces </td>
				<td><input type = "text" style="width:198px" name = "pieces" /></td>
			</tr>
			<tr>
				<td> Space </td>
				<td><input type = "text" style="width:198px" name = "space" /></td>
			</tr>
			<tr>
				<td> Actual Weight </td>
				<td><input type = "text" style="width:198px" name = "act_wgt" /></td>
			</tr>
			<tr>
				<td> Assumed Weight </td>
				<td><input type = "text" style="width:198px" name = "as_wgt" /></td>
			</tr>
			<tr>
				<td> Type </td>
				<td><input type = "text" style="width:198px" name = "type" /></td>
			</tr>
			<tr>
				<td> Attention </td>
				<td><input type = "text" style="width:198px" name = "attention" /></td>
			</tr>
			<tr>
				<td> Reference </td>
				<td><input type = "text" style="width:198px" name = "reference" /></td>
			</tr>
			<tr>
				<td> Trailer Id </td>
				<td><select name = "trailer_id" style="width:198px">
                    <?php
                    foreach( $trailerList as $name){ 
                        echo "<option value=\"$name\">$name</option>";}
                    ?>
                   </select>
               </td>
			</tr>
			<tr>
				<td> Truck Id </td>
				<td><select name = "truck_id" style="width:198px">
                    <?php
                    foreach( $truckList as $name){ 
                        echo "<option value=\"$name\">$name</option>";}
                    ?>
                   </select>
               </td>
			</tr>
			<tr>
				<td> Pay Code </td>
				<td><input type = "text" style="width:198px" name = "pay_code" /></td>
			</tr>
			<tr>
				<td> Pay Type </td>
				<td><input type = "text" style="width:198px" name = "pay_type" /></td>
			</tr>
			<tr>
				<td> Rate </td>
				<td><input type = "text" style="width:198px" name = "rate" /></td>
			</tr>
			<tr>
				<td> Total </td>
				<td><input type = "text" style="width:198px" name = "total" /></td>
			</tr>
			
			<tr colspan = "2">
				<th><input type = "submit" class="btn btn-info" value= "ADD"  /></th>
			</tr>
		<?}?>
	</table>
</form>
</center>
<?
include("footer.php");
?>
