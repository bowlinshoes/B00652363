<?php
include("include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Clipadee | My Clipadee</title>
    <meta charset="utf-8"/>
    
    <!-- font stylesheets -->
    <link rel="stylesheet" href="font.css"><!-- may not use-->
  
    <!-- css stylesheets -->
    <!-- <link type="text/css" rel="stylesheet" href="css/bootcamp.css"> -->
    <link type="text/css" rel="stylesheet" href="css/bootcamp.css"><!-- code from bootstrap that is used -->
    <link type="text/css" rel="stylesheet" href="css/index.css"><!-- top navigation bar -->
    <link type="text/css" rel="stylesheet" href="css/clipadee.css">
    <link type="text/css" rel="stylesheet" href="css/backgrounddrain.css">
    <link type="text/css" rel="stylesheet" href="css/css.css">
    <link type="text/css" rel="stylesheet" href="css/myclipadee.css">
    <link rel="stylesheet" rel="stylesheet" href="css/style.css"><!-- style for add / delete button -->

    <!-- java scripts -->
    <script src="js/jquery.js"></script><!-- jQuery JavaScript Library v1.5 -->
    <script src="js/collection.js"></script><!-- add / delete / edit collection -->
    <script src="js/topic.js"></script><!-- add / delete / edit topic -->
    <script src="js/filter.js"></script><!-- collection / topic / clip filters -->
    <script src="js/search.js"></script><!-- search through clips function -->
    <script src="js/autosave.js"></script><!-- search through clips function -->
    <script src="js/jquery-ui-1.8.17.custom.min.js"></script><!-- jQuery JavaScript Library v1.5 -->
    
    <!-- google hosted jquery library-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
    <!-- favicon for website -->
    <link rel="icon" type="image/png" href="http://goo.gl/alB2ZQ">

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
    <?php include("signedin/lecturer.php"); ?>


    <!-- Collection -->
    <div class="col-md-2">

      <h1>Filters</h1>
      <h3>narrow your search</h3>

      <h4>Collections</h4>
      <!-- add new collection --> 
      <a href="javascript:;"><img src="http://goo.gl/gjZA2X" HEIGHT="20px" title="Add Collection" alt="Add Collection" id="add_collection"></a>
      
      <ul id="filterlist">
        <table>

          <?php
            $rightvar = $_SESSION['user_id'];
            $result = mysql_query("SELECT * FROM uni_module WHERE lecturer_id = $rightvar"); 
            //$result= mysql_query("SELECT * FROM collection");
                      
            while ($row = mysql_fetch_array($result))
            {
              echo '<tr>';
              echo '<td width="500px"><a href="javascript:;"><li onclick="getLecModuleDetails(this.value)" value='.$row['module_id'].'">'.$row['module_title'].'</li></a></td>';
              //echo '<td><a href="#" id="'.$row['collection_id'].'" class="del"><img src="http://goo.gl/audtbz" HEIGHT="15px" title="Delete Collection" alt="Delete Collection"></a></td>';
              echo '</tr>';
            }
          ?>

        </table>
      </ul>

      <div class="filtertopic">
        <h4>Filter Topics</h4>
        <!-- add new collection --> 
        <a href="javascript:;"><img src="http://goo.gl/gjZA2X" HEIGHT="20px" title="Add Topic" alt="Add Topic" id="add_topic"></a>
      

        <ul id="filterlist">

        <div id="collectionDetails"></div>
      </div>

    </div><!-- Collection -->


    <!-- Clips Search Area -->
    <div class="col-md-4">

      <!-- Displays All Clips -->
      <script type="text/javascript">
        getTopicDetails('-2');
      </script>

      <h1>Clips</h1>
      <h3>all the clips you have so far</h3>

      <section class="list-wrap">

        <label for="search-text">Search for a Clip</label>
        <input type="text" id="search-text" placeholder="search" class="search-box">
        <span class="list-count"></span>

        <div id="topicDetails"></div>

      </section>

    </div><!-- Clips Search Area -->


    <!-- ClipNote -->
    <div class="col-md-6">

      <h1>ClipNotes</h1>
      <h3>videos and notes</h3>
      <div id="clipDetails"></div>
    
    </div><!-- ClipNote -->


    <!-- Action Forms -->

    <!-- Collection -->
    <div class="collection_form">
      <form name="collection_info" id="collection_info"> 
        <table width="100%" border="0" cellpadding="4" cellspacing="0">
          
          <tr>
            <td colspan="2" align="right"><a href="#" id="close">Close</a></td>
          </tr>

          <tr>
            <td>Add Collection</td>
            <td><input type="text" name="collection_title"></td>
          </tr>

          <tr>
            <td align="right"></td>
            <td><input type="button" value="Save" id="save"><input type="button" value="Cancel" id="cancel"></td>
          </tr>

        </table>
      </form>
    </div>


    <!-- Topic -->
    <div class="topic_form">
      <form name="topic_info" id="topic_info"> 
        <table width="100%" border="0" cellpadding="4" cellspacing="0">
          
          <tr>
            <td colspan="2" align="right"><a href="#" id="close_topic">Close</a></td>
          </tr>

          <tr>
            <td>Add Topic</td>
            <td><input type="text" name="topic_title"></td>
          </tr>
          <!--
          <tr>
            <td>First Name</td>
            <td><input type="text" name="fname"></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td><input type="text" name="lname"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td><input type="text" name="phone"></td>
          </tr>
          -->

          <tr>
            <td align="right"></td>
            <td><input type="button" value="Save" id="save_topic"><input type="button" value="Cancel" id="cancel_topic"></td>
          </tr>

        </table>
      </form>
    </div>

  </body>

</html>