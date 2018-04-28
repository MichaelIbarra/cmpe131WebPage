<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		$newpassword = test_input($_POST["changefn"]);
	

		if(!empty($newpassword))
		{
		$conn = mysqli_connect("localhost", "root", "", "Registration");
		if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
 $lookUID = $_SESSION['uid'];
 $sql = "UPDATE Users SET password='$newpassword' WHERE UID='$lookUID'";
 $_SESSION['password']=$newpassword;

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
					window.alert('Password cannot be empty!')
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
