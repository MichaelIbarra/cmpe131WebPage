<?php
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
 	if(!empty($firstname) && !empty($lastname) && !empty($zipcode) && !empty($email) && !empty($password) && !empty($cpassword) &&
		 $password == $cpassword)
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
				else{
		$sql = "SELECT email FROM Users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
    // compare email in database
    while($row = $result->fetch_assoc()) {
		if($email==$row["email"])
		{
			echo "Email has already been registered\n";
			die();
		}
	}
		}
	
		$sql = "INSERT INTO Users (firstname, lastname, zipcode, email, password)
		values ('$firstname', '$lastname', '$zipcode', '$email', '$password')";
		if($conn->query($sql)){
			echo "Successfully signed up";
			header("Location:mainA.html");
		}
		else{
			echo "Error: ". $sql ."<br>". $conn->error;
		}
          //echo "fix later\n";
					$conn->close();
		}
	}
	else{
		echo "Fill in all the areas";
		die();
	}
?>