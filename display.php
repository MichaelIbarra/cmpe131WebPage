<!DOCTYPE html>
<!--
Template Name: Boguco
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<?php
session_start();

if(isset($_SESSION['uid']))
{
	header("Location:displayA.php");
}
?>
<html>
<head>
<title>Display books</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel = "stylesheet" href = "Book4U.css" type="text/css">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace">
        <li><i class="fa fa-envelope-o"></i> Welcome back, Spartans!!</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace">
      	<li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="LoginPage.php">Login</a></li>
        <li><a href="RegPage.php">Register</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('randochick.jpg');">
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1>BOOKPANG</h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="mainB.php">Home</a></li>
          <li class="active"><a href="search.php">Buy Books</a></li>
          <li class="active"><a href="regBook.php">Sell Books</a></li>
          <li class="active"><a href="search.php">Exchange</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
    <div class="content" align="center">
    <h1>
      <font size = "15" color = "White" font face = "Arial Black">
      Search Books:
      </font></h1>
    <form action="display.php" method="POST">
      <p style="color:black"><textarea placeholder="Book name or ISBN number" name="search" rows="1" cols="50"></textarea>
      <input type="submit" value="Search"/></p>
    </form>
    </div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear">
	<div class="btmspace-50 center">
      <h2>Results:</h2>
    </div>

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
			  $title=$row['bookName'];
			  $isbn=$row['ISBNNumber'];
			  $desc=$row['description'];
			  $price=$row['price'];
				$saveBID=$row['BID'];
				$zip=$row['zipcode'];
$html = <<<HTML
<ul class="nospace group">
      <li class="one_third first">
        <article class="excerpt"><a href="#"><img class="inspace-10 borderedbox" src="https://ashmagautam.files.wordpress.com/2013/11/mcj038257400001.jpg" alt=""></a>
          <div class="excerpttxt">
            <ul>
              <li>Price: $$price</li>
			  <li>Description: $desc</li>
              <li>Zipcode:$zip</li>
            </ul>
            <h6 class="heading font-x1">Title: $title</h6>
			<h6 class="heading font-x1">ISBN Number: $isbn</h6>
			<p><a href="bookDetail.php?bid=$saveBID">More details &raquo;</a></p>
			</div>
        </article>
      </li>
</ul>
</br></br>
HTML;
              echo $html;

            }
          }
        }
  }
}

?>

<!--<div class="wrapper row3">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <!--<div class="btmspace-50 center">
      <h2>Results:</h2>
    </div>-->
    <!--<ul class="nospace group">
      <li class="one_third first">
        <article class="excerpt"><a href="#"><img class="inspace-10 borderedbox" src="https://education.fcps.org/ohs/sites/ohs/files/teacherimages/Intro2Biz.jpg" alt=""></a>
          <div class="excerpttxt">
            <ul>
              <li><i class="fa fa-calendar-o"></i>Title: Introduction to Business</li>
              <li><i class="fa fa-comments"></i>Price: $40</li>
            </ul>
            <h6 class="heading font-x1">Fair condition</h6>
            <p><a href="#">Read More &raquo;</a></p>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="excerpt"><a href="#"><img class="inspace-10 borderedbox" src="https://mitpress.mit.edu/sites/default/files/9780262033848.jpg" alt=""></a>
          <div class="excerpttxt">
            <ul>
              <li><i class="fa fa-calendar-o"></i>Title: Introduction to Algorithms</li>
              <li><i class="fa fa-comments"></i>Price: $50</li>
            </ul>
            <h6 class="heading font-x1">The book is in a good condition</h6>
            <p><a href="#">Read More &raquo;</a></p>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="excerpt"><a href="#"><img class="inspace-10 borderedbox" src="https://www.schandpublishing.com/uploads/bookimages/schand-books/10000261.jpg" alt=""></a>
          <div class="excerpttxt">
            <ul>
              <li><i class="fa fa-calendar-o"></i>Title: Principles of EE</li>
              <li><i class="fa fa-comments"></i>Price: $20</li>
            </ul>
            <h6 class="heading font-x1">Decent, lots of highlights</h6>
            <p><a href="#">Read More &raquo;</a></p>
          </div>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
 </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('http://www.destination360.com/north-america/us/california/san-jose/holiday-inn-express-san-jose-map.gif');">
  <article class="hoc container center">
    <!-- ################################################################################################ -->
    <i class="block btmspace-50 fa fa-4x fa-street-view"></i>
    <h6>Meet in Person</h6>
    <p class="btmspace-50">Our site is equipped with Google Maps for more accurate location</p>
    <footer><a class="btn inverse" href="#">Find the closest books</a></footer>
    <!-- ################################################################################################ -->
  </article>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear">
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h3 class="heading">Buying, Selling, and Exchanging books made easy</h3>
      <p class="nospace">Meet in person and get transaction done</p>
    </div>
    <ul class="nospace group services">
      <li class="one_third first">
        <article><a href="#"><i class="fa fa-object-group"></i></a>
          <h6 class="heading">Safe</h6>
          <p>Everyone who wants to use this service must be registered</p>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fa fa-fighter-jet"></i></a>
          <h6 class="heading">No hassle and no shipping</h6>
          <p>Contact the seller and/or buyer in person for more information, then meet in person</p>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fa fa-pagelines"></i></a>
          <h6 class="heading">Low prices</h6>
          <p>Sometimes textbooks can get very pricy, so we provide a way to buy, sell and exchange them</p>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Footer Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('https://i.travelapi.com/hotels/1000000/80000/76800/76745/b137ce21_z.jpg');">
  <!-- ################################################################################################ -->
  <div class="wrapper row4">
    <footer id="footer" class="hoc clear">
      <!-- ################################################################################################ -->
      <div class="btmspace-50 center">
        <h2 class="heading">Thanks for visiting our webpage</h2>
        <p>Hope you have a wonderful day</p>
      </div>
      <!-- ################################################################################################ -->
    </footer>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <nav class="quicklinks row4">
    <ul class="hoc clear">
      <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <!-- ################################################################################################ -->
</div>
<!-- End Footer Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>