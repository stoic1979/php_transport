<?php
include("db.php");
include("class.expense.dao.php");


$dao = new DAOexpense();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}

header("Location: expense.php");
?>
