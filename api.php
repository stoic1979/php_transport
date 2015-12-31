<?php 
include("db.php"); 

include("admin/class.user.dao.php");
// functions..................................................................

function handleLogin() {

    //showLog("handleLogin");

    $ret = array('op' => 'login', 'msg'=> 'Login Successful', 'error_code'=> '0');

    $email     = $_POST["email"];
    $password  = $_POST["password"];

    $dao = new DAOuser();

    $user = $dao->getByEmailAndPassword($email, $password);

    if($user == NULL) {
        $ret["error_code"] = "1";
        $ret["msg"]        = "Invalid username or password";
    } else {
        $ret["uid"]        = $user->uid;
    }

    echo json_encode($ret);
}


function handleRegister() {

    //showLog("handleLogin");
    //

    $ret = array('op' => 'register', 'msg'=> 'Registration Successful', 'error_code'=> '0');

    $username     = $_POST["username"];
    $email  = $_POST["email"];
    $password = $_POST["password"];
    $upass = md5(mysql_real_escape_string($_POST['password']));

    $dao = new DAOuser();

    // ensure that user with same email does not exist in database
    $user = $dao->getByEmail($email);

    // user already exists for give email
    if($user != NULL) {
        $ret["error_code"] = "1";
        $ret["msg"]        = "Email '" . $email . "' already exists";
        echo json_encode($ret);
        return;
    }

    // ensure that user with same username does not exist in database
    $user = $dao->getByUsername($username);

    // user already exists for give username
    if($user != NULL) {
        $ret["error_code"] = "1";
        $ret["msg"]        = "Username '" . $username . "' already exists";
        echo json_encode($ret);
        return;
    }

    $user = new user($_POST['username'], $upass, $_POST['email']);
    $dao->save($user);

    echo json_encode($ret);
}



////////////////////////// MAIN ///////////////////////////////////////
if(!isset($_POST["op"]))  die("operation not specified");

$op = $_POST["op"];


// API handlers........................................................
if($op == "login")      handleLogin();
if($op == "register")   handleRegister();


?>
