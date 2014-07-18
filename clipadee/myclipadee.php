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
    <link type="text/css" rel="stylesheet" href="css/backgrounddrain.css">
    <link type="text/css" rel="stylesheet" href="css/clipstrap.css">
    <link rel="icon" type="image/png" href="http://goo.gl/alB2ZQ">

    <!-- functions required for filters -->
    <script type="text/javascript">
 
      //function to filter collection to display topics
      function getCollectionDetails(str) {
        if (str == "") {
          document.getElementById("collectionDetails").innerHTML = "";
          return;
        }
        if (window.XMLHttpRequest) {
          xmlHttp = new XMLHttpRequest();
        }
          xmlHttp.onreadystatechange = function () {
          if (xmlHttp.readyState == 4) {
                  
            document.getElementById("collectionDetails").innerHTML = xmlHttp.responseText;
            }
          }
            xmlHttp.open("GET", "collectionfilter.php?drdnVal=" + str, true);
            xmlHttp.send();
          }


      //function to filter collection to display topics
      function getTopicDetails(str) {
        if (str == "") {
          document.getElementById("topicDetails").innerHTML = "";
          return;
        }
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        }
          xmlHttp.onreadystatechange = function () {
          if (xmlHttp.readyState == 4) {
                  
            document.getElementById("topicDetails").innerHTML = xmlHttp.responseText;
            }
          }
            xmlHttp.open("GET", "topicfilter.php?drdnVal=" + str, true);
            xmlHttp.send();
          }


      //function to filter clips to display clip details
      function getClipDetails(str) {
        if (str == "") {
          document.getElementById("clipDetails").innerHTML = "";
          return;
        }
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        }
          xmlHttp.onreadystatechange = function () {
          if (xmlHttp.readyState == 4) {
                  
            document.getElementById("clipDetails").innerHTML = xmlHttp.responseText;
            }
          }
            xmlHttp.open("GET", "clipfilter.php?drdnVal=" + str, true);
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
    <?php include("include/navigation.php"); ?>


    <!-- Displays Username if Signed In -->
    <?php include("include/signedin.php"); ?>



        <!-- Collection -->
    <div class="row">

        <div class="col-md-2">
          <div id="column">
            <h4>Filter</h4>
                <form>
                  <select id ="filter" onchange="getCollectionDetails(this.value)" >
                    <option value=""> Select a Collection </option>

                      <?php

                        $rightvar = $_SESSION['user_id'];
                        $result = mysql_query("SELECT * FROM collection WHERE id = $rightvar");  
                        //$result= mysql_query("SELECT * FROM collection");
                        
                        while ($row = mysql_fetch_array($result)) 
                        {
                      ?>
                        <option value="<?php echo $row['collection_id'];?>"><?php echo $row['collection_title'];?></option>
                        <!-- echo "<a href =\"$row[collection_title]\">" . $row['collection_title'] . "</a>"; -->
                      <?php
                        }//close while loop
                      ?>
                    </select>
                </form>

              <div id="collectionDetails">
              </div>

          </div>
        </div>


        <!-- Clips -->
        <div class="col-md-4">
          <div id="column">
              <div id="clips">
                <h4>Clip</h4>
                <div id="topicDetails">
                </div>
              </div>
          </div>
        </div>


        <!-- ClipNote -->
        <div class="col-md-6">
            <div id="column">
              <h4>ClipNote</h4>
                <div id="clipDetails">
                </div>
            </div>
        </div>

    </div>



  </body>

</html>