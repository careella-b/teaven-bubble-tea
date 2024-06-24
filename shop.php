<?php
// Session variables are stored in a folder specified below

//Care's sessionData path
//ini_set( "session.save_path", "/home/unn_w19015711/sessionData" );

//Tahmidha's sessionData path
ini_set( "session.save_path", "/home/unn_w17017369/public_html/sessionData" );

// Create a new session with a session ID
session_start();

?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Custom styles for this website -->
<link href="shop.css" rel="stylesheet">

<!-- Favicon for iOS Safari, Android Chrome, Windows 8 and 10, Mac OS El Capitan Safari, Classic, desktop browsers and Manifest -->
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#573c79">
<meta name="msapplication-TileColor" content="#573c79">
<meta name="theme-color" content="#573c79">
<title>Shop - Teaven</title>
</head>
<body>

<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg py-3 navbar-dark shadow-sm">
  <div class="container"> <a href="home.php" class="navbar-brand"> 
    <!-- Logo Image --> 
    <img src="img/teavenLogoThree-purple.png" class="logo" alt="" class="d-inline-block align-middle mr-2"> </a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="home.php" class="nav-link">HOME</a></li>
        <li class="nav-item"><a href="shop.php" class="nav-link active">SHOP</a></li>
        <li class="nav-item"><a href="ourStory.php" class="nav-link">OUR STORY</a></li>
        <li class="nav-item"><a href="findUs.php" class="nav-link">CONTACT</a></li>
        <li class="nav-item"><a href="shoppingCart.php" class="nav-link">CART<i class="fas fa-shopping-cart"></i></a></li>

        <!-- This checks if user is logged-in, if so shows log out button and allows access to account page but if not then shows log in button and restricts access to account page. -->
        
        <?php

        try {
          require_once( "functions.php" );
          //Check if the user logs in, if so then shows the log out button but if not then shows login button. Try and catch to catch any errrors.

          if ( isset( $_SESSION[ 'logged-in' ] ) ) {
            if ( check_login() ) {
              echo "<li class='nav-item'><a href='customerAccount.php' class='nav-link'>ACCOUNT<i class='fas fa-user-circle'></i></a></li>
			  <li class='nav-item'><a href='logout.php' class='nav-link'>LOGOUT</a></li>";
            }
          } else {
            echo "<li class='nav-item'><a href='restricted.php' class='nav-link'>ACCOUNT<i class='fas fa-user-circle'></i></a></li>
			<li class='nav-item'><a href='loginForm.php' class='nav-link'>LOGIN</a></li>";
          }
        } catch ( Exception $e ) {
          //Output error message
          echo "<p>problem occured</p>\n";
          //Log error
          log_error( $e );
        }

        ?>
      </ul>
    </div>
  </div>
</nav>
<!-- End of Nav -->

<!-- This jumbotron-fluid occupies the entire horizontal space of its parent -->
<!-- A hero section with a responsive img and text on top -->
<div class="jumbotron jumbotron-fluid">
<video autoplay muted loop >    
    <source src="media/whats-your-flavour.mp4" type="video/mp4">
</video>
  <div class="container py-5">
    <div class="text-center py-5">
		<h1 class="animate-heading">WHAT'S YOUR <span class="one-word-colour">FLAVOUR?</span></h1>
      <p class="strap-line-heading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
  <!-- /.container -->
</div>
<!-- /.jumbotron -->

<!-- Users csn filter the bubble teas depend on their preferences. Each of these button have data-filter variable that makes it possible to filter a div element by data names or data values -->
<div class="btn-toolbar text-center my-btn-container">
  <button class="btn btn-primary filter-button" data-filter="all">All</button>
  <button class="btn btn-default filter-button" data-filter="milk">Milk Tea</button>
  <button class="btn btn-default filter-button" data-filter="fruit">Fruit Tea</button>
  <button class="btn btn-default filter-button" data-filter="foam">Milk Foam</button>
  <button class="btn btn-default filter-button" data-filter="brewed">Brewed Tea</button>
</div>
	
<!-- START of the filterable elements -->
<!-- every bubble tea is being fetched from the database and echo out into 4 columns of cards -->
<div class="container">
  <div class="row row-product">
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="mango-milk-tea-with-black-pearls.php"><img class="card-img-top img-fluid" src="img/bubbleTeaOne.png" alt="milk bubble tea drink"></a>
        <div class="card-block">
          <?php

          // Get database connection
          $dbConn = getConnection();

          // Create the Publisher query - SELECT the bubble tea name
          $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b1'";
          // Execute the query
          $queryResult = $dbConn->query( $selectSQL );
          $rowObj = $queryResult->fetchObject();
		  // Echo out the bubble tea name
          echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";


          ?>
        </div>
      </div>
    </div>

    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="okinawa-latte-with-black-pearls.php"><img class="card-img-top img-fluid" src="img/bubbleTeaTwo.png" alt="milk bubble tea drink"> </a>
        <div class="card-block">
          <?php
          // Get database connection
          $dbConn = getConnection();


          // Create the Publisher query - SELECT 
          $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b2'";
          // Execute the query
          $queryResult = $dbConn->query( $selectSQL );
          $rowObj = $queryResult->fetchObject();

          echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";


          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaThree.png" alt="milk bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b3'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaFour.png" alt="milk bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b4'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaFive.png" alt="milk bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b5'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter foam">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaSix.png" alt="foam bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b6'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter fruit">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaSeven.png" alt="fruit bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b7'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter brewed">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaEight.png" alt="brewed bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b8'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaNine.png" alt="milk bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b9'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaTen.png" alt="milk bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b10'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo "<p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaEleven.png" alt="milk bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b11'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo " <p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-3 filter milk">
      <div class="card"> <a href="#"><img class="card-img-top img-fluid" src="img/bubbleTeaTwelven.png" alt="milk bubble tea drink">
        <div class="card-block"></a>
          <?php
          try {
            require_once( "functions.php" );
            // Get database connection
            $dbConn = getConnection();

            // Create the Publisher query - SELECT 
            $selectSQL = "SELECT bubble_id, bubble_name
							FROM teaven_teas
							WHERE bubble_id = 'b12'";
            // Execute the query
            $queryResult = $dbConn->query( $selectSQL );
            $rowObj = $queryResult->fetchObject();

            echo "<p class='card-title text-center'>{$rowObj->bubble_name}</p>\n";

          } catch ( Exception $e ) {
            echo "<p>Something went wrong!: " . $e->getMessage() . "</p>\n";
          }

          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END of the filterable elements -->

<!-- FOOTER -->
<!-- Footer contains 2 rows and 3 columns of content. All columns are wrapped together using 'container' class and 'row' class -->
<!-- First column contains the logo and social media icons. Those icons are from Font Awesome -->
<footer>
  <div class="footer">
    <div class="container">
	<!-- First row -->
      <div class="row">
        <div class="col-lg-5 col-xs-12"> <img  src="img/teavenLogo.png" class="footer-logo"/>
          <div class="footer-socialmedia text-center"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-youtube"></i></a> </div>
        </div>
		<!-- Second column contains a list of our three main content - Shop, Our Story and Contact -->
        <div class="col-lg-3 col-xs-12 links text-center">
          <h3>USEFUL LINKS</h3>
          <ul class="m-0 p-0 " >
            <li><a href="shop.php">Shop</a></li>
            <li><a href="ourStory.php">Our Story</a></li>
            <li><a href="findUs.php">Contact</a></li>
          </ul>
        </div>
		<!-- Third column contains our contact info. The phone number and email are clickable so a user can contact us just by clicking the links -->
        <div class="col-lg-4 col-xs-12 location text-center">
          <h3>CONTACT INFO</h3>
          <p>22, Lorem ipsum dolor</p>
          <p><a href="tel:5417543010" class="phone-link"><i class="fa fa-phone mr-3"></i>(541) 754-3010</a></p>
          <p><a href="mailto:hello@teaven.com" class="email-link"><i class="fa fa-envelope-o mr-3"></i>hello@teaven.com</a></p>
        </div>
      </div>
	<!-- Second row -->
		<!-- This copyright text takes the full width of the column -->
      <div class="row mt-3">
        <div class="col copyright text-center">
          <p class="pt-4"><small class="text-white-50">&copy;
			  <!-- This javascript snippet will automatically update the copyright year, depending on the user's time settings -->
			  <script type="text/javascript">
				  document.write(new Date().getFullYear());
			  </script>Teaven. All Rights Reserved.</small></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- Font Awesome Kit - this is link to an account -->
<script src="https://kit.fontawesome.com/799d082bbd.js" crossorigin="anonymous"></script> 
<!-- CUSTOM JAVASCRIPT FOR THIS WEBSITE --> 
<script src="script.js" type="text/javascript"></script>
</body>
</html>
