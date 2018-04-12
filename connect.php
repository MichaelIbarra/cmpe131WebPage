<?php
 $firstname = filter_input(INPUT_POST, 'firstname');
 echo "first name: $firstname\n";
 $lastname = filter_input(INPUT_POST, 'lastname');
 echo "last name: $lastname\n";
 $email = filter_input(INPUT_POST, 'email');
 echo "email: $email\n";
 $password = filter_input(INPUT_POST, 'password');
 echo "password: $password\n";

 if(!empty($firstname)){
	if(!empty($lastname)){
		if(!empty($email)){
			if(!empty($password)){
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
					$sql = "INSERT INTO Users (firstname, lastname, email, password)
					values ('$firstname', '$lastname', '$email', '$password')";
					if($conn->query($sql)){
						echo "Successfully signed up";
					}
					else{
						echo "Error: ". $sql ."<br>". $conn->error;
					}
          echo "fix later\n";
					$conn->close();
				}
			}
			else{
				echo "Fill in all the areas";
				die();
			}
		}
		else{
			echo "Fill in all the areas";
			die();
		}
	}
	else{
		echo "Fill in all the areas";
		die();
	}
 }
 else{
	echo "Fill in all the areas";
	die();
 }
?>
