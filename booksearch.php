<?php
//collect
if(isset($_POST['search'])) {
  $searchq = $_POST['search'];
  if(!empty($searchq)){
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
          //echo "searchq: $searchq\n";

          $query = $conn->query("SELECT * FROM books WHERE ISBNNumber LIKE '%$searchq%' OR bookName LIKE '%$searchq%'") or die("could not search :/");
          $count = $query->num_rows;
          //echo "$count\n";
          if ($count == 0){
            echo "There was no search results!\n";
          } else{
            /*while($row = mysql_fetch_array($query)) {
              $isbn = $row['isbn'];
              $bookname = $row['bookname'];

              $output .= '<div> '.$isbn.' '.$bookname.' </div>';
            }*/
            for($i=0; $i<$count; $i++){
              $query->data_seek($i);
              $row = $query->fetch_array(MYSQLI_ASSOC);
              echo "<p><b>ISBN Number:  </b></b></b>", '<br>' . $row['ISBNNumber'], "</p>";
              echo "<p><b>Book:  </b></b>", '<br>' . $row['bookName'], "</p>";
              echo "<p><b>Description:  </b></b></b></b>", '<br>' . $row['description'], "</p>";
              echo "<p><b>Zipcode:  </b></b></b></b></b>", '<br>' . $row['zipcode'], "</p>";
              echo "<p></b></b></b></b>", '<br>' . '<a href="Checkout.html">Checkout</a>', "</p>";
              echo "__________________________________________________";

            }
          }
        }
  }
}
?>
