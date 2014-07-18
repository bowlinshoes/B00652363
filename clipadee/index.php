<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Clipadee | Clip Play Learn</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="font.css">
    <!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link type="text/css" rel="stylesheet" href="css/binarystrap.css"> -->
    <link type="text/css" rel="stylesheet" href="css/bootcamp.css"><!--  code from bootstrap that is used -->
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/png" href="http://goo.gl/alB2ZQ">
  </head>

  <body>

    <!-- Header -->
    <div class="header">
      <div class="clipadee-logo">
        <a href="index.php"><img src="http://goo.gl/iKq8xA" HEIGHT="30" alt="Clipadee logo"></a>
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

		<!-- User/Collection Profiles -->
    <div class="collections">
      <div class="container">
        <h2>Trending Topics</h2>
        <p>Not sure where to stay? We've created neighborhood guides for cities all around the world.</p>
        		
        <div class="row">
          <div class="col-md-4">
           	<div class="thumbnail">
           		<img src="http://goo.gl/nBdSOG"><!-- Software Development -->
              <!-- <h3><span>Software Development</span></h3> -->
            </div>

						<div class="thumbnail">
           		<img src="http://goo.gl/8XffmJ"><!-- Art -->
              <!-- <h3><span>Art</span></h3> -->
            </div>
          </div>
           
          <div class="col-md-4">
            <div class="thumbnail">
           	  <img src="http://goo.gl/OKfJVh"><!-- Economics -->
            </div>

            <div class="thumbnail">
              <img src="http://goo.gl/nNr6EN"><!-- Law -->
            </div>
          </div>
           
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="http://goo.gl/7nW7J6"><!-- Start-Ups -->
            </div>

						<div class="thumbnail">
              <img src="http://goo.gl/VMNcaa"><!-- Languages -->
            </div>
          </div>
        </div>
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

    <!-- Footer 
    <div class="learn-more">
      <?php include("include/footer.php"); ?>
    </div>
    -->
    

  </body>

</html>