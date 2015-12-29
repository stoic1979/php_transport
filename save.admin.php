<?php
include("db.php");
include("class.admin.dao.php");
$dao = new DAOadmin();
$vo = new admin($_POST["username"],$_POST["password"]);
if(isset($_POST["aid"])){
	$vo->aid = $_POST["aid"];
}
$dao->save($vo);
header("Location: admin.php");
?>
