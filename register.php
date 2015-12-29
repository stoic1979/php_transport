<?php
session_start();

include_once 'db.php';
include("admin/class.user.dao.php");

$uname = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['email']);
$upass = md5(mysql_real_escape_string($_POST['password']));
$password = mysql_real_escape_string($_POST['password']);
 
// todo
// if user already exists
// return back to login page, with pt=reg, ec=2


$vo  = new user($uname, md5($password), $email);
//$vo->show();
$dao = new DAOuser();
$dao->save($vo);
header("Location: customer.php");

// check later
$useremail = $dao->getByEmail($email);
$userpass  = $dao->getByPassword($password);
//if a valid user then open customer page else display error
if(($useremail == NULL) or ($userpass == NULL) ){
	$dao->save($vo);
	$new = $dao->getByEmailAndPassword($email, $password);
	if ($new == NULL) {
		//echo "NULL";
	}
	else{
		$_SESSION["uid"] = $new->uid;
 	header("Location: customer.php");
	}
	
}
else { 
	header("Location: index.php?pt=reg&ec=2");
 }


 
?>

