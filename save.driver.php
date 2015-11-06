<?php
include("db.php");
include("class.driver.dao.php");
$dao = new DAOdriver();
$vo = new driver($_POST["uid"],$_POST["name"],$_POST["photo"],$_POST["address"],$_POST["email"],$_POST["phone"],$_POST["social_security_no"]);
if(isset($_POST["did"])){
	$vo->did = $_POST["did"];
}
$dao->save($vo);
header("Location: driver.php");
?>
