<?php
include("class.company.dao.php");
include_once 'db.php';
$dao = new DAOcompany();
$vo  = new company($_POST["uid"],$_POST["title"],$_POST["phone"],$_POST["country"],$_POST["address"]);
$dao->save($vo);
echo "Record Saved <br><br>";
echo "List of Companies With Details<br><br>";
$limit1 = 1;
$limit2 = $dao->getCount();
echo "there are $limit2 companies<br><br>";
$clist  = $dao->getAll($limit1,$limit2);
foreach ($clist as $co) {
	$co->show();
}
?>
