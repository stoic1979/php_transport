<script type = "text/javascript" >

		

	function validateDispatch(){ 

		var uid =  document.forms["frmDispatch"]["uid"].value; 
		var carrier =  document.forms["frmDispatch"]["carrier"].value;
		var pickup_num =  document.forms["frmDispatch"]["pickup_num"].value; 
		var pieces =  document.forms["frmDispatch"]["pieces"].value; 
		var space =  document.forms["frmDispatch"]["space"].value; 
		var act_wgt =  document.forms["frmDispatch"]["act_wgt"].value; 
		var as_wgt =  document.forms["frmDispatch"]["as_wgt"].value; 
		var type =  document.forms["frmDispatch"]["type"].value;
		var pallets =  document.forms["frmDispatch"]["pallets"].value; 
		var temp =  document.forms["frmDispatch"]["temp"].value;
		var miles =  document.forms["frmDispatch"]["miles"].value;
		var load_num =  document.forms["frmDispatch"]["load_num"].value;
		var load_terms =  document.forms["frmDispatch"]["load_terms"].value;
		var attention =  document.forms["frmDispatch"]["attention"].value; 
		var reference =  document.forms["frmDispatch"]["reference"].value; 
		var trailer_id =  document.forms["frmDispatch"]["trailer_id"].value; 
		var truck_id =  document.forms["frmDispatch"]["truck_id"].value; 
		var pay_code =  document.forms["frmDispatch"]["pay_code"].value; 
		var pay_type =  document.forms["frmDispatch"]["pay_type"].value; 
		var rate =  document.forms["frmDispatch"]["rate"].value; 
		var advance =  document.forms["frmDispatch"]["advance"].value;
		var total =  document.forms["frmDispatch"]["total"].value; 
		var bill_to =  document.forms["frmDispatch"]["bill_to"].value;
		var from_address =  document.forms["frmDispatch"]["from_address"].value;
		var to_address =  document.forms["frmDispatch"]["to_address"].value;
		

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		
		if(carrier == null || carrier == ""){
			alert("carrier can't be empty");
			return false;
		}
		if(pickup_num == null || pickup_num == ""){
			alert("pickup_num can't be empty");
			return false;
		}
		
		if(pieces == null || pieces == ""){
			alert("pieces can't be empty");
			return false;
		}
		if(space == null || space == ""){
			alert("space can't be empty");
			return false;
		}
		if(act_wgt == null || act_wgt == ""){
			alert("act_wgt can't be empty");
			return false;
		}
		if(as_wgt == null || as_wgt == ""){
			alert("as_wgt can't be empty");
			return false;
		}
		if(type == null || type == ""){
			alert("type can't be empty");
			return false;
		}
		if(pallets == null || pallets == ""){
			alert("pallets can't be empty");
			return false;
		}
		if(temp == null || temp == ""){
			alert("temp can't be empty");
			return false;
		}
		if(miles == null || miles == ""){
			alert("miles can't be empty");
			return false;
		}
		if(load_num == null || load_num == ""){
			alert("load_num can't be empty");
			return false;
		}
		if(load_terms == null || load_terms == ""){
			alert("load_terms can't be empty");
			return false;
		}
		if(attention == null || attention == ""){
			alert("attention can't be empty");
			return false;
		}
		if(reference == null || reference == ""){
			alert("reference can't be empty");
			return false;
		}
		if(trailer_id == null || trailer_id == ""){
			alert("trailer_id can't be empty");
			return false;
		}
		if(truck_id == null || truck_id == ""){
			alert("truck_id can't be empty");
			return false;
		}
		if(pay_code == null || pay_code == ""){
			alert("pay_code can't be empty");
			return false;
		}
		if(pay_type == null || pay_type == ""){
			alert("pay_type can't be empty");
			return false;
		}
		if(rate == null || rate == ""){
			alert("rate can't be empty");
			return false;
		}
		if(advance == null || advance == ""){
			alert("advance can't be empty");
			return false;
		}
		if(total == null || total == ""){
			alert("total can't be empty");
			return false;
		}
		if(bill_to == null || bill_to == ""){
			alert("bill_to can't be empty");
			return false;
		}
		if(from_address == null || from_address == ""){
			alert("from_address can't be empty");
			return false;
		}
		if(to_address == null || to_address == ""){
			alert("to_address can't be empty");
			return false;
		}
		return true;
	}
</script>
<?php
session_start();
include("header.php");

include("class.dispatch.dao.php");
include("class.company.dao.php");
include_once ("db.php");
include("class.truck.dao.php");
include("class.trailer.dao.php");
 $dao 		= new DAOtruck();
 $truckList = $dao->getVehicleId($_SESSION["uid"],1);
 $daoTrailer= new DAOtrailer();
 $trailerList = $daoTrailer->getVehicleId($_SESSION["uid"],1);
 $count 	= count($truckList);
 $daoCompany= new DAOcompany();
 $companyList = $daoCompany->getCompany($_SESSION["uid"]);
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
				<td><select name = "carrier" style="width:198px" value = "<?=$vo->carrier?>">
					<option selected value="<?=$vo->carrier?>"><?=$vo->carrier?></option>
                    <?php
                    foreach( $companyList as $name){ 
                        echo "<option value=\"$name->comp_id\">$name->title</option>";}
                    ?>
                   </select>
               </td>
			</tr>
			<tr>
				<td> Pick Up Number </td>
				<td><input type = "text" name = "pickup_num" style="width:198px" value= "<?=$vo->pickup_num?> "/></td>
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
				<td> Pallets </td>
				<td><input type = "text" name = "pallets" style="width:198px" value= "<?=$vo->pallets?> "/></td>
			</tr>
			<tr>
				<td> Temp </td>
				<td><input type = "text" name = "temp" style="width:198px" value= "<?=$vo->temp?> "/></td>
			</tr>
			<tr>
				<td> Miles </td>
				<td><input type = "text" name = "miles" style="width:198px" value= "<?=$vo->miles?> "/></td>
			</tr>
			<tr>
				<td> Load# </td>
				<td><input type = "text" name = "load_num" style="width:198px" value= "<?=$vo->load_num?> "/></td>
			</tr>
			<tr>
				<td> Terms </td>
				<td><input type = "text" name = "load_terms" style="width:198px" value= "<?=$vo->load_terms?> "/></td>
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
					<option selected value="<?=$vo->trailer_id?>"><?=$vo->trailer_id?></option>
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
					<option selected value="<?=$vo->truck_id?>"><?=$vo->truck_id?></option>
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
				<td> Advance </td>
				<td><input type = "text" name = "advance" style="width:198px" value= "<?=$vo->advance?> "/></td>
			</tr>
			<tr>
				<td> Total </td>
				<td><input type = "text" name = "total" style="width:198px" value= "<?=$vo->total?> "/></td>
			</tr>
			<tr>
				<td> Bill To </td>
				<td><input type = "text" name = "bill_to" style="width:198px" value= "<?=$vo->bill_to?> "/></td>
			</tr>
			<tr>
				<td> From Address </td>
				<td><input type = "text" name = "from_address" style="width:198px" value= "<?=$vo->from_address?> "/></td>
			</tr>
			<tr>
				<td> To Address </td>
				<td><input type = "text" name = "to_address" style="width:198px" value= "<?=$vo->to_address?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "did" value= "<?=$vo->did?> "/>
		<?}else{?>
			
			<tr>
				<td> Carrier </td>
				<td><select name = "carrier" style="width:198px">
                    <?php
                    foreach( $companyList as $name){ 
                        echo "<option value=\"$name->comp_id\">$name->title</option>";}
                    ?>
                   </select>
               </td>
			</tr>
			<tr>
				<td> Pick Up Number </td>
				<td><input type = "text" name = "pickup_num" style="width:198px"/></td>
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
				<td> Pallets </td>
				<td><input type = "text" style="width:198px" name = "pallets" /></td>
			</tr>
			<tr>
				<td> Temp </td>
				<td><input type = "text" style="width:198px" name = "temp" /></td>
			</tr>
			<tr>
				<td> Miles </td>
				<td><input type = "text" style="width:198px" name = "miles" /></td>
			</tr>
			<tr>
				<td> Load# </td>
				<td><input type = "text" style="width:198px" name = "load_num" /></td>
			</tr>
			<tr>
				<td> Terms </td>
				<td><input type = "text" style="width:198px" name = "load_terms" /></td>
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
				<td> Advance </td>
				<td><input type = "text" style="width:198px" name = "advance" /></td>
			</tr>
			<tr>
				<td> Total </td>
				<td><input type = "text" style="width:198px" name = "total" /></td>
			</tr>
			<tr>
				<td> Bill To </td>
				<td><input type = "text" style="width:198px" name = "bill_to" /></td>
			</tr>
			<tr>
				<td> From Address </td>
				<td><input type = "text" style="width:198px" name = "from_address" /></td>
			</tr>
			<tr>
				<td> To Address </td>
				<td><input type = "text" style="width:198px" name = "to_address" /></td>
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
