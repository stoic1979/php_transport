<?php
session_start();
include("class.truck.dao.php");
include("class.driver.dao.php");
include("class.invoice.dao.php");
include_once("header.php");

$dao 				= new DAOtruck();
$daoDriver			= new DAOdriver();
$daoInvoice			= new DAOinvoice();
$truckAvailableList = $dao->getVehicleId($_SESSION["uid"],1);
$truckLoadedList    = $dao->getVehicleId($_SESSION["uid"],0);
$t_available 		= count($truckAvailableList);
$t_loaded 			= count($truckLoadedList);
$c_date				= date('Y-m-d');
$driver_detail 		= $daoDriver->getDrivers($_SESSION['uid']);
$invoice_detail		= $daoInvoice->getInvoices($_SESSION['uid']);
?>
<center>
		<font color ="red" face ="Britannic Bold"><h2><U>STATUS</U></h2></font>
		<table class="table table-bordered" >
			<tr><td width = '50%'><center><img src="img/truck.png" width = 80 height = 80 ><br><br>
				Trucks available are <?=$t_available?><br>
				Trucks loaded are <?=$t_loaded?></center></td>
				<td width = '50%'><center><img src="img/transaction.png" width = 80 height = 80 ><br><br>
				 <?php
                    foreach( $invoice_detail as $name){ 
                    	//echo $name->expiry_date;
                    	$check_balance = $name->total_amt - $name->balance_due;
                    	                  	
                        if ($check_balance > 0) {
                        	// echo join(', ', $name);
                        	echo $name->customer .' payment pending is $'.$check_balance;
                        };}
                    ?><br> </center></td>
			</tr>
			<tr>
				<td width = '50%'><center><img src="img/driver.png" width = 80 height = 80 ><br><br>
					<?php
                    foreach( $driver_detail as $name){ 
                    	//echo $name->expiry_date;
                    	$check_expiry = strtotime($name->expiry_date) - strtotime($c_date);
                    	$expiry       = floor($check_expiry/86400);
                    	
                        if (($expiry < 30) or ($expiry = 30)) {
                        	// echo join(', ', $name);
                        	echo $name->name .' license is going to expire in '.$expiry.' days';
                        };}
                    ?><br></center></td>
                <td width = '50%'><center><img src="img/company.png" width = 80 height = 80 >&nbsp;
                <img src="img/customer.png" width = 80 height = 80 >&nbsp;
            	<img src="img/trailer.png" width = 80 height = 80 >&nbsp;
            	<img src="img/upload.png" width = 80 height = 80 ></center>
            </td>
			</tr>	
		</table>
        
</center>