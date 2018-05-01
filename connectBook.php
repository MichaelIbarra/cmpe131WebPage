<?php
session_start();
 $bookName = filter_input(INPUT_POST, 'bookName');
 echo "book name: $bookName\n";
 $ISBNNumber = filter_input(INPUT_POST, 'ISBNNumber');
 echo "ISBN number: $ISBNNumber\n";
 $description = filter_input(INPUT_POST, 'description');
 echo "description: $description\n";
 $price = filter_input(INPUT_POST, 'price');
 echo "price: $price\n";

 if(!empty($bookName) && !empty($ISBNNumber) && !empty($description) && !empty($price))
 {
	 $bookName = test_input($_POST["bookName"]);
		if (!preg_match("/^[a-zA-Z0-9:-&() ]*$/",$bookName)) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Wrong format of book name. Only letters, numbers and white space allowed')
         window.location.href='regBookA.php'
       </SCRIPT>");
		die();
		}

		$price = test_input($_POST["price"]);
 		if (!preg_match("/^[0-9.]*$/",$price)) {
 		echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong format of price. Only numbers allowed')
        window.location.href='regBookA.php'
      </SCRIPT>");
		die();
		}

		$ISBNNumber = test_input($_POST["ISBNNumber"]);
 		if (!preg_match("/^[0-9-]*$/",$ISBNNumber)) {
  		echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Wrong format of ISBN number. Only numbers allowed')
         window.location.href='regBookA.php'
       </SCRIPT>");
		die();
		}

		$SID=$_SESSION['uid'];
		$zip=$_SESSION['zipcode'];

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
		$sql = "INSERT INTO books (bookName, ISBNNumber, description, price, SID, zipcode)
				values ('$bookName', '$ISBNNumber', '$description', '$price', '$SID', '$zip')";

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
	echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Fill in all area')
        window.location.href='regBookA.php'
      </SCRIPT>");
	die();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
