<?php
session_start();

	//$newfirstname = filter_input(INPUT_POST, 'changefn');
 	//echo "first name: $newfirstname\n";
	
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
		
	$conn = mysqli_connect("localhost", "root", "", "Registration");
	if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
 $lookUID = $_SESSION['uid'];
 $sql = "UPDATE Users SET firstname='$newfirstname' WHERE UID='$lookUID'";
 $_SESSION['firstname']=$newfirstname;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>