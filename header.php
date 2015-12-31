<?php 
session_start();

// check if user logged, else redirect to index page

if(!isset($_SESSION['uid'])) header("Location: index.php");

include("db.php");
include("admin/class.user.dao.php");

$uid = $_SESSION['uid'];
$dao = new DAOuser();
$user  = $dao->get($uid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
	<div style = "margin:auto;">
		<a href="company.php" class="navbar-brand">Company&nbsp;&nbsp;&nbsp;&nbsp;</a>
		<a href="customer.php" class="navbar-brand">Customer&nbsp;&nbsp;&nbsp;&nbsp;</a>
		<a href="driver.php" class="navbar-brand">Driver&nbsp;&nbsp;&nbsp;&nbsp;</a>
    
<ul class="nav navbar-nav">
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><font size = 4>Equipment</font>&nbsp;&nbsp;&nbsp;&nbsp;
      <span class="caret"></span>&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <ul class="dropdown-menu">
            <li><a href="truck.php" class="navbar-brand">Truck&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
    <li><a href="trailer.php" class="navbar-brand">Trailer&nbsp;&nbsp;&nbsp;&nbsp;</a></li>

            </ul>
        </li>
  </ul>

		<a href="dispatch.php" class="navbar-brand">Dispatch&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href="transaction.php" class="navbar-brand">Transaction&nbsp;&nbsp;&nbsp;&nbsp;</a>
		<a href="upload.php" class="navbar-brand">Upload&nbsp;&nbsp;&nbsp;&nbsp;</a>
		<a href="logout.php?logout" class="navbar-brand">Sign Out&nbsp;&nbsp;&nbsp;&nbsp;</a>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">oo</button>
		

	<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Welcome <?php echo $user->username; ?></b>
      <span class="caret"></span>&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Convenience Menu</h4>
        </div>
        <div class="modal-body">
          <p><a href = "company.php"><img src="img/company.png" width = 80 height = 80 ></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href = "customer.php"><img src="img/customer.png" width = 80 height = 80 ></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href = "driver.php"><img src="img/driver.png" width = 80 height = 80 ></a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href = "trailer.php"><img src="img/trailer.png" width = 80 height = 80 > </a> <br><br><br>
			<a href = "transaction.php"><img src="img/transaction.png" width = 80 height = 80 ></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href = "truck.php"><img src="img/truck.png" width = 80 height = 80 > </a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href = "upload.php"><img src="img/upload.png" width = 80 height = 80 ></a> </p>
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	</nav>
<br /><br /><br />
