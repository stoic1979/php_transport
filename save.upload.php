<?php
include("db.php");
include("class.upload.dao.php");
$dao = new DAOupload();
$vo = new upload($_POST["uid"],$_POST["title"],$_POST["type"],$_POST["date"],$_POST["img"]);
if(isset($_POST["upload_id"])){
	$vo->upload_id = $_POST["upload_id"];
}
$dao->save($vo);
header("Location: upload.php");
?>
