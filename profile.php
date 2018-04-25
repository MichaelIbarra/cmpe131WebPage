<?php
session_start();

if(isset($_SESSION['uid']))
{
	$conn = mysqli_connect("localhost", "root", "", "Registration");
	if($conn -> connect_error)
    	die("Connection failed:" . $conn -> connect_error);
 
 	$sql = "SELECT * FROM Users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {//3
		
    while($row = $result->fetch_assoc()) {
		if($row["UID"]==$_SESSION['uid'])
		{
			$_SESSION['firstname']=$row["firstname"];
			$_SESSION['lastname']=$row["lastname"];
			$_SESSION['zipcode']=$row["zipcode"];
			$_SESSION['email']=$row["email"];
			$_SESSION['password']=$row["password"];
			$_SESSION['uid']=$row["UID"];
			$_SESSION['wishlist']=$row["wishlist"];
			
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('profile set up')
        	</SCRIPT>");
			
			header("Location:ShowProfile.php");
			die();
		}
        else if($email==$row["email"] && $password!=$row["password"])
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Password entered is wrong')
        	</SCRIPT>");
			die();
		}
			
	}//endwhile
		
    		
			}//end3
$conn->close();
}
else
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Please log in to see your profile')
            window.location.href='LoginPage.php'
        	</SCRIPT>");
}
?>