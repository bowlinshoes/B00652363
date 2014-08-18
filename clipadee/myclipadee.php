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
    <link type="text/css" rel="stylesheet" href="css/bootcamp.css"><!-- code from bootstrap that is used -->
    <link type="text/css" rel="stylesheet" href="css/index.css"><!-- top navigation bar -->
    <link type="text/css" rel="stylesheet" href="css/clipadee.css">
    <link type="text/css" rel="stylesheet" href="css/filters.css">
    <link type="text/css" rel="stylesheet" href="css/myclipadee.css">
    <link rel="stylesheet" rel="stylesheet" href="css/style.css"><!-- style for add / delete button -->

    <!-- java scripts -->
    <script src="js/jquery.js"></script><!-- jQuery JavaScript Library v1.5 -->
    <script src="js/collection.js"></script><!-- add / delete / edit collection -->
    <script src="js/topic.js"></script><!-- add / delete / edit topic -->
    <script src="js/clip.js"></script><!-- add / delete / edit topic -->
    <script src="js/filter.js"></script><!-- collection / topic / clip filters -->
    <script src="js/search.js"></script><!-- search through clips function -->
    <script src="js/autosave.js"></script><!-- search through clips function -->
    <script src="js/jquery-ui-1.8.17.custom.min.js"></script><!-- jQuery JavaScript Library v1.5 -->
    <script src="js/links.js"></script>
    
    <!-- google hosted jquery library-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
    <!-- favicon for website -->
    <link rel="icon" type="image/png" href="http://goo.gl/alB2ZQ">

  </head>


  <body>

    <!-- Header -->
    <div class="header">
      <div class="clipadee-logo">
        <a href="index.php"><img src="images/clipadee-logo.png" HEIGHT="30" alt="Clipadee logo"></a>
      </div>
    </div>

    <!-- Navigation: if signed out navigation bar is navin.php else navigation bar is navout.php -->    
    <?php include("include/navigation.php"); ?>

    <!-- Displays Username if Signed In -->
    <?php include("include/signedin.php");?>

    <!-- Check to see if User is Lecturer or Student -->
    <?php
    
      $getstatus = mysql_query("SELECT lecturer FROM person WHERE id = '$rightvar'");

      //get value of module code
      if (mysql_num_rows($getstatus)) 
      {
          $value = mysql_fetch_assoc($getstatus);
          $status = $value['lecturer'];

      }

    ?>


    <!-- Collection -->
    <div class="col-md-2">

      <h1>Filters</h1>
      <h3>narrow your search</h3>

      <h4>Collections</h4>
      <!-- add new collection --> 
      <?php
    
        //if user lecture they can delete topics
        if ($status == 1) 
        {
          //do nothing
        } else
          {
            echo '<a href="javascript:;"><img src="images/add.png" HEIGHT="20px" title="Add Collection" alt="Add Collection" id="add_collection"></a>';
          }

      ?>
      
      <ul id="filterlist">
        <table>

          <!-- university modules -->      
          <?php
            $rightvar = $_SESSION['user_id'];
            $module = mysql_query("SELECT module_one, module_two FROM person WHERE id = '$rightvar'");

            //get value of module code
            if (mysql_num_rows($module)) 
            {
                $value = mysql_fetch_assoc($module);
                $code1 = $value['module_one'];
                $code2 = $value['module_two'];

            }

            $result = mysql_query("SELECT * FROM uni_collection WHERE module_code = '$code1' OR module_code = '$code2'"); 

            while ($row = mysql_fetch_array($result))
            {
              echo '<tr>';
              echo '<td width="500px"><a href="javascript:;"><li class="uni" onclick="getUniCollectionDetails(this.value)" value='.$row['collection_id'].'">'.$row['collection_title'].'</li></a></td>';
              //echo '<td><a href="#" id="'.$row['collection_id'].'" class="del"><img src="http://goo.gl/audtbz" HEIGHT="15px" title="Delete Collection" alt="Delete Collection"></a></td>';
              echo '</tr>';
            }

          ?>

          <!-- end-user collection --> 
          <?php
            $rightvar = $_SESSION['user_id'];
            $result = mysql_query("SELECT * FROM collection WHERE id = $rightvar"); 
            //$result= mysql_query("SELECT * FROM collection");
                      
            while ($row = mysql_fetch_array($result))
            {
              echo '<tr>';
              echo '<td width="100%"><a href="javascript:;"><li class="user" onclick="getCollectionDetails(this.value)" value='.$row['collection_id'].'">'.$row['collection_title'].'</li></a></td>';
              echo '<td><a href="#" id="'.$row['collection_id'].'" class="del"><img src="images/delete.png" HEIGHT="15px" title="Delete Collection" alt="Delete Collection"></a></td>';
              echo '</tr>';
            }
          ?>

        </table>
      </ul>

      <div class="filtertopic">
        <h4>Topics</h4>

        <!-- add new topic --> 
        <a href="javascript:;"><img src="images/add.png" HEIGHT="20px" title="Add Topic" alt="Add Topic" id="add_topic"></a>
      
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

      <!-- add new clip --> 
      <center><a href="javascript:;"><img src="images/add.png" HEIGHT="20px" title="Add Clip" alt="Add Clip" id="add_clip"></a></center>

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
            <td><input id="newcollection" type="text" name="collection_title"></td>
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
      <form method="post" action="topic.php" name="topic_info" id="topic_info">
        <table width="100%" border="0" cellpadding="4" cellspacing="0">
          
          <!-- <tr>
            <td colspan="2" align="right"><a href="#" id="close_topic">Close</a></td>
          </tr> -->

          <tr>
            <td>Add Topic</td>
            <td><input id="newtopic" type="text" name="topic_title"></td>
          </tr>

          <tr>
            <select id ="filter" name = "collection_id"> 
              <option value=""> Select a Collection </option>

                <?php

                  $rightvar = $_SESSION['user_id'];

                  if ($status == 1) 
                  {
                    $result = mysql_query("SELECT * FROM uni_collection WHERE lecturer_id = $rightvar");  
                  } else
                    {
                      $result = mysql_query("SELECT * FROM collection WHERE id = $rightvar");  
                    }
                  
                  while ($row = mysql_fetch_array($result)) 
                  {
                ?>
                  <option name="collection_id" value="<?php echo $row['collection_id'];?>"><?php echo $row['collection_title'];?></option>
                  <!-- echo "<a href =\"$row[collection_title]\">" . $row['collection_title'] . "</a>"; -->
                <?php
                  }//close while loop
                ?>
            </select>
          </tr>

          <tr>
            <td align="right"></td>
            <td><input type="button" value="Save" id="save_topic"><input type="button" value="Cancel" id="cancel_topic"></td>
          </tr>

        </table>
      </form>
    </div>


    <!-- Clip -->
    <div class="clip_form">
      <form method="post" action="clip.php" name="clip_info" id="clip_info">
        <table width="100%" border="0" cellpadding="4" cellspacing="0">
          
          <!-- <tr>
            <td colspan="2" align="right"><a href="#" id="close_topic">Close</a></td>
          </tr> -->

          <tr>
            <td>Add Clip</td>
            <td><input id="newclip" type="text" name="clip_title"></td>
          </tr>

          <tr>
            <td>YouTube URL</td>
            <td><input id="newclip" type="text" name="clip_url"></td>
          </tr>

          <tr>
            <select id ="filter" name = "topic_id"> 
              <option value=""> Select a Topic </option>

                <?php

                  $rightvar = $_SESSION['user_id'];

                  if ($status == 1) 
                  {
                    $result = mysql_query("SELECT * FROM uni_topic WHERE lecturer_id = $rightvar");  
                  } else
                    {
                      $result = mysql_query("SELECT * FROM topic WHERE id = $rightvar");  
                    }
                  
                  while ($row = mysql_fetch_array($result)) 
                  {
                ?>
                  <option name="topic_id" value="<?php echo $row['topic_id'];?>"><?php echo $row['topic_title'];?></option>
                <?php
                  }//close while loop
                ?>
            </select>
          </tr>

          <tr>
            <td align="right"></td>
            <td><input type="button" value="Save" id="save_clip"><input type="button" value="Cancel" id="cancel_clip"></td>
          </tr>

        </table>
      </form>
    </div>

    <!-- Footer 
    <div class="footer">
      <?php include("include/footer.php"); ?>
    </div>
    -->

  </body>

</html>