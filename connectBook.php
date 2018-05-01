<?php
 $bookName = filter_input(INPUT_POST, 'bookName');
 echo "book name: $bookName\n";
 $price = filter_input(INPUT_POST, 'price');
 echo "price: $price\n";
 $ISBNNumber = filter_input(INPUT_POST, 'ISBNNumber');
 echo "ISBN number: $ISBNNumber\n";
 $description = filter_input(INPUT_POST, 'description');
 echo "description: $description\n";
 $zipcode = filter_input(INPUT_POST, 'zipcode');
 echo "zipcode: $zipcode\n";

 if(!empty($bookName) && !empty($price) && !empty($ISBNNumber) && !empty($description) && !empty($zipcode))
 {
	 $bookName = test_input($_POST["bookName"]);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$bookName)) {
  		$nameErr = "Only letters and white space allowed";
    echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Wrong format of book name. Only letters, numbers and white space allowed')
         window.location.href='regBookA.php'
       </SCRIPT>");
		die();
		}

		$price = test_input($_POST["price"]);
 		if (!preg_match("/^[0-9]*$/",$price)) {
 		 $priceErr = "Only numbers allowed";
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong format of price. Only numbers allowed')
        window.location.href='regBookA.php'
      </SCRIPT>");
		die();
		}

    $zipcode = test_input($_POST["zipcode"]);
    if (!preg_match("/^[0-9]*$/",$zipcode)) {
     $zipErr = "Only numbers allowed";
    echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Wrong format of zipcode. Only numbers allowed')
         window.location.href='regBookA.php'
       </SCRIPT>");
    die();
    }

		$ISBNNumber = test_input($_POST["ISBNNumber"]);
 		if (!preg_match("/^[0-9]*$/",$ISBNNumber)) {
  		$zipErr = "Only numbers allowed";
    echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Wrong format of ISBN number. Only numbers allowed')
         window.location.href='regBookA.php'
       </SCRIPT>");

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
		$sql = "INSERT INTO books (bookName, price, ISBNNumber, description, zipcode)
				values ('$bookName', '$price', '$ISBNNumber', '$description', '$zipcode')";
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
