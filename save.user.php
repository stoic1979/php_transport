<?php
include("db.php");
include("class.user.dao.php");
$dao = new DAOuser();
$vo = new user($_POST["username"],$_POST["password"],$_POST["full_name"],$_POST["email"],$_POST["phone"],$_POST["address"],$_POST["creation_date"],$_POST["is_active"]);
if(isset($_POST["uid"])){
	$vo->uid = $_POST["uid"];
}
$dao->save($vo);
header("Location: user.php");
?>
