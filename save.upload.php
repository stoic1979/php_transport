<?php
session_start();
include("db.php");
include("class.upload.dao.php");
if(isset($_POST['upload']) && $_FILES['img']['size'] > 0)
{
$fileName = $_FILES['img']['name'];
$tmpName  = $_FILES['img']['tmp_name'];
$fileSize = $_FILES['img']['size'];
$fileType = $_FILES['img']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

$dao = new DAOupload();
$vo = new upload($_SESSION["uid"],$_POST["title"],$_POST["type"],$_POST["date"],$content);

$dao->save($vo);
header("Location: upload.php");

echo "<br>File $fileName uploaded<br>";
} 


?>
