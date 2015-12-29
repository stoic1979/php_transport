<?php
include("class.company.dao.php");
include_once 'db.php';

$cid = $_POST['customer_id'];
$dao = new DAOcompany();
$vo  = $dao->get($cid);
if ($vo == null) {
echo "Company Id is Invalid...";
}
else
{
	$vo->show();
}


?>