<?php
include("db.php");
include("class.user.dao.php");
$dao = new DAOuser();
$vo = new user($_POST["username"],$_POST["password"],$_POST["email"]);
if(isset($_POST["uid"])){
	$vo->uid = $_POST["uid"];
}
$dao->save($vo);
header("Location: user.php");
?>
