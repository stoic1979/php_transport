<?php
include("db.php");
include("class.customer.dao.php");
$dao = new DAOcustomer();
$vo = new customer($_POST["uid"],$_POST["name"],$_POST["firm_name"],$_POST["address"],$_POST["phone"],$_POST["email"]);
if(isset($_POST["cust_id"])){
	$vo->cust_id = $_POST["cust_id"];
}
$dao->save($vo);
header("Location: customer.php");
?>
