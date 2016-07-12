<?php
include("db.php");
include("class.user.dao.php");
$dao = new DAOuser();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: user.php");
?>
