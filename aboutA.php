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
	//do nothing
}
else
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        	window.alert('Please login')
            window.location.href='about.php'
        	</SCRIPT>");
}
?>
<html>
<head>
<title>About Us</title>
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
        <li><i class="fa fa-envelope-o"></i> Welcome back, <?php echo $_SESSION["firstname"]; ?>!!</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace">
      	<li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="profile.php">My profile</a></li>
        <li><a href="deleteSession.php">Log out</a></li>
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
        <h1>TEXTBOOK EXCHANGE</h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="mainA.php">Home</a></li>
          <li class="active"><a href="searchA.php">Buy Books</a></li>
          <li class="active"><a href="regBookA.php">Sell Books</a></li>
          <li class="active"><a href="searchA.php">Exchange</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear">
    <!-- ################################################################################################ -->
  <p class='masthead-intro'>Hey we're</p>
  <h1 class='masthead-heading'>BookPANG!</h1>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <div align="left">
      	<h1>Introduction</h1>
    	<p>We are a group 0f SJSU Students wokring together to create an amazing company!.</p>
    	<p>I love the internet, technology, and building beautiful things.</p>
  </section>
		<section class="questions-section">
    <h1>Who We Are</h1>
    <h2>Cheng Chin Lim</h2>
    <p>My name is Cheng Chin Lim,  I am an international transfer from Malaysia.
			I am majoring in software engineering in San Jose State University</p>
			<img class="centered-and-cropped" width="100" height="100"
				style="border-radius:50%; float:margin-right" src="profilePics/ChengCMPE131.jpg">
    <h2>Daniel Lee</h2>
    <p>My name is Daniel Lee. I am 2nd year and majoring in Software Engineering at San Jose State University.</p>
		<img class="centered-and-cropped" width="100" height="100"
			style="border-radius:50%; float:margin-right" src="profilePics/DanielCMPE131.jpg">
    <h2>Michael Ibarra</h2>
    <p>Im a second year Software Engineer Major. I like to watch a lot of shows and marathon Disney movies.</p>
		<img class="centered-and-cropped" width="100" height="100"
			style="border-radius:50%; float:margin-right" src="profilePics/CutePic.jpg">
    <h2>Michelle Natasha</h2>
    <p>My name is Michelle Natasha, I am an International student from Indonesia.
Currently studying at San Jose State University and majoring in computer engineering</p>
		<img class="centered-and-cropped" width="100" height="100"
		style="border-radius:50%; float:margin-right" src="profilePics/MichelleCMPE131.jpg">
		<h2>Jihwan Kim</h2>
		<p>My name is Jihwan Kim, I am 3rd year in San Jose State University majoring in Industrial System Engineering.</p>
    <img class="centered-and-cropped" width="250" height="250"
		style="border-radius:50%; float:margin-right" src="profilePics/JihwanCMPE131.jpg">
		</section>
	</div>
    <!-- ################################################################################################ -->
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear">
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h3 class="heading">Come check out some of our stuff!</h3>
    </div>
    <ul class="nospace group services">
      <li class="one_third first">
        <article><a href="https://github.com/MichaelIbarra/cmpe131WebPage"><i class="fa fa-object-group"></i></a>
          <h6 class="heading">GitHub</h6>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fa fa-fighter-jet"></i></a>
          <h6 class="heading">Twitter</h6>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fa fa-pagelines"></i></a>
          <h6 class="heading">Google+</h6>
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
      <li><a href="aboutA.php">About</a></li>
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
