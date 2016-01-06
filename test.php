<?php
include_once "db.php";
include "class.truck.dao.php";
//  $dao = new DAOtruck();

$tid = $_POST['truckSelect'];
// $vid = $dao->getVehicleId($tid);

echo "Truck chosen is ".$tid;



?>