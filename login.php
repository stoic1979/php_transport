<?php
session_start();
include("admin/class.user.dao.php");

include_once 'db.php';

// check if user already logged in,
// then redirect to main page
if(isset($_SESSION['uid'])!=""){
 	header("Location: company.php");
}


 $email    = mysql_real_escape_string($_POST['username']);
 $password = mysql_real_escape_string($_POST['password']);

 
 $dao  = new DAOuser();
 $user = $dao->getByEmailAndPassword($email, $password);
 

 // login failed
 if($user == null) {
 	//echo "<script>alert('Login Failed !!!!');</script>";
 	header("Location: index.php?ec=1");
 	
 } else { // login OK
 	$_SESSION["uid"] = $user->uid;
    header("Location: dashboard.php");
 }

?>