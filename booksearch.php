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

          $query = $conn->query("SELECT * FROM Books WHERE isbn LIKE '%$searchq%' OR bookname LIKE '%$searchq%'") or die("could not search :/");
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
              echo $row['isbn'] . '<br>';
              echo $row['bookname'] . '<br><br>';

            }
          }
        }
  }
  /*echo "searchq: $searchq\n";

  $query = mysql_query("SELECT * FROM members WHERE isbn LIKE '%$searchq%' OR bookname LIKE '%$searchq%'") or die("could not search :/");
  $count = mysql_num_rows($query);
  if ($count == 0){
    $output = 'There was no search results!';
  } else{
    while($row = mysql_fetch_array($query)) {
      $isbn = $row['isbn'];
      $bookname = $row['bookname'];

      $output .= '<div> '.$isbn.' '.$bookname.' </div>';
    }
  }*/
}
?>
