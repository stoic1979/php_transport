<?php
session_start();
include("class.truck.dao.php");
include("class.driver.dao.php");
include_once("header.php");

$dao = new DAOtruck();
$truckAvailableList = $dao->getVehicleId($_SESSION["uid"],1);
$truckLoadedList = $dao->getVehicleId($_SESSION["uid"],0);
$t_available = count($truckAvailableList);
$t_loaded = count($truckLoadedList);

?>
<center>
		<font color ="red" face ="Britannic Bold"><h2><U>STATUS</U></h2></font>
        <h3>Trucks available are <?=$t_available?></h3>
        <h3>Trucks loaded are <?=$t_loaded?></h3>



</center>