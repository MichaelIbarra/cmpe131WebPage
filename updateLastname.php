<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		$newlastname = test_input($_POST["changefn"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$newlastname)) {
  		$nameErr = "Only letters and white space allowed";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Wrong format of last name. $nameErr')
			window.location.href='ShowProfile.php'
        	</SCRIPT>");
		die();
		}

		if(!empty($newlastname))
		{
		$conn = mysqli_connect("localhost", "root", "", "Registration");
		if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
 $lookUID = $_SESSION['uid'];
 $sql = "UPDATE Users SET lastname='$newlastname' WHERE UID='$lookUID'";
 $_SESSION['lastname']=$newlastname;

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
					window.alert('Last name cannot be empty!')
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
