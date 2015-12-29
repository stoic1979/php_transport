<?php
include_once 'db.php'
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
                   <input type = "text" name = "customer_id" placeholder = "Enter Customer id"/>
                 </td>
                 <td><button type = "submit">Submit</button></td>
         </tr>
     </table>
    </form>
</body>
</html>