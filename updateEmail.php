<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		$newemail = test_input($_POST["changefn"]);
		if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
  		$emailErr = "Invalid email format";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('$emailErr')
			window.location.href='ShowProfile.php'
        	</SCRIPT>");
		die();
		}

		if(!empty($newemail))
		{
		$conn = mysqli_connect("localhost", "root", "", "Registration");
		if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
 $lookUID = $_SESSION['uid'];
 $sql = "UPDATE Users SET email='$newemail' WHERE UID='$lookUID'";
 $_SESSION['email']=$newemail;

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
		echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Email cannot be empty!')
			window.location.href='ShowProfile.php'
					</SCRIPT>");
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
