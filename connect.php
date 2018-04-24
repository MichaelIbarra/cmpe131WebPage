<?php
session_start();

 $firstname = filter_input(INPUT_POST, 'firstname');
 echo "first name: $firstname\n";
 $lastname = filter_input(INPUT_POST, 'lastname');
 echo "last name: $lastname\n";
 $zipcode = filter_input(INPUT_POST, 'zipcode');
 echo "zipcode: $zipcode\n";
 $email = filter_input(INPUT_POST, 'email');
 echo "email: $email\n";
 $password = filter_input(INPUT_POST, 'password');
 echo "password: $password\n";
 $cpassword = filter_input(INPUT_POST, 'cpassword');
 
 	if(!empty($firstname) && !empty($lastname) && !empty($zipcode) && !empty($email) && !empty($password) && !empty($cpassword))
	{
	if($password == $cpassword)
	{
		$firstname = test_input($_POST["firstname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  		$nameErr = "Only letters and white space allowed"; 
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Wrong format of first name. $nameErr')
			window.location.href='RegPage.php'
        	</SCRIPT>");
		die();
		}

		$lastname = test_input($_POST["lastname"]);
 		if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
 		 $nameErr = "Only letters and white space allowed"; 
		 echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Wrong format of last name. $nameErr')
			window.location.href='RegPage.php'
        	</SCRIPT>");
		die();
		}

		$zipcode = test_input($_POST["zipcode"]);
 		if (!preg_match("/^[0-9]*$/",$zipcode)) {
  		$zipErr = "Only numbers allowed";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Wrong format of zip code. $zipErr')
			window.location.href='RegPage.php'
        	</SCRIPT>");
		die(); 
		}

 		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailErr = "Invalid email format";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('$emailErr')
			window.location.href='RegPage.php'
        	</SCRIPT>"); 
		die();
		}
		
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
				else{
		$sql = "SELECT email FROM Users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
    // compare email in database
    while($row = $result->fetch_assoc()) {
		if($email==$row["email"])
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Email has already been registered. Please log in')
			window.location.href='LoginPage.php'
        	</SCRIPT>");
			die();
		}
	}
		}
	
		$sql = "INSERT INTO Users (firstname, lastname, zipcode, email, password)
		values ('$firstname', '$lastname', '$zipcode', '$email', '$password')";
		if($conn->query($sql)){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Successfully signed up. Please log in')
			window.location.href='LoginPage.php'
        	</SCRIPT>");
			die();
		}
		else{
			echo "Error: ". $sql ."<br>". $conn->error;
		}
          //echo "fix later\n";
					$conn->close();
		}
	}
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Password and password confirmation do not match')
			window.location.href='RegPage.php'
        	</SCRIPT>");
		die();
	}
	}
else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Fill in all the areas')
			window.location.href='RegPage.php'
        	</SCRIPT>");
		die();
	}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>