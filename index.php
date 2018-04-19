
<?php
session_start();
?>
<html>
<head>
	<title>login page</title>
</head>
<body>
	<form action="Login.php" method="POST">
	Enter Firstname : <input type="text" name="firstname"><br><br>
	Enter Lastname : <input type="text" name="lastname"><br>
	Enter Email : <input type="text" name="email"><br><br>
	Enter Password : <input type="password" name="password"><br>
	<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>
<?php
session_destroy();
?>
