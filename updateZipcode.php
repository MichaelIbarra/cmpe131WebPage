<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		$newzipcode = test_input($_POST["changefn"]);
 		if (!preg_match("/^[0-9]*$/",$newzipcode)) {
  		$zipErr = "Only numbers allowed";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Wrong format of zip code. $zipErr')
			window.location.href='ShowProfile.php'
        	</SCRIPT>");
		die();
		}

		if(!empty($newzipcode))
		{
		$conn = mysqli_connect("localhost", "root", "", "Registration");
		if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
 $lookUID = $_SESSION['uid'];
 $sql = "UPDATE Users SET zipcode='$newzipcode' WHERE UID='$lookUID'";
 $_SESSION['zipcode']=$newzipcode;

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
					window.alert('Zipcode cannot be empty!')
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
