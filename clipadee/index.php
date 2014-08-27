<?php
include("include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Clipadee | Clip Play Learn</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="font.css">
    <link type="text/css" rel="stylesheet" href="css/bootcamp.css"><!-- code from bootstrap that is used -->
    <link type="text/css" rel="stylesheet" href="css/index.css"><!-- css only used on homepage -->
    <link rel="icon" type="image/png" href="http://goo.gl/alB2ZQ"><!-- favicon -->
  </head>

  <body>

    <!-- Header -->
    <div class="header">
      <div class="clipadee-logo">
        <a href="index.php"><img src="images/clipadee-home.png" HEIGHT="30" alt="Clipadee logo"></a>
      </div>
    </div>

    <!-- Navigation: if signed out navigation bar is navin.php else navigation bar is navout.php -->    
    <?php include("include/navigation.php"); ?>

		<!-- Main Image -->
     	<div class="jumbotron">
  			<div class="container">
				<h1>Clip Play Learn</h1>
				<p>Organise YouTube videos and take notes to help you study.</p>
        		<a href="#">Learn More</a>
			</div>
		</div>


		<!-- Additional Information -->
		<div class="learn-more">
      <div class="container">
        <div class="row">

          <div class="col-md-4">
						<h3>About</h3>
            <p>Working on the web means spending huge chunks of your time within the browser. If Google Chrome is your workhorse of choice, it pays to explore what extensions are available to make your daily tasks less of a chore.</p>
            <p><a href="https://www.twitter.com/">Find Out More</a></p>
          </div>

	  			<div class="col-md-4">
	  				<h3>News</h3>
	  				<p>Working on the web means spending huge chunks of your time within the browser. If Google Chrome is your workhorse of choice, it pays to explore what extensions are available to make your daily tasks less of a chore.</p>
						<p><a href="https://www.twitter.com/">Find Out More</a></p>
          </div>

			  	<div class="col-md-4">
	  				<h3>Say Hello</h3>
	  				<p>Working on the web means spending huge chunks of your time within the browser. If Google Chrome is your workhorse of choice, it pays to explore what extensions are available to make your daily tasks less of a chore.</p>
						<p><a href="https://www.twitter.com/">Find Out More</a></p>
					</div>

        </div>
      </div>
    </div>

  </body>

</html>