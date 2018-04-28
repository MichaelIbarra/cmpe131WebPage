<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		$newfirstname = test_input($_POST["changefn"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$newfirstname)) {
  		$nameErr = "Only letters and white space allowed";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Wrong format of first name. $nameErr')
			window.location.href='ShowProfile.php'
        	</SCRIPT>");
		die();
		}
<<<<<<< HEAD:updateFirstname.php

=======
		
>>>>>>> 1d0b4e781530f73159065c04be09f18b4f5226fa:updateInfo.php
		if(!empty($newfirstname))
		{
		$conn = mysqli_connect("localhost", "root", "", "Registration");
		if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
 $lookUID = $_SESSION['uid'];
 $sql = "UPDATE Users SET firstname='$newfirstname' WHERE UID='$lookUID'";
 $_SESSION['firstname']=$newfirstname;

if ($conn->query($sql) === TRUE) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Successfully updated!')
		window.location.href='ShowProfile.php'
				</SCRIPT>");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
	}
	else
	{
<<<<<<< HEAD:updateFirstname.php
		echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('First name cannot be empty!')
			window.location.href='ShowProfile.php'
					</SCRIPT>");
=======
		echo "Name cannot be empty";
>>>>>>> 1d0b4e781530f73159065c04be09f18b4f5226fa:updateInfo.php
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
