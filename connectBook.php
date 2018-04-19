<?php
 $bookName = filter_input(INPUT_POST, 'bookName');
 echo "book name: $bookName\n";
 $ISBNNumber = filter_input(INPUT_POST, 'ISBNNumber');
 echo "ISBN number: $ISBNNumber\n";
 $description = filter_input(INPUT_POST, 'description');
 echo "description: $description\n";
 $zipcode = filter_input(INPUT_POST, 'zipcode');
 echo "zipcode: $zipcode\n";

 if(!empty($bookName)){
	if(!empty($ISBNNumber)){
		if(!empty($description)){
			if(!empty($zipcode)){
				$host = "localhost";
				$username = "root";
        $pw = "";
				$dbname = "Registration";

				//create connection
				$conn = new mysqli ($host, $username, $pw, $dbname);
				if(mysqli_connect_error()){
					die('connect Error ('.mysqli_connect_errno().')'
						.mysqli_connect_error());
				}
				else{

					$sql = "INSERT INTO books (bookName, ISBNNumber, description, zipcode)
					values ('$bookName', '$ISBNNumber', '$description', '$zipcode')";
					if($conn->query($sql)){
                header("Location: mainB.html");

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
		}
		else{
			echo "Fill in all the areas";
			die();
		}
	}
	else{
		echo "Fill in all the areas";
		die();
	}
 }
 else{
	echo "Fill in all the areas";
	die();
 }
?>
