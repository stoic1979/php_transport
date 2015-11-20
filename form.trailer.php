<script type = "text/javascript" >
	function validateTrailer(){ 

		var uid =  document.forms["frmTrailer"]["uid"].value; 
		var make =  document.forms["frmTrailer"]["make"].value; 
		var yr_model =  document.forms["frmTrailer"]["yr_model"].value; 
		var yr_first_sold =  document.forms["frmTrailer"]["yr_first_sold"].value; 
		var vlf_class =  document.forms["frmTrailer"]["vlf_class"].value; 
		var type_veh =  document.forms["frmTrailer"]["type_veh"].value; 
		var type_lic =  document.forms["frmTrailer"]["type_lic"].value; 
		var license_num =  document.forms["frmTrailer"]["license_num"].value; 
		var body_type_model =  document.forms["frmTrailer"]["body_type_model"].value; 
		var mp =  document.forms["frmTrailer"]["mp"].value; 
		var mo =  document.forms["frmTrailer"]["mo"].value; 
		var ax =  document.forms["frmTrailer"]["ax"].value; 
		var wc =  document.forms["frmTrailer"]["wc"].value; 
		var unladen_g_cgw =  document.forms["frmTrailer"]["unladen_g_cgw"].value; 
		var vehicle_id_num =  document.forms["frmTrailer"]["vehicle_id_num"].value; 
		var type_vehicle_use =  document.forms["frmTrailer"]["type_vehicle_use"].value; 
		var date_issued =  document.forms["frmTrailer"]["date_issued"].value; 
		var cc_alco =  document.forms["frmTrailer"]["cc_alco"].value; 
		var dt_fee_recvd =  document.forms["frmTrailer"]["dt_fee_recvd"].value; 
		var pic =  document.forms["frmTrailer"]["pic"].value; 
		var registered_owner =  document.forms["frmTrailer"]["registered_owner"].value; 
		var amount_due =  document.forms["frmTrailer"]["amount_due"].value; 
		var amount_recvd =  document.forms["frmTrailer"]["amount_recvd"].value; 
		var amount_paid =  document.forms["frmTrailer"]["amount_paid"].value; 

		if(uid == null || uid == ""){
			alert("uid can't be empty");
			return false;
		}
		if(make == null || make == ""){
			alert("make can't be empty");
			return false;
		}
		if(yr_model == null || yr_model == ""){
			alert("yr_model can't be empty");
			return false;
		}
		if(yr_first_sold == null || yr_first_sold == ""){
			alert("yr_first_sold can't be empty");
			return false;
		}
		if(vlf_class == null || vlf_class == ""){
			alert("vlf_class can't be empty");
			return false;
		}
		if(type_veh == null || type_veh == ""){
			alert("type_veh can't be empty");
			return false;
		}
		if(type_lic == null || type_lic == ""){
			alert("type_lic can't be empty");
			return false;
		}
		if(license_num == null || license_num == ""){
			alert("license_num can't be empty");
			return false;
		}
		if(body_type_model == null || body_type_model == ""){
			alert("body_type_model can't be empty");
			return false;
		}
		if(mp == null || mp == ""){
			alert("mp can't be empty");
			return false;
		}
		if(mo == null || mo == ""){
			alert("mo can't be empty");
			return false;
		}
		if(ax == null || ax == ""){
			alert("ax can't be empty");
			return false;
		}
		if(wc == null || wc == ""){
			alert("wc can't be empty");
			return false;
		}
		if(unladen_g_cgw == null || unladen_g_cgw == ""){
			alert("unladen_g_cgw can't be empty");
			return false;
		}
		if(vehicle_id_num == null || vehicle_id_num == ""){
			alert("vehicle_id_num can't be empty");
			return false;
		}
		if(type_vehicle_use == null || type_vehicle_use == ""){
			alert("type_vehicle_use can't be empty");
			return false;
		}
		if(date_issued == null || date_issued == ""){
			alert("date_issued can't be empty");
			return false;
		}
		if(cc_alco == null || cc_alco == ""){
			alert("cc_alco can't be empty");
			return false;
		}
		if(dt_fee_recvd == null || dt_fee_recvd == ""){
			alert("dt_fee_recvd can't be empty");
			return false;
		}
		if(pic == null || pic == ""){
			alert("pic can't be empty");
			return false;
		}
		if(registered_owner == null || registered_owner == ""){
			alert("registered_owner can't be empty");
			return false;
		}
		if(amount_due == null || amount_due == ""){
			alert("amount_due can't be empty");
			return false;
		}
		if(amount_recvd == null || amount_recvd == ""){
			alert("amount_recvd can't be empty");
			return false;
		}
		if(amount_paid == null || amount_paid == ""){
			alert("amount_paid can't be empty");
			return false;
		}

		return true;
	}
</script>
<?php
include("header.php");
include("class.trailer.dao.php");
?>
<center>
<form name = "frmTrailer" method="POST" action="save.trailer.php"  onsubmit = "return validateTrailer();">
	<table cellspacing="5" cellpadding="5">
		<?php
		if(isset($_GET["id"])){
			$dao = new DAOtrailer();
			$vo = $dao->get($_GET["id"]);
		?>
			<tr>
				<td> uid </td>
				<td><input type = "text" name = "uid" value= "<?=$vo->uid?> "/></td>
			</tr>
			<tr>
				<td> make </td>
				<td><input type = "text" name = "make" value= "<?=$vo->make?> "/></td>
			</tr>
			<tr>
				<td> yr_model </td>
				<td><input type = "text" name = "yr_model" value= "<?=$vo->yr_model?> "/></td>
			</tr>
			<tr>
				<td> yr_first_sold </td>
				<td><input type = "text" name = "yr_first_sold" value= "<?=$vo->yr_first_sold?> "/></td>
			</tr>
			<tr>
				<td> vlf_class </td>
				<td><input type = "text" name = "vlf_class" value= "<?=$vo->vlf_class?> "/></td>
			</tr>
			<tr>
				<td> type_veh </td>
				<td><input type = "text" name = "type_veh" value= "<?=$vo->type_veh?> "/></td>
			</tr>
			<tr>
				<td> type_lic </td>
				<td><input type = "text" name = "type_lic" value= "<?=$vo->type_lic?> "/></td>
			</tr>
			<tr>
				<td> license_num </td>
				<td><input type = "text" name = "license_num" value= "<?=$vo->license_num?> "/></td>
			</tr>
			<tr>
				<td> body_type_model </td>
				<td><input type = "text" name = "body_type_model" value= "<?=$vo->body_type_model?> "/></td>
			</tr>
			<tr>
				<td> mp </td>
				<td><input type = "text" name = "mp" value= "<?=$vo->mp?> "/></td>
			</tr>
			<tr>
				<td> mo </td>
				<td><input type = "text" name = "mo" value= "<?=$vo->mo?> "/></td>
			</tr>
			<tr>
				<td> ax </td>
				<td><input type = "text" name = "ax" value= "<?=$vo->ax?> "/></td>
			</tr>
			<tr>
				<td> wc </td>
				<td><input type = "text" name = "wc" value= "<?=$vo->wc?> "/></td>
			</tr>
			<tr>
				<td> unladen_g_cgw </td>
				<td><input type = "text" name = "unladen_g_cgw" value= "<?=$vo->unladen_g_cgw?> "/></td>
			</tr>
			<tr>
				<td> vehicle_id_num </td>
				<td><input type = "text" name = "vehicle_id_num" value= "<?=$vo->vehicle_id_num?> "/></td>
			</tr>
			<tr>
				<td> type_vehicle_use </td>
				<td><input type = "text" name = "type_vehicle_use" value= "<?=$vo->type_vehicle_use?> "/></td>
			</tr>
			<tr>
				<td> date_issued </td>
				<td><input type = "text" name = "date_issued" value= "<?=$vo->date_issued?> "/></td>
			</tr>
			<tr>
				<td> cc_alco </td>
				<td><input type = "text" name = "cc_alco" value= "<?=$vo->cc_alco?> "/></td>
			</tr>
			<tr>
				<td> dt_fee_recvd </td>
				<td><input type = "text" name = "dt_fee_recvd" value= "<?=$vo->dt_fee_recvd?> "/></td>
			</tr>
			<tr>
				<td> pic </td>
				<td><input type = "text" name = "pic" value= "<?=$vo->pic?> "/></td>
			</tr>
			<tr>
				<td> registered_owner </td>
				<td><input type = "text" name = "registered_owner" value= "<?=$vo->registered_owner?> "/></td>
			</tr>
			<tr>
				<td> amount_due </td>
				<td><input type = "text" name = "amount_due" value= "<?=$vo->amount_due?> "/></td>
			</tr>
			<tr>
				<td> amount_recvd </td>
				<td><input type = "text" name = "amount_recvd" value= "<?=$vo->amount_recvd?> "/></td>
			</tr>
			<tr>
				<td> amount_paid </td>
				<td><input type = "text" name = "amount_paid" value= "<?=$vo->amount_paid?> "/></td>
			</tr>
			<tr colspan = "2">
				<th><input type = "submit" value= "EDIT"  /></th>
			</tr>
			<input type = "hidden" name = "trailer_id" value= "<?=$vo->trailer_id?> "/>
		<?}else{?>
			<tr>
				<td> uid </td>
				<td><input type = "text" name = "uid" /></td>
			</tr>
			<tr>
				<td> make </td>
				<td><input type = "text" name = "make" /></td>
			</tr>
			<tr>
				<td> yr_model </td>
				<td><input type = "text" name = "yr_model" /></td>
			</tr>
			<tr>
				<td> yr_first_sold </td>
				<td><input type = "text" name = "yr_first_sold" /></td>
			</tr>
			<tr>
				<td> vlf_class </td>
				<td><input type = "text" name = "vlf_class" /></td>
			</tr>
			<tr>
				<td> type_veh </td>
				<td><input type = "text" name = "type_veh" /></td>
			</tr>
			<tr>
				<td> type_lic </td>
				<td><input type = "text" name = "type_lic" /></td>
			</tr>
			<tr>
				<td> license_num </td>
				<td><input type = "text" name = "license_num" /></td>
			</tr>
			<tr>
				<td> body_type_model </td>
				<td><input type = "text" name = "body_type_model" /></td>
			</tr>
			<tr>
				<td> mp </td>
				<td><input type = "text" name = "mp" /></td>
			</tr>
			<tr>
				<td> mo </td>
				<td><input type = "text" name = "mo" /></td>
			</tr>
			<tr>
				<td> ax </td>
				<td><input type = "text" name = "ax" /></td>
			</tr>
			<tr>
				<td> wc </td>
				<td><input type = "text" name = "wc" /></td>
			</tr>
			<tr>
				<td> unladen_g_cgw </td>
				<td><input type = "text" name = "unladen_g_cgw" /></td>
			</tr>
			<tr>
				<td> vehicle_id_num </td>
				<td><input type = "text" name = "vehicle_id_num" /></td>
			</tr>
			<tr>
				<td> type_vehicle_use </td>
				<td><input type = "text" name = "type_vehicle_use" /></td>
			</tr>
			<tr>
				<td> date_issued </td>
				<td><input type = "text" name = "date_issued" /></td>
			</tr>
			<tr>
				<td> cc_alco </td>
				<td><input type = "text" name = "cc_alco" /></td>
			</tr>
			<tr>
				<td> dt_fee_recvd </td>
				<td><input type = "text" name = "dt_fee_recvd" /></td>
			</tr>
			<tr>
				<td> pic </td>
				<td><input type = "text" name = "pic" /></td>
			</tr>
			<tr>
				<td> registered_owner </td>
				<td><input type = "text" name = "registered_owner" /></td>
			</tr>
			<tr>
				<td> amount_due </td>
				<td><input type = "text" name = "amount_due" /></td>
			</tr>
			<tr>
				<td> amount_recvd </td>
				<td><input type = "text" name = "amount_recvd" /></td>
			</tr>
			<tr>
				<td> amount_paid </td>
				<td><input type = "text" name = "amount_paid" /></td>
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
