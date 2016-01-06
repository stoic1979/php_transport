<?php
include_once "db.php";
include "class.truck.dao.php";
 $dao = new DAOtruck();
 $truckList = $dao->getVehicleId(9);
 echo join(', ', $truckList);
 $count = 1;
?>
<html>
<head>
<title>
	Test Company
</title>
</head>
<body>

	<form action = "test.php" method = "post">
      <table>
          <tr>
                 <td>
                   <select name = "truckSelect">
                    <?php
                    foreach( $truckList as $name){ 
                        echo "<option value=\"$count\">$name</option>";
                        $count++;}
                    ?>
                   </select>
                 </td>
                 <td><button type = "submit">Submit</button></td>
         </tr>
     </table>
    </form>
</body>
</html>