<?php
 $email = filter_input(INPUT_POST, 'email');
 echo "email: $email\n";
 $password = filter_input(INPUT_POST, 'password');
 echo "password: $password\n";
 	if(!empty($email) && !empty($password))
	{
		$host = "localhost";
		$username = "root";
        $pw = "";
		$dbname = "Registration";
			
		//create connection
		$conn = new mysqli ($host, $username, $pw, $dbname);
			if(mysqli_connect_error()){
				die('connect Error ('.mysqli_connect_errno().')'
				.mysqli_connect_error());
			}
			else
	{
		$sql = "SELECT email, password FROM Users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    // compare username and password in database
    while($row = $result->fetch_assoc()) {
		if($email==$row["email"] && $password==$row["password"])
		{
			echo "Successfully login\n";
			header("Location:mainA.html");
		}
        else if($email==$row["email"] && $password!=$row["password"])
		{
			echo "Password entered is wrong\n";
		}
	}
		}
    		echo "Email is not yet registered";
$conn->close();
		}
	}
	else{
		echo "Fill in all the areas";
		die();
	}
?>