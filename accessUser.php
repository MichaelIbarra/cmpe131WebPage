<?php
session_start();

 $email = filter_input(INPUT_POST, 'email');
 echo "email: $email\n";
 $password = filter_input(INPUT_POST, 'password');
 echo "password: $password\n";
 	if(!empty($email) && !empty($password))
	{//1
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
		{//else2
		$sql = "SELECT * FROM Users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {//3

    while($row = $result->fetch_assoc()) {
		if($email==$row["email"] && $password==$row["password"])
		{
			$_SESSION['firstname']=$row["firstname"];
			$_SESSION['email']=$row["email"];
			$_SESSION['uid']=$row["UID"];
			$_SESSION['zipcode']=$row["zipcode"];

			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Successfully login')
        	</SCRIPT>");

			header("Location:mainA.php");
			die();
		}
        else if($email==$row["email"] && $password!=$row["password"])
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Password entered is wrong')
          window.location.href='LoginPage.php'
        	</SCRIPT>");
			die();
		}

	}//endwhile


			}//end3
$conn->close();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Email is not yet registered')
          window.location.href='LoginPage.php'
        	</SCRIPT>");
			die();
		}//end else2
	}//end1
	else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Fill in all the areas')
        window.location.href='LoginPage.php'
        </SCRIPT>");
		die();
	}
?>
