<!DOCTYPE html>
<html lang="en">

  <head>
  <title>Clipadee | My Clipadee</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="font.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"> 
    <!-- <link type="text/css" rel="stylesheet" href="css/bootcamp.css"> -->
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/clipadee.css">
    <link type="text/css" rel="stylesheet" href="css/clipstrap.css">
    <link rel="icon" type="image/png" href="http://goo.gl/alB2ZQ">



    <script type="text/javascript">
 
    function getUserDetails(str) {
        if (str == "") {
            document.getElementById("userDetails").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        }
            xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4) {
                
                document.getElementById("userDetails").innerHTML = xmlHttp.responseText;
                }
            }
            xmlHttp.open("GET", "DatabaseAjax.php?drdnVal=" + str, true);
            xmlHttp.send();
            }
    </script>

  </head>



  <body>

    <!-- Header -->
    <div class="header">
      <div class="clipadee-logo">
        <a href="index.php"><img src="http://goo.gl/IdMSPm" HEIGHT="30" alt="Clipadee logo"></a>
      </div>
    </div>

    <!-- Navigation: if signed out navigation bar is navin.php else navigation bar is navout.php -->    
    <?php 
      if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
      {
        include("include/navout.php");
      }
      else
      {
        include("include/navin.php");
      }
    ?>


    <!-- Displays Username if Signed In -->
    <?php
      include("include/signedin.php"); 
    ?>


    <div class="jumblesale">
      <div class="row">

        <!-- Complete: Do Not Touch -->
        <div class="col-md-6">
          <div id="column">
            <h4>Collection</h4>
                <form>
                    <select id ="usrName" onchange="getUserDetails(this.value)" >
                        <option value=""> Select a Collection </option>
                        <option value="Vinyl">Vinyl</option>
                        <option value="Bowling">Bowling</option>
                        <option value="Software">Software</option>
                    </select>
                </form>
        

          </div>


        <!-- For Tweaking -->
          <div id="column">
            <h4>Topic</h4>
                <div id="userDetails">
                    <p> <b> User Details:</b></p> 
                </div>



        </div>



        <!-- Complete: Do Not Touch -->
        <div id="column">
          <h4>Clip</h4>
            <p> 
              <?php

              $rightvar = $_SESSION['user_id'];
              $result = mysql_query("SELECT * FROM clip WHERE id = $rightvar");  
              //$result= mysql_query("SELECT * FROM collection");
                  
              while ($row = mysql_fetch_array($result)) {
              //echo "<a href =\"$row[collection_title]\">".$row['collection_title'];"</a>";
              echo "<a href =\"$row[clip_title]\">" . $row['clip_title'] . "</a>";


              //while($info = mysql_fetch_array( $data )) { 
              //Print "<a href=".$info['siteurl'] . ">" .$info['sitetitle'] . "</a><br>"; 

              echo "<br />";
              }
              ?>
            </p>
        </div>

        <div class="col-md-8">

        </div>

      </div>
    </div>

  </body>

</html>