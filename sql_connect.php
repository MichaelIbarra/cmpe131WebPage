<?php
mysql_connect("localhost", "root", "") or die("mysql connection is failure.");
mysql_select_db("Books") or die("Database does not exists.");

//collect
if(isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = prer_replace("#[^0-9a-z]#i","",$searchq);

  $query = mysql_query("SELECT * FROM members WHERE isbn LIKE '%$searchq%'" OR bookname LIKE '%$searchq%') or die("could not search :/");
  $count = mysql_num_rows($query);
  if ($count == 0){
    $output = 'There was no search results!';
  }else{
    while($row = mysql_fetch_array($query)) {
      $isbn = $row['isbn'];
      $bookname = $row['bookname'];

      $output .= '<div> '.$isbn.' '.$bookname.' </div>';
    }
  }
}
?>
