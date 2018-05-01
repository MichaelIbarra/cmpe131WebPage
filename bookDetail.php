<?php
session_start();

//collect
$bookId  = $_GET['bid'];
$_SESSION['bid']=$bookId;
//echo "session bid=".$_SESSION['bid'];

    $host = "localhost";
	$username = "root";
    $pw = "";
	$dbname = "Registration";
    //create connection
			$conn = new mysqli ($host, $username, $pw, $dbname);
		if(mysqli_connect_error()){
			die('connect Error ('.mysqli_connect_errno().')'
				.mysqli_connect_error());
        } else{
          $query = $conn->query("SELECT * FROM books WHERE BID='$bookId'") or die("could not search :/");
		  $row = $query->fetch_array(MYSQLI_ASSOC);
			  $title=$row['bookName'];
			  $isbn=$row['ISBNNumber'];
			  $desc=$row['description'];
			  $price=$row['price'];
			  $seller=$row['SID'];
		$query = $conn->query("SELECT * FROM Users WHERE UID='$seller'") or die("could not search :/");
		  $row = $query->fetch_array(MYSQLI_ASSOC);
			  $zip=$row['zipcode'];
			  $email=$row['email'];
			  $fn=$row['firstname'];
			  $ln=$row['lastname'];
			  $wish=$row['wishlist'];
		  
$html = <<<HTML
<link rel = "stylesheet" href = "Book4U.css" type="text/css">
<section class="questions-section">
<img class="centered-and-cropped" width="250" height="250"
				style="border-radius:50%; float:margin-right" 
				src="https://ashmagautam.files.wordpress.com/2013/11/mcj038257400001.jpg">
    <h2>Title: $title</h2>
    <p>ISBN Number: $isbn</p>
	<p>Description: $desc</p>
	<p>Price: $price</p>
	</br>
	<h2>Seller Information: </h2>
    <p>Email: $email</p>
	<p>Name: $fn $ln</p>
	<p>Zipcode: $zip</p>
	<p>Wishlist: $wish</p>
</section>
</br>
<p align="center"><a href="Checkout.php">Continue checkout</a></p>
HTML;
              echo $html;
}
?>