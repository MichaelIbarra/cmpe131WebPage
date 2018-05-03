<?php
session_start();

	if(isset($_SESSION['bid']))
	{
		$conn = mysqli_connect("localhost", "root", "", "Registration");
		if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
$lookBID = $_SESSION['bid'];	
 $sql = "DELETE FROM books WHERE BID='$lookBID'";

if ($conn->query($sql) === TRUE) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Book is bought and has been deleted from the database')
          window.location.href='search.php'
        	</SCRIPT>");
} else {
    echo "Error buying book : " . $conn->error;
}

$conn->close();
}
?>