<?php
include("db.php");
include("class.trailer.dao.php");
$dao = new DAOtrailer();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: trailer.php");
?>
