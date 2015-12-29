<?php
include_once 'db.php'

?>
<html>
<head>
   <title>
         Test Customer Form
   </title>
</head>
<body>
    <form action = "saveCompany.php" method = "post">
          <table>
          	<tr>
				<td> uid </td>
				<td><input type = "text" name = "uid" /></td>
			</tr>
			<tr>
				<td> title </td>
				<td><input type = "text" name = "title" /></td>
			</tr>
			<tr>
				<td> phone </td>
				<td><input type = "text" name = "phone" /></td>
			</tr>
			<tr>
				<td> address </td>
				<td><input type = "text" name = "address" /></td>
			</tr>
			
			<tr>
				<td><center><button type = "submit">Save</button></center></td>
			</tr>
		   </table>
    </form>
</body>
</html>