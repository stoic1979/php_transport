<?php
include("db.php");
include("class.upload.dao.php");
$dao = new DAOupload();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: upload.php");
?>
