<?php
 $bookName = filter_input(INPUT_POST, 'bookName');
 echo "book name: $bookName\n";
 $ISBNNumber = filter_input(INPUT_POST, 'ISBNNumber');
 echo "ISBN number: $ISBNNumber\n";
 $description = filter_input(INPUT_POST, 'description');
 echo "description: $description\n";
 $zipcode = filter_input(INPUT_POST, 'zipcode');
 echo "zipcode: $zipcode\n";

 if(!empty($bookName) && !empty($ISBNNumber) && !empty($description) && !empty($zipcode))
 {
	 $bookName = test_input($_POST["bookName"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$bookName)) {
  		$nameErr = "Only letters and white space allowed"; 
		echo "Wrong format of first name. $nameErr\n";
		die();
		}

		$zipcode = test_input($_POST["zipcode"]);
 		if (!preg_match("/^[0-9]*$/",$zipcode)) {
 		 $zipErr = "Only numbers allowed"; 
		 echo "Wrong format of zipcode. $zipErr\n";
		die();
		}

		$ISBNNumber = test_input($_POST["ISBNNumber"]);
 		if (!preg_match("/^[0-9]*$/",$ISBNNumber)) {
  		$zipErr = "Only numbers allowed";
		echo "Wrong format of ISBN number. $zipErr\n";
		die(); 
		}
		
	$host = "localhost";
	$username = "root";
    $pw = "";
	$dbname = "Registration";

	//create connection
	$conn = new mysqli ($host, $username, $pw, $dbname);
	if(mysqli_connect_error()){
		die('connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		$sql = "INSERT INTO books (bookName, ISBNNumber, description, zipcode)
				values ('$bookName', '$ISBNNumber', '$description', '$zipcode')";
		if($conn->query($sql)){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Successfully register a book')
            window.location.href='regBookA.php'
        	</SCRIPT>");
			die();
            //header("Location: mainB.html");
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

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
