<?php

  include("../include/connection.php");

  // DATABASE: Get current row
  
  //get value from dropdown
  $val = $_GET["clipID"];

  $result = mysql_query("SELECT * FROM uni_clip WHERE clip_id = $val");
  $row = mysql_fetch_assoc($result);

  $url = $row['clip_url'];

  preg_match  (
                '/[\\?\\&]v=([^\\?\\&]+)/',
                $url,
                $matches
              );
                
  $id = $matches[1];  
  $width = '640';
  $height = '385';

  echo '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/v/' . $id 
      . '&amp;hl=en_US&amp;fs=1?rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' 
      . $id . '&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' 
      . $width . '" height="' . $height . '"></embed></object>';


        session_start();
        $rightvar = $_SESSION['user_id'];
        $getstatus = mysql_query("SELECT lecturer FROM person WHERE id = '$rightvar'");

            //get value of module code
            if (mysql_num_rows($getstatus)) 
            {
                $value = mysql_fetch_assoc($getstatus);
                $status = $value['lecturer'];

            }

            //if user lecture they can delete topics
            if ($status == 1) 
            {
  ?>

              <form id="ajax-form" class="autosubmit" method="POST" action="./php/uniautosave.php">

              <br/>
              Title: <br/><input style="width:640px;" name="clip_title" value="<?php echo $row['clip_title'] ?>" /><br/>
              URL: <br/><input style="width:640px;" name="clip_url" value="<?php echo $row['clip_url'] ?>" /><br/>
              ClipNote: <br/><input style="width:640px;" name="clip_note" value="<?php echo $row['clip_note'] ?>" /><br/>

              <input id="where" type="hidden" name="clip_id" value="<?php echo $row['clip_id'] ?>" />

              </form>

              <p id="notice"></p>

  <?php 
            } else
              {
  ?>

                <form>
                <br/>
                Title: <br/><input disabled style="width:640px;" name="clip_title" value="<?php echo $row['clip_title'] ?>" /><br/>
                Lecture Note: <br/><input disabled style="width:640px;" name="clip_note" value="<?php echo $row['clip_note'] ?>" /><br/>
                </form>


  <?php
                }

?>