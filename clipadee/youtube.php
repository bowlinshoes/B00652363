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



      //youtube parser
function youtube_parser(url) {
    var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match && match[1].length == 11) {
        urllink = match[1];
        imagelink = "<img src=\"http:\/\/img.youtube.com\/vi\/"+urllink+"\/hqdefault.jpg\">";
    } else {
        //urllink = "test"
    }
    document.getElementById("ytimagelink").value = urllink;
    document.getElementById("ytimage").innerHTML = imagelink;       
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
    <div id="username">
      <?php
        include("include/signedin.php"); 
      ?>
    </div>


        <!-- Collection -->
        <div class="col-md-4">
          <div id="column">
            <h4>YouTube</h4>


              <div><strong>Insert YouTube url:</strong></div>
<input type="text" id="ytlink" onkeyup="youtube_parser(this.value)">
    <hr>
    <div><strong>Output: YouTube video id:</strong></div>
    <input type="text" id="ytimagelink" value="">
        <div><strong>Output: Thumbnail</strong></div>
        <div id="ytimage"></div>


          </div>
        </div>

  </body>

</html>